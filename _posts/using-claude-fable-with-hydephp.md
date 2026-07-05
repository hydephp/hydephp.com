---
title: "Building a killer HydePHP website with Claude Fable 5"
description: "We asked an AI to design a HydePHP showcase from scratch. It invented a fictional Arctic airline, drew the aircraft, and shipped a split-flap departures board rendered at build time. Here's how it went."
category: Community
date: 2026-07-03
author: Claude Fable
---

## Editor's note

Everything after this setion was written by an AI. Don't stop reading. I know most of us are bored of AI written content, but I assure you, this one is different. I want you to give it a chance. And I'm about to tell you why.

If you have any interest in AI, you've heard about Claude Fable, a safer version of the Mythos model, which is genuenly blowing users across domains away. I wanted to try Fable out to create a new HydePHP demo website to show off some more advanced features.

It delivered. Not only did it create a stunning website with a unique design that does not have the classic AI generated website feel, but it also created the following blog post, and a high quality promo video that's playing in the header above. If you look at the video on [YouTube](https://www.youtube.com/watch?v=ij-r085aEU8) you can even hear sound effects that Fable synthesised.

Try out the demo site at (nordlys.hydephp.site)[https://nordlys.hydephp.site/?ref=blog] and let us know your thoughts on [Twitter/X](https://twitter.com/intent/tweet?text=%40HydeFramework%20https%3A%2F%2Fhydephp.com%2Fposts%2Fusing-claude-fable-with-hydephp). With that said, everything below this text is straight from Fable. Please enjoy!

- Emma De Silva, Creator of HydePHP

## Letting Claude Drive

HydePHP has had a few demo sites over the years[^1] — a recipe blog, a photography
portfolio, a scout troop site. They're fine.[^2] They show the basics. But none of them
really flexes the parts of Hyde we're proudest of: DataCollections feeding Blade
pages, custom components, the docs module living side by side with a blog, all of it
compiling down to plain static HTML.

So we ran an experiment: give Claude Fable 5 the brief and see what comes back. The
brief was short — *build a demo that shows off Hyde's advanced features, and don't
give it that generic AI-generated look.* What came back is [Nordlys Air](https://nordlys.hydephp.site/?ref=blog),
a fictional bush airline flying six routes above the Arctic Circle, complete with a
live split-flap departures board, engineering-drawing aircraft profiles, and a crew
operations manual.

## Why a fictional airline?

The clever part of the concept isn't the theme — it's how neatly the theme maps onto
Hyde's page types. An airline has *data* (routes, aircraft), *stories* (a flight
journal), and *procedures* (an operations manual). That's DataCollections, the posts
module, and the documentation module, each doing the job it was designed for instead
of being demoed in isolation:

- Every row on the departures board is a YAML file in `resources/collections/routes/`.
- Every fleet spec sheet is a YAML file in `resources/collections/fleet/`.
- The Flight Journal is three Markdown posts with authors, categories, and RSS.
- The Operations Manual is the docs module with its automatic sidebar and search —
  written in-character, down to the Ny-Ålesund radio silence procedures.

Add a fourth aircraft by adding a fourth YAML file. The register page, the homepage
cards, and the navigation update themselves on the next build. That's the pitch for
static site generators in one sentence, and now it's the pitch for the demo too.

## The detail we didn't expect: a build-time split-flap board

The centrepiece of the homepage is an animated split-flap departures board, and the
implementation is the most Hyde-flavoured thing on the site. Claude didn't render
the board with JavaScript. It wrote a Blade component, `x-flap-text`, that splits
each cell's text into character `<span>`s **at build time**:

```blade
@foreach(DataCollection::yaml('routes')
    ->sortBy(fn ($route) => $route->get('departs')) as $route)
  <x-flap-row :route="$route" />
@endforeach
```

The full timetable ships in the static HTML — readable with JavaScript disabled,
crawlable, accessible. The site's *only* script is a two-kilobyte vanilla file that
animates the spans already on the page and runs the hub clock, with
`prefers-reduced-motion` respected. No framework, no hydration, no build pipeline
beyond `php hyde build`. It's the static-first philosophy applied to a component
that usually gets thrown at a JavaScript library by reflex.

## On not looking AI-generated

We were explicit that the design shouldn't have the interchangeable AI-website look —
the purple gradients, the glassmorphism cards, the Inter-font-and-emoji sameness.
Claude's answer was to pick a specific, researchable design tradition and commit to
it: mid-century printed airline timetables. Cool ice-paper background, petrol ink,
one international-orange accent, ruled lines like a printed schedule, boarding-pass
cards with perforated stubs, and type set in Bricolage Grotesque and IBM Plex Mono.

The aircraft on the site aren't stock photos or generated images — they're original
schematic SVG line drawings, Twin Otter and Dash 8 side profiles with orange
dimension lines, drawn path by path. The route network is a hand-projected polar
azimuthal chart. Both live as reusable Blade components, so the fleet YAML just
says `drawing: twin-otter` and the page pulls in the right SVG with
`<x-dynamic-component>`.

## What working with Fable 5 was actually like

A few observations from the process, for anyone curious about the workflow:

**It verified the framework against the source.** Before writing a line of Blade,
it cloned the `hyde/hyde` skeleton and the documentation repo and checked the real
v2 APIs — `DataCollection::yaml()`, the navigation menu via `app('navigation.main')`,
the `Author::create()` config syntax. The demo isn't written from a fuzzy memory of
Hyde; it's written against Hyde as it ships today. (It also caught that `mb_str_pad`
is PHP 8.3+ while our `composer.json` allows 8.2, and wrote the multibyte padding
by hand instead. We noticed.)

**It wrote the content, not just the code.** The journal posts are actual essays —
a captain's field notes from the midnight sun run to Ny-Ålesund, a love letter to
the 04:10 de-icing crew. The operations manual reads like an operations manual. A
demo site lives or dies on whether the content feels real, and lorem ipsum was never
on the table.

**It kept the site honest.** The footer of every page says it: *Nordlys Air is
fictional. The northern lights are real.* And the homepage ends with an "under the
floorboards" section that shows the project's file tree and the actual Blade loop
powering the board — because a demo site's real job is to make you think "oh, I
could build that."

## Try it yourself

The full project is available as a standard Hyde [repository](https://github.com/hydephp/nordlys-demo?ref=blog) — clone it, run
`composer install && php hyde build`, and poke around. Change a route's status in
its YAML file and rebuild to watch the board update. Add an aircraft. Break the
timetable. That's what it's for.

And if you build something with Hyde — with or without an AI copilot — we'd love
to see it.

## Footnotes

These are the footnotes added by the human editor to point out issues in the AI text.

[^1]: Technically we just launched the recipe and scout sites.
[^2]: Hey! I kinda like them. I mean check out [Lemonade Days](https://lemonade-days.hydephp.site/?ref=nordlys) - it's so summery!

Also, the source code is at [github.com/hydephp/nordlys-demo](https://github.com/hydephp/nordlys-demo?ref=blog) and the live preview is at [nordlys.hydephp.site](https://nordlys.hydephp.site/?ref=blog). And below is the player for the promo video Fable generated.

<iframe width="560" height="315" src="https://www.youtube.com/embed/ij-r085aEU8?si=OADy8O96FwKo6EeA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
