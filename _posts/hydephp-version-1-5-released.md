---
title: 'HydePHP Version v1.5 Released'
description: "In this release, several new features and improvements have been introduced."
category: releases
author: Caen
date: '2024-02-13 12:00'
---

## Overview

**HydePHP v1.5 is now available for download!**

In this release, several new features and improvements have been introduced.

## Improved Patch Release Strategy

This release experiments some changes into how releases are handled to clarify the patch versioning of distributed packages compared to the monorepo source versioning.

In short: We are now experimenting with rolling patch releases, where patches are released as soon as they're ready, leading to faster rollout of bugfixes.
This means that the patch version discrepancy between the monorepo and the distributed packages will be increased, but hopefully the end results will still be clearer,
thanks to the second related change: Prefixing the subpackage changes in this changelog with the package name. If there is no prefix, the change applies to the core package or the monorepo.

All this to say, please keep in mind that when the monorepo gets a new minor version, the prefixed changes may already have been released as patches in their respective packages.

## Added

### Easier media extensions configuration

We made it easier to change the file extensions Hyde uses to find  media files to copy the output directory.
We did this by adding the existing `media_extensions` option to the `hyde` configuration. 
If you want to add more extensions, simply add them to the empty merge array, or just override the entire array.

```php
// file: config/hyde.php
'media_extensions' => array_merge([
	// Add custom media file extensions here
], \Hyde\Support\Filesystem\MediaFile::EXTENSIONS),
```

### New Includes facade helper for HTML

We added a new `html` helper to the `Includes` facade to make it easier to include HTML files.

This gets the raw HTML of a partial file in the includes directory. Supplying the file extension is optional.

```html
<!-- file: resources/includes/footer.html -->
<!-- Custom HTML in the footer -->
```

```php
use Hyde\Support\Includes;

Includes::html('footer');
Includes::html('footer.html');

// With default value if the file does not exist
Includes::html('footer', 'Default content');
```


### Custom HTML in the `<head>` and `<script>` sections

We also added configuration options to add custom HTML to the `<head>` and `<script>` sections.

```php
// file: config/hyde.php
'head' => '<!-- Custom HTML in the head -->',
'scripts' => '<!-- Custom HTML in the body -->',
```

Or if you are using Yaml configuration:

```yaml
# file: config/hyde.yml
head: "<!-- Custom HTML in the head -->"
scripts: "<!-- Custom HTML in the body -->"
```

### Custom `<head>` and `<script>` sections using HTML includes

You can now also add custom HTML to the `<head>` and `<script>` sections using HTML includes.

```html
<!-- file: resources/includes/head.html -->
<!-- Custom HTML in the head -->
```

```html
<!-- file: resources/includes/scripts.html -->
<!-- Custom HTML in the body -->
```

## Changed

### Deprecated

We deprecated the `BuildService::transferMediaAssets()` method, as it will be moved into a build task in v2.0. See [#1533](https://github.com/hydephp/develop/pull/1533).

### Bug Fixes

Here are just some of the bug fixes in this release:

- Updated the Markdown to plain text converter to trim whitespace in [#1561](https://github.com/hydephp/develop/pull/1561)
- Realtime Compiler: Fixed icons not being considered as images by dashboard viewer in [#1512](https://github.com/hydephp/develop/pull/1512)
- Realtime Compiler: Fixed visual dashboard bugs in [#1528](https://github.com/hydephp/develop/pull/1528)
- HydeFront: Fixed bug where heading permalink buttons were included in text represented output in [#1519](https://github.com/hydephp/develop/pull/1519)
- HydeFront: Fix visual overflow bug in inline code blocks within blockquotes in [#1525](https://github.com/hydephp/develop/pull/1525)


## Upgrade Guide

To upgrade to this version, simply run the following commands:

```bash
composer require hyde/framework:^1.5
composer require hyde/realtime-compiler:^3.3
```

You may first want to read the [upgrade guide](https://hydephp.com/docs/1.x/updating-hyde) documentation.

## Conclusion

We hope you enjoy this release, and please report any issues you find at GitHub, https://github.com/hydephp/hyde,
and share your thoughts on Twitter/X, just use the hashtag [#HydePHP](https://twitter.com/search?q=%23HydePHP),
and tag us at [@HydeFramework](https://twitter.com/HydeFramework).
