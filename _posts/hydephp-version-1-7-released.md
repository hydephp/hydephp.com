---
title: 'HydePHP Version v1.7 Released'
description: "With several quality of life improvements, the developer experience with HydePHP is even better."
category: releases
author: Caen
date: '2024-07-05 12:00'
---

## Overview

**HydePHP v1.7 is now available for download!**


HydePHP v1.7 introduces several quality of life improvements, including supporting HTML comments for Markdown code block labels, new customizable theme toggle options, and improved site URL handling. This release improves developer flexibility and developer experience with smarter configuration management and more predictable navigation group handling.

## New Features and Improvements

### 1. HTML Comments for Markdown Code Block Filepath Labels

One of the standout features in v1.7 is the added support for using HTML comments to create Markdown code block filepath labels. This improvement allows for more descriptive and organized code snippets in your documentation.

### 2. Customizable Theme Toggle

We've introduced a new config option that allows you to disable the theme toggle buttons. This feature enables your site to automatically use browser settings for theme preferences, providing a more seamless experience for your visitors.

### 3. Improved `serve` Command

The `serve` command now allows you to specify which path to open when using the `--open` option. This addition gives you more control over your development workflow.

### 4. JSON Output for `route:list` Command

For those who love working with structured data, we've added a `--format=json` option to the `route:list` command. This feature makes it easier to integrate route information into your tooling and scripts.

### 5. Improved Navigation Group Handling

We've addressed an issue with navigation group behavior. Now, when a navigation group is set in front matter, it will be used regardless of the subdirectory configuration. This change provides more predictable and flexible navigation structuring.

### 6. Smarter Site URL Handling

Several improvements have been made to how HydePHP handles site URLs:

- The `Hyde::hasSiteUrl()` method now returns false if the site URL is set to localhost.
- `Hyde::url()` will return a relative URL instead of throwing an exception when a path is supplied, even if the site URL is not set.
- These changes reduce the chance of default `localhost` values appearing in production environments.

### 7. Smarter Configuration Management

Setting a site name in the YAML config file now influences all configuration values where it's used, unless already set. This change streamlines the process of customizing your site's identity across various components.

## Deprecations and Removals

- The global `unslash()` function has been deprecated in favor of the namespaced `\Hyde\unslash()` function.
- The `BaseUrlNotSetException` class has been deprecated.
- The Git version is no longer displayed in the debug screen and dashboard.

## Upgrade Guide

To upgrade to this version, simply run the following command:

```bash
composer require hyde/framework:^1.7
```

You may first want to read the [upgrade guide](https://hydephp.com/docs/1.x/updating-hyde) documentation.

## Conclusion


HydePHP v1.7 brings a wealth of improvements that enhance developer experience, site customization, and overall flexibility. Whether you're building a personal blog or a complex documentation site, these new features and enhancements will help you create better static sites with less effort.

We encourage all users to upgrade to this latest version to take advantage of these new features and improvements. As always, we welcome your feedback and contributions to make HydePHP even better.


We hope you enjoy this release, and please report any issues you find at GitHub, https://github.com/hydephp/hyde,
and share your thoughts on Twitter/X, just use the hashtag [#HydePHP](https://twitter.com/search?q=%23HydePHP),
and tag us at [@HydeFramework](https://twitter.com/HydeFramework).
