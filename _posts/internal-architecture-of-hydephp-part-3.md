---
title: "Internal Architecture of HydePHP - Part 3: Page Models"
description: In this third instalment we take a look at how Hyde internally parses Markdown files and compiles them into HTML.
category: deepdives
author: Caen
date: 2022-05-13 20:00
image:
  source: "../media/tech-5090539_1920.jpg"
  description: "Background image of futuristic circles"
  license: "Pixabay License"
  licenseUrl: https://pixabay.com/service/license/
  credit: https://pixabay.com/photos/tech-circle-technology-abstract-5090539/
  author: "Reto Scheiwiller"
---

## A Deep Dive into Page Models AKA "How Hyde knows what to do with your Markdown"

> Deep-Dives takes a closer look at the codebase and tries to explain what's going on.
> You don't need to know this to use Hyde. Actually, the reason Hyde has page models is so that you don't have to worry about anything other than your content (unless you want to). 

Welcome to the third instalment in my series on the internal architecture of HydePHP. 

If you haven't read part one already, you should do that first. Here is a quick link [Internal Architecture of HydePHP - Part 1: Introduction](https://hydephp.com/posts/internal-architecture-of-hydephp-part-1).


## What are page models?

In Hyde, page models are simple classes that house the data to be rendered on a page, as well as information telling Hyde how to render the page. This ensures that Hyde data has a predictable state with known behavior.

Let's take a look at the model for Markdown Pages - on of the simplest page types.

```php
class MarkdownPage extends MarkdownDocument
{
    public static string $sourceDirectory = '_pages';
    public static string $parserClass = MarkdownPageParser::class;
}
```

> Static properties means that the value of these properties is shared across all instances of the class.
> Non-static properties are unique to each instance of the class (meaning they are specific to the page being rendered).

The `$sourceDirectory` tells Hyde autodiscovery where to find Markdown pages.
The `$parserClass` has contains logic for parsing a Markdown file into a MarkdownPage object.

As you can see, the MarkdownPage extends the MarkdownDocument class, which contains shared code for all Markdown based page types. Let's take a look.

```php
class MarkdownDocument extends AbstractPage
{
    use HasDynamicTitle;

    public static string $fileExtension = '.md';

    public array $matter;
    public string $body;
    public string $title;
    public string $slug;
}
```

Here the `$fileExtension` is set for all Markdown based pages.

The other properties define the data and datatypes that will be used by the Blade views.

The `HasDynamicTitle` trait, allows Hyde to guess the page title based on a few different factors if the page doesn't have a title set in the front matter.



## How page models are used to generate static pages

The page models are integral to the static site-building process.

When compiling a Markdown file into static HTML this is roughly what happens, using a blog post as an example:

During the build loop, the source file in the `_posts` directory is discovered by the `CollectionService`.
Since it's in the `_posts` directory, Hyde knows it's a Markdown post, this will then affect many of the
proceeding classes used. The Markdown file will be passed to the `MarkdownPostParser` which will then
using the `MarkdownFileService` parse the Markdown blog post file into a `MarkdownPost` Model.

The MarkdownPost model now contains all the metadata, for example, the **Author** model, as well
as the actual Markdown content. The Model can now be passed to the StaticPageBuilder which
will render an HTML using the Model data to populate the `post` Blade template.

Since it's a blog post, the resulting HTML will be stored in the `_site/posts` directory.

As you can see, a lot is going on here. But having it this way means it's incredibly easy
and fast to create content where you don't even need to specify what layout to use.
