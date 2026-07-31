<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>The Exhibition · HydePHP Demos</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital,wght@0,400;1,400&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=JetBrains+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>
@keyframes slide{from{transform:translateX(0)}to{transform:translateX(-50%)}}
@media (prefers-reduced-motion:reduce){
  html{scroll-behavior:auto}
  .ribbon-track{animation:none!important}
  .motion-frame{transform:none!important}
}
</style>
</head>
<body class="bg-[#14111c] text-[#e9e5f2] [font-family:'Instrument_Sans',system-ui,sans-serif] text-[17px] leading-[1.65] antialiased selection:bg-[#8d7bf5] selection:text-[#14111c]">

<x-navigation />

<header class="mx-auto max-w-[1160px] px-7 pb-[30px] pt-[88px]">
  <p class="[font-family:'JetBrains_Mono',monospace] text-[.74rem] uppercase tracking-[.24em] text-[#d6a24a]">Live demos · The Exhibition</p>
  <h1 class="mt-[18px] max-w-[16ch] [font-family:'Instrument_Serif',serif] text-[clamp(2.6rem,6vw,4.6rem)] font-[410] leading-[1.2] tracking-[-.016em]">
    Hyde has as many natures as you need.
  </h1>
  <p class="mt-[18px] max-w-[52ch] text-[1.06rem] text-[#a49cba]">Every site below is HydePHP: same generator, same Markdown, same build command. None of them look like it, and none of them look like each other. Each exhibit takes over this page as you reach it.</p>
</header>

<div class="mx-auto max-w-[1160px] px-7 pb-[110px] pt-11">
  <p class="border-b border-[rgba(164,156,186,.16)] pb-3.5 [font-family:'JetBrains_Mono',monospace] text-[.7rem] uppercase tracking-[.24em] text-[#a49cba]">Programme · Three exhibits · All built with Hyde, all open source</p>
  <a href="#nordlys" class="group flex items-baseline gap-7 border-b border-[rgba(164,156,186,.16)] py-[26px] no-underline transition-[padding-left] duration-300 ease-[ease] hover:pl-5 max-[640px]:gap-4 max-[640px]:py-5">
    <span class="w-11 flex-none [font-family:'Instrument_Serif',serif] text-[1.3rem] italic text-[#a49cba] transition-colors group-hover:text-[#e8501e] max-[640px]:w-[30px]">i.</span>
    <span class="[font-family:'Instrument_Serif',serif] text-[clamp(2rem,5.4vw,4rem)] font-normal leading-none tracking-[-.015em] transition-colors group-hover:text-[#e8501e]">Nordlys Air</span>
    <span class="ml-auto max-w-[24ch] text-right text-[.9rem] text-[#a49cba] transition-colors max-[860px]:hidden">An airline above the Arctic Circle</span>
  </a>
  <a href="#lemonade" class="group flex items-baseline gap-7 border-b border-[rgba(164,156,186,.16)] py-[26px] no-underline transition-[padding-left] duration-300 ease-[ease] hover:pl-5 max-[640px]:gap-4 max-[640px]:py-5">
    <span class="w-11 flex-none [font-family:'Instrument_Serif',serif] text-[1.3rem] italic text-[#a49cba] transition-colors group-hover:text-[#f2cf3a] max-[640px]:w-[30px]">ii.</span>
    <span class="[font-family:'Instrument_Serif',serif] text-[clamp(2rem,5.4vw,4rem)] font-normal leading-none tracking-[-.015em] transition-colors group-hover:text-[#f2cf3a]">Lemonade Days</span>
    <span class="ml-auto max-w-[24ch] text-right text-[.9rem] text-[#a49cba] transition-colors max-[860px]:hidden">An endless Los Angeles summer</span>
  </a>
  <a href="#alpine" class="group flex items-baseline gap-7 border-b border-[rgba(164,156,186,.16)] py-[26px] no-underline transition-[padding-left] duration-300 ease-[ease] hover:pl-5 max-[640px]:gap-4 max-[640px]:py-5">
    <span class="w-11 flex-none [font-family:'Instrument_Serif',serif] text-[1.3rem] italic text-[#a49cba] transition-colors group-hover:text-[#7fb08c] max-[640px]:w-[30px]">iii.</span>
    <span class="[font-family:'Instrument_Serif',serif] text-[clamp(2rem,5.4vw,4rem)] font-normal leading-none tracking-[-.015em] transition-colors group-hover:text-[#7fb08c]">Alpine Scouts</span>
    <span class="ml-auto max-w-[24ch] text-right text-[.9rem] text-[#a49cba] transition-colors max-[860px]:hidden">A troop site done by Friday</span>
  </a>
