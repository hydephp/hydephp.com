@php
    use App\Enums\PostCategory;
    use App\Repositories\BlogArchiveRepository;
    use App\Support\GuestLinkPolicy;
    use Hyde\Foundation\Facades\Routes;
    use Hyde\Support\ReadingTime;

    /** @var \Hyde\Pages\MarkdownPost $page */

    // Front matter is author-supplied, so every byline part is treated as optional. A post missing
    // its category or date simply drops that part of the byline rather than failing the build.
    $category = $page->category ? PostCategory::tryFrom($page->category) : null;
    $author = $page->author;
    $minutes = max(1, ReadingTime::fromString($page->markdown->body())->getMinutes());

    // Guest content isn't editorially reviewed the way staff posts are, so every link it contains
    // — in the body, or in the byline the author supplied — gets a conservative rel treatment.
    $isGuestPost = (bool) $page->matter('guest_post', false);
    $articleHtml = $isGuestPost ? GuestLinkPolicy::markLinks((string) $content) : (string) $content;
    $guestRel = fn (string $base = ''): string => $isGuestPost
        ? implode(' ', array_unique(array_filter([...explode(' ', $base), ...explode(' ', GuestLinkPolicy::REL)])))
        : $base;

    $blog = Routes::get('posts');
    $categoryUrl = $category
        ? ($blog ?? Hyde::relativeLink('posts')).'?'.http_build_query(['category' => $category->value])
        : null;

    // Post pages sit one directory down, so the feed needs a link relative to this page.
    // Hyde::url() only resolves to an absolute URL once a site URL is configured.
    $feed = Hyde::relativeLink(config('hyde.rss.filename', 'feed.xml'));

    $adjacent = BlogArchiveRepository::adjacent($page->getRouteKey());

    // Same prefilled-issue pattern the documentation layout uses, so both places lead to the
    // one tracker the project actually reads.
    $discussUrl = 'https://github.com/hydephp/hyde/issues/new?'.http_build_query([
        'title' => sprintf('Discussion: %s', $page->title),
        'body' => sprintf("**Post:** %s\n\n", Hyde::url($page->getRouteKey())),
    ]);

    $shareUrl = 'mailto:?'.http_build_query([
        'subject' => $page->title,
        'body' => Hyde::url($page->getRouteKey()),
    ]);

    // Authors store social handles, not links, so each service gets the prefix that turns its
    // handle back into a URL. Anything already fully qualified is passed through untouched.
    $socialUrl = fn (string $service, string $handle): string => match (true) {
        str_starts_with($handle, 'http') => $handle,
        $service === 'github' => "https://github.com/$handle",
        $service === 'twitter', $service === 'x' => "https://twitter.com/$handle",
        $service === 'mastodon' => "https://mastodon.social/@$handle",
        $service === 'bluesky' => "https://bsky.app/profile/$handle",
        $service === 'linkedin' => "https://linkedin.com/in/$handle",
        default => $handle,
    };
