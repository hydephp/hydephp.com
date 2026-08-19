@php
    /** @var \Hyde\Pages\MarkdownPage $page */

    // Hyde reads the page title from the leading H1 but leaves the heading in the rendered body,
    // so it is lifted out of the article and shown in the masthead instead of appearing twice.
    // Pages that open on anything else are passed through untouched.
    $body = preg_replace('/\A\s*<h1\b[^>]*>.*?<\/h1>/is', '', (string) $content, 1);

    // Every other page on the site opens on a kicker above its title, so these get one too. The
    // documents themselves are synced from the project's GitHub repositories and carry no front
    // matter to read it from, hence the fallbacks; a page that does set one wins over both.
    $eyebrow = $page->matter('eyebrow') ?? match ($page->getRouteKey()) {
        'changelog' => 'Release history',
        'code-of-conduct', 'contributing' => 'Community',
        'license' => 'Legal',
        'security' => 'Policy',
        default => config('hyde.name', 'HydePHP'),
    };

    $description = $page->matter('description');
@endphp
<!DOCTYPE html>
<html lang="{{ config('hyde.language', 'en') }}" class="scroll-smooth motion-reduce:scroll-auto">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $page->title }} · HydePHP</title>
@include('hyde::layouts.meta')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,opsz,wght@0,5..1200,400..900;1,5..1200,400..900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=JetBrains+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.3/dist/cdn.min.js" integrity="sha256-gOkV4d9/FmMNEkjOzVlyM2eNAWSUXisT+1RbMTTIgXI=" crossorigin="anonymous"></script>
<style>
  :root {
    --ink: #14111c;
    --ink-2: #1c1827;
    --ink-3: #252031;
    --violet: #8d7bf5;
    --violet-dim: #5e50b8;
    --gold: #d6a24a;
    --fog: #a49cba;
    --text: #d6d0e4;
    --line: rgba(164, 156, 186, .16);
  }

  body { font-family: 'Instrument Sans', system-ui, sans-serif; -webkit-font-smoothing: antialiased }
  .font-playfair { font-family: 'Playfair Display', serif; opacity: .9 }
  .font-mono { font-family: 'JetBrains Mono', monospace }
  ::selection { background: var(--violet); color: var(--ink) }
  [x-cloak] { display: none !important }

  /* Everything below styles the rendered Markdown, which arrives without any classes of its own.
     These are the project's utility documents, licenses, policies, changelogs, so the typography
     stays quieter than the blog's: no drop cap, no display pull quotes, just the site's palette
     and type scale applied to ordinary document elements. */
  #page-body { color: var(--text) }

  #page-body > :first-child { margin-top: 0 }

  #page-body p { margin: 18px 0 0 }

  #page-body h1, #page-body h2, #page-body h3, #page-body h4, #page-body h5, #page-body h6 {
    color: #e9e5f2;
    scroll-margin-top: 5.5rem;
  }

  /* A second H1 means the document contains more than one part, the changelog's release notes
     being the case in hand, so it gets a rule above it to read as a new section. */
  #page-body h1 {
    margin: 72px 0 0;
    padding-top: 40px;
    border-top: 1px solid var(--line);
    font-family: 'Playfair Display', serif;
    font-size: 2.1rem;
    font-weight: 450;
    letter-spacing: -.014em;
    line-height: 1.15;
    opacity: .9;
  }

  /* A document that already draws its own rule before the section doesn't need a second one. */
  #page-body hr + h1 { margin-top: 36px; padding-top: 0; border-top: 0 }

  #page-body h2 {
    margin: 52px 0 0;
    font-family: 'Playfair Display', serif;
    font-size: 1.65rem;
    font-weight: 470;
    letter-spacing: -.01em;
    line-height: 1.2;
    opacity: .9;
  }

  #page-body h3 {
    margin: 36px 0 0;
    color: var(--violet);
    font-family: 'Playfair Display', serif;
    font-size: 1.2rem;
    font-weight: 500;
    opacity: .9;
  }

  #page-body h4, #page-body h5, #page-body h6 {
    margin: 28px 0 0;
    color: var(--gold);
    font-family: 'JetBrains Mono', monospace;
    font-size: .88rem;
    font-weight: 500;
  }

  #page-body strong { color: #f0edf7 }

  #page-body a {
    border-bottom: 1px solid var(--violet-dim);
    color: var(--violet);
    text-decoration: none;
  }

  #page-body a:hover { border-bottom-color: var(--violet) }

  #page-body :not(pre) > code {
    padding: 1.5px 6px;
    border: 1px solid var(--line);
    border-radius: 5px;
    background: var(--ink-3);
    color: #e9e5f2;
    font-family: 'JetBrains Mono', monospace;
    font-size: .82em;
    white-space: nowrap;
  }

  #page-body pre {
    margin: 24px 0 0;
    padding: 18px 20px;
    overflow-x: auto;
    border: 1px solid var(--line);
    border-radius: 10px;
    background: var(--ink-2);
    color: #d8d2e8;
    font-family: 'JetBrains Mono', monospace;
    font-size: .82rem;
    line-height: 1.8;
  }

  #page-body pre code {
    padding: 0;
    border: 0;
    background: transparent;
    color: inherit;
    font: inherit;
    white-space: pre;
  }

  /* Fenced blocks arrive wrapped by Hyde's code block component. The wrapper owns the spacing so
     that it and the pre inside it don't each draw a box. */
  #page-body .hyde-code-block { margin: 24px 0 0 }
  #page-body .hyde-code-block > pre { margin: 0 }

  #page-body ul, #page-body ol { margin: 14px 0 0 4px; padding: 0 }
  #page-body ul { list-style: none }
  #page-body li { position: relative; padding: 5px 0 5px 24px }

  /* Tailwind's preflight strips list markers from ordered lists too, and these documents number
     their steps, so the decimal marker is put back and given the same gold as the bullet dash. */
  #page-body ol { padding-left: 26px; list-style: decimal }
  #page-body ol > li { padding-left: 6px }
  #page-body ol > li::marker { color: var(--gold); font-family: 'JetBrains Mono', monospace; font-size: .85em }
  #page-body li > p { margin: 0 }
  #page-body li ul, #page-body li ol { margin-top: 0 }

  #page-body ul > li::before {
    position: absolute;
    top: 15px;
    left: 0;
    width: 10px;
    height: 2px;
    background: var(--gold);
    content: '';
  }

  /* Quotes in these documents are asides, notes and caveats rather than rhetoric, so they get the
     documentation callout treatment instead of the blog's display quote. */
  #page-body blockquote {
    margin: 24px 0 0;
    padding: 16px 22px;
    border: 0;
    border-left: 3px solid var(--gold);
    border-radius: 0 10px 10px 0;
    background: linear-gradient(90deg, rgba(214, 162, 74, .07), rgba(214, 162, 74, .02) 60%, transparent), var(--ink-2);
    color: var(--text);
  }

  #page-body blockquote > :first-child { margin-top: 0 }

  #page-body table { width: 100%; margin: 26px 0 0; border-collapse: collapse; font-size: .9rem }

  #page-body th {
    padding: 0 16px 10px 0;
    border-bottom: 1px solid var(--line);
    color: var(--gold);
    font-family: 'JetBrains Mono', monospace;
    font-size: .7rem;
    font-weight: 400;
    letter-spacing: .16em;
    text-align: left;
    text-transform: uppercase;
  }

  #page-body td { padding: 12px 16px 12px 0; border-bottom: 1px solid var(--line); vertical-align: top }

  #page-body img {
    max-width: 100%;
    height: auto;
    margin-top: 24px;
    border: 1px solid var(--line);
    border-radius: 10px;
  }

  #page-body hr { margin: 44px 0 0; border: 0; border-top: 1px solid var(--line) }

  @media (max-width: 640px) {
    #page-body table { display: block; overflow-x: auto }
  }
