---
title: What is Hyde?
description: Learn about Hyde and find answers to common questions!
category: Blog
author: Caen
date: 2022-04-13 15:34
---

## What is Hyde?

HydePHP is a Content-First Static Site Builder written in PHP using Laravel.

## What does "Content First" mean?

Hyde is a Framework, Static Site Builder, and Starter Template all-in-one, allowing you to focus on your content, not your markup.

## Don't I need to write HTML or CSS?

Not if you don't want to. Hyde comes with a full frontend website built using TailwindCSS and Laravel Blade components.

This allows you to write all your content in Markdown whether it be a blog post, a documentation page, or a static HTML page.

When Hyde is compiling your site it will render the Markdown content into one of the many Blade templates. For example, if you make a blog post, data you add using YAML Front Matter will be used to display the title, author, date of the post and its featured image -- just to name a few. If you make a documentation page, Hyde will automatically generate the sidebar for you.

## I like Blade, am I still limited to using Markdown?

Not at all! The default templates are great to get started quickly, but if you want the full power of Laravel Blade you can customize all the default Hyde layouts and components. Or you can scrap them completely and start from scratch! You are in control over your content and your site.

If you are happy with the default templates, but you want to sprinkle in some custom content, that's fine too!
You can create full Blade pages by placing them in the `_pages/` directory to be rendered by Hyde.

The Hyde website [hydephp.GitHub.io](https://hydephp.com/index.html) is fully built with the default templates.
We used the default blog post homepage and added a custom heading section using TailwindCSS for the front page.
But for the [Photo Gallery](https://hydephp.com/gallery.html) we needed more control so we created a custom Blade page. It was then compiled by Hyde into static HTML, but we could still extend the default layout and include custom Blade components. [See the source](https://github.com/hydephp/DocsCI/blob/b66d7ceccca363348472ba18702e51b3c654302a/resources/views/pages/gallery.blade.php)!