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
{!! config('hyde.head') !!}
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
          <radialGradient id="sealWax" cx="30%" cy="24%" r="82%">
            <stop offset="0%" stop-color="#f2c880"/>
            <stop offset="45%" stop-color="#cd952e"/>
            <stop offset="78%" stop-color="#a2711a"/>
            <stop offset="100%" stop-color="#7d550c"/>
          </radialGradient>
          <linearGradient id="sealRim" x1="18%" y1="8%" x2="82%" y2="92%">
            <stop offset="0%" stop-color="#ffe3ab" stop-opacity=".85"/>
            <stop offset="42%" stop-color="#ffe3ab" stop-opacity="0"/>
            <stop offset="62%" stop-color="#5c3d05" stop-opacity="0"/>
            <stop offset="100%" stop-color="#5c3d05" stop-opacity=".6"/>
          </linearGradient>
          <radialGradient id="sealField" cx="36%" cy="28%" r="78%">
            <stop offset="0%" stop-color="#dcac58"/>
            <stop offset="100%" stop-color="#9c6c16"/>
          </radialGradient>
          <radialGradient id="sealGlow" cx="30%" cy="22%" r="42%">
            <stop offset="0%" stop-color="#fff3d2" stop-opacity=".5"/>
            <stop offset="100%" stop-color="#fff3d2" stop-opacity="0"/>
          </radialGradient>
          <filter id="sealGrain" x="0" y="0" width="100%" height="100%">
            <feTurbulence type="fractalNoise" baseFrequency="1.4" numOctaves="3" seed="7" result="n"/>
            <feColorMatrix in="n" type="saturate" values="0"/>
          </filter>
          <clipPath id="sealClip"><path d="M93.50 46.20Q93.89 50.00 93.64 53.82Q93.38 57.65 91.85 61.16Q90.31 64.67 88.42 67.88Q86.54 71.10 84.49 74.16Q82.43 77.22 79.26 79.16Q76.09 81.10 73.16 83.06Q70.22 85.02 67.37 87.45Q64.51 89.87 61.02 91.28Q57.53 92.69 53.76 93.34Q50.00 93.99 46.27 93.14Q42.54 92.29 39.18 90.63Q35.82 88.97 32.21 88.02Q28.60 87.07 25.38 85.13Q22.15 83.18 19.72 80.32Q17.29 77.45 15.01 74.48Q12.73 71.52 11.40 68.03Q10.07 64.54 9.15 60.95Q8.24 57.36 8.09 53.68Q7.94 50.00 9.23 46.52Q10.51 43.04 11.06 39.53Q11.60 36.02 12.08 32.20Q12.56 28.38 14.41 25.04Q16.26 21.69 18.84 18.81Q21.42 15.94 24.91 14.27Q28.40 12.60 32.01 11.55Q35.62 10.50 39.09 9.16Q42.56 7.82 46.28 7.93Q50.00 8.04 53.58 8.73Q57.16 9.42 60.81 9.84Q64.46 10.26 67.89 11.67Q71.31 13.09 74.50 15.05Q77.68 17.01 80.07 19.89Q82.45 22.77 83.80 26.24Q85.15 29.70 87.30 32.67Q89.44 35.65 91.28 39.02Q93.11 42.40 93.50 46.20Z"/></clipPath>
        </defs>
        <path d="M93.50 46.20Q93.89 50.00 93.64 53.82Q93.38 57.65 91.85 61.16Q90.31 64.67 88.42 67.88Q86.54 71.10 84.49 74.16Q82.43 77.22 79.26 79.16Q76.09 81.10 73.16 83.06Q70.22 85.02 67.37 87.45Q64.51 89.87 61.02 91.28Q57.53 92.69 53.76 93.34Q50.00 93.99 46.27 93.14Q42.54 92.29 39.18 90.63Q35.82 88.97 32.21 88.02Q28.60 87.07 25.38 85.13Q22.15 83.18 19.72 80.32Q17.29 77.45 15.01 74.48Q12.73 71.52 11.40 68.03Q10.07 64.54 9.15 60.95Q8.24 57.36 8.09 53.68Q7.94 50.00 9.23 46.52Q10.51 43.04 11.06 39.53Q11.60 36.02 12.08 32.20Q12.56 28.38 14.41 25.04Q16.26 21.69 18.84 18.81Q21.42 15.94 24.91 14.27Q28.40 12.60 32.01 11.55Q35.62 10.50 39.09 9.16Q42.56 7.82 46.28 7.93Q50.00 8.04 53.58 8.73Q57.16 9.42 60.81 9.84Q64.46 10.26 67.89 11.67Q71.31 13.09 74.50 15.05Q77.68 17.01 80.07 19.89Q82.45 22.77 83.80 26.24Q85.15 29.70 87.30 32.67Q89.44 35.65 91.28 39.02Q93.11 42.40 93.50 46.20Z" fill="url(#sealWax)"/>
        <g clip-path="url(#sealClip)">
          <rect width="100" height="100" filter="url(#sealGrain)" opacity=".13" style="mix-blend-mode:overlay"/>
          <circle cx="50" cy="50" r="50" fill="url(#sealGlow)"/>
        </g>
        <path d="M93.50 46.20Q93.89 50.00 93.64 53.82Q93.38 57.65 91.85 61.16Q90.31 64.67 88.42 67.88Q86.54 71.10 84.49 74.16Q82.43 77.22 79.26 79.16Q76.09 81.10 73.16 83.06Q70.22 85.02 67.37 87.45Q64.51 89.87 61.02 91.28Q57.53 92.69 53.76 93.34Q50.00 93.99 46.27 93.14Q42.54 92.29 39.18 90.63Q35.82 88.97 32.21 88.02Q28.60 87.07 25.38 85.13Q22.15 83.18 19.72 80.32Q17.29 77.45 15.01 74.48Q12.73 71.52 11.40 68.03Q10.07 64.54 9.15 60.95Q8.24 57.36 8.09 53.68Q7.94 50.00 9.23 46.52Q10.51 43.04 11.06 39.53Q11.60 36.02 12.08 32.20Q12.56 28.38 14.41 25.04Q16.26 21.69 18.84 18.81Q21.42 15.94 24.91 14.27Q28.40 12.60 32.01 11.55Q35.62 10.50 39.09 9.16Q42.56 7.82 46.28 7.93Q50.00 8.04 53.58 8.73Q57.16 9.42 60.81 9.84Q64.46 10.26 67.89 11.67Q71.31 13.09 74.50 15.05Q77.68 17.01 80.07 19.89Q82.45 22.77 83.80 26.24Q85.15 29.70 87.30 32.67Q89.44 35.65 91.28 39.02Q93.11 42.40 93.50 46.20Z" fill="none" stroke="url(#sealRim)" stroke-width="4"/>
        <path d="M85.29 46.31Q85.91 50.00 85.56 53.74Q85.22 57.49 83.97 61.03Q82.71 64.56 80.50 67.56Q78.29 70.55 76.09 73.54Q73.89 76.53 70.88 78.74Q67.86 80.94 64.28 81.92Q60.69 82.91 57.19 83.98Q53.69 85.06 49.97 85.37Q46.25 85.68 42.54 85.03Q38.83 84.37 35.39 82.82Q31.95 81.26 29.35 78.54Q26.75 75.82 24.20 73.21Q21.65 70.60 19.43 67.60Q17.22 64.60 16.42 60.95Q15.63 57.31 15.15 53.65Q14.67 50.00 14.87 46.29Q15.06 42.57 16.12 38.98Q17.18 35.39 18.91 32.03Q20.64 28.67 23.64 26.36Q26.64 24.06 29.70 22.09Q32.75 20.13 35.85 18.06Q38.95 16.00 42.61 15.27Q46.27 14.55 50.00 14.55Q53.73 14.55 57.37 15.32Q61.02 16.09 64.37 17.69Q67.72 19.30 70.97 21.21Q74.21 23.11 76.39 26.18Q78.57 29.24 79.97 32.64Q81.36 36.04 83.02 39.33Q84.68 42.63 85.29 46.31Z" fill="url(#sealField)" stroke="#6d4a08" stroke-opacity=".42" stroke-width="1.5"/>
        <path d="M85.29 46.31Q85.91 50.00 85.56 53.74Q85.22 57.49 83.97 61.03Q82.71 64.56 80.50 67.56Q78.29 70.55 76.09 73.54Q73.89 76.53 70.88 78.74Q67.86 80.94 64.28 81.92Q60.69 82.91 57.19 83.98Q53.69 85.06 49.97 85.37Q46.25 85.68 42.54 85.03Q38.83 84.37 35.39 82.82Q31.95 81.26 29.35 78.54Q26.75 75.82 24.20 73.21Q21.65 70.60 19.43 67.60Q17.22 64.60 16.42 60.95Q15.63 57.31 15.15 53.65Q14.67 50.00 14.87 46.29Q15.06 42.57 16.12 38.98Q17.18 35.39 18.91 32.03Q20.64 28.67 23.64 26.36Q26.64 24.06 29.70 22.09Q32.75 20.13 35.85 18.06Q38.95 16.00 42.61 15.27Q46.27 14.55 50.00 14.55Q53.73 14.55 57.37 15.32Q61.02 16.09 64.37 17.69Q67.72 19.30 70.97 21.21Q74.21 23.11 76.39 26.18Q78.57 29.24 79.97 32.64Q81.36 36.04 83.02 39.33Q84.68 42.63 85.29 46.31Z" fill="none" stroke="#ffe6b4" stroke-opacity=".3" stroke-width="1" transform="translate(.7 .9)"/>
        <g fill="#75500a" fill-opacity=".55" transform="translate(.7 .8)"><circle cx="82.00" cy="50.00" r="1.35"/><circle cx="81.20" cy="57.12" r="1.35"/><circle cx="78.83" cy="63.88" r="1.35"/><circle cx="75.02" cy="69.95" r="1.35"/><circle cx="69.95" cy="75.02" r="1.35"/><circle cx="63.88" cy="78.83" r="1.35"/><circle cx="57.12" cy="81.20" r="1.35"/><circle cx="50.00" cy="82.00" r="1.35"/><circle cx="42.88" cy="81.20" r="1.35"/><circle cx="36.12" cy="78.83" r="1.35"/><circle cx="30.05" cy="75.02" r="1.35"/><circle cx="24.98" cy="69.95" r="1.35"/><circle cx="21.17" cy="63.88" r="1.35"/><circle cx="18.80" cy="57.12" r="1.35"/><circle cx="18.00" cy="50.00" r="1.35"/><circle cx="18.80" cy="42.88" r="1.35"/><circle cx="21.17" cy="36.12" r="1.35"/><circle cx="24.98" cy="30.05" r="1.35"/><circle cx="30.05" cy="24.98" r="1.35"/><circle cx="36.12" cy="21.17" r="1.35"/><circle cx="42.88" cy="18.80" r="1.35"/><circle cx="50.00" cy="18.00" r="1.35"/><circle cx="57.12" cy="18.80" r="1.35"/><circle cx="63.88" cy="21.17" r="1.35"/><circle cx="69.95" cy="24.98" r="1.35"/><circle cx="75.02" cy="30.05" r="1.35"/><circle cx="78.83" cy="36.12" r="1.35"/><circle cx="81.20" cy="42.88" r="1.35"/></g>
        <g fill="#ffe7b0" fill-opacity=".5" transform="translate(-.55 -.65)"><circle cx="82.00" cy="50.00" r="1.35"/><circle cx="81.20" cy="57.12" r="1.35"/><circle cx="78.83" cy="63.88" r="1.35"/><circle cx="75.02" cy="69.95" r="1.35"/><circle cx="69.95" cy="75.02" r="1.35"/><circle cx="63.88" cy="78.83" r="1.35"/><circle cx="57.12" cy="81.20" r="1.35"/><circle cx="50.00" cy="82.00" r="1.35"/><circle cx="42.88" cy="81.20" r="1.35"/><circle cx="36.12" cy="78.83" r="1.35"/><circle cx="30.05" cy="75.02" r="1.35"/><circle cx="24.98" cy="69.95" r="1.35"/><circle cx="21.17" cy="63.88" r="1.35"/><circle cx="18.80" cy="57.12" r="1.35"/><circle cx="18.00" cy="50.00" r="1.35"/><circle cx="18.80" cy="42.88" r="1.35"/><circle cx="21.17" cy="36.12" r="1.35"/><circle cx="24.98" cy="30.05" r="1.35"/><circle cx="30.05" cy="24.98" r="1.35"/><circle cx="36.12" cy="21.17" r="1.35"/><circle cx="42.88" cy="18.80" r="1.35"/><circle cx="50.00" cy="18.00" r="1.35"/><circle cx="57.12" cy="18.80" r="1.35"/><circle cx="63.88" cy="21.17" r="1.35"/><circle cx="69.95" cy="24.98" r="1.35"/><circle cx="75.02" cy="30.05" r="1.35"/><circle cx="78.83" cy="36.12" r="1.35"/><circle cx="81.20" cy="42.88" r="1.35"/></g>
        <g fill="#c28f2b"><circle cx="82.00" cy="50.00" r="1.35"/><circle cx="81.20" cy="57.12" r="1.35"/><circle cx="78.83" cy="63.88" r="1.35"/><circle cx="75.02" cy="69.95" r="1.35"/><circle cx="69.95" cy="75.02" r="1.35"/><circle cx="63.88" cy="78.83" r="1.35"/><circle cx="57.12" cy="81.20" r="1.35"/><circle cx="50.00" cy="82.00" r="1.35"/><circle cx="42.88" cy="81.20" r="1.35"/><circle cx="36.12" cy="78.83" r="1.35"/><circle cx="30.05" cy="75.02" r="1.35"/><circle cx="24.98" cy="69.95" r="1.35"/><circle cx="21.17" cy="63.88" r="1.35"/><circle cx="18.80" cy="57.12" r="1.35"/><circle cx="18.00" cy="50.00" r="1.35"/><circle cx="18.80" cy="42.88" r="1.35"/><circle cx="21.17" cy="36.12" r="1.35"/><circle cx="24.98" cy="30.05" r="1.35"/><circle cx="30.05" cy="24.98" r="1.35"/><circle cx="36.12" cy="21.17" r="1.35"/><circle cx="42.88" cy="18.80" r="1.35"/><circle cx="50.00" cy="18.00" r="1.35"/><circle cx="57.12" cy="18.80" r="1.35"/><circle cx="63.88" cy="21.17" r="1.35"/><circle cx="69.95" cy="24.98" r="1.35"/><circle cx="75.02" cy="30.05" r="1.35"/><circle cx="78.83" cy="36.12" r="1.35"/><circle cx="81.20" cy="42.88" r="1.35"/></g>
        <path d="M75.77 46.64Q76.46 50.00 75.69 53.34Q74.91 56.68 73.52 59.72Q72.12 62.77 70.41 65.74Q68.71 68.71 65.88 70.66Q63.05 72.61 59.86 73.76Q56.68 74.92 53.34 75.40Q50.00 75.89 46.64 75.48Q43.28 75.07 40.03 73.99Q36.77 72.92 34.27 70.58Q31.76 68.24 29.82 65.50Q27.88 62.77 26.16 59.81Q24.45 56.85 24.17 53.42Q23.90 50.00 24.49 46.66Q25.08 43.32 26.33 40.19Q27.58 37.05 29.61 34.35Q31.65 31.65 34.21 29.36Q36.77 27.08 40.05 26.09Q43.32 25.09 46.66 24.77Q50.00 24.46 53.42 24.45Q56.85 24.45 59.95 25.92Q63.05 27.39 65.65 29.58Q68.24 31.76 70.33 34.41Q72.42 37.05 73.75 40.17Q75.07 43.28 75.77 46.64Z" fill="none" stroke="#6d4a08" stroke-opacity=".32" stroke-width=".9"/>
        <path d="M75.77 46.64Q76.46 50.00 75.69 53.34Q74.91 56.68 73.52 59.72Q72.12 62.77 70.41 65.74Q68.71 68.71 65.88 70.66Q63.05 72.61 59.86 73.76Q56.68 74.92 53.34 75.40Q50.00 75.89 46.64 75.48Q43.28 75.07 40.03 73.99Q36.77 72.92 34.27 70.58Q31.76 68.24 29.82 65.50Q27.88 62.77 26.16 59.81Q24.45 56.85 24.17 53.42Q23.90 50.00 24.49 46.66Q25.08 43.32 26.33 40.19Q27.58 37.05 29.61 34.35Q31.65 31.65 34.21 29.36Q36.77 27.08 40.05 26.09Q43.32 25.09 46.66 24.77Q50.00 24.46 53.42 24.45Q56.85 24.45 59.95 25.92Q63.05 27.39 65.65 29.58Q68.24 31.76 70.33 34.41Q72.42 37.05 73.75 40.17Q75.07 43.28 75.77 46.64Z" fill="none" stroke="#ffe6b4" stroke-opacity=".3" stroke-width=".7" transform="translate(.5 .6)"/>
        <g font-family="'Playfair Display',serif" font-size="30" font-weight="600" font-style="italic" text-anchor="middle" letter-spacing="-3">
          <text x="50.9" y="61.8" fill="#4f3204" fill-opacity=".55">DS</text>
          <text x="49.1" y="60.1" fill="#ffeec4" fill-opacity=".55">DS</text>
          <text x="50" y="60.9" fill="#cf9d3d">DS</text>
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
