@php
$docsQuickstart = \Hyde\Foundation\Facades\Routes::get('docs/' . config('docs.default_version') . '/quickstart');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About · HydePHP</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,opsz,wght@0,5..1200,400..900;1,5..1200,400..900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=JetBrains+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
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

<header class="bg-[radial-gradient(700px_340px_at_50%_-10%,rgba(141,123,245,.12),transparent_70%)] py-[96px] pb-[32px] text-center max-[640px]:py-[72px] max-[640px]:pb-[40px]">
  <div class="mx-auto max-w-[1160px] px-7">
    <p class="font-['JetBrains_Mono',monospace] text-[.74rem] uppercase tracking-[.22em] text-[#d6a24a]">About the project</p>
    <h1 class="mx-auto mt-[22px] max-w-[18ch] font-['Playfair_Display',serif] opacity-90 text-[clamp(2.4rem,5.6vw,4.2rem)] font-[420] leading-[1.06] tracking-[-.015em]">
      The strange case of a static site generator.
    </h1>
    <p class="mx-auto mt-5 max-w-[52ch] text-[1.08rem] text-[#a49cba]">Where HydePHP came from, what it believes, and why it will still be here when your next redesign rolls around.</p>
  </div>
</header>

<!-- The story -->
<section class="reveal mx-auto max-w-[720px] px-7 pb-[100px] pt-4">
  <p class="mt-0 text-[#d6d0e4] first-letter:float-left first-letter:pr-3.5 first-letter:pt-2 first-letter:font-['Playfair_Display',serif] first-letter:opacity-90 first-letter:text-[4.4rem] first-letter:font-medium first-letter:leading-[.82] first-letter:text-[#d6a24a]">HydePHP started with a simple frustration. Jekyll, the Ruby generator that popularized the modern static site, had the right idea: write plain files, run one command, ship folders of HTML. But for a developer who lives in PHP and thinks in Laravel, reaching for a Ruby toolchain every time you want a simple site feels like borrowing a neighbor's kitchen to make toast.</p>
  <p class="mt-[18px] text-[#d6d0e4]">So Hyde takes Jekyll's philosophy and rebuilds it on the tools Laravel developers already trust. Blade for templating. Artisan-style commands for the workflow. Composer for everything else. The name is a small literary joke with a serious point: Jekyll and Hyde are the same person, and your Markdown and your website are the same file. Hyde just brings out the other side.</p>

  <h2 class="mt-[60px] font-['Playfair_Display',serif] opacity-90 text-[1.8rem] font-[470] tracking-[-.01em]">What Hyde optimizes for</h2>
  <p class="mt-[18px] text-[#d6d0e4]">Most tools optimize for the first five minutes. Hyde does too, a new project compiles out of the box with zero configuration, but the real design work went into the five years after that. Content lives in plain Markdown files that any tool can read, so nothing you write is held hostage by the generator. The frontend ships complete but every template can be published into your project and made yours. Configuration exists in layers: ignore it entirely, set a few values in YAML, or drop down to full PHP config files when a project demands it.</p>
  <p class="mt-[18px] text-[#d6d0e4]">That's the pattern everywhere in Hyde. Simple by default, powerful when asked, and never a cliff between the two.</p>

  <h2 class="mt-[60px] font-['Playfair_Display',serif] opacity-90 text-[1.8rem] font-[470] tracking-[-.01em]">What Hyde is not</h2>
  <p class="mt-[18px] text-[#d6d0e4]">Honesty is cheaper than churn, so here it is. Hyde builds static sites: blogs, documentation, portfolios, marketing pages, anything that can be compiled ahead of time and served as files. If you need user accounts, a checkout flow, or a dashboard that changes by the second, you want full Laravel, and Hyde will wave at you warmly from across the street. Plenty of people run both: Laravel for the app, Hyde for the docs and the blog.</p>
</section>

