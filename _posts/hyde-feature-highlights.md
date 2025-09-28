---
title: Hyde Feature Highlights
description: Learn about some of the features Hyde has to offer.
category: blog
author: Emma
date: 2022-04-17 12:59
---

## What is Hyde?

HydePHP is a content-first Laravel-powered Static Site Builder that allows you to create static HTML pages, blog posts, and documentation sites using Markdown, optionally with YAML Front Matter. 


## Create content faster than ever

Hyde comes preinstalled with a responsive TailwindCSS starter kit for static pages, blogs, and documentation sites alike. It has dark mode support, is mobile-friendly, and is accessible to screen readers.

Just write your content in Markdown, and Hyde will automatically generate the site from it. Depending on what folder you stored the Markdown file in, Hyde will choose the appropriate layout from one of the many built-in templates.

For example, storing a file in the `_posts` directory will render the Markdown HTML in a Blog Post template with strong support for Front Matter. Files in the `_docs` directory use the Documentation Page layout with an automatic sidebar. Markdown files in the `_pages` directory are rendered into a simple blank page putting the focus on your content. When using Blade pages you can choose which layout to use, or create your own!

## Write less code, let Hyde do the work
With Hyde's auto-discovery and automatic content generation, there is no more messing with routes, links, etc.

Hyde automatically creates and populates navigation menus and documentation sidebars.
For example, if you create a Markdown file as `_pages/about-us.md`, an 'About Us' link will be added to the navigation menu automatically.
Furthermore, internal links use relative links that automatically get the appropriate level of `../`'s depending on the file path.

Want to customize the generated menus? You can do that to. Overwrite, reorder, remove, and add external links as you see fit using the config.

When using the blog module, the posts are automatically added to your post feed as well!

## You're not limited to just Markdown
There may be times when you need more control than Markdown can offer. In this case, you can create pages using Laravel Blade. You can extend the default layout to take advantage of the built-in styles and components as well as the dynamic PHP templating, or if you prefer, stick with vanilla HTML. Hyde will compile it to a static page. And of course, you can mix and match

## Integrations
Hyde comes integrated with [Torchlight.dev](https://torchlight.dev) to provide amazing syntax highlighting for your code examples. Torchlight is automatically enabled when you set your API token in the .env file.
