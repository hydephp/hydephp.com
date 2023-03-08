---
title: What is Markdown?
description: A short introduction to the Markdown text format.
category: general
author: Caen
date: 2022-08-06 15:11
---

## Introduction

Markdown is simply put what is called a [markup language](https://en.wikipedia.org/wiki/Lightweight_markup_language), and is used for creating formatted text using a plain-text editor like TextEdit or Notepad.

One of its appealing features is that it's easy for humans to read and write and that it's powerful enough for computers to turn ("parse") the Markdown text into other formats like [`HTML`](https://en.wikipedia.org/wiki/HTML) (which browsers can display).

## Where is it used?

Markdown is widely used in blogging, instant messaging, online forums, collaborative software, documentation pages, and software readme files. It's so popular that you may have written Markdown without realizing it. For example, the popular chat app Discord uses Markdown to format chat messages.

Even more, this very blog post is written in Markdown. You can see the source code for this post [here on GitHub](https://github.com/hydephp/hydephp.com/blob/master/_posts/what-is-markdown.md).


## How do I use it?

You can write Markdown in any text editor, even in the notes app on your phone! You can also use apps like [Stackedit](https://stackedit.io/app) which give you a simple and familiar visual writing experience you may be used to from Microsoft Word and Google Docs.

## Where can I learn it?

To learn more about Markdown, I recommend The Markdown Guide, at [www.markdownguide.org](https://www.markdownguide.org/). They also have a blog post which is much better than mine, [www.markdownguide.org/getting-started](https://www.markdownguide.org/getting-started/).


## What does it look like?

Here are some examples of the syntax, and what they look like in a browser:

```markdown
Inline text styles _italic_, **bold**, `monospace`.
```
> Inline text styles _italic_, **bold**, `monospace`.

```markdown
Bullet lists nested within a numbered list:

  1. fruits
     * apple
     * banana
  2. vegetables
     - carrot
     - broccoli
```
> Bullet lists nested within a numbered list:
> 
>   1. fruits
>      * apple
>      * banana
>   2. vegetables
>      - carrot
>      - broccoli

```markdown
A [link](https://hydephp.com).
![Image](Icon-pictures.png "icon")
```

> A [link](https://hydephp.com).
> ![Image](../media/logo.svg "icon"){style="display:inline;width:20px;height:20px;margin:0"}

## Conclusion

Markdown is a very powerful format for writing text. It's easy to use, and it's easy to read. It's also easy to write. I hope you learned something from this post. 

*This blog post is written for [HydePHP.com](https://hydephp.com/) and is based on [this Wikipedia article](https://en.wikipedia.org/wiki/Markdown) which falls under the [CC BY-SA 3.0 license](https://en.wikipedia.org/wiki/Wikipedia:Text_of_Creative_Commons_Attribution-ShareAlike_3.0_Unported_License), same as this post.*