@endphp
<!DOCTYPE html>
<html lang="{{ config('hyde.language', 'en') }}" class="scroll-smooth motion-reduce:scroll-auto">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $page->title }} · HydePHP Blog</title>
@include('hyde::layouts.meta')
<link rel="alternate" type="application/rss+xml" title="{{ config('hyde.name', 'HydePHP') }} RSS Feed" href="{{ $feed }}">
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
     The concept's article was hand-written HTML, so these rules restate its typography as
     element selectors scoped to the article body. */
  #post-body { color: var(--text) }

  #post-body > :first-child { margin-top: 0 }

  #post-body p { margin: 20px 0 0 }

  /* The opening capital only works when the post actually opens on prose. Posts that start with
     a heading get no drop cap, which is the right way for this to degrade. */

  /* The capital is taller than a short opening line, so the paragraph is made to contain its
     own float rather than letting it spill into the paragraph below. */
  #post-body > p:first-child { overflow: hidden }

  #post-body > p:first-child::first-letter {
    float: left;
    padding: 8px 14px 0 0;
    color: var(--gold);
    font-family: 'Playfair Display', serif;
    font-size: 4.2rem;
    font-weight: 500;
    line-height: .82;
    opacity: .9;
  }

  #post-body h2, #post-body h3, #post-body h4, #post-body h5, #post-body h6 {
    color: #e9e5f2;
    scroll-margin-top: 5.5rem;
  }

  #post-body h2 {
    margin: 56px 0 0;
    font-family: 'Playfair Display', serif;
    font-size: 1.75rem;
    font-weight: 470;
    letter-spacing: -.01em;
    line-height: 1.2;
    opacity: .9;
  }

  #post-body h3 {
    margin: 38px 0 0;
    color: var(--violet);
    font-family: 'Playfair Display', serif;
    font-size: 1.25rem;
    font-weight: 500;
    opacity: .9;
  }

  #post-body h4, #post-body h5, #post-body h6 {
    margin: 28px 0 0;
    color: var(--gold);
    font-family: 'JetBrains Mono', monospace;
    font-size: .9rem;
    font-weight: 500;
  }

  #post-body strong { color: #f0edf7 }

  #post-body a {
    border-bottom: 1px solid var(--violet-dim);
    color: var(--violet);
    text-decoration: none;
  }

  #post-body a:hover { border-bottom-color: var(--violet) }

  #post-body :not(pre) > code {
    padding: 1.5px 6px;
    border: 1px solid var(--line);
    border-radius: 5px;
    background: var(--ink-3);
    color: #e9e5f2;
    font-family: 'JetBrains Mono', monospace;
    font-size: .82em;
    white-space: nowrap;
  }

  /* Markdown cannot express the concept's terminal chrome, so code blocks keep the panel
     itself: same border, radius, and ink as the framed examples in the concept. */
  #post-body pre {
    margin: 26px 0 0;
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

  #post-body pre code {
    padding: 0;
    border: 0;
    background: transparent;
    color: inherit;
    font: inherit;
    white-space: pre;
  }

  /* Terminal fences are figures with their own title bar, so they need to opt out of the
     article's generic pre treatment. Keeping this scoped to the shared Hyde component makes
     terminal blocks match the post concept without changing ordinary fenced code blocks. */
  #post-body figure.hyde-terminal {
    margin: 26px 0 0;
    overflow: hidden;
    border: 1px solid var(--line);
    border-radius: 14px;
    background: var(--ink-2);
    color: #d8d2e8;
  }

  #post-body .hyde-terminal-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    border-bottom: 1px solid var(--line);
    background: var(--ink-2);
    color: var(--fog);
    font-family: 'JetBrains Mono', monospace;
    font-size: .72rem;
    line-height: 1.2;
  }

  #post-body pre.hyde-terminal-body {
    margin: 0;
    padding: 18px 20px;
    overflow-x: auto;
    border: 0;
    border-radius: 0;
    background: transparent;
    color: #d8d2e8;
    font-family: 'JetBrains Mono', monospace;
    font-size: .82rem;
    line-height: 1.8;
  }

  #post-body .hyde-terminal-body code {
    display: block;
    padding: 0;
    border: 0;
    background: transparent;
    color: inherit;
    font: inherit;
    white-space: pre;
  }

  /* Titled code blocks use the same framed panel as terminals. Hyde's current component puts
     the label in a figcaption and the pre directly beneath it. */
  #post-body figure.hyde-code-block {
    margin: 26px 0 0;
    overflow: hidden;
    border: 1px solid var(--line);
    border-radius: 14px;
    background: var(--ink-2);
  }

  #post-body .hyde-code-block-label {
    margin: 0;
    padding: 12px 16px;
    border-bottom: 1px solid var(--line);
    background: var(--ink-2);
    color: var(--fog);
    font-family: 'JetBrains Mono', monospace;
    font-size: .72rem;
    line-height: 1.2;
    overflow-wrap: anywhere;
  }

  #post-body figure.hyde-code-block > pre {
    margin: 0;
    padding: 18px 20px;
    overflow-x: auto;
    border: 0;
    border-radius: 0;
    background: transparent;
  }

  /* Untitled fences keep the ordinary single pre panel. The neutral wrapper owns the spacing,
     preventing the wrapper and pre from each drawing a separate rounded box. */
  #post-body div.hyde-code-block { margin: 26px 0 0; }
  #post-body div.hyde-code-block > pre { margin: 0; }

  #post-body ul, #post-body ol { margin: 16px 0 0 4px; padding: 0 }
  #post-body ul { list-style: none }
  #post-body ol { padding-left: 24px }
  #post-body li { position: relative; padding: 6px 0 6px 24px }
  #post-body li > p { margin: 0 }
  #post-body li ul, #post-body li ol { margin-top: 0 }

  #post-body ul > li::before {
    position: absolute;
    top: 17px;
    left: 0;
    width: 10px;
    height: 2px;
    background: var(--gold);
    content: '';
  }

  /* A plain quote is the pull quote from the concept. Hyde's Markdown converter tags callout
     quotes with a Tailwind border class instead, so those keep the documentation treatment. */
  #post-body blockquote:not([class]) {
    margin: 36px 0 0;
    padding: 6px 0 6px 28px;
    border: 0;
    border-left: 2px solid transparent;
    border-image: linear-gradient(to bottom, var(--gold), var(--violet)) 1;
    color: #e9e5f2;
    font-family: 'Playfair Display', serif;
    font-size: 1.35rem;
    font-style: italic;
    line-height: 1.45;
    opacity: .9;
  }

  #post-body blockquote[class] {
    --quote-accent: var(--gold);
    --quote-accent-rgb: 214, 162, 74;
    --quote-label: 'Note';

    margin: 28px 0 0;
    padding: 20px 26px 22px;
    border: 0;
    border-left: 3px solid var(--quote-accent);
    border-radius: 0 10px 10px 0;
    background: linear-gradient(90deg, rgba(var(--quote-accent-rgb), .075), rgba(var(--quote-accent-rgb), .02) 60%, transparent), var(--ink-2);
    color: var(--text);
  }

  #post-body blockquote[class]::before {
    display: block;
    margin-bottom: 8px;
    color: var(--quote-accent);
    content: var(--quote-label);
    font-family: 'Playfair Display', serif;
    font-size: 1.02rem;
    font-style: italic;
    font-weight: 600;
    line-height: 1.3;
    opacity: .9;
  }

  #post-body blockquote:is(.border-blue-500, .info) { --quote-accent: #60a5fa; --quote-accent-rgb: 96, 165, 250; --quote-label: 'Good to know' }
  #post-body blockquote:is(.border-amber-500, .warning) { --quote-accent: #e08f7a; --quote-accent-rgb: 224, 143, 122; --quote-label: 'Heads up' }
  #post-body blockquote:is(.border-red-600, .danger) { --quote-accent: #e5484d; --quote-accent-rgb: 229, 72, 77; --quote-label: 'Danger zone' }
  #post-body blockquote:is(.border-green-500, .success) { --quote-accent: #78c99b; --quote-accent-rgb: 120, 201, 155; --quote-label: 'Pro tip' }

  #post-body blockquote > :first-child { margin-top: 0 }
  #post-body blockquote p { color: inherit; font: inherit }

  #post-body table { width: 100%; margin: 26px 0 0; border-collapse: collapse; font-size: .9rem }

  #post-body th {
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

  #post-body td { padding: 12px 16px 12px 0; border-bottom: 1px solid var(--line); vertical-align: top }

  #post-body img {
    max-width: 100%;
    height: auto;
    margin-top: 26px;
    border: 1px solid var(--line);
    border-radius: 10px;
  }

  #post-body hr { margin: 48px 0 0; border: 0; border-top: 1px solid var(--line) }

  @media (max-width: 640px) {
    #post-body table { display: block; overflow-x: auto }
  }

  /* Temporary until HydeFront v4 is released. These values follow the post concept's terminal
     palette: gold prompts, lavender command text, muted struck text, and green output. */
  .hyde-terminal-command { color: #d8d2e8 }
  .hyde-terminal-prompt { color: #d6a24a; -webkit-user-select: none; user-select: none }
  .hyde-terminal-info, .hyde-terminal-fg-green { color: #8fce8f }
  .hyde-terminal-question, .hyde-terminal-fg-gray { color: #6f6786 }
  .hyde-terminal-comment { color: #8a7f70 }
  .hyde-terminal-error, .hyde-terminal-fg-red { color: #e5484d }
  .hyde-terminal-fg-black { color: #292d3e }
  .hyde-terminal-fg-blue { color: #6b68c9 }
  .hyde-terminal-fg-magenta { color: #7a5cc4 }
  .hyde-terminal-fg-yellow { color: #8a6d3b }
  .hyde-terminal-fg-cyan { color: #6b68c9 }
  .hyde-terminal-fg-white { color: #d8d2e8 }
  .hyde-terminal-fg-bright-red { color: #f07178 }
  .hyde-terminal-fg-bright-green { color: #b7e3a5 }
  .hyde-terminal-fg-bright-yellow { color: #e5c27b }
  .hyde-terminal-fg-bright-blue { color: #9b98f2 }
  .hyde-terminal-fg-bright-magenta { color: #a88be8 }
  .hyde-terminal-fg-bright-cyan { color: #9e9bf2 }
  .hyde-terminal-fg-bright-white { color: #fff }
  .hyde-terminal-bg-black { background-color: #292d3e }
  .hyde-terminal-bg-red { background-color: #e5484d }
  .hyde-terminal-bg-green { background-color: #8fce8f }
  .hyde-terminal-bg-yellow { background-color: #d6a24a }
  .hyde-terminal-bg-blue { background-color: #6b68c9 }
  .hyde-terminal-bg-magenta { background-color: #7a5cc4 }
  .hyde-terminal-bg-cyan { background-color: #6b68c9 }
  .hyde-terminal-bg-white { background-color: #d8d2e8 }
  .hyde-terminal-bg-gray { background-color: #6f6786 }
  .hyde-terminal-bg-bright-red { background-color: #f07178 }
  .hyde-terminal-bg-bright-green { background-color: #b7e3a5 }
  .hyde-terminal-bg-bright-yellow { background-color: #e5c27b }
  .hyde-terminal-bg-bright-blue { background-color: #9b98f2 }
  .hyde-terminal-bg-bright-magenta { background-color: #a88be8 }
  .hyde-terminal-bg-bright-cyan { background-color: #9e9bf2 }
  .hyde-terminal-bg-bright-white { background-color: #fff }
  .hyde-terminal-bold { font-weight: 600 }
  .hyde-terminal-underscore { text-decoration-line: underline }
  .hyde-terminal-strikethrough { text-decoration-line: line-through }
  .hyde-terminal-underscore.hyde-terminal-strikethrough { text-decoration-line: underline line-through }
</style>
</head>
<body class="bg-[#14111c] text-[17.5px] leading-[1.75] text-[#e9e5f2]">

<x-navigation />

<header class="pt-14 text-center sm:pt-20" style="background: radial-gradient(640px 300px at 50% -10%, rgba(141,123,245,.11), transparent 70%);">
  <div class="mx-auto max-w-[1160px] px-7">
    <p class="flex flex-wrap items-center justify-center gap-x-3 font-mono text-[.72rem] uppercase tracking-[.16em] text-[#a49cba]">
      <a class="text-[#a49cba] no-underline hover:text-white" href="{{ $blog ?? Hyde::relativeLink('posts') }}">Notes &amp; Dispatches</a>
      @if ($category)
        <b class="font-normal text-[#d6a24a]">/</b><a class="text-[#a49cba] no-underline hover:text-white" href="{{ $categoryUrl }}">{{ $category->label() }}</a>
      @endif
    </p>

    <h1 class="font-playfair mx-auto mt-5 max-w-[19ch] text-[clamp(2.2rem,5.2vw,3.7rem)] font-[420] leading-[1.07] tracking-[-.014em]">{{ $page->title }}</h1>

    @if ($page->description)
      <p class="mx-auto mt-5 max-w-[54ch] text-[1.12rem] leading-[1.6] text-[#a49cba]">{{ $page->description }}</p>
    @endif

    <div class="mt-8 flex flex-wrap items-center justify-center gap-3.5 text-[.88rem] text-[#a49cba]">
      @if ($author)
        @if ($author->avatar)
          <img src="{{ Hyde::asset($author->avatar) }}" alt="" aria-hidden="true" class="h-[38px] w-[38px] flex-none rounded-full object-cover">
        @else
          <span class="font-playfair flex h-[38px] w-[38px] flex-none items-center justify-center rounded-full bg-[radial-gradient(circle_at_32%_28%,#8d7bf5,#5e50b8)] font-medium italic text-white" aria-hidden="true">{{ mb_substr($author->name, 0, 1) }}</span>
        @endif
        <span><b class="font-semibold text-[#e9e5f2]">{{ $author->name }}</b></span>
      @endif

      @if ($author && $page->date)
        <span class="text-[#252031]" aria-hidden="true">·</span>
      @endif

      @if ($page->date)
        <time datetime="{{ $page->date->datetime }}">{{ $page->date->format('F j, Y') }}</time>
        <span class="text-[#252031]" aria-hidden="true">·</span>
      @endif

      <span>{{ $minutes }} min read</span>
    </div>

    <div class="mx-auto mt-11 h-px max-w-[220px] bg-gradient-to-r from-transparent via-[#d6a24a] to-transparent"></div>
  </div>
</header>

@if ($page->image)
  {{-- The concept had no cover slot, but posts carry one, so it runs at the article's width. --}}
  <figure class="mx-auto mt-12 max-w-[720px] px-7" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
    <img
      src="{{ $page->image->getSource() }}"
      alt="{{ $page->image->getAltText() ?? '' }}"
      @if ($page->image->hasTitleText()) title="{{ $page->image->getTitleText() }}" @endif
      class="w-full rounded-[10px] border border-[rgba(164,156,186,.16)]"
      itemprop="contentUrl"
    >
    @if ($page->image->hasCaption() || $page->image->hasAuthorName() || $page->image->hasLicenseName())
      <figcaption class="font-mono mt-3 text-center text-[.72rem] text-[#6f6786]">
        @if ($page->image->hasCaption())
          <span itemprop="caption">{!! Illuminate\Support\Str::inlineMarkdown($page->image->getCaption()) !!}</span>
        @endif
        @if ($page->image->hasAuthorName())
          <span>Image by
            @if ($page->image->hasAuthorUrl())
              <a href="{{ $page->image->getAuthorUrl() }}" rel="author noopener nofollow" class="text-[#a49cba] no-underline hover:text-white">{{ $page->image->getAuthorName() }}</a>
            @else
              {{ $page->image->getAuthorName() }}
            @endif
          </span>
        @endif
        @if ($page->image->hasLicenseName())
          <span>·
            @if ($page->image->hasLicenseUrl())
              <a href="{{ $page->image->getLicenseUrl() }}" rel="license noopener nofollow" class="text-[#a49cba] no-underline hover:text-white">{{ $page->image->getLicenseName() }}</a>
            @else
              {{ $page->image->getLicenseName() }}
            @endif
          </span>
        @endif
      </figcaption>
    @endif
    @foreach ($page->image->getMetadataArray() as $name => $value)
      <meta itemprop="{{ $name }}" content="{{ $value }}">
    @endforeach
  </figure>
@endif

<main id="content" class="mx-auto max-w-[720px] px-7 py-14 pb-20" itemscope itemtype="https://schema.org/BlogPosting">
  <meta itemprop="headline" content="{{ $page->title }}">
  @if ($page->date)
    <meta itemprop="datePublished" content="{{ $page->date->datetime }}">
  @endif

  <article id="post-body" itemprop="articleBody" aria-label="Article">{!! $articleHtml !!}</article>

  <div class="mt-16 text-center text-[1.1rem] tracking-[.5em] text-[#d6a24a]" aria-hidden="true">🎩</div>

  @if ($author)
    <div class="mt-14 flex flex-col items-start gap-5 rounded-[14px] border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-7 py-[26px] sm:flex-row">
      @if ($author->avatar)
        <img src="{{ Hyde::asset($author->avatar) }}" alt="" aria-hidden="true" class="h-[52px] w-[52px] flex-none rounded-full object-cover">
      @else
        <span class="font-playfair flex h-[52px] w-[52px] flex-none items-center justify-center rounded-full bg-[radial-gradient(circle_at_32%_28%,#8d7bf5,#5e50b8)] text-[1.3rem] font-medium italic text-white" aria-hidden="true">{{ mb_substr($author->name, 0, 1) }}</span>
      @endif
      <div>
        <h2 class="font-playfair text-[1.15rem] font-[520]">{{ $author->name }}</h2>
        @if ($author->bio)
          <p class="mt-1 text-[.9rem] text-[#a49cba]">{{ $author->bio }}</p>
        @endif
        <div class="font-mono mt-2.5 flex flex-wrap gap-4 text-[.74rem]">
          @foreach ($author->socials ?? [] as $service => $handle)
            <a class="text-[#8d7bf5] underline decoration-[#8d7bf5] underline-offset-[6px] transition-colors hover:text-white" href="{{ $socialUrl($service, $handle) }}" rel="{{ $guestRel('noopener') }}">↗ {{ ucfirst($service) }}</a>
          @endforeach
          @if ($author->website)
            <a class="text-[#8d7bf5] underline decoration-[#8d7bf5] underline-offset-[6px] transition-colors hover:text-white" href="{{ $author->website }}" rel="{{ $guestRel('author noopener') }}">↗ {{ parse_url($author->website, PHP_URL_HOST) ?? $author->website }}</a>
          @endif
          <a class="text-[#8d7bf5] underline decoration-[#8d7bf5] underline-offset-[6px] transition-colors hover:text-white" href="{{ $blog ?? Hyde::relativeLink('posts') }}">↗ More dispatches</a>
        </div>
      </div>
    </div>
  @endif

  <div class="font-mono mt-11 flex flex-wrap justify-center gap-6 text-[.78rem]">
    <a class="text-[#a49cba] underline decoration-[#8d7bf5] underline-offset-[7px] transition-colors hover:text-white" href="{{ $discussUrl }}" rel="noopener"><b class="font-normal text-[#d6a24a]">↗</b> Discuss on GitHub</a>

    {{-- Sharing falls back to an email draft, which needs no scripts, and upgrades to the native
         share sheet where there is one. Either way the script path shares the address actually
         being read, since the built-in href can only be absolute once a site URL is configured. --}}
    <a
      class="text-[#a49cba] underline decoration-[#8d7bf5] underline-offset-[7px] transition-colors hover:text-white"
      href="{{ $shareUrl }}"
      x-data
      @click="
        $event.preventDefault();
        navigator.share
          ? navigator.share({ title: @js($page->title), url: window.location.href }).catch(() => {})
          : window.location.href = 'mailto:?' + new URLSearchParams({ subject: @js($page->title), body: window.location.href })
      "
    ><b class="font-normal text-[#d6a24a]">↗</b> Share this dispatch</a>

    <a class="text-[#a49cba] underline decoration-[#8d7bf5] underline-offset-[7px] transition-colors hover:text-white" href="{{ $feed }}"><b class="font-normal text-[#d6a24a]">↗</b> Subscribe by RSS</a>
  </div>

  <nav class="mt-14 grid grid-cols-1 gap-4 sm:grid-cols-2" aria-label="Adjacent posts">
    @if ($adjacent['previous'])
      <a class="rounded-xl border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-[22px] py-[18px] no-underline transition-colors hover:border-[#5e50b8]" href="{{ $adjacent['previous']['route'] }}">
        <span class="font-mono text-[.68rem] uppercase tracking-[.18em] text-[#a49cba]">← Previous dispatch</span>
        <div class="font-playfair mt-1.5 text-[1.1rem] font-medium text-[#8d7bf5]">{{ $adjacent['previous']['title'] }}</div>
      </a>
    @else
      <div class="rounded-xl border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-[22px] py-[18px]">
        <span class="font-mono text-[.68rem] uppercase tracking-[.18em] text-[#a49cba]">← Previous dispatch</span>
        <div class="font-playfair mt-1.5 text-[1.1rem] font-medium text-[#6f6786]">The very first one</div>
      </div>
    @endif

    @if ($adjacent['next'])
      <a class="rounded-xl border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-[22px] py-[18px] text-left no-underline transition-colors hover:border-[#5e50b8] sm:text-right" href="{{ $adjacent['next']['route'] }}">
        <span class="font-mono text-[.68rem] uppercase tracking-[.18em] text-[#a49cba]">Next dispatch →</span>
        <div class="font-playfair mt-1.5 text-[1.1rem] font-medium text-[#8d7bf5]">{{ $adjacent['next']['title'] }}</div>
      </a>
    @else
      <div class="rounded-xl border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-[22px] py-[18px] text-left sm:text-right">
        <span class="font-mono text-[.68rem] uppercase tracking-[.18em] text-[#a49cba]">Next dispatch →</span>
        <div class="font-playfair mt-1.5 text-[1.1rem] font-medium text-[#6f6786]">Coming soon</div>
      </div>
    @endif
  </nav>
</main>

<div class="mt-20">
  <x-footer />
</div>

</body>
</html>
