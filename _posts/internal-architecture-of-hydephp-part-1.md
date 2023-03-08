---
title: "Internal Architecture of HydePHP - Part 1: Introduction"
description: This first part in a series of the architecture of HydePHP will give an overview of design patterns and concepts in the Hyde Framework Core.
category: deepdives
author: Caen
date: 2022-05-11 20:35
image:
  path: "../media/tech-5090539_1920.jpg"
  description: "Background image of futuristic circles"
  license: "Pixabay License"
  licenseUrl: https://pixabay.com/service/license/
  credit: https://pixabay.com/photos/tech-circle-technology-abstract-5090539/
  author: "Reto Scheiwiller"
---

## Introduction to the internal architecture of HydePHP.


Hey! My name is [Caen](https://twitter.com/CodeWithCaen). I am the creator of [HydePHP](https://hydephp.com/) - a new static app generator. I thought it could be useful to shed some light on the internal architecture of HydePHP and the design patterns I've used.

While this is not at all required reading for those wanting to try out Hyde, it might be interesting for those curious about the "magic" behind the framework. And of course to those who are interested in contributing to the codebase.

This article is going to be split into a few posts. This one will give a general broad overview, while I'll go into further detail on some key concepts in new posts over the next few days. 

_Note that Hyde is still in beta and stuff may change without notice. This post was written after the [0.24.0-beta release](https://github.com/hydephp/framework/tree/v0.24.0-beta), thus links to source code files in examples will be pinned to that version._

## Primer

Here's a refresher on Hyde:

- HydePHP is a static site generator written in PHP and is based on Laravel Zero.
- Hyde is different from many other SSGs as it offers a complete full-stack experience and has a built-in frontend.
- The key principle of Hyde is to keep things seriously simple to start with while offering the power to do anything you need it to.

## The Components

Hyde is split into a few components:

**[HydePHP/Framework](https://github.com/hydephp/framework)** - The core project containing the brains of Hyde and is not intended to be used as a standalone. Equivalent to Laravel/Framework.

**[HydePHP/HydeFront](https://github.com/hydephp/hydefront)** - The Hyde frontend assets. Extracted to improve testing, versioning and CDN deployment.

**[HydePHP/Hyde](https://github.com/hydephp/hyde)** - The full-stack Hyde repository acts like the glue holding everything together. This is what's used when creating a new Hyde project using Composer. Equivalent to Laravel/Laravel.

Since the Framework package is what holds the core logic, it's what this article will focus on.


## The Namespace Patterns 

I like code that describes what it does. That's why Hyde's core components are split into namespaces depending on what they are for.

Here is a reference over the namespaces. I'll go into detail about them in the next section.

{.list-compact}
- **Actions**
- **Services**
- **Models**

- **Concerns**
- **Contracts**

### Actions

Actions in Hyde are self-contained pieces of logic that are used to perform a specific singular task. They are often used to offload heavy lifting in Services. Actions are often named in a way that explains what they do. Here are some examples:

- **ConvertsArrayToFrontMatter**, which converts an array to a front matter string.
- **GeneratesTableOfContents**, which generates a table of contents from a markdown string.
- You get the idea...

### Services

Services (not to be confused with `ServiceProviders`) are classes containing logic for a certain feature or concept.

They are often used similarly to Laravel facades, grouping related logic related to a concept into a single interface.

Some examples of Hyde Services:

- **AssetService**, takes care of injecting the correct assets into the front-end.
- **CollectionService**, which contains helpers for working with lists and arrays.
- **BuildService**, which contains helpers used by static site generating components.

#### Deep Dive into Services
To learn more about how Services are used, take a look at the **Deep Dive into Services** post (launching tomorrow).

## Models

At their core, Models are just PHP classes that house data defined in the class schema. In general, Models contain very little logic.* Models used to generate pages also contains instructions on what parsers to use and where the source files are stored.

> *There are exceptions. For example, specialized Models that don't warrant having an entire Service, such as the `DocumentationSidebarItem` model which contains its own parsing logic.

Unlike Eloquent models in Laravel, these of course are not connected to any database. Instead, they are created on-demand when needed, often in a Service either directly or through an Action.

There are two main types of Models: General Models and Page Models. We'll take a quick look at the first one first, to get it out of the way.

### General Models

These are mainly used to have a clearly defined schema for the data they contain to ensure a predictable and consistent data structure.

For example, here is the `Author` model, which contains the data for an Author of a blog post.

```php
class Author // (Stripped of content for brevity and illustration purposes)
{
    public string $username;
    public ?string $name = null;
    public ?string $website = null;

    public function __construct(string $username, ?array $data = [])
}
```

### Page Models

Page Models are used to store the data for a static page type.

> Note that Blade Pages are a bit different. This section covers the Markdown-based pages.

When running the static site builder, Hyde compiles each source directory at a time. The source directory a file is stored in determines what type of page it is, and subsequently which Page Model to use.

There are currently three supported Markdown page types:

- **Markdown Posts**
- **Markdown Pages**
- **Documentation Pages**

All of these extend the `MarkdownDocument` base Model which provides common data for all Markdown pages, such as front matter, Markdown content, etc.

### How page models are used to generate static pages

The page models are an integral of the static site building process.

To learn more about how the page models are used, take a look at the **[How Hyde knows what to do with your Markdown](internal-architecture-of-hydephp-part-3.html)** post.


## Contracts & Concerns

These are two more namespaces that are used to provide additional functionality to the Hyde Core.

### Contracts

Contracts are simply PHP Interfaces that are used to define what methods a class must implement. The namespace also includes a few Abstract Classes to define what properties a class must have.

You can tell the type of a contract by its naming convention:

- Contracts are suffixed with `Contract`. For example: `ActionContract`.
- Abstract Class Contracts are prefixed with `Abstract`. For example: `AbstractPage`.

### Concerns

Concerns are simply PHP Traits that are used to provide additional functionality to the Hyde Core.

#### Data Concerns
When a Concern Trait primarily adds data to a class it usually is prefixed with `Has`.

For example: `HasAuthor`, `HasMetadata`, etc. Though I should mention that these traits often have logic pertaining to generating, parsing, and modifying the data type it adds. 

For example, here is a concern that creates and stores a `DateString` model from a Page model's front matter.

```php
trait HasDateString
{
    public ?DateString $date = null;

    public function constructDateString(): void
    {
        if (isset($this->matter['date'])) {
            $this->date = new DateString($this->matter['date']);
        }
    }
}
```

#### Logic/Action Concerns

These are similar to `Actions` but whereas Actions are often part of `Services` (eg. as _ServiceActions_), Logic and Action Concerns are Traits that perform logic that can be used in many unrelated places.

For example, `ValidatesExistence` can be used to validate that a file exists. `AsksToRebuildSite` can be used to ask the user if they want to rebuild the site when running a HydeCLI command.

Some internal concerns like the `BuildActionRunner` may also be used to simply offload logic to extend a larger Service class while maintaining the same object interface. This also makes granular testing easier as you can mock the logic you want to test.


## Conclusion

I hope you enjoyed this article and that you found it useful.
This is my first time writing something so technical, and I imagine I've made some mistakes.
If you spot any, please let me know so I can learn!


## Next Up

Make sure to check out the **[Deep Dive into Services](internal-architecture-of-hydephp-part-2.html)** post.
Also, make sure to check out the **[How Hyde knows what to do with your Markdown](internal-architecture-of-hydephp-part-3.html)** post.

<style>
	.list-compact p {
		margin: 0;
	}
</style>