<!-- Principles -->
<section class="reveal mx-auto max-w-[1160px] px-7 pb-[100px]">
  <p class="font-['JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">Principles</p>
  <h2 class="mt-3.5 font-['Playfair_Display',serif] opacity-90 text-[clamp(1.9rem,3.4vw,2.6rem)] font-[430] leading-[1.12] tracking-[-.01em]">Opinions we're prepared to defend.</h2>
  <div class="mt-12 border-t border-[rgba(164,156,186,.16)]">
    <div class="grid grid-cols-[300px_1fr] gap-10 border-b border-[rgba(164,156,186,.16)] py-8 max-[900px]:grid-cols-1 max-[900px]:gap-2.5">
      <h3 class="font-['Playfair_Display',serif] opacity-90 text-[1.3rem] font-[480]">Zero config until you want it</h3>
      <p class="text-[.97rem] text-[#a49cba]">A fresh project builds with no setup at all. Every default is chosen so that doing nothing is a reasonable decision, and every default can be overridden the moment it isn't for your site.</p>
    </div>
    <div class="grid grid-cols-[300px_1fr] gap-10 border-b border-[rgba(164,156,186,.16)] py-8 max-[900px]:grid-cols-1 max-[900px]:gap-2.5">
      <h3 class="font-['Playfair_Display',serif] opacity-90 text-[1.3rem] font-[480]">Your content outlives the tool</h3>
      <p class="text-[.97rem] text-[#a49cba]">Everything you write is plain Markdown with standard front matter. If you leave Hyde someday, your files come with you unchanged. Lock-in is a business model, and it isn't ours.</p>
    </div>
    <div class="grid grid-cols-[300px_1fr] gap-10 border-b border-[rgba(164,156,186,.16)] py-8 max-[900px]:grid-cols-1 max-[900px]:gap-2.5">
      <h3 class="font-['Playfair_Display',serif] opacity-90 text-[1.3rem] font-[480]">Boring on purpose</h3>
      <p class="text-[.97rem] text-[#a49cba]">Semantic versioning, written upgrade guides, and a test suite that runs on every source code commit. Excitement belongs in your content, never in your build pipeline.</p>
    </div>
    <div class="grid grid-cols-[300px_1fr] gap-10 border-b border-[rgba(164,156,186,.16)] py-8 max-[900px]:grid-cols-1 max-[900px]:gap-2.5">
      <h3 class="font-['Playfair_Display',serif] opacity-90 text-[1.3rem] font-[480]">Small enough to understand</h3>
      <p class="text-[.97rem] text-[#a49cba]">You can read Hyde's source in an afternoon. When something behaves unexpectedly, the answer is in code you can step through, and the architecture docs explain why it's built that way.</p>
    </div>
  </div>
</section>

