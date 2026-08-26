# HydePHP — Agent Reference Guide

> This file exists so AI agents, coding assistants, and LLMs can understand HydePHP quickly and accurately without crawling the entire documentation site. It's linked from [hydephp.com/llms.txt](https://hydephp.com/llms.txt). For anything version-specific or in depth, the canonical source of truth is always the [official documentation](https://hydephp.com/docs/2.x/).

## Quick facts

| | |
|---|---|
| **What it is** | A static site generator (PHP, open source, MIT licensed) |
| **Built on** | Laravel Zero — a console-only distribution of Laravel components (currently tracking Laravel 11) |
| **Output** | Plain static HTML — no server, no runtime PHP after `build` |
| **Write content in** | Markdown, Blade, or plain HTML |
| **Requires** | PHP 8.2+, Composer (Node/NPM only if you want to recompile the frontend assets yourself) |
| **Install** | `composer create-project hyde/hyde` |
| **CLI** | `php hyde <command>` (Artisan-based, called the "HydeCLI") |
| **Current stable line** | 2.x (this guide describes 2.x; 1.x is legacy) |
| **Creator / maintainer** | Emma De Silva ([@EmmaDSCodes](https://twitter.com/EmmaDSCodes)); community-driven since |
| **Composer package** | [`hyde/framework`](https://packagist.org/packages/hyde/framework) |
| **Source** | [github.com/hydephp/develop](https://github.com/hydephp/develop) (monorepo) |

## The mental model

**HydePHP is a Laravel project with the HTTP layer removed and a build step added in its place.**

If you already know Laravel, you already know most of HydePHP — Blade, the config system, facades, service providers, Composer, `.env`, an Artisan-style console — all of it carries over unchanged. What's gone is everything tied to serving an HTTP request: there's no router, no controllers, no request/response objects, no middleware, no sessions, no auth guards, because there's no server. Instead of you defining routes, Hyde discovers Markdown/Blade files in a few conventional folders (`_pages`, `_posts`, `_docs`) and turns each one into a page automatically — that's the "magic" the framework is built around. Running `php hyde build` compiles everything into plain HTML in `_site/`, which you deploy anywhere that can serve static files.

### What carries over from Laravel

- **Blade** — the full templating engine: `@extends`, `@section`, `@foreach`, `@if`, components, layouts.
- **Configuration** — `config('hyde.name')`, dot notation, `.env` support, and a strictly-typed `Config` facade on top of Laravel's.
- **Service providers & the container** — you can register your own, same as any Laravel app.
- **Facades** — standard Laravel ones plus Hyde's own (`Hyde`, `Routes`, `Config`, `DataCollection`, `Author`, ...), auto-aliased so you can use them in Blade without importing a namespace.
- **Composer** — most framework-agnostic PHP packages just work; anything requiring the HTTP kernel won't.
- **An Artisan-style console** — the HydeCLI (`php hyde`) supports `list`, `help <command>`, `--help`, and you can write your own custom commands.
- **Familiar directory layout** — `app/`, `config/`, `resources/` all exist and behave as you'd expect.

### What's different from a standard Laravel app

| A typical Laravel app has... | HydePHP instead has... |
|---|---|
| `routes/web.php`, `routes/api.php` | No router at all — routes are generated automatically from files in `_pages`, `_posts`, `_docs`. Run `php hyde route:list` to see them. |
| Controllers handling `Request`/`Response` | No HTTP layer — nothing runs after the site is built, so there's nothing to control. |
| Middleware, sessions, CSRF, auth guards | None of these exist — a compiled HTML file can't execute PHP. |
| Eloquent + a configured database | No database by default. For structured or repeated data, use the file-based `DataCollection` facade (Markdown/YAML/JSON) instead — see below. |
| `php artisan serve` | `php hyde serve` — a realtime compiler dev server that rebuilds pages on the fly as you edit. |
| `public/` as the web root | `_site/` as the compiled output — this is what you deploy, and you should never hand-edit files inside it. |

**Practical upshot:** if a task calls for something that only makes sense in a request/response cycle — auth-gated pages, a live database query, a session, a form that posts somewhere — that's out of scope for what Hyde compiles. Anything that can be resolved *at build time* (reading a file, calling an API once during `build`, rendering from a `DataCollection`) is fair game.

## Installation

```bash
composer create-project hyde/hyde
cd hyde
php hyde serve   # preview at http://localhost:8080
```

Requirements: PHP 8.2+, Composer. NodeJS/NPM are only needed if you want to recompile the bundled Tailwind CSS yourself — Hyde ships a precompiled `app.css`, so most projects never need Node at all.

## Directory structure

| Directory | Purpose |
|---|---|
| `_pages/` | Static Markdown (`.md`) and Blade (`.blade.php`) pages |
| `_posts/` | Blog posts (Markdown) |
| `_docs/` | Documentation pages (Markdown) — powers a docs module with sidebar, search, versioning UI |
| `_media/` | Images and other static assets, copied to `_site/media/` as-is |
| `_site/` | **Build output.** The compiled, deployable static site. Regenerate with `build`, never hand-edit. |
| `config/` | `hyde.php` (main config), `docs.php`, `markdown.php`, plus any published Laravel/package configs |
| `resources/views/` | Blade components/layouts (optional — publish Hyde's own with `php hyde publish:views`) |
| `resources/assets/` | Vite-managed CSS/JS source, only relevant if you compile your own frontend |
| `resources/collections/` | File-based data collections (Markdown/YAML/JSON), read via the `DataCollection` facade |
| `resources/includes/` | Small content overrides, e.g. `footer.md` |
| `app/` | Custom PHP — page classes, service providers, console commands |

Everything is configurable, but these are the defaults and cover the vast majority of projects.

## How content becomes pages

Every build runs the same pipeline: **file discovery → page parsing → route generation.** There is no manual routing step.

| Page/file type | Source directory | Output directory | Extensions |
|---|---|---|---|
| Static Pages | `_pages/` | `_site/` | `.md`, `.blade.php` |
| Blog Posts | `_posts/` | `_site/posts/` | `.md` |
| Documentation | `_docs/` | `_site/docs/` | `.md` |
| Media Assets | `_media/` | `_site/media/` | common asset types |

A few conventions worth knowing before generating filenames:

- Use `kebab-case` filenames — the filename becomes the URL segment.
- Files prefixed with an underscore (`_draft.md`) are ignored by autodiscovery.
- A Blade page overrides a Markdown page of the same name.
- Dropping a plain `.html` file into `_pages/` copies it through as-is (title is parsed from the filename; no front matter support).
- Blog posts can optionally be prefixed with an ISO date (`2024-11-05-my-post.md` or `2024-11-05-10-30-my-post.md`) to set the publish date and get stripped from the URL — this is entirely optional.

Every page has a **path** (its real file location), an **identifier** (path minus extension, relative to its source directory), and a **route key** (output directory + identifier — the final URL, minus `.html`). Access any page's route in code via `Routes::get('posts/my-post')`.

## Front matter

A YAML block at the top of a Markdown file. Optional everywhere — Hyde fills in sensible defaults from the content itself (e.g. it'll use the first `# H1` as the title if none is set) — but anything you specify takes precedence.

```markdown
---
title: "My New Post"
description: "A short description used in previews and SEO"
category: blog
author: "Mr. Hyde"
date: "2022-05-09 18:38"
---

## Your Markdown Here
```

**Common page navigation front matter** (any/all optional — Hyde fills gaps):

```yaml
navigation:
    label: 'string'     # text shown in the nav menu
    priority: 'int'     # ordering (alias: order)
    hidden: 'bool'      # hide from nav (alias: visible, inverted)
    group: 'string'     # groups into a nav dropdown (alias: category)
```

**Blog post front matter schema:** `title`, `description`, `category`, `date` (`YYYY-MM-DD` or `YYYY-MM-DD HH:MM`), `author` (string, config username, or full array), `image` (local `_media/` path, full URL, or a data-rich array with `altText`/`caption`/`licenseName`/etc.).

**Front matter in Blade** ("BladeMatter") uses PHP, not YAML, and is statically parsed — no multi-line or multidimensional values:

```blade
@php($title = 'My Page Title')
@php($navigation = ['hidden' => true])
```

## Console commands (HydeCLI)

All commands are invoked as `php hyde <command>`. Every command supports `--help`; `php hyde help <command>` also works.

| Command | Description |
|---|---|
| `build` | Compile the static site into `_site/` (`--vite`, `--pretty-urls`, `--no-api`) |
| `serve` | Start the realtime compiler / dev server (`--host`, `--port`, `--vite`) |
| `make:page` | Scaffold a Markdown, Blade, or docs page (`--type=`, `--blade`, `--docs`, `--force`) |
| `make:post` | Scaffold a blog post, interactively if run with no title (`--force`) |
| `publish:configs` | Copy the default config files into your project |
| `publish:homepage` | Swap in one of Hyde's bundled homepages as `index.blade.php` |
| `publish:views` | Publish Hyde's Blade components to `resources/views/vendor/hyde` for customizing |
| `vendor:publish` | Publish assets from any vendor package (`--tag=`, `--provider=`, `--all`) |
| `route:list` | Print every generated route and its source file |
| `validate` | Run checks against your project to catch common mistakes |
| `build:rss` / `build:search` / `build:sitemap` | Regenerate just the RSS feed / docs search index / sitemap |
| `list` | List all available commands |

`rebuild <path>` (single-file build) is **deprecated** and slated for removal in v3.0 — prefer a full `build`, or `Hyde\Framework\Actions\StaticPageBuilder::handle()` programmatically.

## Common recipes

```bash
# New content
php hyde make:page "About Me"                  # _pages/about-me.md
php hyde make:page "Pricing" --type=blade       # _pages/pricing.blade.php
php hyde make:page "Installation" --docs        # _docs/installation.md
php hyde make:post "My First Post"              # _posts/my-first-post.md

# Dev loop
php hyde serve                                  # http://localhost:8080, rebuilds on change

# Ship it
php hyde validate                               # sanity-check the project
php hyde build --pretty-urls                    # compile to _site/
```

Data without a database — for repeated structured content (testimonials, team bios, a changelog), drop files in `resources/collections/<name>/` and read them with the `DataCollection` facade instead of standing up Eloquent:

```blade
@foreach(DataCollection::markdown('testimonials') as $testimonial)
    <blockquote>
        <p>{{ $testimonial->body }}</p>
        <small>{{ $testimonial->matter['author'] }}</small>
    </blockquote>
@endforeach
```

`DataCollection::markdown()`, `::yaml()`, and `::json()` all work the same way and return a Laravel Collection.

## Configuration

Same system as Laravel — dot notation into `config/` files, or the strictly-typed `Config` facade:

```php
$name = config('hyde.name', 'HydePHP');
$name = Config::getString('hyde.name', 'HydePHP'); // throws instead of silently coercing
```

| Config file | Covers |
|---|---|
| `config/hyde.php` | Site name, base URL, navigation, RSS, footer, authors, feature toggles |
| `config/docs.php` | The documentation module — sidebar, search |
| `config/markdown.php` | CommonMark extensions, raw HTML, `enable_blade` (allow Blade syntax inside Markdown files) |
| `app/config.php` | The underlying Laravel app config (equivalent of `config/app.php` in a normal Laravel install) |

Laravel/package config files (`view.php`, `cache.php`, `commands.php`, `torchlight.php`) aren't present until you run `php hyde publish:configs`.

Anything in `hyde.php` can also be set via a `hyde.yml` file at the project root instead of PHP — useful for simple key/value overrides, though it can't call PHP helpers like `env()`.

## Deployment

Once built, `_site/` is a plain static site — copy it anywhere:

- **Any web host / FTP** — upload the contents of `_site/` to the document root (`public_html`, `htdocs`, etc.)
- **GitHub Pages** — push `_site/` to the `gh-pages` branch, or automate it with a GitHub Actions workflow (hydephp.com itself is deployed this way)
- **Any static host** (Netlify, Vercel, Cloudflare Pages, S3, ...) — same idea: build, then deploy the `_site/` directory

Before deploying, set `SITE_URL` in `.env` (or `url` in `config/hyde.php`) — Hyde needs an absolute base URL to generate correct sitemaps, RSS feeds, and social meta tags.

## Extensions

Hyde has first-party support for **Torchlight** (syntax highlighting) — add a token to `.env` and it's enabled automatically:

```env
TORCHLIGHT_TOKEN=torch_<your-api-token>
```

## Versioning & docs

Documentation is versioned in the URL: `hydephp.com/docs/2.x/...` (current stable), `.../1.x/...` (legacy), `.../master/...` (in-development). If you're generating a link or citing a specific behavior, prefer `2.x` unless the person explicitly asks about an older project or unreleased features.

## Guidance for AI agents

**Do:**
- Default to normal Laravel/Blade patterns unless this guide says otherwise — they almost always apply.
- Put content in `_pages/`, `_posts/`, `_docs/` and let autodiscovery handle routing — don't hand-write route definitions.
- Scaffold with `php hyde make:*` rather than authoring boilerplate by hand; it sets up the right front matter and `@extends` layout automatically.
- Reach for `DataCollection` before reaching for a database.
- When exact flag names or current behavior matter, check `php hyde help <command>` or `hydephp.com/docs/2.x/` rather than assuming — commands and options do change between minor releases.

**Don't:**
- Don't scaffold Controllers, Middleware, `routes/web.php`/`api.php`, sessions, or auth guards — there's no request/response cycle for them to plug into.
- Don't assume a database or Eloquent models exist by default.
- Don't treat `_site/` as source — it's regenerated by `build` and should never be edited directly.
- Don't assume Node/NPM is required to get started — it's optional, for custom asset builds only.
- Don't confuse this project with unrelated tools that also use the name "Hyde" (e.g. Ruby/Jekyll-based blogging themes, unrelated admin-panel packages). This guide is specifically about **HydePHP**, the PHP/Laravel static site generator at hydephp.com.

## Official resources

| | |
|---|---|
| Website | [hydephp.com](https://hydephp.com) |
| Docs (current) | [hydephp.com/docs/2.x](https://hydephp.com/docs/2.x/) |
| Source (monorepo) | [github.com/hydephp/develop](https://github.com/hydephp/develop) |
| Starter template / CLI | [github.com/hydephp/hyde](https://github.com/hydephp/hyde) |
| Core framework package | [github.com/hydephp/framework](https://github.com/hydephp/framework) · [Packagist](https://packagist.org/packages/hyde/framework) |
| License | MIT |
| Security disclosures | GitHub Security Advisories, or hello@hydephp.com |

---

*This guide reflects HydePHP's 2.x documentation as of August 2026. If anything here looks out of date or wrong, the versioned docs above are always authoritative — please open an issue or PR against the docs.*
