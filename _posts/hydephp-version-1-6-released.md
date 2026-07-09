---
title: 'HydePHP Version v1.6 Released'
description: "This release introduces new features for head section customization, routing helpers, and configuration type safety."
category: releases
author: Emma
date: '2024-04-17 12:00'
---

## Overview

**HydePHP v1.6 is now available for download!**

This update brings several new features and improvements that enhance the flexibility and performance of your HydePHP static site projects. Let's dive into the most significant changes!

## New Features and Improvements

### 1. Enhanced Head Component Customization

The `head.blade.php` component now includes a `@head` stack, allowing for more flexible customization of your site's `<head>` section. This addition makes it easier to inject custom meta tags, scripts, or styles on a per-page basis.

### 2. Improved Routing and Asset Handling

We've introduced new global helper functions (`asset()`, `route()`, and `url()`), along with a `Hyde::route()` helper in the `Hyde` facade. These additions simplify asset management and URL generation throughout your project.

### 3. Feature Management Enhancements

A new `Feature` enum has been added to improve the `Features` facade. This change allows for more robust feature toggling and management within your HydePHP projects.

### 4. Build Task Optimization

You can now use the `->skip()` helper to exclude specific build tasks, offering more control over the build process and potentially speeding up development workflows.

## Important Changes

- The `features` array in `config/hyde.php` now uses `Feature` enums instead of string values.
- Sitemap generation will be skipped if no base URL is set, aligning with Google's indexing requirements.
- The debug command now prints the binary path when running in a standalone Phar, aiding in troubleshooting.

## Bug Fixes

Several bugs have been addressed in this release, including:

- Fixed sitemap and RSS feed generation issues when the `_site/` directory is absent.
- Resolved extra newline output during failing build tasks.
- Improved blog post description generation by stripping Markdown formatting.
- Fixed a responsive dashboard table issue in the Realtime Compiler.

## Preparing for HydePHP v2.0

As we look ahead to the upcoming v2.0 release, we've deprecated some static `Features` flag methods used in configuration files. To ensure a smooth transition, we recommend updating your `config/hyde.php` file to use the new `Feature` enum for the `features` array.

For detailed upgrade instructions and examples, please refer to the [pull request #1650](https://github.com/hydephp/develop/pull/1650) in our GitHub development repository.

## Upgrade Guide

To upgrade to this version, simply run the following command:

```bash
composer require hyde/framework:^1.6
```

You may first want to read the [upgrade guide](https://hydephp.com/docs/1.x/updating-hyde) documentation.

## Conclusion

HydePHP v1.6 brings valuable improvements to the framework, enhancing developer experience and setting the stage for future advancements.
We encourage all users to upgrade to this latest version and start preparing for the upcoming v2.0 release.

Thank you for your continued support and happy coding with HydePHP!

We hope you enjoy this release, and please report any issues you find at GitHub, https://github.com/hydephp/hyde,
and share your thoughts on Twitter/X, just use the hashtag [#HydePHP](https://twitter.com/search?q=%23HydePHP),
and tag us at [@HydeFramework](https://twitter.com/HydeFramework).