<!-- Letter from the maintainer -->
<section class="reveal mx-auto max-w-[1160px] px-7 pb-[100px]">
  <div class="relative mx-auto max-w-[680px] rounded-xl border border-[rgba(43,36,51,.14)] bg-[#ece7da] px-[60px] pb-12 pt-14 text-[#2b2433] shadow-[0_40px_90px_-40px_rgba(0,0,0,.75)] max-[640px]:px-[30px] max-[640px]:pb-10 max-[640px]:pt-11">
    <div class="absolute right-[52px] top-11 h-[58px] w-[58px] -rotate-6 [filter:drop-shadow(0_6px_12px_rgba(43,36,51,.28))] max-[640px]:right-7 max-[640px]:top-[30px] max-[640px]:h-[46px] max-[640px]:w-[46px]" aria-hidden="true">
      <svg viewBox="0 0 100 100" class="h-full w-full">
        <defs>
          <radialGradient id="sealWax" cx="32%" cy="26%" r="80%">
            <stop offset="0%" stop-color="#eec076"/>
            <stop offset="52%" stop-color="#c8912c"/>
            <stop offset="100%" stop-color="#8c6110"/>
          </radialGradient>
          <radialGradient id="sealCore" cx="36%" cy="30%" r="76%">
            <stop offset="0%" stop-color="#dcab57"/>
            <stop offset="100%" stop-color="#a4731a"/>
          </radialGradient>
        </defs>
        <path fill="url(#sealWax)" d="M93.50 46.20Q93.89 50.00 93.64 53.82Q93.38 57.65 91.85 61.16Q90.31 64.67 88.42 67.88Q86.54 71.10 84.49 74.16Q82.43 77.22 79.26 79.16Q76.09 81.10 73.16 83.06Q70.22 85.02 67.37 87.45Q64.51 89.87 61.02 91.28Q57.53 92.69 53.76 93.34Q50.00 93.99 46.27 93.14Q42.54 92.29 39.18 90.63Q35.82 88.97 32.21 88.02Q28.60 87.07 25.38 85.13Q22.15 83.18 19.72 80.32Q17.29 77.45 15.01 74.48Q12.73 71.52 11.40 68.03Q10.07 64.54 9.15 60.95Q8.24 57.36 8.09 53.68Q7.94 50.00 9.23 46.52Q10.51 43.04 11.06 39.53Q11.60 36.02 12.08 32.20Q12.56 28.38 14.41 25.04Q16.26 21.69 18.84 18.81Q21.42 15.94 24.91 14.27Q28.40 12.60 32.01 11.55Q35.62 10.50 39.09 9.16Q42.56 7.82 46.28 7.93Q50.00 8.04 53.58 8.73Q57.16 9.42 60.81 9.84Q64.46 10.26 67.89 11.67Q71.31 13.09 74.50 15.05Q77.68 17.01 80.07 19.89Q82.45 22.77 83.80 26.24Q85.15 29.70 87.30 32.67Q89.44 35.65 91.28 39.02Q93.11 42.40 93.50 46.20Z"/>
        <path fill="url(#sealCore)" stroke="#77510a" stroke-opacity=".5" stroke-width="1.4" d="M82.82 46.57Q83.41 50.00 83.09 53.48Q82.77 56.97 81.60 60.26Q80.43 63.55 78.35 66.32Q76.27 69.08 74.24 71.88Q72.22 74.68 69.42 76.72Q66.61 78.77 63.27 79.65Q59.92 80.53 56.67 81.55Q53.42 82.58 49.97 82.89Q46.51 83.20 43.06 82.60Q39.60 82.00 36.40 80.55Q33.20 79.09 30.81 76.53Q28.42 73.96 26.05 71.55Q23.67 69.13 21.59 66.35Q19.50 63.58 18.79 60.18Q18.08 56.79 17.62 53.39Q17.17 50.00 17.34 46.55Q17.51 43.09 18.48 39.75Q19.46 36.40 21.06 33.27Q22.66 30.14 25.49 28.03Q28.32 25.92 31.16 24.10Q34.00 22.29 36.86 20.34Q39.73 18.38 43.13 17.71Q46.53 17.03 50.00 17.03Q53.46 17.03 56.86 17.75Q60.25 18.47 63.36 19.97Q66.47 21.47 69.51 23.22Q72.54 24.97 74.54 27.84Q76.55 30.71 77.81 33.88Q79.08 37.05 80.65 40.10Q82.23 43.15 82.82 46.57Z"/>
        <g font-family="'Playfair Display',serif" font-size="40" font-weight="600" font-style="italic" text-anchor="middle" letter-spacing="-3">
          <text x="50.9" y="63.4" fill="#5e3d05" fill-opacity=".5">DS</text>
          <text x="49.2" y="61.8" fill="#ffe9b8" fill-opacity=".5">DS</text>
          <text x="50" y="62.6" fill="#cb9a3c">DS</text>
        </g>
      </svg>
    </div>
    <p class="font-['JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.18em] text-[#8a7f70]">A note from the maintainer</p>
    <h2 class="mt-3 font-['Playfair_Display',serif] opacity-90 text-[1.9rem] font-[460] tracking-[-.01em]">Why I keep building this</h2>
    <p class="mt-4 text-[.99rem] text-[#3b3345]">I built Hyde because I wanted it to exist, and I maintain it because other people turned out to want it too. That's the whole business plan. There's no venture funding waiting for a return, no telemetry phoning home, no premium tier holding features for ransom. It's MIT licensed, and it stays that way.</p>
    <p class="mt-4 text-[.99rem] text-[#3b3345]">What you get instead is a maintainer who uses Hyde daily, answers issues personally, and treats the documentation as part of the product rather than an apology for it. When you file a bug, a human who knows every line of the codebase reads it.</p>
    <p class="mt-4 text-[.99rem] text-[#3b3345]">Give it twenty minutes. If it doesn't feel right, your Markdown files will work anywhere else. But I don't think you'll need them to.</p>
    <div class="mt-8 flex items-center gap-[18px]">
      <div>
        <div class="font-['Playfair_Display',serif] opacity-90 text-[1.4rem] font-medium italic">Emma De Silva</div>
        <div class="text-[.8rem] text-[#8a7f70]">Creator &amp; maintainer of HydePHP</div>
      </div>
    </div>
  </div>
