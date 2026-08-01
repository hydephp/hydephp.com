@php
    $docsIndex      = \Hyde\Foundation\Facades\Routes::get('docs/index');
    $docsQuickstart = \Hyde\Foundation\Facades\Routes::get('docs/' . config('docs.default_version') . '/quickstart');
@endphp
<!DOCTYPE html>
<html lang="en" class="scroll-smooth motion-reduce:scroll-auto">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HydePHP · Markdown with a second nature</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,opsz,wght@0,5..1200,400..900;1,5..1200,400..900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=JetBrains+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#14111c] text-[#e9e5f2] [font-family:'Instrument_Sans',system-ui,sans-serif] text-[17px] leading-[1.6] antialiased selection:bg-[#8d7bf5] selection:text-[#14111c]">

  <x-navigation />

  <header class="mx-auto max-w-[1160px] px-7 pb-5 pt-[72px] text-center">
    <p class="[font-family:'JetBrains_Mono',monospace] text-[.74rem] uppercase tracking-[.22em] text-[#d6a24a]">Since 2022 · Open source · MIT</p>
    <h1 class="mt-[30px] [font-family:'Playfair_Display',serif] opacity-90 text-[clamp(3rem,7.6vw,5.4rem)] font-bold leading-[.95] tracking-[-.02em]">HydePHP</h1>
    <p class="mt-[18px] [font-family:'Playfair_Display',serif] text-[clamp(1.6rem,3.6vw,2.6rem)] font-[400] leading-[1.1] tracking-[-.01em] text-[#cfc8e0]">The static site generator for PHP.</p>
    <div class="mx-auto mt-[38px] flex max-w-[900px] items-center gap-7 max-[720px]:gap-4">
      <span class="h-px flex-1 bg-[rgba(164,156,186,.3)]" aria-hidden="true"></span>
      <p class="[font-family:'Playfair_Display',serif] text-[clamp(1rem,2.2vw,1.4rem)] italic leading-[1.3] text-[#8d7bf5]">The power of Laravel. The simplicity of Markdown.</p>
      <span class="h-px flex-1 bg-[rgba(164,156,186,.3)]" aria-hidden="true"></span>
    </div>
    <p class="mx-auto mt-[36px] max-w-[62ch] text-[1.08rem] text-[#a49cba]">A PHP static site generator built on Laravel. Markdown and Blade go in, a folder of fast static HTML comes out — no database, no server, nothing to keep alive.</p>
    <div class="mt-[44px] flex flex-wrap items-center justify-center gap-6">
      <div class="flex items-center gap-3.5 rounded-[10px] border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-[18px] py-3 [font-family:'JetBrains_Mono',monospace] text-[.9rem] text-[#d8d2e8]">
        <span><span class="text-[#d6a24a]">$</span> composer create-project hyde/hyde</span>
        <button class="border-l border-[rgba(164,156,186,.16)] pl-3.5 text-[.78rem] text-[#a49cba] transition-colors hover:text-white focus-visible:rounded focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8d7bf5]" id="copyCmd" aria-label="Copy install command">copy</button>
      </div>
      <a class="text-[.95rem] font-medium text-[#e9e5f2] underline decoration-[rgba(164,156,186,.55)] decoration-1 underline-offset-[6px] transition-colors hover:text-white hover:decoration-[#d6a24a] focus-visible:rounded focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-[#8d7bf5]" href="{{ $docsIndex }}">Read the documentation</a>
    </div>
  </header>

  <div class="mx-auto max-w-[1160px] px-7 pt-[54px]">
    <p class="mb-3.5 text-center [font-family:'JetBrains_Mono',monospace] text-[.75rem] uppercase tracking-[.12em] text-[#a49cba]">DRAG THE SEAM <b class="font-normal text-[#d6a24a]">⟷</b> TO BUILD</p>
    <div class="relative h-[560px] touch-none cursor-col-resize overflow-hidden rounded-2xl border border-[rgba(164,156,186,.16)] shadow-[0_40px_90px_-40px_rgba(0,0,0,.7)] max-[720px]:h-[640px]" id="stage" aria-label="Interactive demo: drag to reveal the built site behind the Markdown source">
      <div class="absolute inset-0 overflow-hidden text-[#eae6f4]" style="background: radial-gradient(900px 480px at 78% -10%, rgba(141,123,245,.16), transparent 60%), radial-gradient(700px 420px at 95% 100%, rgba(214,162,74,.08), transparent 60%), #1c1827;" aria-hidden="true">
        <div class="flex items-center gap-[18px] border-b border-[rgba(164,156,186,.16)] px-[26px] py-4 text-[.82rem] text-[#a49cba]">
          <span class="h-2 w-2 shrink-0 rounded-full bg-[#d6a24a]"></span>
          <span class="[font-family:'Playfair_Display',serif] opacity-90 text-[.95rem] text-white">A Study in Static</span>
          <span class="ml-auto flex gap-4 [font-family:'JetBrains_Mono',monospace] max-[720px]:hidden">Home · Essays · About</span>
        </div>
        <article class="max-w-[640px] px-[54px] py-11 max-[720px]:px-[26px] max-[720px]:py-8">
          <p class="mt-5 [font-family:'JetBrains_Mono',monospace] text-[.7rem] uppercase tracking-[.18em] text-[#d6a24a]">Essays</p>
          <h2 class="mb-1.5 mt-3.5 [font-family:'Playfair_Display',serif] opacity-90 text-[2.5rem] font-[450] leading-[1.08] tracking-[-.01em] max-[720px]:text-[1.9rem]">A Study in Static</h2>
          <p id="post-date" class="mt-5 text-[.82rem] text-[#a49cba]"></p><script>document.getElementById("post-date").textContent=new Date().toLocaleDateString("en-US",{month:"long",day:"numeric",year:"numeric"})+" · 2 min read";</script>
          <p class="mt-5 text-[#cfc8e0]">Every site has two natures. The one you write, and the one you ship. Hyde keeps them in the same file.</p>
          <h3 class="mt-7 [font-family:'Playfair_Display',serif] opacity-90 text-[1.3rem] font-medium text-[#8d7bf5]">The experiment</h3>
          <ul class="ml-0.5 mt-3.5 list-none">
            <li class="relative py-[7px] pl-[26px] text-[#cfc8e0] before:absolute before:left-0.5 before:top-[15px] before:h-0.5 before:w-2.5 before:bg-[#d6a24a] before:content-['']">One Markdown file</li>
            <li class="relative py-[7px] pl-[26px] text-[#cfc8e0] before:absolute before:left-0.5 before:top-[15px] before:h-0.5 before:w-2.5 before:bg-[#d6a24a] before:content-['']">One build command</li>
            <li class="relative py-[7px] pl-[26px] text-[#cfc8e0] before:absolute before:left-0.5 before:top-[15px] before:h-0.5 before:w-2.5 before:bg-[#d6a24a] before:content-['']">Zero servers to keep alive</li>
          </ul>
        </article>
      </div>

      <div class="absolute inset-0 overflow-hidden bg-[#ece7da] text-[#2b2433]" id="jekyll" style="clip-path: inset(0 42% 0 0);" aria-hidden="true">
        <div class="flex items-center gap-2.5 border-b border-[rgba(43,36,51,.14)] px-5 py-3 [font-family:'JetBrains_Mono',monospace] text-[.76rem] text-[#6d6478]">
          <span class="translate-y-[13px] rounded-t-md border border-b-0 border-[rgba(43,36,51,.14)] bg-[#e3ddcd] px-3.5 py-[5px] text-[#2b2433]">a-study-in-static.md</span>
          <span class="ml-auto">markdown · utf-8</span>
        </div>
        <div class="pt-[34px] [font-family:'JetBrains_Mono',monospace] text-[.86rem] leading-[1.85] max-[720px]:text-[.78rem]">
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">1</span><span class="text-[#8a7f70]">---</span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">2</span><span><span class="text-[#7a5cc4]">title</span><span class="text-[#8a7f70]">: &quot;A Study in Static&quot;</span></span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">3</span><span><span class="text-[#7a5cc4]">date</span><span id="today-date" class="text-[#8a7f70]"></span></span></div><script>document.getElementById("today-date").textContent=": "+new Date().toLocaleDateString("sv-SE");</script>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">4</span><span><span class="text-[#7a5cc4]">category</span><span class="text-[#8a7f70]">: essays</span></span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">5</span><span class="text-[#8a7f70]">---</span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">6</span><span> </span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">7</span><span class="font-bold text-[#2b2433]"># A Study in Static</span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">8</span><span> </span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">9</span><span class="text-[#4c4356]">Every site has two natures. The one you</span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">10</span><span class="text-[#4c4356]">write, and the one you ship. Hyde keeps</span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">11</span><span class="text-[#4c4356]">them in the same file.</span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">12</span><span> </span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">13</span><span class="font-bold text-[#2b2433]">## The experiment</span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">14</span><span> </span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">15</span><span class="text-[#4c4356]">- One Markdown file</span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">16</span><span class="text-[#4c4356]">- One build command</span></div>
          <div class="flex whitespace-pre-wrap pr-5"><span class="w-14 shrink-0 pr-[22px] text-right text-[.76rem] leading-[2.1] text-[#a99f92] max-[720px]:w-10 max-[720px]:pr-3.5">17</span><span class="text-[#4c4356]">- Zero servers to keep alive</span></div>
        </div>
      </div>

      <div class="absolute bottom-0 top-0 z-[5] w-0.5 bg-[linear-gradient(to_bottom,#d6a24a,#8d7bf5,#d6a24a)] shadow-[0_0_24px_rgba(214,162,74,.45)]" id="seam" style="left: 58%;">
        <button class="absolute left-1/2 top-1/2 flex h-[52px] w-[52px] -translate-x-1/2 -translate-y-1/2 cursor-col-resize items-center justify-center rounded-full border-[1.5px] border-[#d6a24a] bg-[#14111c] shadow-[0_6px_24px_rgba(0,0,0,.55)] transition-transform hover:scale-110 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[3px] focus-visible:outline-[#8d7bf5]" id="handle" aria-label="Reveal slider. Use arrow keys to move between the Markdown source and the built site." role="slider" aria-valuemin="0" aria-valuemax="100" aria-valuenow="58">
          <svg class="block" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
            <path d="M7 4 L3 10 L7 16" stroke="#d6a24a" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M13 4 L17 10 L13 16" stroke="#8d7bf5" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <section class="reveal mx-auto max-w-[1160px] px-7 py-[110px] opacity-0 translate-y-[14px] transition-all duration-[600ms] ease-out motion-reduce:translate-y-0 motion-reduce:opacity-100 motion-reduce:transition-none max-[720px]:py-20">
    <div class="max-w-[640px]">
      <p class="[font-family:'JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">The transformation</p>
      <h2 class="mt-3.5 [font-family:'Playfair_Display',serif] opacity-90 text-[clamp(1.9rem,3.6vw,2.8rem)] font-[430] leading-[1.12] tracking-[-.01em]">Write. Build. Vanish from the server bill.</h2>
      <p class="mt-4 max-w-[56ch] text-[#a49cba]">The whole workflow is three moves. What comes out is plain HTML you can host anywhere, from a five-dollar VPS to a free static host.</p>
    </div>
    <div class="mt-[54px] grid grid-cols-3 gap-px overflow-hidden rounded-[14px] border border-[rgba(164,156,186,.16)] bg-[rgba(164,156,186,.16)] max-[960px]:grid-cols-1">
      <div class="bg-[#1c1827] px-7 py-8">
        <h3 class="[font-family:'Playfair_Display',serif] opacity-90 text-xl font-medium">Write</h3>
        <p class="mt-2 min-h-[66px] text-[.92rem] text-[#a49cba] max-[960px]:min-h-0">Markdown for content, Blade when you want full control. Front matter handles the metadata.</p>
        <pre class="mt-[18px] overflow-x-auto rounded-lg border border-[rgba(164,156,186,.16)] bg-[#14111c] p-4 [font-family:'JetBrains_Mono',monospace] text-[.78rem] leading-[1.7] text-[#d8d2e8]"><span class="text-[#6f6786]">// or plain .md, your call</span>
php hyde <span class="text-[#8d7bf5]">make:post</span> <span class="text-[#d6a24a]">&quot;A Study in Static&quot;</span></pre>
      </div>
      <div class="bg-[#1c1827] px-7 py-8">
        <h3 class="[font-family:'Playfair_Display',serif] opacity-90 text-xl font-medium">Build</h3>
        <p class="mt-2 min-h-[66px] text-[.92rem] text-[#a49cba] max-[960px]:min-h-0">One command compiles everything: pages, posts, docs, navigation, RSS, sitemap.</p>
        <pre class="mt-[18px] overflow-x-auto rounded-lg border border-[rgba(164,156,186,.16)] bg-[#14111c] p-4 [font-family:'JetBrains_Mono',monospace] text-[.78rem] leading-[1.7] text-[#d8d2e8]">$ php hyde <span class="text-[#8d7bf5]">build</span>
<span class="text-[#8fce8f]">✓ 80 files compiled in 756 ms</span></pre>
      </div>
      <div class="bg-[#1c1827] px-7 py-8">
        <h3 class="[font-family:'Playfair_Display',serif] opacity-90 text-xl font-medium">Ship</h3>
        <p class="mt-2 min-h-[66px] text-[.92rem] text-[#a49cba] max-[960px]:min-h-0">The output is a folder of static files. No PHP on the server, nothing to patch at 2 am.</p>
        <pre class="mt-[18px] overflow-x-auto rounded-lg border border-[rgba(164,156,186,.16)] bg-[#14111c] p-4 [font-family:'JetBrains_Mono',monospace] text-[.78rem] leading-[1.7] text-[#d8d2e8]">_site/
├── index.html
├── posts/
└── <span class="text-[#d6a24a]">feed.xml</span></pre>
      </div>
    </div>
  </section>

  <section class="reveal mx-auto max-w-[1160px] px-7 py-[110px] opacity-0 translate-y-[14px] transition-all duration-[600ms] ease-out motion-reduce:translate-y-0 motion-reduce:opacity-100 motion-reduce:transition-none max-[720px]:py-20">
    <div class="max-w-[640px]">
      <p class="[font-family:'JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">What's in the box</p>
      <h2 class="mt-3.5 [font-family:'Playfair_Display',serif] opacity-90 text-[clamp(1.9rem,3.6vw,2.8rem)] font-[430] leading-[1.12] tracking-[-.01em]">Familiar to Artisans. Gentle to everyone else.</h2>
      <p class="mt-4 max-w-[56ch] text-[#a49cba]">Hyde is built on Laravel Zero. If you know Artisan and Blade you already know Hyde, and if you don't, Markdown is all you need to get a site out the door.</p>
    </div>
    <div class="mt-[54px] border-t border-[rgba(164,156,186,.16)]">
      <div class="grid grid-cols-[280px_1fr_340px] items-start gap-10 border-b border-[rgba(164,156,186,.16)] py-9 max-[960px]:grid-cols-1 max-[960px]:gap-3.5">
        <h3 class="[font-family:'Playfair_Display',serif] opacity-90 text-[1.35rem] font-[480]">Two dialects, one site</h3>
        <p class="text-[.95rem] text-[#a49cba]">Mix Markdown pages and Blade views freely in the same project. Sprinkle in YAML front matter when a page needs metadata, skip it when it doesn't.</p>
        <pre class="overflow-x-auto rounded-lg border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-4 py-3.5 [font-family:'JetBrains_Mono',monospace] text-[.78rem] leading-[1.7] text-[#d8d2e8]"><span class="text-[#6f6786]">---</span>
<span class="text-[#8d7bf5]">navigation</span>:
  <span class="text-[#8d7bf5]">priority</span>: <span class="text-[#d6a24a]">1</span>
<span class="text-[#6f6786]">---</span></pre>
      </div>
      <div class="grid grid-cols-[280px_1fr_340px] items-start gap-10 border-b border-[rgba(164,156,186,.16)] py-9 max-[960px]:grid-cols-1 max-[960px]:gap-3.5">
        <h3 class="[font-family:'Playfair_Display',serif] opacity-90 text-[1.35rem] font-[480]">A frontend you don't have to build</h3>
        <p class="text-[.95rem] text-[#a49cba]">Ships with a full Tailwind frontend, responsive navigation, dark mode, and customizable Blade components. Publish the templates when you want to make it yours.</p>
        <pre class="overflow-x-auto rounded-lg border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-4 py-3.5 [font-family:'JetBrains_Mono',monospace] text-[.78rem] leading-[1.7] text-[#d8d2e8]">php hyde <span class="text-[#8d7bf5]">publish</span> <span class="text-[#d6a24a]">views</span></pre>
      </div>
      <div class="grid grid-cols-[280px_1fr_340px] items-start gap-10 border-b border-[rgba(164,156,186,.16)] py-9 max-[960px]:grid-cols-1 max-[960px]:gap-3.5">
        <h3 class="[font-family:'Playfair_Display',serif] opacity-90 text-[1.35rem] font-[480]">Documentation sites in minutes</h3>
        <p class="text-[.95rem] text-[#a49cba]">Drop Markdown files in a folder and get a searchable docs site with a generated sidebar. This very concept page's real-world sibling documents Hyde itself.</p>
        <pre class="overflow-x-auto rounded-lg border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-4 py-3.5 [font-family:'JetBrains_Mono',monospace] text-[.78rem] leading-[1.7] text-[#d8d2e8]">_docs/
├── index.md
└── getting-started.md</pre>
      </div>
      <div class="grid grid-cols-[280px_1fr_340px] items-start gap-10 border-b border-[rgba(164,156,186,.16)] py-9 max-[960px]:grid-cols-1 max-[960px]:gap-3.5">
        <h3 class="[font-family:'Playfair_Display',serif] opacity-90 text-[1.35rem] font-[480]">Everything is versionable</h3>
        <p class="text-[.95rem] text-[#a49cba]">No database means your whole site lives in Git. Content, config, and templates travel together, and every deploy is reproducible from a single commit.</p>
        <pre class="overflow-x-auto rounded-lg border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-4 py-3.5 [font-family:'JetBrains_Mono',monospace] text-[.78rem] leading-[1.7] text-[#d8d2e8]">git push <span class="text-[#6f6786]"># that's the deploy</span></pre>
      </div>
    </div>
  </section>

  <section class="reveal mx-auto max-w-[1160px] px-7 pb-[110px] pt-0 opacity-0 translate-y-[14px] transition-all duration-[600ms] ease-out motion-reduce:translate-y-0 motion-reduce:opacity-100 motion-reduce:transition-none max-[720px]:pb-20">
    <div class="flex flex-wrap justify-between gap-6 rounded-[14px] border border-[rgba(164,156,186,.16)] px-10 py-[30px] [font-family:'JetBrains_Mono',monospace] max-[720px]:p-6" style="background: linear-gradient(180deg, #1c1827, #14111c);">
      <div><div class="[font-family:'Playfair_Display',serif] opacity-90 text-[2.1rem] font-[420]">203<i class="text-[1.2rem] italic text-[#d6a24a]">k</i></div><div class="mt-0.5 [font-family:'JetBrains_Mono',monospace] text-[.7rem] uppercase tracking-[.16em] text-[#a49cba]">GitHub clones</div></div>
      <div><div class="[font-family:'Playfair_Display',serif] opacity-90 text-[2.1rem] font-[420]">28<i class="text-[1.2rem] italic text-[#d6a24a]">k</i></div><div class="mt-0.5 [font-family:'JetBrains_Mono',monospace] text-[.7rem] uppercase tracking-[.16em] text-[#a49cba]">Packagist installs</div></div>
      <div><div class="[font-family:'Playfair_Display',serif] opacity-90 text-[2.1rem] font-[420]">449</div><div class="mt-0.5 [font-family:'JetBrains_Mono',monospace] text-[.7rem] uppercase tracking-[.16em] text-[#a49cba]">GitHub stars</div></div>
      <div><div class="[font-family:'Playfair_Display',serif] opacity-90 text-[2.1rem] font-[420]">MIT</div><div class="mt-0.5 [font-family:'JetBrains_Mono',monospace] text-[.7rem] uppercase tracking-[.16em] text-[#a49cba]">Licensed, forever</div></div>
    </div>
  </section>

  <section class="reveal mx-auto max-w-[1160px] px-7 py-[110px] opacity-0 translate-y-[14px] transition-all duration-[600ms] ease-out motion-reduce:translate-y-0 motion-reduce:opacity-100 motion-reduce:transition-none max-[720px]:py-20">
    <figure class="mx-auto max-w-[820px] text-center">
      <blockquote class="[font-family:'Playfair_Display',serif] opacity-90 text-[clamp(1.5rem,3vw,2.1rem)] italic leading-[1.35]">&quot;I'm not a PHP developer and I can barely write a function in this language, but the project actually delivers on what it promises. Docs: <b class="font-medium text-[#d6a24a]">10/10</b>. Project: <b class="font-medium text-[#d6a24a]">10/10</b>.&quot;</blockquote>
      <figcaption class="mt-6 text-[.9rem] text-[#a49cba]"><a class="text-[#8d7bf5] no-underline" href="#">@peteralexbizjak</a> on X</figcaption>
    </figure>
  </section>

  <section class="border-t border-[rgba(164,156,186,.16)] py-[110px] text-center max-[720px]:py-20" style="background: radial-gradient(600px 300px at 50% 0%, rgba(141,123,245,.14), transparent 70%);">
    <div class="reveal mx-auto max-w-[1160px] px-7 opacity-0 translate-y-[14px] transition-all duration-[600ms] ease-out motion-reduce:translate-y-0 motion-reduce:opacity-100 motion-reduce:transition-none">
      <p class="[font-family:'JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">Begin the experiment</p>
      <h2 class="mx-auto mt-3.5 max-w-[20ch] [font-family:'Playfair_Display',serif] opacity-90 text-[clamp(1.9rem,3.6vw,2.8rem)] font-[430] leading-[1.12] tracking-[-.01em]">Your next site is one command away.</h2>
      <div class="mt-[34px] flex flex-wrap items-center justify-center gap-3.5">
        <div class="flex items-center gap-3.5 rounded-[10px] border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-[18px] py-3 [font-family:'JetBrains_Mono',monospace] text-[.9rem] text-[#d8d2e8]">
          <span><span class="text-[#d6a24a]">$</span> composer create-project hyde/hyde</span>
          <button class="border-l border-[rgba(164,156,186,.16)] pl-3.5 text-[.78rem] text-[#a49cba] transition-colors hover:text-white focus-visible:rounded focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8d7bf5]" id="copyCmd2" aria-label="Copy install command">copy</button>
        </div>
        <a class="flex items-center rounded-[10px] border border-[rgba(164,156,186,.16)] px-[22px] py-3 text-[.9rem] font-medium text-[#e9e5f2] no-underline transition-colors hover:border-[#a49cba] hover:bg-white/5" href="{{ $docsQuickstart }}">Quickstart guide</a>
      </div>
    </div>
  </section>

  <x-footer />

  <script>
    (function(){
      const stage = document.getElementById('stage');
      const jekyll = document.getElementById('jekyll');
      const seam = document.getElementById('seam');
      const handle = document.getElementById('handle');
      const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

      let pct = 58;

      function apply(p){
        pct = Math.max(4, Math.min(96, p));
        jekyll.style.clipPath = 'inset(0 ' + (100 - pct) + '% 0 0)';
        seam.style.left = pct + '%';
        handle.setAttribute('aria-valuenow', Math.round(pct));
      }

      if (reduced) {
        apply(58);
      } else {
        apply(96);
        let target = 58, cur = 96;
        requestAnimationFrame(function tick(){
          cur += (target - cur) * 0.045;
          apply(cur);
          if (Math.abs(cur - target) > 0.4) requestAnimationFrame(tick);
          else apply(target);
        });
      }

      let dragging = false;
      function toPct(clientX){
        const r = stage.getBoundingClientRect();
        return ((clientX - r.left) / r.width) * 100;
      }
      stage.addEventListener('pointerdown', function(e){
        dragging = true;
        stage.setPointerCapture(e.pointerId);
        apply(toPct(e.clientX));
      });
      stage.addEventListener('pointermove', function(e){
        if (dragging) apply(toPct(e.clientX));
      });
      stage.addEventListener('pointerup', function(){ dragging = false; });
      stage.addEventListener('pointercancel', function(){ dragging = false; });

      handle.addEventListener('keydown', function(e){
        if (e.key === 'ArrowLeft')  { apply(pct - 3); e.preventDefault(); }
        if (e.key === 'ArrowRight') { apply(pct + 3); e.preventDefault(); }
        if (e.key === 'Home') { apply(4); e.preventDefault(); }
        if (e.key === 'End')  { apply(96); e.preventDefault(); }
      });

      [['copyCmd'],['copyCmd2']].forEach(function(pair){
        const btn = document.getElementById(pair[0]);
        if (!btn) return;
        btn.addEventListener('click', function(){
          navigator.clipboard.writeText('composer create-project hyde/hyde').then(function(){
            btn.textContent = 'copied';
            setTimeout(function(){ btn.textContent = 'copy'; }, 1600);
          });
        });
      });

      const io = new IntersectionObserver(function(entries){
        entries.forEach(function(en){
          if (en.isIntersecting) {
            en.target.classList.remove('opacity-0', 'translate-y-[14px]');
            io.unobserve(en.target);
          }
        });
      }, { threshold: 0.12 });
      document.querySelectorAll('.reveal').forEach(function(el){ io.observe(el); });
    })();
  </script>
</body>
</html>