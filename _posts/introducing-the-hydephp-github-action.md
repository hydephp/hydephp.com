---
title: 'Introducing the HydePHP GitHub Action'
description: "The easiest way to build and deploy your static sites!"
category: announcements
author: Emma
date: '2024-01-28 16:00'
image: 'media/hydephp-github-action-cover.png'
---

## Introducing the HydePHP GitHub Action: The Easiest Way to Build and Deploy Your Static Sites!

I'm thrilled to announce the first stable release of the [HydePHP GitHub Action](https://github.com/hydephp/action)! 

If you haven't heard about HydePHP yet, it's the static site generator you've been waiting for, combining the power of Laravel with the simplicity of Markdown. And now, with the HydePHP GitHub Action, building and deploying your GitHub-hosted HydePHP projects has never been easier.

## HydePHP - A Quick Recap

**HydePHP** - *The Static Site Generator You've Been Waiting For, is here.*

With HydePHP, you can create websites, blogs, documentation sites, and more, using the robust Laravel framework and the simplicity of Markdown. Your next website is just minutes away from becoming a reality.

## HydePHP GitHub Action: Your Workflow Companion

The HydePHP GitHub Action is a workflow that automates the building and deploying of HydePHP projects. It simplifies the entire process, allowing you to focus on creating content rather than worrying about the deployment pipeline.

## Features and Benefits

- **Automatic Project Detection:** The action automatically detects whether your repository is a full HydePHP project or an "anonymous" project containing only Markdown/Blade source files.

- **Versatile Deployment Options:** Choose to upload the site as a workflow artifact or **deploy it directly to GitHub Pages**. The choice is yours!

- **GitHub Marketplace Integration:** Find and install the HydePHP GitHub Action directly from the [GitHub Marketplace](https://github.com/marketplace/actions/build-hydephp-site).

- **Easy Configuration:** Customize the action with various configuration options to tailor it to your project's needs.

## Getting Started

### Starter Workflow

The most basic usage of the action involves building the site and uploading the result as a workflow artifact. Here's a simple example:

```yaml
name: Build HydePHP Site

on: [push]

jobs:
  build:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - uses: hydephp/action@master
```

### Deployment to GitHub Pages

To deploy your site directly to GitHub Pages, use the following example:

```yaml
name: Build and Deploy HydePHP Site

on: [push]

jobs:
  build:
    runs-on: ubuntu-latest
    permissions:
      contents: read
      pages: write
      id-token: write
    steps:
      - uses: actions/checkout@v3
      - uses: hydephp/action@master
        with:
          deploy-to: "pages"
```

It's that easy! Just remember to configure your repository to use GitHub Pages using the Actions workflow, as shown in the image below.

![1: Visit the settings tab of your repository. 2: Click on the "Pages" tab in the sidebar. 3: Under "Build and deployment", select "GitHub Actions" from the "Source" dropdown.](https://github.com/hydephp/action/assets/95144705/73c8b5ac-b26b-4763-b29b-ad118c1ea6a7)


### Configuration Options

The HydePHP GitHub Action provides several configuration options to suit your needs. Here are a few examples:

- `deploy-to`: Specify the deployment destination ("artifact" or "pages").
- `upload-artifact`: Force the upload of the site artifact.
- `framework-version`: Specify the HydePHP Framework version.
- ... and more. You can even pass configuration options to be added to the `hyde.yml` config file!

For a comprehensive list of configuration options, check out the [documentation](https://hydephp.github.io/action/).

## Explore the Documentation

For in-depth information, including detailed usage examples and configuration options, check out the live documentation at [hydephp.github.io/action](https://hydephp.github.io/action/).

## Conclusion

The new HydePHP GitHub Action brings simplicity and efficiency to the process of building and deploying your HydePHP projects. Why not try it out today?

In the words of those that have tried it already: "This thing literally worked right out of the box. Honestly, what!? Since when do things work so easily and so smoothly?" - [Peter Aleksander Bizjak](https://twitter.com/peteralexbizjak/status/1748818947615412278)
