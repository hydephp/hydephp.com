---
title: 'HydePHP Version 1.8.0 Released'
description: "Enhancing internationalization support and improving file handling in preparation for the v2 release."
category: releases
author: Caen
date: '2025-05-17 12:00'
---

## Overview

**HydePHP v1.8.0 is now available for download!**

The HydePHP team is excited to announce version 1.8.0, which introduces several significant improvements to internationalization support, file handling, and metadata management. As we approach the v2 release next month, this update sets the stage for a smooth transition by incorporating important refinements and deprecating legacy methods in favor of more consistent alternatives.

## Key Improvements

### Enhanced Internationalization Support

One of the standout features in v1.8.0 is the improved internationalization support:

- A new slug generation helper automatically transliterates logographic characters to ASCII, making your site more accessible globally
- This ensures proper URL handling for content written in non-Latin scripts, fixing issues with logographic slug generation

### Improved File Management

File handling receives significant enhancements in this release:

- A new `Filesystem::findFiles()` method provides a more robust alternative to PHP's native `glob()` function
- Internal usage of glob functions has been replaced with this improved file finder
- Fixed the "BuildService finding non-existent files to copy in Debian" issue
- Solved the "Undefined constant `Hyde\Foundation\Kernel\GLOB_BRACE`" error affecting some systems

### Expanded Metadata Support

Content management is now more flexible:

- All page types now support the `description` front matter field for page metadata
- Metadata handling has been standardized across different page types for a more consistent experience
- Fixed URL metadata for blog posts not using customized post output directories

### Better Media Support

Media handling has been improved in v1.8.0:

- Added `webp` to the list of default media extensions
- The new `Hyperlinks::isRemote()` helper method provides a reliable way to check if a URL is remote
- Remote URL checks have been normalized so that protocol-relative URLs (`//`) are consistently handled

## Developer Experience Improvements

This release also includes several quality-of-life improvements for developers:

- The `cache:clear` command is now registered for easier cache management
- The `PostAuthor` class's `name` property now falls back to the `username` property if not set
- Improved accessibility of the heading permalinks feature
- Fixed heading permalinks button text showing in Google Search previews
- The Realtime Compiler dashboard layout has been improved for better usability

## Preparing for v2

As we approach the v2 release next month, we've made several changes to ease the transition:

- The `Hyde` facade now uses a `@mixin` annotation instead of single method annotations
- The `PostAuthor::getName()` method is deprecated (use `$author->name` instead)
- The `FeaturedImage::isRemote()` method is deprecated in favor of the new `Hyperlinks::isRemote()` method
- The `Hyde::mediaLink()` method is deprecated in favor of the `Hyde::asset()` method

## Upgrade Guide

We strongly recommend upgrading your existing projects to v1.8.0 to ensure a smoother transition to the upcoming v2 release. To upgrade, simply run:

```bash
composer require hyde/framework:^1.8
```

Check the [upgrade guide](https://hydephp.com/docs/1.x/updating-hyde) documentation for more details on the update process.

## Conclusion

HydePHP v1.8.0 strengthens the foundation of the framework by improving internationalization support, file handling, and metadata management. These enhancements not only make your current projects more robust but also prepare you for the exciting new features coming in version 2 next month.

We encourage all users to upgrade to this latest version to take advantage of these improvements and ensure a seamless transition to v2 when it arrives.

As always, we welcome your feedback and contributions to make HydePHP even better. Please report any issues you find on [GitHub](https://github.com/hydephp/hyde), and share your thoughts on Twitter/X using the hashtag [#HydePHP](https://twitter.com/search?q=%23HydePHP) or by tagging us at [@HydeFramework](https://twitter.com/HydeFramework).