</style>
{!! config('hyde.head') !!}
</head>
{{-- Short documents like the security policy don't fill the viewport, so the column keeps the
     footer on the bottom edge rather than leaving it stranded mid-screen. --}}
<body class="flex min-h-screen flex-col bg-[#14111c] text-[17px] leading-[1.72] text-[#e9e5f2]">

<x-navigation />

<header class="pt-14 text-center sm:pt-20" style="background: radial-gradient(640px 300px at 50% -10%, rgba(141,123,245,.11), transparent 70%);">
  <div class="mx-auto max-w-[1160px] px-7">
    <p class="font-mono text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">{{ $eyebrow }}</p>

    <h1 class="font-playfair mx-auto mt-5 max-w-[20ch] text-[clamp(2.1rem,4.8vw,3.4rem)] font-[420] leading-[1.08] tracking-[-.014em]">{{ $page->title }}</h1>

    @if ($description)
      <p class="mx-auto mt-5 max-w-[54ch] text-[1.08rem] leading-[1.6] text-[#a49cba]">{{ $description }}</p>
    @endif

    <div class="mx-auto mt-11 h-px max-w-[220px] bg-gradient-to-r from-transparent via-[#d6a24a] to-transparent"></div>
  </div>
</header>

<main id="content" class="mx-auto max-w-[760px] px-7 py-14 pb-20">
  <article id="page-body">{!! $body !!}</article>
</main>

<div class="mt-auto pt-20">
  <x-footer />
</div>

</body>
</html>
