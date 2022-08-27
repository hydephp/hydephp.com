---
title: "Creating a static photography portfolio landing site with HydePHP"
---

## Introduction

HydePHP is a new framework for rapidly building static websites using tools you may already know from popular frameworks like Laravel.

In this blog post, we'll be recreating this simple photography portfolio site using HydePHP and Markdown. No coding is needed!

You can find the [source code on GitHub](https://github.com/hydephp/portfolio-demo) and the [live demo here](https://hydephp.github.io/portfolio-demo).

[![Screenshot of the site we'll be recreating](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/yeo5liueiqkjejyodcw2.png)](https://hydephp.github.io/portfolio-demo)
 
## Prerequisites 

This post is aimed at beginners and will guide you through both the installation and basic usage of HydePHP. You don't need to know PHP to get started, though you should have it installed on your system as well as Composer is required to download and run HydePHP.

HydePHP is a command-line application, however, it's very easy to use, as long as you've ever seen a terminal in your life, you can follow right along!

## Installation

HydePHP is installed on a per-project basis using Composer, a PHP package manager. If you don't have Composer installed, you can download it from [getcomposer.org](https://getcomposer.org/download/).

Once you have Composer installed, you can create a new HydePHP project by running the following command in your [terminal or command prompt](https://askubuntu.com/questions/38162/what-is-a-terminal-and-how-do-i-open-and-use-it):


```bash
composer create-project hyde/hyde --stability dev
```

> Since HydePHP is still in development, you'll need to specify the `--stability dev` flag to install the latest version.

Once you run the command, Composer will download HydePHP and all of its dependencies. This may take a few seconds up to a few minutes depending on your internet connection. Once it's done, you'll see a new directory called `hyde` show up in the directory you ran the command in.

![Screenshot of the command and output](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/9h6czj6ojpe1vc9o98du.gif)

You can now navigate into the `hyde` directory using the command line with the `cd` (change-directory) command:

```bash
cd hyde
```

Now that you're in the `hyde` directory, you have a fully functional HydePHP project. We interact with the software through the HydeCLI, which is accessed by running `php hyde` followed by a command name. Make sure to run this command from within the `hyde` directory which we just navigated into. 

To show the welcome screen with a list of the available commands, run the following command:

```bash
php hyde list
```

![The list command](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/ub4hubwlrs3u4qa3tre1.png)
 
If you are unsure what a command does, you can always add the `--help` flag to any command to get more information about it. For example:

```bash
php hyde new --help
```

![The help flag](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/8or6y4lz8r9n0ttiztwq.png)

You can also always refer to the online [HydePHP CLI documentation](https://hydephp.com/docs/master/console-commands) for more information.

## Running the Development Server

HydePHP comes with a built-in development server that you can use to preview your site as you work on it. To start the development server, run the following command:

```bash
php hyde serve
```

This will start a local web server that will compile your site on the fly. You can access the site by visiting [http://localhost:8080](http://localhost:8080) in your browser. Once you visit this link, you should see the HydePHP welcome screen.

The default welcome page is compiled from a Blade file you may recognize from Laravel. The source page is stored in the `_pages/` directory as `index.blade.php`. When we compile our site later on, this file will be compiled to `index.html` in the `_site/` directory.

![Default welcome page](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/3o0gw00bxjszrn8r5p2p.png)
 

## Creating our First Page

The welcome page is nice and all, but I promised we'd be creating a photography portfolio site, so let's get to it! Since this is a simple site, we'll be using Markdown to create our pages. Markdown is a simple markup language that is easy to read and write. It's also fully supported by HydePHP, making it perfect for what we want to do. For when you want something more complex or dynamic, Laravel Blade is also supported.

Since we'll be replacing the default page, let's first remove it. You can delete the file directly using your app of choice, like Finder or Windows Explorer. But since we're already in the terminal, let's use the `rm` (remove) command to delete the file:

```bash
rm _pages/index.blade.php
```

Now, to creating our page. Since everything in HydePHP is file-based, we can just create a new file in the `_pages/` directory and call it `index.md`. But Hyde offers a neat command to create new pages for us, so let's use that instead:

```bash
php hyde make:page index
```

This command will create the `_pages/index.md` file for us. Now, let's open the file in your favourite text editor and take a look!

```markdown
---
title: index
---

# index
```

As you can see, a special section at the top of the file called the "front-matter" is used to define the page's title. The front matter is written in YAML, a simple markup language that used by HydePHP to define metadata.

The front matter is followed by the page's content, which is written in Markdown. Using front matter is optional, as HydePHP can infer many types of metadata, like page titles, from other sources like headings and filenames. But if you want to override these inferred values, you can do so by defining them in the front matter as is shown here.

Now that we have our page, let's add some content. I have already written some content for this site, so I'll just copy and paste it into the file. If you're following along yourself, simply copy the following into the file:

```markdown
## Hey there, I'm Jane Doe!

# Freelance photographer

![Jane Doe](media/photographer.jpg)

## About

This is a demo website built with [HydePHP](https://hydephp.com/), a free and open-source static site generator. This entire site is built using just Markdown text that is transformed into a fast and secure website that can be published anywhere.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget consectetur consectetur, nisi nisl aliquet nisi, euismod consectetur nisi nisi euismod nisi.

## Gallery

![Austria](media/austria.jpg)
![Boat](media/boat.jpg)
![Croatia](media/croatia.jpg)
![Fireworks](media/fireworks.jpg)
![Hallstatt](media/hallstatt.jpg)
![Lemonade](media/lemonade.jpg)
{.gallery}


## Contact

- Phone: +1 (123) 456-7890
- Email: jane.doe@example.com
- Address: 123 Main St, Anytown, CA 12345
```

As you can see, I removed the front matter, letting Hyde infer it automatically from the heading. I also added some images to the page, as well as a CSS class that we can use to add some styles to the images later on.

If you now refresh the page in your browser, you should see the page we just created. But it's of course missing the images, so let's add them!

![Added page has broken images](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/lwwkioorezzhzbqvqwdv.png)
 

## Adding Images

Adding images to HydePHP sites is easy. Just drop them inside the `_media/` directory. When you compile your site, HydePHP will automatically copy all the files in this directory to the `_site/media/` directory. This means that you can reference your images using relative paths, like `media/photographer.jpg` in the example above.

If you are following along, you can download the demo images from the [GitHub repository](https://github.com/hydephp/portfolio-demo).

![Screenshot of Windows Explorer in the _media directory](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/8d2j4wzikoiwknx6mu2w.png)
 
Now if you refresh the page in your browser, you should see the images we just added. But the images are a bit too big, so let's fix that!

![Images on the website are too large](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/ppb29hftxn6nmfgscbqb.png)

### Adding Basic Styles

We added a CSS class before called `.gallery`, so let's add some styles to that class.

If you want to add a lot of styles, you may want to take a look at the [Compiling assets documentation](https://hydephp.com/docs/master/managing-assets), but for this demo, we just want to add a single class, so we'll use a shortcut.

HydePHP comes with a complete frontend with components to create everything from blog posts to documentation sites. These templates are built with [TailwindCSS](https://tailwindcss.com). To make things easier for you, a pre-compiled and minified version of all the Tailwind classes needed for the built-in templates is included in the base installation. You'll find them in the `app.css` file in the `_media/` directory.

Generally, you shouldn't edit compiled files, but since we're just adding a single class, it's fine. Just make sure to add the class again if you ever update HydePHP.

With that out of the way, open the file in your favorite text editor and add the following to the bottom of the file:

```css
.gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.gallery img {
    max-width: 65vw;
    width: 44ch;
    margin: 3ch 2ch;
}
```

Now if you refresh the page in your browser, you should see the images are now smaller and fit nicely on the page.

![Images are now in a neat grid](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/a0w4gp5vxiy3h8n06ni2.png)

## Compiling the Site

Now that we have our site, let's compile it. We do this by running the `hyde build` command:

```bash
php hyde build
```

This will take all of our source content and compile it into a static site that can be published anywhere. The compiled site will be placed in the `_site/` directory.

![Screenshot of terminal output](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/yt1fkoqkhkv3oeqowul2.png)
 

## Publishing the Site

Static sites are super easy to publish. You can publish them anywhere you can host a website, like GitHub Pages, Netlify, and traditional shared hosting, just to name a few. That's one of the reasons why I love static sites so much! However, that's outside the scope of this tutorial, but do check out the [Deployment documentation](https://hydephp.com/docs/master/compile-and-deploy) for more information.

In short though, just drop the contents of the `_site/` directory into the root/public directory of your web server and you're done!

![The compiled site files](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/oq5ufc6x8m8f6xir8mqr.png)
 

## What's Next?

Now that we have a basic site, the world is yours! There are plenty of customizations we can do, for example adding some links to the navigation, or adding a blog. But that's for another tutorial. For now, I hope you enjoyed this tutorial and learned something new.

If you have any questions, feel free to ask them in the [HydePHP Discord server](https://discord.hydephp.com/) or [open an issue on GitHub](https://github.com/hydephp/hyde).

You can also check out the [HydePHP documentation](https://hydephp.com/docs/) for more information on how to use HydePHP. You can always also reach out to me on Twitter, [@CodeWithCaen](https://twitter.com/CodeWithCaen).

[![HydePHP.com](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/uqs8yq9luyoqd1tdxl5f.png)](https://hydephp.com)
 