</section>

<!-- Timeline -->
<section class="reveal mx-auto max-w-[720px] px-7 pb-[100px]">
  <p class="font-['JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">The record so far</p>
  <h2 class="mt-3.5 font-['Playfair_Display',serif] opacity-90 text-[clamp(1.9rem,3.4vw,2.6rem)] font-[430] leading-[1.12] tracking-[-.01em]">Four years, versioned carefully.</h2>
  <div class="relative mt-12 pl-9 before:absolute before:bottom-[6px] before:left-2 before:top-[6px] before:w-[2px] before:bg-gradient-to-b before:from-[#d6a24a] before:to-[#8d7bf5]">
    <div class="relative pb-10 before:absolute before:left-[-33.5px] before:top-2 before:h-[11px] before:w-[11px] before:rounded-full before:border-2 before:border-[#d6a24a] before:bg-[#14111c] before:content-['']">
      <span class="font-['JetBrains_Mono',monospace] text-[.74rem] uppercase tracking-[.16em] text-[#d6a24a]">2022</span>
      <h3 class="mt-1 font-['Playfair_Display',serif] opacity-90 text-[1.25rem] font-[490]">First release</h3>
      <p class="mt-1.5 max-w-[56ch] text-[.95rem] text-[#a49cba]">Hyde ships as a weekend experiment: Jekyll's workflow, rebuilt on Laravel Zero and Blade. The experiment refuses to stay small.</p>
    </div>
    <div class="relative pb-10 before:absolute before:left-[-33.5px] before:top-2 before:h-[11px] before:w-[11px] before:rounded-full before:border-2 before:border-[#d6a24a] before:bg-[#14111c] before:content-['']">
      <span class="font-['JetBrains_Mono',monospace] text-[.74rem] uppercase tracking-[.16em] text-[#d6a24a]">2023</span>
      <h3 class="mt-1 font-['Playfair_Display',serif] opacity-90 text-[1.25rem] font-[490]">Version 1.0</h3>
      <p class="mt-1.5 max-w-[56ch] text-[.95rem] text-[#a49cba]">The public API stabilizes under semantic versioning. From here on, upgrades come with guides and breaking changes come with warnings.</p>
    </div>
    <div class="relative pb-10 before:absolute before:left-[-33.5px] before:top-2 before:h-[11px] before:w-[11px] before:rounded-full before:border-2 before:border-[#d6a24a] before:bg-[#14111c] before:content-['']">
      <span class="font-['JetBrains_Mono',monospace] text-[.74rem] uppercase tracking-[.16em] text-[#d6a24a]">2025</span>
      <h3 class="mt-1 font-['Playfair_Display',serif] opacity-90 text-[1.25rem] font-[490]">Version 2.0</h3>
      <p class="mt-1.5 max-w-[56ch] text-[.95rem] text-[#a49cba]">A leaner core, a refined frontend, and the lessons of two hundred thousand downloads folded back into the architecture.</p>
    </div>
    <div class="relative before:absolute before:left-[-33.5px] before:top-2 before:h-[11px] before:w-[11px] before:rounded-full before:border-2 before:border-[#8d7bf5] before:bg-[#8d7bf5] before:shadow-[0_0_14px_rgba(141,123,245,.6)] before:content-['']">
      <span class="font-['JetBrains_Mono',monospace] text-[.74rem] uppercase tracking-[.16em] text-[#d6a24a]">2026</span>
      <h3 class="mt-1 font-['Playfair_Display',serif] opacity-90 text-[1.25rem] font-[490]">Version 3, in the open</h3>
      <p class="mt-1.5 max-w-[56ch] text-[.95rem] text-[#a49cba]">A unified publish command, a cleaner CLI surface, and design documentation written for humans and AI agents alike. Developed in public, as always.</p>
    </div>
  </div>
</section>

