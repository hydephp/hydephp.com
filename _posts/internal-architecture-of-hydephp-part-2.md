---
title: "Internal Architecture of HydePHP - Part 2: Services"
description: Part two in the series on the internal architecture of HydePHP, this time we take a "Deep Dive" into Services.
category: deepdives
author: Caen
date: 2022-05-12 19:54
image:
  path: "../media/tech-5090539_1920.jpg"
  description: "Background image of futuristic circles"
  license: "Pixabay License"
  licenseUrl: https://pixabay.com/service/license/
  credit: https://pixabay.com/photos/tech-circle-technology-abstract-5090539/
  author: "Reto Scheiwiller"
---

## A Deep Dive into Services


> Deep-Dives takes a closer look at the codebase and tries to explain what's going on.

This article is the second installation in my series on the internal architecture of HydePHP.
If you haven't read part one already, you should do that first. Here is a quick link
[Internal Architecture of HydePHP - Part 1: Introduction](https://hydephp.com/posts/internal-architecture-of-hydephp-part-1).

## Taking a look at a Service

Let's take a look at a relatively new Service Class, the DocumentationSidebarService,
to get a better understanding of how a Service is used through practical examples.

> Here is a link to the [source code on GitHub](https://github.com/hydephp/framework/blob/v0.24.0-beta/src/Services/DocumentationSidebarService.php).

This Service is as you may have guessed used to manage the sidebar in documentation pages

When using sidebar data in the Blade views, we interact with the Service to get the data we need.


You are of course free to take a [look at the source code](https://github.com/hydephp/framework/blob/v0.24.0-beta/resources/views/layouts/docs.blade.php)
to get a better understanding of how it all fits together, however here are some examples loosely plucked from the code.

```blade
$sidebar = Hyde\Framework\Services\DocumentationSidebarService::create();

@if($sidebar->hasCategories())
    @foreach ($sidebar->getCategories() as $category)
        @foreach ($sidebar->getItemsInCategory($category) as $item)

@else
    @foreach ($sidebar->getSidebar() as $item)
```

As you can see, the Service gives access to a lot of data and logic.
However, the Service does not do much of the heavy lifting. True, the Service contains methods to create and modify data,
and while it is responsible for generating the sidebar, it actually leverages other components to do the heavy lifting.

For example, the `DocumentationSidebarService::create()` method is used to create a new instance of the Service containing
a freshly generated sidebar, but the fetching of items to put in the sidebar is done by the `CollectionService`, the
actual parsing to get front matter data is done in the sidebar item model. The categorization is handled in a Concern. 

```php
/**
 * @example Hyde\Framework\Services\DocumentationSidebarService::create()
 **/
public static function create(): static
{
    return (new static)->createSidebar()->withoutIndex()->withoutHidden();
}
```

## Next Up

Make sure to check out the **How Hyde knows what to do with your Markdown** post (launching tomorrow).
