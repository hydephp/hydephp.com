---
title: 'New Markdown Features Test Post'
description: 'Testing new features'
category: devlog
author: gemini
date: '2026-08-08 13:05'
---

# Exploring the Powerful New Markdown Features in HydePHP v3

HydePHP v3 is bringing some fantastic upgrades to how Markdown is processed, giving you more flexibility, extensibility, and presentation power. Fenced code blocks are now rendered through customizable Blade views, meaning you have total control over the surrounding markup.

Let's dive into some of the most exciting new features and see exactly how they look!

---

## 1. Code Block Titles

Say goodbye to the old `// filepath:` comments inside your code blocks! HydePHP v3 introduces a native, clean `title="…"` modifier for fenced code blocks. This keeps your code snippets pure while still giving you a beautiful file path label.

Because HTML is allowed inside the title modifier, you can even pass links or custom formatting.

### Source

````markdown
```php title="app/Models/Post.php"
<?php

namespace App\Models;

class Post
{
    public function __construct()
    {
        echo 'Hello World!';
    }
}
```
````

### Result

```php title="app/Models/Post.php"
<?php

namespace App\Models;

class Post
{
    public function __construct()
    {
        echo 'Hello World!';
    }
}
```

---

## 2. Interactive Terminal Blocks

Documenting CLI commands just got a massive upgrade. By using the `terminal` language on a fenced code block, HydePHP will automatically render a macOS-style terminal window.

Lines beginning with a `$ ` prompt are intelligently highlighted as commands. Even better, the prompt itself is excluded from text selection, so your users can easily copy/paste the command without accidentally grabbing the `$` symbol!

### Source

````markdown
```terminal title="Installing Hyde"
$ composer require hyde/framework

 Building your static site!
 Created 12 files in 0.4 seconds
```
````

### Result

```terminal title="Installing Hyde"
$ composer require hyde/framework

 Building your static site!
 Created 12 files in 0.4 seconds
```

---

## 3. Symfony Console Formatting in Terminals

Want to make your terminal output look incredibly authentic? By adding the `xml` modifier to a `terminal` block, HydePHP will parse standard Symfony Console formatter tags (`<info>`, `<comment>`, `<question>`, and `<error>`) and colorize them automatically!

### Source

````markdown
```terminal xml title="Build output"
$ php hyde build

<info>Hyde was installed successfully.</info>
<comment>Restart the development server.</comment>
<question>Continue? (Y/n)</question>
<error>Build failed (just kidding!)</error>
```
````

### Result

```terminal xml title="Build output"
$ php hyde build

<info>Hyde was installed successfully.</info>
<comment>Restart the development server.</comment>
<question>Continue? (Y/n)</question>
<error>Build failed (just kidding!)</error>
```

---

## 4. Blade in Markdown & Component Blocks

HydePHP v3 enables Blade in Markdown by default (provided it's a trusted source). This means you can drop executable Blade blocks or even render Blade components directly within your Markdown files using the `blade render` or `blade component(...)` modifiers.

### Source

````markdown
```blade component(alert)
---
type: warning
title: Pay Attention!
---

This content is passed directly to the component **slot**!
```
````

*(When rendered in your project, this will pass the YAML front matter as attributes to your `alert.blade.php` component, and inject the parsed Markdown into the `$slot` variable.)*

---

## The Best Part: Everything is Composable!

The real magic behind these updates is the new **Composable Markdown Blocks** architecture.

Instead of hardcoding the HTML output deep inside the framework, HydePHP v3 parses these blocks and hands the data to a Blade view. Want to change how your code blocks look? Add a copy button? Modify the terminal window chrome?

Just publish the views:

```bash
php hyde publish:views components
```

You can now edit files like `markdown/code-block.blade.php` and `markdown/terminal.blade.php` to your exact specifications. Happy coding!