</div>

<div class="overflow-hidden whitespace-nowrap border-y border-[rgba(164,156,186,.16)] bg-[#14111c] py-[13px] [font-family:'JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.26em] text-[#a49cba]" aria-hidden="true">
  <div class="ribbon-track inline-block [animation:slide_36s_linear_infinite]">
    <span>The generator remains the same</span><span class="px-[26px] text-[#d6a24a]">✦</span><span>The site does not</span><span class="px-[26px] text-[#d6a24a]">✦</span><span>composer create-project hyde/hyde</span><span class="px-[26px] text-[#d6a24a]">✦</span><span>The generator remains the same</span><span class="px-[26px] text-[#d6a24a]">✦</span><span>The site does not</span><span class="px-[26px] text-[#d6a24a]">✦</span><span>composer create-project hyde/hyde</span><span class="px-[26px] text-[#d6a24a]">✦</span>
  </div>
</div>

<!-- Exhibit i -->
<section class="relative py-[110px] pb-[130px] text-[#14333b] max-[860px]:py-20 max-[860px]:pb-[90px]" id="nordlys" style="background:linear-gradient(rgba(20,51,59,.05) 1px, transparent 1px),linear-gradient(90deg, rgba(20,51,59,.05) 1px, transparent 1px),#e9eeed;background-size:44px 44px,44px 44px,auto;">
  <div class="mx-auto max-w-[1160px] px-7 opacity-0 translate-y-4 transition-[opacity,transform] duration-[600ms] ease-[ease]" data-reveal>
    <div class="flex flex-wrap items-baseline gap-7">
      <span class="rounded-full border border-[#e8501e] px-3.5 py-[5px] [font-family:'JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.24em] text-[#e8501e]">Exhibit i</span>
      <h2 class="[font-family:'Instrument_Serif',serif] text-[clamp(2.2rem,5vw,3.6rem)] font-[420] leading-[1.02] tracking-[-.015em]">Nordlys Air</h2>
      <a class="ml-auto whitespace-nowrap rounded-full border border-[#14333b] bg-[#14333b] px-5 py-[9px] [font-family:'JetBrains_Mono',monospace] text-[.8rem] text-[#e9eeed] no-underline transition-transform hover:-translate-y-0.5 max-[860px]:ml-0" href="https://nordlys.hydephp.site/">Visit the live site ↗</a>
    </div>
    <p class="mt-5 max-w-[60ch] text-[1.04rem] text-[#3c5a61]">A fictional Arctic airline with scheduled routes, a fleet page, an ops manual, and a timetable it refuses to miss. Built to prove a Hyde site can carry a complete design system: technical grids, schematic illustrations, and a type treatment that would survive a Norwegian aviation authority audit.</p>
    <div class="mt-[30px] flex flex-wrap gap-11 [font-family:'JetBrains_Mono',monospace] text-[.76rem] text-[#14333b] max-[860px]:gap-6">
      <span><span class="mb-1 block uppercase tracking-[.18em] opacity-55">Medium</span>Blade components · Tailwind · data collections</span>
      <span><span class="mb-1 block uppercase tracking-[.18em] opacity-55">Demonstrates</span>Custom design systems on Hyde</span>
      <span><span class="mb-1 block uppercase tracking-[.18em] opacity-55">Source</span><a href="#" class="underline">github.com/hydephp/nordlys ↗</a></span>
    </div>
    <div class="motion-frame mt-12 overflow-hidden rounded-[14px] border border-[rgba(20,51,59,.25)] bg-[#f4f7f6] shadow-[0_40px_80px_-40px_rgba(20,51,59,.5)] -rotate-[.6deg] transition-[transform,box-shadow] duration-[350ms] ease-[ease] hover:rotate-0 hover:scale-[1.005]">
      <div class="flex items-center gap-2.5 border-b border-[rgba(20,51,59,.15)] px-4 py-2.5 [font-family:'JetBrains_Mono',monospace] text-[.74rem] text-[#14333b]">
        <span class="flex gap-[5px]"><i class="block h-2 w-2 rounded-full bg-current opacity-40"></i><i class="block h-2 w-2 rounded-full bg-current opacity-40"></i><i class="block h-2 w-2 rounded-full bg-current opacity-40"></i></span>
        <span class="opacity-70">nordlys.hydephp.site</span>
      </div>
      <img class="block h-auto w-full" src="demo-nordlys.png" alt="Nordlys Air demo site: a technical, blueprint-styled homepage for a fictional Arctic airline with the headline 'We fly the polar night'">
    </div>
  </div>
