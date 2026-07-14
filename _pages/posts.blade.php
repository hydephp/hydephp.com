<!DOCTYPE html>
<html lang="en" class="scroll-smooth motion-reduce:scroll-auto">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blog · HydePHP</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght,SOFT,WONK@0,9..144,300..900,0..100,0..1;1,9..144,300..900,0..100,0..1&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=JetBrains+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>
::selection{background:#8d7bf5;color:#14111c}
</style>
</head>
<body class="bg-[#14111c] text-[#e9e5f2] antialiased font-['Instrument_Sans'] text-[17px] leading-[1.65]">

<x-navigation />

<header class="mx-auto max-w-[1000px] px-7 pt-[76px] text-center">
  <p class="font-['JetBrains_Mono'] text-[.72rem] uppercase tracking-[.26em] text-[#d6a24a]">The HydePHP Blog</p>
  <h1 class="mt-4 font-[Fraunces] text-[clamp(2.8rem,6.5vw,4.6rem)] font-[420] leading-none tracking-[-.015em] [font-variation-settings:'opsz'_144,'SOFT'_40,'WONK'_1]">
    Notes &amp; Dispatches
  </h1>
  <div class="mx-auto mt-7 flex max-w-[520px] items-center gap-4 text-[#a49cba]">
    <span aria-hidden="true" class="h-px flex-1 bg-gradient-to-r from-transparent via-[rgba(164,156,186,.16)] to-transparent"></span>
    <span class="font-['JetBrains_Mono'] text-[.72rem] tracking-[.16em]">Est. 2022 · 47 entries · <a href="#" class="text-[#d6a24a] no-underline hover:underline">Subscribe by RSS</a></span>
    <span aria-hidden="true" class="h-px flex-1 bg-gradient-to-r from-transparent via-[rgba(164,156,186,.16)] to-transparent"></span>
  </div>
</header>

<div class="mx-auto flex max-w-[1000px] flex-wrap justify-center gap-2.5 px-7 pt-9" role="group" aria-label="Filter posts by category">
  <button class="filter-pill rounded-full border px-4 py-1.5 font-['JetBrains_Mono'] text-[.74rem] tracking-[.1em] transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8d7bf5] border-[#d6a24a] bg-[#d6a24a] text-[#14111c]" aria-pressed="true">All</button>
  <button class="filter-pill rounded-full border border-[rgba(164,156,186,.16)] px-4 py-1.5 font-['JetBrains_Mono'] text-[.74rem] tracking-[.1em] text-[#a49cba] transition-colors hover:border-[#a49cba] hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8d7bf5]" aria-pressed="false">Releases</button>
  <button class="filter-pill rounded-full border border-[rgba(164,156,186,.16)] px-4 py-1.5 font-['JetBrains_Mono'] text-[.74rem] tracking-[.1em] text-[#a49cba] transition-colors hover:border-[#a49cba] hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8d7bf5]" aria-pressed="false">Devlog</button>
  <button class="filter-pill rounded-full border border-[rgba(164,156,186,.16)] px-4 py-1.5 font-['JetBrains_Mono'] text-[.74rem] tracking-[.1em] text-[#a49cba] transition-colors hover:border-[#a49cba] hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8d7bf5]" aria-pressed="false">Tutorials</button>
  <button class="filter-pill rounded-full border border-[rgba(164,156,186,.16)] px-4 py-1.5 font-['JetBrains_Mono'] text-[.74rem] tracking-[.1em] text-[#a49cba] transition-colors hover:border-[#a49cba] hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8d7bf5]" aria-pressed="false">Essays</button>
</div>

<!-- Featured -->
<div class="reveal mx-auto max-w-[1000px] px-7 pt-12 opacity-0 translate-y-[14px] transition duration-[600ms] ease-out motion-reduce:translate-y-0 motion-reduce:opacity-100 motion-reduce:transition-none">
  <a class="relative block overflow-hidden rounded-2xl border border-[rgba(164,156,186,.16)] bg-[#1c1827] p-[52px] no-underline transition-colors hover:border-[#5e50b8] max-[860px]:px-7 max-[860px]:pb-11 max-[860px]:pt-9" style="background: radial-gradient(700px 340px at 85% -20%, rgba(141,123,245,.16), transparent 65%), radial-gradient(500px 300px at 0% 110%, rgba(214,162,74,.08), transparent 60%), #1c1827;" href="#">
    <p class="flex items-center gap-3 font-['JetBrains_Mono'] text-[.68rem] uppercase tracking-[.22em] text-[#d6a24a]">
      Latest dispatch
      <span aria-hidden="true" class="h-px w-11 bg-gradient-to-r from-[#d6a24a] to-transparent"></span>
    </p>
    <h2 class="mt-[18px] max-w-[20ch] font-[Fraunces] text-[clamp(1.8rem,3.8vw,2.7rem)] font-[440] leading-[1.1] tracking-[-.012em] [font-variation-settings:'opsz'_144,'SOFT'_40,'WONK'_1]">Rebuilding the publish command for version three</h2>
    <p class="mt-4 max-w-[58ch] text-[#a49cba]">One command now does the work of three. A look inside the v3 CLI cleanup: why the old publish commands had to go, how the interactive picker works, and what "designing a command surface" actually means in practice.</p>
    <div class="mt-7 flex items-center gap-3.5 text-[.85rem] text-[#a49cba]">
      <span class="flex h-[34px] w-[34px] flex-none items-center justify-center rounded-full font-[Fraunces] text-base font-medium italic text-white [font-variation-settings:'SOFT'_90]" style="background: radial-gradient(circle at 32% 28%, #8d7bf5, #5e50b8);" aria-hidden="true">E</span>
      <span><b class="font-semibold text-[#e9e5f2]">Emma De Silva</b></span>
      <span class="text-[#252031]">·</span>
      <span>July 2, 2026</span>
      <span class="text-[#252031]">·</span>
      <span>8 min read</span>
    </div>
    <span class="absolute bottom-10 right-11 font-['JetBrains_Mono'] text-[.78rem] text-[#d6a24a] max-[860px]:static max-[860px]:mt-6 max-[860px]:inline-block">Read the dispatch →</span>
  </a>
</div>

<!-- The ledger -->
<main class="mx-auto max-w-[1000px] px-7 pb-10 pt-[72px]">

  <div class="reveal grid grid-cols-[170px_1fr] gap-10 px-0 pb-3 pt-11 opacity-0 translate-y-[14px] transition duration-[600ms] ease-out motion-reduce:translate-y-0 motion-reduce:opacity-100 motion-reduce:transition-none max-[860px]:grid-cols-1 max-[860px]:gap-2 max-[860px]:pt-9">
    <div class="sticky top-24 self-start font-[Fraunces] text-[2.6rem] font-[380] italic leading-none text-[#252031] [-webkit-text-stroke:1px_rgba(164,156,186,.35)] [font-variation-settings:'opsz'_144,'SOFT'_80] max-[860px]:static max-[860px]:text-[2rem]">2026</div>
    <div>
      <a class="group relative grid grid-cols-[100px_1fr_auto] items-baseline gap-6 border-b border-[rgba(164,156,186,.16)] py-5 no-underline max-[860px]:grid-cols-1 max-[860px]:gap-1 max-[860px]:py-[18px]" href="#">
        <span aria-hidden="true" class="absolute -left-6 top-[26px] h-0.5 w-2.5 -translate-x-1.5 bg-[#d6a24a] opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100"></span>
        <span class="whitespace-nowrap font-['JetBrains_Mono'] text-[.74rem] tracking-[.06em] text-[#a49cba]">Jun 14</span>
        <span>
          <h3 class="font-[Fraunces] text-[1.28rem] font-[470] leading-[1.25] tracking-[-.005em] transition-colors [font-variation-settings:'opsz'_60,'SOFT'_50] group-hover:text-[#8d7bf5]">Writing design docs for AI agents</h3>
          <p class="mt-[5px] max-w-[56ch] font-['Instrument_Sans'] text-[.92rem] font-normal text-[#a49cba]">Why HydePHP now ships a design philosophy document, and what changed when the newest contributor stopped being human.</p>
        </span>
        <span class="whitespace-nowrap rounded-full border border-[rgba(141,123,245,.4)] px-3 py-[3px] font-['JetBrains_Mono'] text-[.68rem] uppercase tracking-[.12em] text-[#8d7bf5] max-[860px]:mt-1.5 max-[860px]:justify-self-start">Devlog</span>
      </a>
      <a class="group relative grid grid-cols-[100px_1fr_auto] items-baseline gap-6 border-b border-[rgba(164,156,186,.16)] py-5 no-underline max-[860px]:grid-cols-1 max-[860px]:gap-1 max-[860px]:py-[18px]" href="#">
        <span aria-hidden="true" class="absolute -left-6 top-[26px] h-0.5 w-2.5 -translate-x-1.5 bg-[#d6a24a] opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100"></span>
        <span class="whitespace-nowrap font-['JetBrains_Mono'] text-[.74rem] tracking-[.06em] text-[#a49cba]">May 20</span>
        <span>
          <h3 class="font-[Fraunces] text-[1.28rem] font-[470] leading-[1.25] tracking-[-.005em] transition-colors [font-variation-settings:'opsz'_60,'SOFT'_50] group-hover:text-[#8d7bf5]">Saying no to the --config flag</h3>
          <p class="mt-[5px] max-w-[56ch] font-['Instrument_Sans'] text-[.92rem] font-normal text-[#a49cba]">Every rejected feature is a design decision. The case against a generic config override, argued in public.</p>
        </span>
        <span class="whitespace-nowrap rounded-full border border-[rgba(141,123,245,.4)] px-3 py-[3px] font-['JetBrains_Mono'] text-[.68rem] uppercase tracking-[.12em] text-[#8d7bf5] max-[860px]:mt-1.5 max-[860px]:justify-self-start">Devlog</span>
      </a>
      <a class="group relative grid grid-cols-[100px_1fr_auto] items-baseline gap-6 border-b border-[rgba(164,156,186,.16)] py-5 no-underline max-[860px]:grid-cols-1 max-[860px]:gap-1 max-[860px]:py-[18px]" href="#">
        <span aria-hidden="true" class="absolute -left-6 top-[26px] h-0.5 w-2.5 -translate-x-1.5 bg-[#d6a24a] opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100"></span>
        <span class="whitespace-nowrap font-['JetBrains_Mono'] text-[.74rem] tracking-[.06em] text-[#a49cba]">Mar 08</span>
        <span>
          <h3 class="font-[Fraunces] text-[1.28rem] font-[470] leading-[1.25] tracking-[-.005em] transition-colors [font-variation-settings:'opsz'_60,'SOFT'_50] group-hover:text-[#8d7bf5]">Documentation sites in fifteen minutes</h3>
          <p class="mt-[5px] max-w-[56ch] font-['Instrument_Sans'] text-[.92rem] font-normal text-[#a49cba]">From an empty folder to a searchable, sidebar-navigated docs site, one Markdown file at a time.</p>
        </span>
        <span class="whitespace-nowrap rounded-full border border-[rgba(164,156,186,.16)] px-3 py-[3px] font-['JetBrains_Mono'] text-[.68rem] uppercase tracking-[.12em] text-[#a49cba] max-[860px]:mt-1.5 max-[860px]:justify-self-start">Tutorial</span>
      </a>
      <a class="group relative grid grid-cols-[100px_1fr_auto] items-baseline gap-6 py-5 no-underline max-[860px]:grid-cols-1 max-[860px]:gap-1 max-[860px]:py-[18px]" href="#">
        <span aria-hidden="true" class="absolute -left-6 top-[26px] h-0.5 w-2.5 -translate-x-1.5 bg-[#d6a24a] opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100"></span>
        <span class="whitespace-nowrap font-['JetBrains_Mono'] text-[.74rem] tracking-[.06em] text-[#a49cba]">Jan 22</span>
        <span>
          <h3 class="font-[Fraunces] text-[1.28rem] font-[470] leading-[1.25] tracking-[-.005em] transition-colors [font-variation-settings:'opsz'_60,'SOFT'_50] group-hover:text-[#8d7bf5]">HydePHP 2.3: smarter navigation</h3>
          <p class="mt-[5px] max-w-[56ch] font-['Instrument_Sans'] text-[.92rem] font-normal text-[#a49cba]">Automatic menu grouping, per-page priorities, and a handful of quality-of-life fixes from community reports.</p>
        </span>
        <span class="whitespace-nowrap rounded-full border border-[rgba(214,162,74,.4)] px-3 py-[3px] font-['JetBrains_Mono'] text-[.68rem] uppercase tracking-[.12em] text-[#d6a24a] max-[860px]:mt-1.5 max-[860px]:justify-self-start">Release</span>
      </a>
    </div>
  </div>

  <div class="reveal grid grid-cols-[170px_1fr] gap-10 border-t border-[rgba(164,156,186,.16)] px-0 pb-3 pt-11 opacity-0 translate-y-[14px] transition duration-[600ms] ease-out motion-reduce:translate-y-0 motion-reduce:opacity-100 motion-reduce:transition-none max-[860px]:grid-cols-1 max-[860px]:gap-2 max-[860px]:pt-9">
    <div class="sticky top-24 self-start font-[Fraunces] text-[2.6rem] font-[380] italic leading-none text-[#252031] [-webkit-text-stroke:1px_rgba(164,156,186,.35)] [font-variation-settings:'opsz'_144,'SOFT'_80] max-[860px]:static max-[860px]:text-[2rem]">2025</div>
    <div>
      <a class="group relative grid grid-cols-[100px_1fr_auto] items-baseline gap-6 border-b border-[rgba(164,156,186,.16)] py-5 no-underline max-[860px]:grid-cols-1 max-[860px]:gap-1 max-[860px]:py-[18px]" href="#">
        <span aria-hidden="true" class="absolute -left-6 top-[26px] h-0.5 w-2.5 -translate-x-1.5 bg-[#d6a24a] opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100"></span>
        <span class="whitespace-nowrap font-['JetBrains_Mono'] text-[.74rem] tracking-[.06em] text-[#a49cba]">Nov 30</span>
        <span>
          <h3 class="font-[Fraunces] text-[1.28rem] font-[470] leading-[1.25] tracking-[-.005em] transition-colors [font-variation-settings:'opsz'_60,'SOFT'_50] group-hover:text-[#8d7bf5]">How Hyde compiles your site</h3>
          <p class="mt-[5px] max-w-[56ch] font-['Instrument_Sans'] text-[.92rem] font-normal text-[#a49cba]">A guided tour through the build pipeline, from page discovery to the moment your HTML hits the disk.</p>
        </span>
        <span class="whitespace-nowrap rounded-full border border-[rgba(164,156,186,.16)] px-3 py-[3px] font-['JetBrains_Mono'] text-[.68rem] uppercase tracking-[.12em] text-[#a49cba] max-[860px]:mt-1.5 max-[860px]:justify-self-start">Essay</span>
      </a>
      <a class="group relative grid grid-cols-[100px_1fr_auto] items-baseline gap-6 border-b border-[rgba(164,156,186,.16)] py-5 no-underline max-[860px]:grid-cols-1 max-[860px]:gap-1 max-[860px]:py-[18px]" href="#">
        <span aria-hidden="true" class="absolute -left-6 top-[26px] h-0.5 w-2.5 -translate-x-1.5 bg-[#d6a24a] opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100"></span>
        <span class="whitespace-nowrap font-['JetBrains_Mono'] text-[.74rem] tracking-[.06em] text-[#a49cba]">Sep 12</span>
        <span>
          <h3 class="font-[Fraunces] text-[1.28rem] font-[470] leading-[1.25] tracking-[-.005em] transition-colors [font-variation-settings:'opsz'_60,'SOFT'_50] group-hover:text-[#8d7bf5]">Blade components for static sites</h3>
          <p class="mt-[5px] max-w-[56ch] font-['Instrument_Sans'] text-[.92rem] font-normal text-[#a49cba]">You don't need a running app to benefit from components. Patterns for reusable, testable static templates.</p>
        </span>
        <span class="whitespace-nowrap rounded-full border border-[rgba(164,156,186,.16)] px-3 py-[3px] font-['JetBrains_Mono'] text-[.68rem] uppercase tracking-[.12em] text-[#a49cba] max-[860px]:mt-1.5 max-[860px]:justify-self-start">Tutorial</span>
      </a>
      <a class="group relative grid grid-cols-[100px_1fr_auto] items-baseline gap-6 py-5 no-underline max-[860px]:grid-cols-1 max-[860px]:gap-1 max-[860px]:py-[18px]" href="#">
        <span aria-hidden="true" class="absolute -left-6 top-[26px] h-0.5 w-2.5 -translate-x-1.5 bg-[#d6a24a] opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100"></span>
        <span class="whitespace-nowrap font-['JetBrains_Mono'] text-[.74rem] tracking-[.06em] text-[#a49cba]">Apr 03</span>
        <span>
          <h3 class="font-[Fraunces] text-[1.28rem] font-[470] leading-[1.25] tracking-[-.005em] transition-colors [font-variation-settings:'opsz'_60,'SOFT'_50] group-hover:text-[#8d7bf5]">HydePHP 2.0 released</h3>
          <p class="mt-[5px] max-w-[56ch] font-['Instrument_Sans'] text-[.92rem] font-normal text-[#a49cba]">A leaner core, a refreshed frontend, and two hundred thousand downloads of lessons folded back into the architecture.</p>
        </span>
        <span class="whitespace-nowrap rounded-full border border-[rgba(214,162,74,.4)] px-3 py-[3px] font-['JetBrains_Mono'] text-[.68rem] uppercase tracking-[.12em] text-[#d6a24a] max-[860px]:mt-1.5 max-[860px]:justify-self-start">Release</span>
      </a>
    </div>
  </div>

  <div class="reveal grid grid-cols-[170px_1fr] gap-10 border-t border-[rgba(164,156,186,.16)] px-0 pb-3 pt-11 opacity-0 translate-y-[14px] transition duration-[600ms] ease-out motion-reduce:translate-y-0 motion-reduce:opacity-100 motion-reduce:transition-none max-[860px]:grid-cols-1 max-[860px]:gap-2 max-[860px]:pt-9">
    <div class="sticky top-24 self-start font-[Fraunces] text-[2.6rem] font-[380] italic leading-none text-[#252031] [-webkit-text-stroke:1px_rgba(164,156,186,.35)] [font-variation-settings:'opsz'_144,'SOFT'_80] max-[860px]:static max-[860px]:text-[2rem]">2024</div>
    <div>
      <a class="group relative grid grid-cols-[100px_1fr_auto] items-baseline gap-6 border-b border-[rgba(164,156,186,.16)] py-5 no-underline max-[860px]:grid-cols-1 max-[860px]:gap-1 max-[860px]:py-[18px]" href="#">
        <span aria-hidden="true" class="absolute -left-6 top-[26px] h-0.5 w-2.5 -translate-x-1.5 bg-[#d6a24a] opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100"></span>
        <span class="whitespace-nowrap font-['JetBrains_Mono'] text-[.74rem] tracking-[.06em] text-[#a49cba]">Oct 17</span>
        <span>
          <h3 class="font-[Fraunces] text-[1.28rem] font-[470] leading-[1.25] tracking-[-.005em] transition-colors [font-variation-settings:'opsz'_60,'SOFT'_50] group-hover:text-[#8d7bf5]">Why your blog doesn't need a database</h3>
          <p class="mt-[5px] max-w-[56ch] font-['Instrument_Sans'] text-[.92rem] font-normal text-[#a49cba]">The quiet case for static publishing: cheaper hosting, zero patching, and content that survives every framework you'll ever leave.</p>
        </span>
        <span class="whitespace-nowrap rounded-full border border-[rgba(164,156,186,.16)] px-3 py-[3px] font-['JetBrains_Mono'] text-[.68rem] uppercase tracking-[.12em] text-[#a49cba] max-[860px]:mt-1.5 max-[860px]:justify-self-start">Essay</span>
      </a>
      <a class="group relative grid grid-cols-[100px_1fr_auto] items-baseline gap-6 py-5 no-underline max-[860px]:grid-cols-1 max-[860px]:gap-1 max-[860px]:py-[18px]" href="#">
        <span aria-hidden="true" class="absolute -left-6 top-[26px] h-0.5 w-2.5 -translate-x-1.5 bg-[#d6a24a] opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100"></span>
        <span class="whitespace-nowrap font-['JetBrains_Mono'] text-[.74rem] tracking-[.06em] text-[#a49cba]">Jun 05</span>
        <span>
          <h3 class="font-[Fraunces] text-[1.28rem] font-[470] leading-[1.25] tracking-[-.005em] transition-colors [font-variation-settings:'opsz'_60,'SOFT'_50] group-hover:text-[#8d7bf5]">Deploying Hyde sites anywhere</h3>
          <p class="mt-[5px] max-w-[56ch] font-['Instrument_Sans'] text-[.92rem] font-normal text-[#a49cba]">GitHub Pages, Netlify, a five-dollar VPS, or a Raspberry Pi in your closet. If it serves files, it serves Hyde.</p>
        </span>
        <span class="whitespace-nowrap rounded-full border border-[rgba(164,156,186,.16)] px-3 py-[3px] font-['JetBrains_Mono'] text-[.68rem] uppercase tracking-[.12em] text-[#a49cba] max-[860px]:mt-1.5 max-[860px]:justify-self-start">Tutorial</span>
      </a>
    </div>
  </div>

  <div class="reveal flex flex-wrap items-center justify-between gap-5 pt-5 opacity-0 translate-y-[14px] transition duration-[600ms] ease-out motion-reduce:translate-y-0 motion-reduce:opacity-100 motion-reduce:transition-none">
    <a class="rounded-full border border-[rgba(164,156,186,.16)] px-5 py-[9px] font-['JetBrains_Mono'] text-[.8rem] text-[#a49cba] no-underline transition-colors hover:border-[#a49cba] hover:text-white" href="#">Older dispatches →</a>
    <p class="font-[Fraunces] text-[.88rem] italic text-[#a49cba] [font-variation-settings:'SOFT'_80]">No newsletter popup here. <a href="#" class="not-italic text-[#d6a24a] no-underline hover:underline">Subscribe by RSS</a>, like nature intended.</p>
  </div>
</main>

<x-footer />

<script>
(function(){
  const active = ['border-[#d6a24a]', 'bg-[#d6a24a]', 'text-[#14111c]'];
  const inactive = ['border-[rgba(164,156,186,.16)]', 'text-[#a49cba]', 'hover:border-[#a49cba]', 'hover:text-white'];
  const pills = document.querySelectorAll('.filter-pill');

  pills.forEach(function(pill){
    pill.addEventListener('click', function(){
      pills.forEach(function(other){
        other.classList.remove(...active);
        other.classList.add(...inactive);
        other.setAttribute('aria-pressed', 'false');
      });
      pill.classList.remove(...inactive);
      pill.classList.add(...active);
      pill.setAttribute('aria-pressed', 'true');
    });
  });

  const io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (!entry.isIntersecting) return;
      entry.target.classList.remove('opacity-0', 'translate-y-[14px]');
      entry.target.classList.add('opacity-100', 'translate-y-0');
      io.unobserve(entry.target);
    });
  }, { threshold: 0.08 });

  document.querySelectorAll('.reveal').forEach(function(el){ io.observe(el); });
})();
</script>
</body>
</html>