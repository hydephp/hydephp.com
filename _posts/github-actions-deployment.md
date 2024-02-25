---
title: Automate HydePHP sites using GitHub Actions and GitHub Pages
description: HydePHP is a framework for building static websites. While the most common way to interact with HydePHP is through the command line, you can actually manage an entire site using GitHub.
category: Guides
author: Caen
date: 2022-06-20 12:09
---

## Introduction

[HydePHP](https://hydephp.com/) is a framework for building static websites. While the most common way to interact with HydePHP is through the command line, you can actually manage an entire site using GitHub.

In this tutorial, we will do the following, right in our browser!

1. Create a new Hyde project.
2. Setup a CI/CD pipeline to automatically compile the site.
3. Deploy the site to GitHub Pages.

## TL;DR
Impatient? Here is a link to the workflow we'll be creating: https://github.com/hyde-staging/ci-demo/blob/master/.github/workflows/main.yml, and here is a live preview: https://hyde-staging.github.io/ci-demo/

## Prerequisites

This guide assumes you are moderately familiar with GitHub and Actions and will not go into detail on the basics. There are links to the GitHub documentation at the end of the article in case you get stuck.

## Step 1: Create a new Hyde project

While the traditional way to create a new Hyde project is using composer in the command line, here we'll take advantage of the fact that the Hyde repository acts as a complete template.

To create our project, navigate tohttps://github.com/hydephp/hyde. On this page, you will see a big green button that says "Use this template".

Let's click it! Tip: You can also use this direct link https://github.com/hydephp/hyde/generate

Next, fill in the repository details, then press the "Create repository from template" button. This will then create a brand new repository with everything we need to set up our Hyde site!

> Having issues? Check out the [GitHub documentation for this subject](https://docs.github.com/en/repositories/creating-and-managing-repositories/creating-a-repository-from-a-template).


## Step 2: Setting up the GitHub Actions workflow

There are many ways and methods to use GitHub Actions, I personally like decoupling jobs. So for our workflow, we will use two jobs, one to build the site, and one to deploy it.

We will use [workflow artifacts](https://docs.github.com/en/actions/using-workflows/storing-workflow-data-as-artifacts) to pass the built data between the jobs. Don't take this as gospel though, you can use any method you like.

From your GitHub repository page, head on over to the Actions tab, and hit the "New workflow" button. On this page, you want to select the "set up a workflow yourself" button. This will create a new workflow file in your repository. Here we'll add the first job, to build the site.

```yaml
# This is a basic workflow to help you get started with using HydePHP with GitHub Actions

name: Build & Deploy

# Controls when the workflow will run
on:
  # We only want to run this workflow when changes are pushed to the master/main branch
  push:
    branches: [ "master" ]

  # Allows you to run this workflow manually from the Actions tab
  workflow_dispatch:

# A workflow run is made up of one or more jobs that can run sequentially or in parallel
jobs:
  # First we need to build the site
  build:
    # The type of runner that the job will run on
    runs-on: ubuntu-latest

    # Steps represent a sequence of tasks that will be executed as part of the job
    steps:
      # Checks-out your repository under $GITHUB_WORKSPACE, so the job can access it
      - uses: actions/checkout@v4

      # (optional) Validate the Composer files to catch any errors early on
      - name: Validate composer.json and composer.lock
        run: composer validate --strict

      # (optional) Cache the Composer packages to speed up future builds
      - name: Cache Composer packages
        id: composer-cache
        uses: actions/cache@v4
        with:
          path: vendor
          key: ${{ runner.os }}-php-${{ hashFiles('**/composer.lock') }}
          restore-keys: |
            ${{ runner.os }}-php-

      # Install the Composer packages
      - name: Install dependencies
        run: composer install --prefer-dist --no-progress

      # Now we can build the site! We do this using the HydeCLI
      - name: Build the site
        run: php hyde build --no-interaction
      
      # Our site is now compiled into the _site directory, so we'll upload it to an artifact to use in the next job
      - name: Upload site artifact
        uses: actions/upload-artifact@v4
        with:
          name: site
          path: _site
          
```

Paste the code above into the web editor and commit the changes.

Head on over to the Actions tab, here you'll see a new workflow called "Build & Deploy" which should already be running, otherwise it will start shortly. When it's finished, which for me took just half a minute, click on the run link. This will take you to a page where you will see that an artifact called "site" has been created.

If you want, you can click on the artifact to download the zip file to your computer. Open it up, and you'll see that your site is now built and ready to be deployed!

## Step 3: Deploying the site to GitHub Pages

We're almost there! Now we need to deploy the site to GitHub Pages. There are two routes we can go here, we could just upload the compiled site into the docs/ directory, however, I prefer to have it on a dedicated branch, so that's what we will do here, but you can use any method you like.

### Preparing the repository
> Stuck? See https://docs.github.com/en/pages/quickstart for help.

First, you need to enable the Pages feature on your repository. This is done by going to the repository settings page, and clicking on the "Pages" tab, and selecting the `gh-pages` branch as your site source.

> Don't have a gh-pages branch? I created mine in the web interface by selecting a Jekyll theme on the pages settings tab and then removing the two generated files. This quickly left me with an empty gh-pages branch. If you know a better way to do this using the web editor, please let me know!

### Updating the workflow

Now that our repository is ready, we need to update our workflow to upload the site to the new GitHub Pages branch.

Add the following code after the build job in the workflow we made before:

```yaml
  # Now we can deploy the site to GitHub Pages!
  deploy:
    runs-on: ubuntu-latest
    needs: build # Run the build job first, otherwise we won't have anything to deploy

    steps:
      - uses: actions/checkout@v4
        with:
          ref: 'gh-pages' # Checkout the gh-pages branch
      
      # (optional) Remove any old files from the gh-pages branch
      - name: Empty site directory
        run: rm -rf *
      
      # Download the compiled site into the current directory
      - name: Download site artifact
        uses: actions/download-artifact@v4
        with:
          name: site
          path: '.'

      # Create a .nojekyll file to prevent GitHub from attempting to compile a Jekyll site
      - name: Create .nojekyll file
        run: touch .nojekyll

      # Commit the changes to the gh-pages branch
      - name: Commit changes
        uses: EndBug/add-and-commit@v9 
        with:
          add: '.'
          message: 'Upload compiled site ${{ github.sha }}' 
```

Now when you commit the changes, the site will be built and uploaded to GitHub Pages.

Congratulations! You've now set up a new site with HydePHP and GitHub Actions. From here on, the opportunities are limitless. Why not try out creating a few new pages? You can also customize your site in the config files.

You can keep managing your site in the cloud using GitHub, or you can clone the repository to take advantage of the powerful realtime compiling and content scaffolding offered by the HydeCLI.

## Next steps

If you want to take your CI further, here are some ideas that the [HydePHP.com DocsCI](https://github.com/hydephp/DocsCI/blob/master/.github/workflows/build.yml) uses:

* Hyde already comes with compiled Tailwind CSS for all the built-in templates, however, if you add your own classes, you can always use the pre-installed Laravel Mix feature to compile the assets in the CI build process.
  
* Want to enable code syntax highlighting? Hyde has first-party support for [Torchlight.dev](https://torchlight.dev/), an API service for amazing syntax highlighting. Note that Torchlight requires a (free) API token. You should never store credentials in your GitHub repository. Instead, store the API key in your [GitHub Action Secrets](https://docs.github.com/en/actions/security-guides/encrypted-secrets) and add it to your .env file during the CI build process.