</section>

<!-- Exhibit ii -->
<section class="relative py-[110px] pb-[130px] text-[#26241a] max-[860px]:py-20 max-[860px]:pb-[90px]" id="lemonade" style="background:radial-gradient(640px 340px at 82% 0%, rgba(242,207,58,.35), transparent 65%), #fbf6dc;">
  <div class="mx-auto max-w-[1160px] px-7 opacity-0 translate-y-4 transition-[opacity,transform] duration-[600ms] ease-[ease]" data-reveal>
    <div class="flex flex-wrap items-baseline gap-7">
      <span class="rounded-full border border-[#c9ae2e] px-3.5 py-[5px] [font-family:'JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.24em] text-[#8a7414]">Exhibit ii</span>
      <h2 class="[font-family:'Instrument_Serif',serif] text-[clamp(2.2rem,5vw,3.6rem)] font-[420] leading-[1.02] tracking-[-.015em]">Lemonade Days</h2>
      <a class="ml-auto whitespace-nowrap rounded-full border border-[#f2cf3a] bg-[#f2cf3a] px-5 py-[9px] [font-family:'JetBrains_Mono',monospace] text-[.8rem] text-[#26241a] no-underline transition-transform hover:-translate-y-0.5 max-[860px]:ml-0" href="https://lemonade-days.hydephp.site/">Visit the live site ↗</a>
    </div>
    <p class="mt-5 max-w-[60ch] text-[1.04rem] text-[#5c5636]">Sun-drenched recipes from a Los Angeles that never runs out of July. Full-bleed photography, a serif that belongs on a juice label, and a reading experience built entirely from Markdown posts. Proof that static doesn't mean stiff.</p>
    <div class="mt-[30px] flex flex-wrap gap-11 [font-family:'JetBrains_Mono',monospace] text-[.76rem] text-[#26241a] max-[860px]:gap-6">
      <span><span class="mb-1 block uppercase tracking-[.18em] opacity-55">Medium</span>Markdown posts · image-led layouts · RSS</span>
      <span><span class="mb-1 block uppercase tracking-[.18em] opacity-55">Demonstrates</span>Photo-heavy blogging on Hyde</span>
      <span><span class="mb-1 block uppercase tracking-[.18em] opacity-55">Source</span><a href="#" class="underline">github.com/hydephp/lemonade ↗</a></span>
    </div>
    <div class="motion-frame mt-12 overflow-hidden rounded-[14px] border border-[rgba(38,36,26,.2)] bg-[#fffdf2] shadow-[0_40px_80px_-40px_rgba(120,100,20,.45)] -rotate-[.6deg] transition-[transform,box-shadow] duration-[350ms] ease-[ease] hover:rotate-0 hover:scale-[1.005]">
      <div class="flex items-center gap-2.5 border-b border-[rgba(38,36,26,.12)] px-4 py-2.5 [font-family:'JetBrains_Mono',monospace] text-[.74rem] text-[#26241a]">
        <span class="flex gap-[5px]"><i class="block h-2 w-2 rounded-full bg-current opacity-40"></i><i class="block h-2 w-2 rounded-full bg-current opacity-40"></i><i class="block h-2 w-2 rounded-full bg-current opacity-40"></i></span>
        <span class="opacity-70">lemonade-days.hydephp.site</span>
      </div>
      <img class="block h-auto w-full" src="demo-lemonade.png" alt="Lemonade Days demo site: a warm summery recipe blog with a beach photo hero and the headline 'Squeeze the Day: A Taste of LA Summer'">
    </div>
  </div>
