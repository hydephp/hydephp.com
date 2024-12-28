---
title: 'HydePHP Version v1.4 Released'
description: "This new update brings Live Edit and a bunch of other DX enhancements"
category: releases
author: Caen
date: '2023-12-11 20:00'
image: /media/live-edit-cover.png
---

## Overview

**HydePHP v1.4 is now available for download!**

This new update brings a Live Edit feature and a bunch of other developer experience enhancements.

## Live Edit

The live edit feature allows you to quickly edit Markdown-based pages (posts, docs, and pages) directly in the browser.

To enter the live editor, simply double-click on the article you want to edit, and it will be replaced with a text editor.
When you're done, click the save button to save the changes to the page's source file.

<video autoplay loop muted playsinline>
  <source src="https://cdn.hydephp.com/blog-post-media/live-edit.mp4" type="video/mp4">
</video>

## Realtime Compiler Console Output Facelift

The compiler console output has been redesigned to be more useful and pleasant to look at.

![Compiler Console Output](/media/new-realtime-compiler-output.png)

## Other Enhancements and Fixes

Here are just some of the other improvements in this release,
for the full list of changes, see the [release notes](https://github.com/hydephp/develop/releases/tag/v1.4.0).

- Added a new `hyde serve --open` option to automatically open the site in the browser in [#1483](https://github.com/hydephp/develop/pull/1483)
- Added a config option to customize automatic sidebar navigation group names in [#1481](https://github.com/hydephp/develop/pull/1481)
- Added support for dot notation in the Yaml configuration files in [#1478](https://github.com/hydephp/develop/pull/1478)
- Added support for both route keys and identifiers for specifying sidebar order in [#1432](https://github.com/hydephp/develop/pull/1432)
- Updated the sitemap generator to use relative links instead of localhost when missing site URL in [#1479](https://github.com/hydephp/develop/pull/1479)
- The `docs.sidebar.footer` config option now accepts a Markdown string to replace the default footer in [#1477](https://github.com/hydephp/develop/pull/1477)

## Upgrade Guide

To upgrade to this version, simply run the following commands:

```bash
composer require hyde/framework:^1.4
composer require hyde/realtime-compiler:^3.2
```

You may first want to read the [upgrade guide](https://hydephp.com/docs/1.x/updating-hyde) documentation.

## Conclusion

We hope you enjoy this release, and please report any issues you find at GitHub, https://github.com/hydephp/hyde,
and share your thoughts on Twitter/X, just use the hashtag [#HydePHP](https://twitter.com/search?q=%23HydePHP),
and tag us at [@HydeFramework](https://twitter.com/HydeFramework).