<!-- Stewardship -->
<section class="reveal mx-auto max-w-[1160px] px-7 pb-[100px]">
  <p class="font-['JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">Stewardship</p>
  <h2 class="mt-3.5 font-['Playfair_Display',serif] opacity-90 text-[clamp(1.9rem,3.4vw,2.6rem)] font-[430] leading-[1.12] tracking-[-.01em]">The fine print, in large type.</h2>
  <div class="mt-12 grid grid-cols-4 gap-px overflow-hidden rounded-[14px] border border-[rgba(164,156,186,.16)] bg-[rgba(164,156,186,.16)] max-[900px]:grid-cols-2 max-[640px]:grid-cols-1">
    <div class="bg-[#1c1827] px-[26px] py-7">
      <div class="font-['Playfair_Display',serif] opacity-90 text-2xl font-[440]">MIT</div>
      <p class="mt-2 text-[.85rem] text-[#a49cba]">Free for any use, commercial or personal, forever. No license keys, no seat counts.</p>
    </div>
    <div class="bg-[#1c1827] px-[26px] py-7">
      <div class="font-['Playfair_Display',serif] opacity-90 text-2xl font-[440]">SemVer</div>
      <p class="mt-2 text-[.85rem] text-[#a49cba]">Breaking changes only in major versions, and every major version ships with an upgrade guide.</p>
    </div>
    <div class="bg-[#1c1827] px-[26px] py-7">
      <div class="font-['Playfair_Display',serif] opacity-90 text-2xl font-[440]">0 <i class="text-base text-[#d6a24a]">trackers</i></div>
      <p class="mt-2 text-[.85rem] text-[#a49cba]">No telemetry, no analytics, no calling home. Hyde doesn't know you exist, and prefers it that way.</p>
    </div>
    <div class="bg-[#1c1827] px-[26px] py-7">
      <div class="font-['Playfair_Display',serif] opacity-90 text-2xl font-[440]">100<i class="text-base text-[#d6a24a]">%</i> <i class="text-base text-[#d6a24a]">open</i></div>
      <p class="mt-2 text-[.85rem] text-[#a49cba]">Development, roadmap, and decisions all happen in public on GitHub. Watch, argue, contribute.</p>
    </div>
  </div>
</section>

<!-- Finale -->
<section class="border-t border-[rgba(164,156,186,.16)] bg-[radial-gradient(600px_300px_at_50%_0%,rgba(214,162,74,.08),transparent_70%)] py-[100px] text-center">
  <div class="reveal mx-auto max-w-[1160px] px-7">
    <p class="font-['JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">The other side of this page</p>
    <h2 class="mx-auto mt-3.5 max-w-none whitespace-nowrap font-['Playfair_Display',serif] opacity-90 text-[clamp(1.9rem,3.4vw,2.6rem)] font-[430] leading-[1.12] tracking-[-.01em] max-[640px]:max-w-[22ch] max-[640px]:whitespace-normal">You've read enough. Build something.</h2>
    <x-project-cta :quickstart="$docsQuickstart" />
    <div class="mt-11 flex justify-center gap-7 font-['JetBrains_Mono',monospace] text-[.8rem] max-[640px]:flex-col max-[640px]:gap-3">
      <a class="text-[#a49cba] no-underline hover:text-white" href="https://github.com/hydephp/hyde"><b class="font-normal text-[#8d7bf5]">↗</b> Star on GitHub</a>
      <a class="text-[#a49cba] no-underline hover:text-white" href="https://discord.hydephp.com"><b class="font-normal text-[#8d7bf5]">↗</b> Join the Discord</a>
      <a class="text-[#a49cba] no-underline hover:text-white" href="https://github.com/hydephp/develop"><b class="font-normal text-[#8d7bf5]">↗</b> Read the source</a>
    </div>
  </div>
</section>

<x-footer />

<script>
(function(){
  const io = new IntersectionObserver(function(entries){
    entries.forEach(function(en){
      if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); }
    });
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal').forEach(function(el){ io.observe(el); });

  document.querySelectorAll('[data-copy-command]').forEach(function(button){
    button.addEventListener('click', async function(){
      try {
        await navigator.clipboard.writeText(button.dataset.copyCommand);
        button.textContent = 'copied';
        window.setTimeout(function(){ button.textContent = 'copy'; }, 1600);
      } catch (_) {
        button.textContent = 'unable to copy';
        window.setTimeout(function(){ button.textContent = 'copy'; }, 1600);
      }
    });
  });
})();
</script>
</body>
</html>