</section>

<!-- Exhibit iii -->
<section class="relative bg-[#efe7db] py-[110px] pb-[130px] text-[#1e4633] max-[860px]:py-20 max-[860px]:pb-[90px]" id="alpine">
  <div class="mx-auto max-w-[1160px] px-7 opacity-0 translate-y-4 transition-[opacity,transform] duration-[600ms] ease-[ease]" data-reveal>
    <div class="flex flex-wrap items-baseline gap-7">
      <span class="rounded-full border border-[#8a5a33] px-3.5 py-[5px] [font-family:'JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.24em] text-[#8a5a33]">Exhibit iii</span>
      <h2 class="[font-family:'Instrument_Serif',serif] text-[clamp(2.2rem,5vw,3.6rem)] font-[420] leading-[1.02] tracking-[-.015em]">Alpine Scouts</h2>
      <a class="ml-auto whitespace-nowrap rounded-full border border-[#1e4633] bg-[#1e4633] px-5 py-[9px] [font-family:'JetBrains_Mono',monospace] text-[.8rem] text-[#efe7db] no-underline transition-transform hover:-translate-y-0.5 max-[860px]:ml-0" href="https://alpine-scouts.hydephp.site/">Visit the live site ↗</a>
    </div>
    <p class="mt-5 max-w-[60ch] text-[1.04rem] text-[#4c5f50]">Not every site needs to be a statement. Troop 404's site is what most of the web actually is: news, an about page, a gear checklist, and a join form, assembled from Hyde's stock components with a palette swap. Warm, clear, and done by Friday. That's the exhibit.</p>
    <div class="mt-[30px] flex flex-wrap gap-11 [font-family:'JetBrains_Mono',monospace] text-[.76rem] text-[#1e4633] max-[860px]:gap-6">
      <span><span class="mb-1 block uppercase tracking-[.18em] opacity-55">Medium</span>Stock Hyde components · one config file</span>
      <span><span class="mb-1 block uppercase tracking-[.18em] opacity-55">Demonstrates</span>What defaults get you</span>
      <span><span class="mb-1 block uppercase tracking-[.18em] opacity-55">Source</span><a href="#" class="underline">github.com/hydephp/alpine ↗</a></span>
    </div>
    <div class="motion-frame mt-12 overflow-hidden rounded-[14px] border border-[rgba(30,70,51,.25)] bg-[#f7f1e8] shadow-[0_40px_80px_-40px_rgba(30,70,51,.5)] -rotate-[.6deg] transition-[transform,box-shadow] duration-[350ms] ease-[ease] hover:rotate-0 hover:scale-[1.005]">
      <div class="flex items-center gap-2.5 border-b border-[rgba(30,70,51,.15)] px-4 py-2.5 [font-family:'JetBrains_Mono',monospace] text-[.74rem] text-[#1e4633]">
        <span class="flex gap-[5px]"><i class="block h-2 w-2 rounded-full bg-current opacity-40"></i><i class="block h-2 w-2 rounded-full bg-current opacity-40"></i><i class="block h-2 w-2 rounded-full bg-current opacity-40"></i></span>
        <span class="opacity-70">alpine-scouts.hydephp.site</span>
      </div>
      <img class="block h-auto w-full" src="demo-alpine.png" alt="Alpine Scouts demo site: a cozy scout troop homepage with a campfire photo and the headline 'Adventure Awaits. Join Troop 404'">
    </div>
  </div>
