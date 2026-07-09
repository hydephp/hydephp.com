---
title: 'HydePHP Version v2.0 Released'
description: "A major evolution of the framework with modern frontend tooling, redesigned navigation API, and enhanced developer experience."
category: releases
author: Emma
date: '2025-10-01 20:00'
image: media/v2-cover-min.png
---

## Overview

**HydePHP v2.0 is now available for download!**

After two years of development and refinement, the HydePHP team is thrilled to announce the release of version 2.0. This is our most significant update yet, representing a major evolution of the framework with modernized frontend tooling, a completely redesigned navigation system, and countless improvements to the developer experience.

The new version was unveiled and released live on stage by HydePHP creator Emma De Silva at the Laravel Meetup Stockholm, on October 1st 2025.


## What's New in v2.0

### Modern Frontend Tooling with Vite

We've replaced Laravel Mix with Vite, bringing you a faster and more modern development experience:

- Instant Hot Module Replacement for real-time updates during development
- Seamless Blade template integration with the new Vite facade
- Tailwind V4 support with easy upgrade tool

Simply run `npm run build` (replacing the old `npm run prod` command) to compile your assets.

### Redesigned Navigation API

The navigation system has been completely rewritten from the ground up for maximum flexibility:

- YAML configuration support for defining navigation items
- Extra attributes for custom styling and behavior
- Improved Routes facade with Laravel-consistent naming conventions
- Natural priority ordering using numeric prefixes in filenames
- Enhanced sidebar management with better organization options

### Enhanced Asset Management

The new consolidated Asset API provides a more intuitive interface for handling media files:

- MediaFile instances with fluent methods like `getLink()`, `getLength()`, and `getMimeType()`
- Intelligent caching with CRC32 hashing for improved performance
- Automatic validation to prevent missing assets from going unnoticed
- Lazy-loaded metadata for optimal resource usage

### Better Documentation Features

Documentation pages now benefit from several powerful enhancements:

- Alpine.js-powered search with customizable implementation
- Blade-based table of contents that's 40x faster than before
- Custom heading renderer with improved permalink handling
- Colored blockquotes now using Tailwind CSS classes
- Dynamic source file links in Markdown documents

### Improved Blog Posts

The blog system receives significant upgrades:

- Simplified image front matter with new "caption" field
- Date prefixes in filenames for automatic publishing dates
- Enhanced author system with biographies, avatars, and social media links

## Technical Improvements

HydePHP v2.0 brings several important technical upgrades:

- **PHP 8.4 support** and Laravel 11 compatibility
- **Vite integration** with HMR support in realtime compiler
- **Tailwind CSS v4** with automated upgrade tools
- **ESM module support** for modern JavaScript development
- **40x faster table of contents generation** using Blade components
- **Lazy-loaded media metadata** with in-memory caching
- **Enhanced data collections** with syntax validation

## Upgrading to v2.0

We recommend that all users upgrade to take advantage of these improvements. Before upgrading, ensure your application is running HydePHP v1.6 or later (ideally v1.8) to ease the migration process.

### Key Migration Steps

1. **Upgrade Tailwind CSS**: Run `npx @tailwindcss/upgrade` to migrate to v4
2. **Update JavaScript**: Migrate custom JavaScript to ESM modules
3. **Update Configuration**: Update features to use enum values and navigation to array format
4. **Update Build Command**: Replace `npm run prod` with `npm run build` in your workflow

The upgrade process involves some breaking changes, particularly around the asset system, navigation configuration, and frontend tooling. We've prepared comprehensive documentation to guide you through each step.

For detailed upgrade instructions and a complete migration checklist, please refer to the [upgrade guide](https://hydephp.com/docs/2.x/upgrade-guide) in our documentation.

## Breaking Changes

As a major version release, v2.0 includes several breaking changes:

- Tailwind CSS upgraded from v3 to v4
- Frontend tooling migrated to ESM modules
- Navigation configuration format updated to array-based structure
- Asset API methods now return MediaFile instances
- Routes facade methods renamed to follow Laravel conventions
- Blog author system significantly improved with new configuration format

While these changes require some migration work, they set a solid foundation for future development and provide a much better developer experience overall.

## What's Next

With v2.0 released, we're excited about the future of HydePHP. We'll continue to focus on:

- Improving documentation and learning resources
- Enhancing the developer experience
- Building new features based on community feedback
- Maintaining compatibility with the latest Laravel and PHP versions

## Get Started Today

Ready to upgrade or start a new project with HydePHP v2.0? Install it via Composer:

```bash
composer require hyde/framework:^2.0
```

For new projects, we recommend using the HydePHP installer:

```bash
composer create-project hyde/hyde
```

## Resources

- **Documentation**: [hydephp.com/docs/2.x](https://hydephp.com/docs/2.x)
- **Upgrade Guide**: [hydephp.com/docs/2.x/upgrade-guide](https://hydephp.com/docs/2.x/upgrade-guide)
- **Full Changelog**: [github.com/hydephp/develop/releases/tag/v2.0.0](https://github.com/hydephp/develop/releases/tag/v2.0.0)
- **GitHub Repository**: [github.com/hydephp/hyde](https://github.com/hydephp/hyde)
- **Discord Community**: [discord.hydephp.com](https://discord.hydephp.com)

## Thank You

A huge thank you to everyone who contributed to this release through code, bug reports, feedback, and community support. HydePHP wouldn't be possible without this amazing community.

We encourage all users to upgrade to this latest version and explore the new features. As always, we welcome your feedback and contributions to make HydePHP even better. Please report any issues you find on [GitHub](https://github.com/hydephp/hyde), and share your thoughts on Twitter/X using the hashtag [#HydePHP](https://twitter.com/search?q=%23HydePHP) or by tagging us at [@HydeFramework](https://twitter.com/HydeFramework).

Happy building with HydePHP v2.0!
