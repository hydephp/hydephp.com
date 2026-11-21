---
title: "My Blog Got Ten Times Slower, So I Tested HydePHP"
description: "A hosting move took my blog from half a second to over five seconds because every page was rendered on every visit. I ran a real test build with HydePHP 2.0.3 to see what static generation actually gives a Laravel developer. Here are the numbers I got."
category: "Guest Posts"
author:
    name: "Umar Farooq"
    website: "https://itsumarfarooq.com"
    socials:
      linkedin: "umar444"
      github: "Umar-444"
      x: "umartechtalks"
date: "2026-11-21 20:30"
guest_post: true
---

I am a Laravel developer, and until recently I did what most of us do with content pages. I let the framework render them on every visit. A blog post that had not changed in months still booted the application, ran its middleware, and queried the database for every single reader.

I got away with it because my hosting was quietly prerendering the blog for me. Then I moved hosts, the prerendering went away, and I found out what per-request rendering really costs. This post is about what I measured, and about the test I ran with HydePHP afterwards to see if static generation deserves a place in my stack.

## What actually happened to my blog

My personal site was hosted on Vercel, where the blog used prerendering with incremental regeneration. Posts were built once and served from cache, and when I measured them they started loading in roughly half a second.

In November 2026 I moved the site to Cloudflare Workers. Same content, same design, nothing deleted. But the new setup rendered every page on demand. When I audited the site on 7 November, a single blog post took 5.2 seconds before the first byte reached the browser. The blog listing page took 9.4 seconds. DNS, connection, and TLS together were under 0.2 seconds, so the wait was not the network. It was the server doing the full rendering job again and again, for pages that change maybe once a month. At one point that week the Worker even started returning Cloudflare Error 1102, which means it was exceeding its resource limits under this load.

Nothing about the content needed that work. The posts are public, they are identical for every visitor, and most of them have not been edited since the day they were published. Rendering them per request bought me nothing and cost my readers five seconds.

## The test I ran

I did not want to write another opinion piece about static sites, so I ran the tool. On 21 November I scaffolded a fresh HydePHP project and built a small test site on my own machine. The setup was PHP 8.3.6, Composer 2.11.2, and HydePHP 2.0.3, installed with one command:

```bash
composer create-project hyde/hyde my-site
```

I added one blog post with a PHP code block in it and one documentation page, both dummy content written only for this test, and ran the build:

```bash
php hyde build
```

Here is what the build reported, copied from my terminal: it finished in 0.45 seconds (452ms), with peak memory usage of 19.68MB. It compiled the homepage and 404 page from Blade, my Markdown post, my documentation page, and the documentation search page. The whole output folder held 7 files and weighed 136KB. The generated post page was 8.8KB of HTML.

Then I served that output folder with a plain static file server and opened both pages. They loaded as ordinary files, because that is all they are. There is no PHP process behind them, no database, and nothing to boot. Whatever serves the files is the whole story.

## What I liked, as a Laravel developer

The first thing is that nothing felt foreign. The command line tool behaves like Artisan, because HydePHP is built on Laravel Zero. Content is Markdown with front matter, layouts are Blade, and the folder names, `_posts`, `_pages`, `_docs`, tell you where things go without reading a manual. I was not learning a new ecosystem to get a static site. I was using the conventions I already work in every day, pointed at a different output.

The second thing is the build speed. Half a second for a small site means the build can run on every deployment without anyone complaining. Static generation only stays attractive if rebuilding is cheap, and at this size it is close to free.

The third thing is what the output does to my original problem. A static page cannot have a slow query or a cold cache, because serving it runs no code at all. My blog got slow for server-side reasons. Files do not have server-side reasons.

## What it does not solve, honestly

I have not run HydePHP in production, and I am not going to pretend a one-evening test makes me an expert in it. My main site is a Next.js application, so HydePHP would never replace it. Where it fits my work is next to an application, not instead of one: the documentation, guides, and help pages for a Laravel product, generated once and served as files, while the application itself handles logins, dashboards, and everything that differs per user.

It also does not fix judgment. If a page changes every minute or depends on who is asking, static generation is the wrong tool, and no framework changes that. The tool is simple. Deciding which pages deserve it is the actual work.

## The rule I work by now

If a page changes rarely and looks the same for everyone, generate it once and serve the file. If it changes often or depends on the visitor, render it in the application and spend your effort there instead.

I learned this the expensive way, by watching a working blog get ten times slower in a hosting move that changed nothing about the content. The fix was never a bigger server. It was remembering that a blog post is not an application screen, and it should not be priced like one.
