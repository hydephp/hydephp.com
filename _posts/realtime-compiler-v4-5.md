---
title: A new error page and dashboard for the realtime compiler
description: "Realtime compiler v4.5 replaces the dated error page and dashboard with versions built for how HydePHP sites actually work."
category: releases
author: Emma
date: "2026-07-10 10:00"
---

The realtime compiler just hit v4.5.0. It's the package behind `php hyde serve`, the local dev server that recompiles and previews your Hyde site as you edit it. This release rebuilds two of its oldest-looking pieces: the error page that appears when something throws mid-build, and the `/dashboard` that lists your pages. Both worked fine. Both looked like they'd been sitting untouched since for years. Which they had. If you're on HydePHP v2, `composer update hyde/realtime-compiler` is the entire upgrade.

## Why this is 4.5 and not 4.1

You'll notice the version jumps straight from 4.0.0 to 4.5.0 with nothing in between. I skipped those numbers on purpose. These features were originally scoped for HydePHP v3, but the compiler is its own package, and it felt silly to sit on useful finished work until an unfinished release was ready. So they ship now, fully backwards compatible with 4.0 and with Hyde 2. When v3 arrives, the compiler goes to v5. 4.5 is me marking the halfway point out loud: v3 features, running on v2.

## The error page

Since the beginning, a crash during `serve` dropped you onto the default Whoops page. Whoops is a genuinely good tool. It also has to print almost everything, because it can't know what kind of app it's running inside. I do know. It's always a static site build, and that let me start deleting.

You can't send a POST request to a Hyde site, and query strings never reach PHP during a compile, so the request method, the POST body, and the GET parameters are all noise here. (Your frontend JavaScript can still read query params at runtime; the compiler simply never sees them, so they can't cause a crash.) All of that is gone. What stayed is the part you actually debug from: the stack trace and the code frames around the line that threw.

Then I added the things I kept wishing were there. A button to copy the whole report as text, and buttons that drop that report straight into an AI chat with the prompt already filled in. Links to the docs, a troubleshooting page, and the GitHub issue tracker. And a short environment block with the stuff I always end up asking for on issues anyway: the project path, the PHP and package versions, and your OS.

[Blade]: @include('components.rich-posts.realtime-compiler-v4-5.trimmed-error-page')

What's not in here yet: per-exception hints. Hyde throws a lot of its own exceptions, and each one could carry a targeted message. A `RouteNotFoundException` could for instance let you know that you got this error because the source file didn't exist. That didn't make the cut for 4.5, and it wasn't worth blocking the release over. If it sounds like a fun first contribution, the door is very much open. Thinking a PHP array in the realtime compiler package of exceptions => hints.

## The dashboard

If you've never found it: browse to `/dashboard` on your local server (`http://localhost:8080/dashboard` by default) and you get a list of every page in your site, plus a modal to spin up new ones. And a media library. It was Bootstrap. Which no shade, I practically grew up developing with Bootstrap. But if I'm going to reskin it, I might as well redesign it. So it's now a dark theme I actually want to look at, and while I was in there I rethought what it shows.

The old version was a table: one column for the source path, one for the output path, one for the route key. The thing is, those aren't three independent facts. In Hyde the source path decides the output path, and the route key is just the output path with the `.html` chopped off. Three columns meant printing almost the same string three times. So I replaced the table with the relationship it was hiding: the source file, an arrow, and the compiled output, with the route key highlighted inside that output.

[Blade]: @include('components.rich-posts.realtime-compiler-v4-5.dashboard-page-rows')

Dropping the column header does cost something, and it's worth being honest about it. There's no longer a label anywhere that says "route key," so how would a newcomer learn the term? I landed on the opposite conclusion. That old label mostly made people stop and think "what's a route key, and am I supposed to know this already?" Almost always, they aren't. A [route key](https://hydephp.com/docs/2.x/automatic-routing#accessing-routes) only matters once you start pulling route models into your own Blade, and if you haven't read that page yet, a column header taught you nothing except that there's a thing you don't understand. Highlighting it in context does the reverse. If you know what it is, you recognise it. If you don't, it just reads as part of the path and you carry on. I'd rather quietly reassure the people who know than nag the people who don't when they really don't need to.

A couple of interaction details I'm fond of. The output path is clickable and opens the page in the preview. The source path is also clickable, but it opens the file in your editor, which is a different kind of action, so it gets a different signal: the output underlines solid on hover, the source underlines dotted. It's a small tell, but it means you know the two clicks do different things before you make them. There's also a new preview action in the button column that pops the rendered page into a modal iframe, so you can check a page without navigating away. Perfect if you forget what a page actually is for. Or does that just happen to me?

The buttons themselves went from text to icons with hover tooltips, which cut a lot of visual weight. And here's the part nobody asked for and I did anyway. Tooltips sit centred above their button. The rightmost one clipped the panel edge, so it right-aligns instead, which is standard enough. But on dynamically generated pages the edit tooltip swaps to a longer message about in-memory pages not being editable, and that one clipped harder. After more fiddling than I'll admit to, the right edge of that wider tooltip now lands on exactly the same pixel as the right edge of the last button. You will never notice this. I notice it every time. It's oddly satisfying.

## Try it, and a bug I left in

There's a static preview of the new dashboard here: [cdn.hydephp.com/previews/new-dashboard](https://cdn.hydephp.com/previews/new-dashboard/). Poke around.

If you look closely at the media library, you'll spot `fruits.webp` showing up as a grey `BINARY` tile instead of an image. I left that in for two reasons. One, it shows you what an unsupported file type looks like in the gallery. Two, it's a real bug I had missed in a previous version, so let's call it a teaching moment.

[Blade]: @include('components.rich-posts.realtime-compiler-v4-5.media-library-webp-bug')

A while back I added `webp` to Hyde's default safelisted media extensions so those files get copied into the build output. What I forgot is that the dashboard controller keeps its own separate list of extensions it knows how to render as images, and I never `webp` added it to that one. So the framework happily copies your `.webp` file, and the dashboard has no idea how to show it. Textbook drift from keeping the same list in two places. Thankfully the damage was limited to `webp` files simply not rendering in the dashboard preview, the actual sites were totally fine.

The reason there were two lists at all: the dashboard has to exclude `css` and `js`, since you can't drop those into an `<img>` tag, so at some point I copied the framework's array and hand-edited it instead of importing it. The correct move would have been to pull the framework constant and filter out `css` and `js` at read time, so there's one list and nothing to drift. So that's on my list to fix. But until then, leaving the symptom visible in the preview felt more honest than patching it quietly before anyone noticed.

## Also in this release

One smaller fix rode along: compiled JSON and XML pages now send the correct `Content-Type` header ([hydephp/realtime-compiler#33](https://github.com/hydephp/realtime-compiler/pull/33)), so the sitemap and search index renders nicley if you open the previewed versions locally.

The error page is [hydephp/realtime-compiler#35](https://github.com/hydephp/realtime-compiler/pull/35), the dashboard is [hydephp/realtime-compiler#36](https://github.com/hydephp/realtime-compiler/pull/36), and the [full changelog](https://github.com/hydephp/realtime-compiler/compare/v4.0.0...v4.5.0) has the rest. The single-source-of-truth fix and per-exception hints are next on my list. If you get to the hints before I do, send a PR.


## Try it out!

Again, to upgrade to this version is simple, just run the following command:

```bash
composer update hyde/realtime-compiler
```

Thanks for reading this article, feel free to let me know your thoughts on Twitter/X where I'm [@EmmaDSCodes](https://x.com/EmmaDSCodes)!
