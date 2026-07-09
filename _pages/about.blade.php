<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About · HydePHP</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght,SOFT,WONK@0,9..144,300..900,0..100,0..1;1,9..144,300..900,0..100,0..1&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=JetBrains+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>
  ::selection{background:#8d7bf5;color:#14111c}
  .reveal{opacity:0;transform:translateY(14px);transition:opacity .6s ease,transform .6s ease}
  .reveal.in{opacity:1;transform:none}
  @media (prefers-reduced-motion:reduce){.reveal{opacity:1;transform:none;transition:none}}
</style>
</head>
<body class="bg-[#14111c] text-[#e9e5f2] font-['Instrument_Sans',system-ui,sans-serif] text-[17px] leading-[1.7] antialiased">

<x-navigation />

<header class="bg-[radial-gradient(700px_340px_at_50%_-10%,rgba(141,123,245,.12),transparent_70%)] py-[96px] pb-[84px] text-center max-[640px]:py-[72px] max-[640px]:pb-[60px]">
  <div class="mx-auto max-w-[1160px] px-7">
    <p class="font-['JetBrains_Mono',monospace] text-[.74rem] uppercase tracking-[.22em] text-[#d6a24a]">About the project</p>
    <h1 class="mx-auto mt-[22px] max-w-[18ch] font-['Fraunces',serif] text-[clamp(2.4rem,5.6vw,4.2rem)] font-[420] leading-[1.06] tracking-[-.015em] [font-variation-settings:'opsz'_144,'SOFT'_40,'WONK'_1]">
      The strange case of a <em class="text-[#8d7bf5] [font-variation-settings:'opsz'_144,'SOFT'_100,'WONK'_1]">static</em> site generator.
    </h1>
    <p class="mx-auto mt-5 max-w-[52ch] text-[1.08rem] text-[#a49cba]">Where Hyde came from, what it believes, and why it will still be here when your next redesign rolls around.</p>
  </div>
</header>

<!-- The story -->
<section class="reveal mx-auto max-w-[720px] px-7 pb-[100px] pt-10">
  <p class="mt-0 text-[#d6d0e4] first-letter:float-left first-letter:pr-3.5 first-letter:pt-2 first-letter:font-['Fraunces',serif] first-letter:text-[4.4rem] first-letter:font-medium first-letter:leading-[.82] first-letter:text-[#d6a24a] first-letter:[font-variation-settings:'opsz'_144,'SOFT'_60,'WONK'_1]">Hyde started with a simple frustration. Jekyll, the Ruby generator that popularized the modern static site, had the right idea: write plain files, run one command, ship folders of HTML. But for a developer who lives in PHP and thinks in Laravel, reaching for a Ruby toolchain every time you want a simple site feels like borrowing a neighbor's kitchen to make toast.</p>
  <p class="mt-[18px] text-[#d6d0e4]">So Hyde takes Jekyll's philosophy and rebuilds it on the tools Laravel developers already trust. Blade for templating. Artisan-style commands for the workflow. Composer for everything else. The name is a small literary joke with a serious point: Jekyll and Hyde are the same person, and your Markdown and your website are the same file. Hyde just brings out the other side.</p>

  <h2 class="mt-[60px] font-['Fraunces',serif] text-[1.8rem] font-[470] tracking-[-.01em] [font-variation-settings:'opsz'_100,'SOFT'_50]">What Hyde optimizes for</h2>
  <p class="mt-[18px] text-[#d6d0e4]">Most tools optimize for the first five minutes. Hyde does too, a new project compiles out of the box with zero configuration, but the real design work went into the five years after that. Content lives in plain Markdown files that any tool can read, so nothing you write is held hostage by the generator. The frontend ships complete but every template can be published into your project and made yours. Configuration exists in layers: ignore it entirely, set a few values in YAML, or drop down to full PHP config files when a project demands it.</p>
  <p class="mt-[18px] text-[#d6d0e4]">That's the pattern everywhere in Hyde. Simple by default, powerful when asked, and never a cliff between the two.</p>

  <h2 class="mt-[60px] font-['Fraunces',serif] text-[1.8rem] font-[470] tracking-[-.01em] [font-variation-settings:'opsz'_100,'SOFT'_50]">What Hyde is not</h2>
  <p class="mt-[18px] text-[#d6d0e4]">Honesty is cheaper than churn, so here it is. Hyde builds static sites: blogs, documentation, portfolios, marketing pages, anything that can be compiled ahead of time and served as files. If you need user accounts, a checkout flow, or a dashboard that changes by the second, you want full Laravel, and Hyde will wave at you warmly from across the street. Plenty of people run both: Laravel for the app, Hyde for the docs and the blog.</p>
</section>

<!-- Principles -->
<section class="reveal mx-auto max-w-[1160px] px-7 pb-[100px]">
  <p class="font-['JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">Principles</p>
  <h2 class="mt-3.5 font-['Fraunces',serif] text-[clamp(1.9rem,3.4vw,2.6rem)] font-[430] leading-[1.12] tracking-[-.01em] [font-variation-settings:'opsz'_100,'SOFT'_40]">Opinions we're prepared to defend.</h2>
  <div class="mt-12 border-t border-[rgba(164,156,186,.16)]">
    <div class="grid grid-cols-[300px_1fr] gap-10 border-b border-[rgba(164,156,186,.16)] py-8 max-[900px]:grid-cols-1 max-[900px]:gap-2.5">
      <h3 class="font-['Fraunces',serif] text-[1.3rem] font-[480] [font-variation-settings:'SOFT'_50]">Zero config until you want it</h3>
      <p class="text-[.97rem] text-[#a49cba]">A fresh project builds with no setup at all. Every default is chosen so that doing nothing is a reasonable decision, and every default can be overridden the moment it isn't.</p>
    </div>
    <div class="grid grid-cols-[300px_1fr] gap-10 border-b border-[rgba(164,156,186,.16)] py-8 max-[900px]:grid-cols-1 max-[900px]:gap-2.5">
      <h3 class="font-['Fraunces',serif] text-[1.3rem] font-[480] [font-variation-settings:'SOFT'_50]">Your content outlives the tool</h3>
      <p class="text-[.97rem] text-[#a49cba]">Everything you write is plain Markdown with standard front matter. If you leave Hyde someday, your files come with you unchanged. Lock-in is a business model, and it isn't ours.</p>
    </div>
    <div class="grid grid-cols-[300px_1fr] gap-10 border-b border-[rgba(164,156,186,.16)] py-8 max-[900px]:grid-cols-1 max-[900px]:gap-2.5">
      <h3 class="font-['Fraunces',serif] text-[1.3rem] font-[480] [font-variation-settings:'SOFT'_50]">Boring on purpose</h3>
      <p class="text-[.97rem] text-[#a49cba]">Semantic versioning, written upgrade guides, and a test suite that runs on every commit. Excitement belongs in your content, never in your build pipeline.</p>
    </div>
    <div class="grid grid-cols-[300px_1fr] gap-10 border-b border-[rgba(164,156,186,.16)] py-8 max-[900px]:grid-cols-1 max-[900px]:gap-2.5">
      <h3 class="font-['Fraunces',serif] text-[1.3rem] font-[480] [font-variation-settings:'SOFT'_50]">Small enough to understand</h3>
      <p class="text-[.97rem] text-[#a49cba]">You can read Hyde's source in an afternoon. When something behaves unexpectedly, the answer is in code you can step through, and the architecture docs explain why it's built that way.</p>
    </div>
  </div>
</section>

<!-- Letter from the maintainer -->
<section class="reveal mx-auto max-w-[1160px] px-7 pb-[100px]">
  <div class="relative mx-auto max-w-[680px] rounded-xl border border-[rgba(43,36,51,.14)] bg-[#ece7da] px-[60px] pb-12 pt-14 text-[#2b2433] shadow-[0_40px_90px_-40px_rgba(0,0,0,.75)] max-[640px]:px-[30px] max-[640px]:pb-10 max-[640px]:pt-11">
    <div class="absolute right-[52px] top-11 flex h-[58px] w-[58px] items-center justify-center rounded-full shadow-[inset_0_2px_6px_rgba(255,255,255,.35),inset_0_-3px_8px_rgba(0,0,0,.3),0_4px_14px_rgba(0,0,0,.2)] [background:radial-gradient(circle_at_34%_30%,#e5b25e,#b3801f_70%)] max-[640px]:right-7 max-[640px]:top-[30px] max-[640px]:h-[46px] max-[640px]:w-[46px]" aria-hidden="true">
      <svg width="26" height="26" viewBox="0 0 26 26" fill="none" class="opacity-85">
        <ellipse cx="13" cy="19" rx="9" ry="2.4" fill="#5c3f0e"/>
        <rect x="7.5" y="6" width="11" height="12.5" rx="1.6" fill="#5c3f0e"/>
      </svg>
    </div>
    <p class="font-['JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.18em] text-[#8a7f70]">A note from the maintainer</p>
    <h2 class="mt-3 font-['Fraunces',serif] text-[1.9rem] font-[460] tracking-[-.01em] [font-variation-settings:'opsz'_100,'SOFT'_50]">Why I keep building this</h2>
    <p class="mt-4 text-[.99rem] text-[#3b3345]">I built Hyde because I wanted it to exist, and I maintain it because other people turned out to want it too. That's the whole business plan. There's no venture funding waiting for a return, no telemetry phoning home, no premium tier holding features for ransom. It's MIT licensed, and it stays that way.</p>
    <p class="mt-4 text-[.99rem] text-[#3b3345]">What you get instead is a maintainer who uses Hyde daily, answers issues personally, and treats the documentation as part of the product rather than an apology for it. When you file a bug, a human who knows every line of the codebase reads it.</p>
    <p class="mt-4 text-[.99rem] text-[#3b3345]">Give it twenty minutes. If it doesn't feel right, your Markdown files will work anywhere else. But I don't think you'll need them to.</p>
    <div class="mt-8 flex items-center gap-[18px]">
      <div>
        <div class="font-['Fraunces',serif] text-[1.4rem] font-medium italic [font-variation-settings:'opsz'_60,'SOFT'_100,'WONK'_1]">Emma De Silva</div>
        <div class="text-[.8rem] text-[#8a7f70]">Creator &amp; maintainer · Laravel contributor</div>
      </div>
    </div>
  </div>
</section>

<!-- Timeline -->
<section class="reveal mx-auto max-w-[720px] px-7 pb-[100px]">
  <p class="font-['JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">The record so far</p>
  <h2 class="mt-3.5 font-['Fraunces',serif] text-[clamp(1.9rem,3.4vw,2.6rem)] font-[430] leading-[1.12] tracking-[-.01em] [font-variation-settings:'opsz'_100,'SOFT'_40]">Four years, versioned carefully.</h2>
  <div class="relative mt-12 pl-9 before:absolute before:bottom-[6px] before:left-2 before:top-[6px] before:w-[2px] before:bg-gradient-to-b before:from-[#d6a24a] before:to-[#8d7bf5]">
    <div class="relative pb-10 before:absolute before:left-[-33.5px] before:top-2 before:h-[11px] before:w-[11px] before:rounded-full before:border-2 before:border-[#d6a24a] before:bg-[#14111c] before:content-['']">
      <span class="font-['JetBrains_Mono',monospace] text-[.74rem] uppercase tracking-[.16em] text-[#d6a24a]">2022</span>
      <h3 class="mt-1 font-['Fraunces',serif] text-[1.25rem] font-[490] [font-variation-settings:'SOFT'_50]">First release</h3>
      <p class="mt-1.5 max-w-[56ch] text-[.95rem] text-[#a49cba]">Hyde ships as a weekend experiment: Jekyll's workflow, rebuilt on Laravel Zero and Blade. The experiment refuses to stay small.</p>
    </div>
    <div class="relative pb-10 before:absolute before:left-[-33.5px] before:top-2 before:h-[11px] before:w-[11px] before:rounded-full before:border-2 before:border-[#d6a24a] before:bg-[#14111c] before:content-['']">
      <span class="font-['JetBrains_Mono',monospace] text-[.74rem] uppercase tracking-[.16em] text-[#d6a24a]">2023</span>
      <h3 class="mt-1 font-['Fraunces',serif] text-[1.25rem] font-[490] [font-variation-settings:'SOFT'_50]">Version 1.0</h3>
      <p class="mt-1.5 max-w-[56ch] text-[.95rem] text-[#a49cba]">The public API stabilizes under semantic versioning. From here on, upgrades come with guides and breaking changes come with warnings.</p>
    </div>
    <div class="relative pb-10 before:absolute before:left-[-33.5px] before:top-2 before:h-[11px] before:w-[11px] before:rounded-full before:border-2 before:border-[#d6a24a] before:bg-[#14111c] before:content-['']">
      <span class="font-['JetBrains_Mono',monospace] text-[.74rem] uppercase tracking-[.16em] text-[#d6a24a]">2025</span>
      <h3 class="mt-1 font-['Fraunces',serif] text-[1.25rem] font-[490] [font-variation-settings:'SOFT'_50]">Version 2.0</h3>
      <p class="mt-1.5 max-w-[56ch] text-[.95rem] text-[#a49cba]">A leaner core, a refined frontend, and the lessons of two hundred thousand downloads folded back into the architecture.</p>
    </div>
    <div class="relative before:absolute before:left-[-33.5px] before:top-2 before:h-[11px] before:w-[11px] before:rounded-full before:border-2 before:border-[#8d7bf5] before:bg-[#8d7bf5] before:shadow-[0_0_14px_rgba(141,123,245,.6)] before:content-['']">
      <span class="font-['JetBrains_Mono',monospace] text-[.74rem] uppercase tracking-[.16em] text-[#d6a24a]">2026</span>
      <h3 class="mt-1 font-['Fraunces',serif] text-[1.25rem] font-[490] [font-variation-settings:'SOFT'_50]">Version 3, in the open</h3>
      <p class="mt-1.5 max-w-[56ch] text-[.95rem] text-[#a49cba]">A unified publish command, a cleaner CLI surface, and design documentation written for humans and AI agents alike. Developed in public, as always.</p>
    </div>
  </div>
</section>

<!-- Stewardship -->
<section class="reveal mx-auto max-w-[1160px] px-7 pb-[100px]">
  <p class="font-['JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">Stewardship</p>
  <h2 class="mt-3.5 font-['Fraunces',serif] text-[clamp(1.9rem,3.4vw,2.6rem)] font-[430] leading-[1.12] tracking-[-.01em] [font-variation-settings:'opsz'_100,'SOFT'_40]">The fine print, in large type.</h2>
  <div class="mt-12 grid grid-cols-4 gap-px overflow-hidden rounded-[14px] border border-[rgba(164,156,186,.16)] bg-[rgba(164,156,186,.16)] max-[900px]:grid-cols-2 max-[640px]:grid-cols-1">
    <div class="bg-[#1c1827] px-[26px] py-7">
      <div class="font-['Fraunces',serif] text-2xl font-[440] [font-variation-settings:'opsz'_100]">MIT</div>
      <p class="mt-2 text-[.85rem] text-[#a49cba]">Free for any use, commercial or personal, forever. No license keys, no seat counts.</p>
    </div>
    <div class="bg-[#1c1827] px-[26px] py-7">
      <div class="font-['Fraunces',serif] text-2xl font-[440] [font-variation-settings:'opsz'_100]">SemVer</div>
      <p class="mt-2 text-[.85rem] text-[#a49cba]">Breaking changes only in major versions, and every major version ships with an upgrade guide.</p>
    </div>
    <div class="bg-[#1c1827] px-[26px] py-7">
      <div class="font-['Fraunces',serif] text-2xl font-[440] [font-variation-settings:'opsz'_100]">0 <i class="text-base text-[#d6a24a]">trackers</i></div>
      <p class="mt-2 text-[.85rem] text-[#a49cba]">No telemetry, no analytics, no calling home. Hyde doesn't know you exist, and prefers it that way.</p>
    </div>
    <div class="bg-[#1c1827] px-[26px] py-7">
      <div class="font-['Fraunces',serif] text-2xl font-[440] [font-variation-settings:'opsz'_100]">100<i class="text-base text-[#d6a24a]">%</i> <i class="text-base text-[#d6a24a]">open</i></div>
      <p class="mt-2 text-[.85rem] text-[#a49cba]">Development, roadmap, and decisions all happen in public on GitHub. Watch, argue, contribute.</p>
    </div>
  </div>
</section>

<!-- Finale -->
<section class="border-t border-[rgba(164,156,186,.16)] bg-[radial-gradient(600px_300px_at_50%_0%,rgba(214,162,74,.08),transparent_70%)] py-[100px] text-center">
  <div class="reveal mx-auto max-w-[1160px] px-7">
    <p class="font-['JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">The other side of this page</p>
    <h2 class="mx-auto mt-3.5 max-w-[22ch] font-['Fraunces',serif] text-[clamp(1.9rem,3.4vw,2.6rem)] font-[430] leading-[1.12] tracking-[-.01em] [font-variation-settings:'opsz'_100,'SOFT'_40]">You've read enough. Build something.</h2>
    <div class="mt-[34px] flex flex-wrap items-center justify-center gap-3.5">
      <div class="flex items-center gap-3.5 rounded-[10px] border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-[18px] py-3 font-['JetBrains_Mono',monospace] text-[.9rem] text-[#d8d2e8]">
        <span><span class="text-[#d6a24a]">$</span> composer create-project hyde/hyde</span>
      </div>
      <a class="border-b border-[rgba(164,156,186,.16)] pb-0.5 text-[.95rem] text-[#a49cba] no-underline transition-colors hover:border-[#a49cba] hover:text-white" href="#">Follow the quickstart</a>
    </div>
    <div class="mt-11 flex justify-center gap-7 font-['JetBrains_Mono',monospace] text-[.8rem] max-[640px]:flex-col max-[640px]:gap-3">
      <a class="text-[#a49cba] no-underline hover:text-white" href="#"><b class="font-normal text-[#8d7bf5]">↗</b> Star on GitHub</a>
      <a class="text-[#a49cba] no-underline hover:text-white" href="#"><b class="font-normal text-[#8d7bf5]">↗</b> Join the Discord</a>
      <a class="text-[#a49cba] no-underline hover:text-white" href="#"><b class="font-normal text-[#8d7bf5]">↗</b> Read the source</a>
    </div>
  </div>
</section>

<footer class="border-t border-[rgba(164,156,186,.16)] py-[34px] text-[.85rem] text-[#a49cba]">
  <div class="mx-auto flex max-w-[1160px] flex-wrap items-center gap-6 px-7">
    <span>Site proudly built with HydePHP 🎩</span>
    <div class="ml-auto flex gap-5">
      <a class="text-[#a49cba] no-underline hover:text-white" href="#">GitHub</a>
      <a class="text-[#a49cba] no-underline hover:text-white" href="#">Discord</a>
      <a class="text-[#a49cba] no-underline hover:text-white" href="#">RSS</a>
      <a class="text-[#a49cba] no-underline hover:text-white" href="#">Legal</a>
    </div>
  </div>
</footer>

<script>
(function(){
  const io = new IntersectionObserver(function(entries){
    entries.forEach(function(en){
      if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); }
    });
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal').forEach(function(el){ io.observe(el); });
})();
</script>
</body>
</html>