</section>

<div class="overflow-hidden whitespace-nowrap border-y border-[rgba(164,156,186,.16)] bg-[#14111c] py-[13px] [font-family:'JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.26em] text-[#a49cba]" aria-hidden="true">
  <div class="ribbon-track inline-block [animation:slide_36s_linear_infinite]">
    <span>The generator remains the same</span><span class="px-[26px] text-[#d6a24a]">✦</span><span>The site does not</span><span class="px-[26px] text-[#d6a24a]">✦</span><span>composer create-project hyde/hyde</span><span class="px-[26px] text-[#d6a24a]">✦</span><span>The generator remains the same</span><span class="px-[26px] text-[#d6a24a]">✦</span><span>The site does not</span><span class="px-[26px] text-[#d6a24a]">✦</span><span>composer create-project hyde/hyde</span><span class="px-[26px] text-[#d6a24a]">✦</span>
  </div>
</div>

<section class="bg-[radial-gradient(600px_300px_at_50%_0%,rgba(141,123,245,.13),transparent_70%)] py-[120px] text-center">
  <div class="mx-auto max-w-[1160px] px-7 opacity-0 translate-y-4 transition-[opacity,transform] duration-[600ms] ease-[ease]" data-reveal>
    <p class="[font-family:'JetBrains_Mono',monospace] text-[.74rem] uppercase tracking-[.24em] text-[#d6a24a]">Exhibit no. 4</p>
    <h2 class="mx-auto mt-4 max-w-[20ch] [font-family:'Instrument_Serif',serif] text-[clamp(2rem,4.4vw,3.2rem)] font-[420] leading-[1.2] tracking-[-.014em]">
      This space is <em class="text-[#d6a24a]">reserved</em> for your site.
    </h2>
    <p class="mx-auto mt-[18px] max-w-[48ch] text-[#a49cba]">Every exhibit started as the same blank project. Yours will too.</p>
    <div class="mt-[34px] flex flex-wrap items-center justify-center gap-3.5">
      <div class="flex items-center gap-3.5 rounded-[10px] border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-[18px] py-3 [font-family:'JetBrains_Mono',monospace] text-[.9rem] text-[#d8d2e8]">
        <span><span class="text-[#d6a24a]">$</span> composer create-project hyde/hyde</span>
      </div>
      <a class="border-b border-[rgba(164,156,186,.16)] pb-0.5 text-[.95rem] text-[#a49cba] no-underline transition-colors hover:border-[#a49cba] hover:text-white" href="#">Follow the quickstart</a>
    </div>
    <p class="mt-10 [font-family:'Instrument_Serif',serif] italic text-[#a49cba]">Built something with Hyde? <a class="text-[#8d7bf5] no-underline hover:underline" href="#">Submit your site to the exhibition.</a></p>
  </div>
</section>

<x-footer />

<script>
(function(){
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const items = document.querySelectorAll('[data-reveal]');

  if (reduced) {
    items.forEach(function(el){
      el.style.opacity = '1';
      el.style.transform = 'none';
      el.style.transition = 'none';
    });
    return;
  }

  const io = new IntersectionObserver(function(entries){
    entries.forEach(function(en){
      if (en.isIntersecting) {
        en.target.style.opacity = '1';
        en.target.style.transform = 'none';
        io.unobserve(en.target);
      }
    });
  }, { threshold: 0.08 });

  items.forEach(function(el){ io.observe(el); });
})();
</script>
</body>
</html>