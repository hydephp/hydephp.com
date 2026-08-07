<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rebuilding the publish command for version three · HydePHP Blog</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,opsz,wght@0,5..1200,400..900;1,5..1200,400..900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=JetBrains+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Instrument Sans', system-ui, sans-serif;
      -webkit-font-smoothing: antialiased;
    }

    .font-playfair {
      font-family: 'Playfair Display', serif;
      opacity: .9;
    }

    .font-mono {
      font-family: 'JetBrains Mono', monospace;
    }

    ::selection {
      background: #8d7bf5;
      color: #14111c;
    }

    .opener::first-letter {
      font-family: 'Playfair Display', serif;
      opacity: .9;
      font-weight: 500;
      font-size: 4.2rem;
      line-height: .82;
      color: #d6a24a;
      float: left;
      padding: 8px 14px 0 0;
    }

    @media (prefers-reduced-motion: reduce) {
      .progress {
        transition: none;
      }
    }
  </style>
</head>

<body class="bg-[#14111c] text-[17.5px] leading-[1.75] text-[#e9e5f2]">

  <nav class="sticky top-0 z-50 border-b border-[rgba(164,156,186,.16)] bg-[#14111c]/85 backdrop-blur-xl relative">
    <div class="mx-auto flex h-16 max-w-[1160px] items-center gap-7 px-7">
      <a class="font-playfair flex items-center gap-2.5 text-[1.25rem] font-semibold no-underline" href="#">
        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" aria-hidden="true" class="block">
          <ellipse cx="13" cy="20" rx="11" ry="3" fill="#d6a24a" />
          <rect x="6.5" y="5" width="13" height="15" rx="2" fill="#8d7bf5" />
          <rect x="6.5" y="16" width="13" height="2.5" fill="#d6a24a" />
        </svg>
        HydePHP
      </a>
      <div class="ml-auto flex items-center gap-6">
        <a class="hidden text-[.92rem] text-[#a49cba] no-underline transition-colors hover:text-white sm:inline" href="#">Docs</a>
        <a class="hidden text-[.92rem] text-[#a49cba] no-underline transition-colors hover:text-white sm:inline" href="#">About</a>
        <a class="hidden border-b-2 border-transparent [border-image:linear-gradient(to_right,#d6a24a,#8d7bf5)_1] pb-0.5 text-[.92rem] text-white no-underline sm:inline" href="#">Blog</a>
        <a class="hidden text-[.92rem] text-[#a49cba] no-underline transition-colors hover:text-white sm:inline" href="#">GitHub</a>
        <a class="rounded-full bg-[#d6a24a] px-4 py-[7px] text-[.92rem] font-semibold text-[#14111c] no-underline transition-colors hover:bg-[#e5b25e] hover:text-[#14111c]" href="#">Get started</a>
      </div>
    </div>
    <div class="progress absolute left-0 -bottom-px h-0.5 w-0 bg-gradient-to-r from-[#d6a24a] to-[#8d7bf5] shadow-[0_0_12px_rgba(214,162,74,.4)]" id="progress"></div>
  </nav>

  <header class="pt-14 text-center sm:pt-20" style="background: radial-gradient(640px 300px at 50% -10%, rgba(141,123,245,.11), transparent 70%);">
    <div class="mx-auto max-w-[1160px] px-7">
      <p class="font-mono text-[.72rem] uppercase tracking-[.16em] text-[#a49cba]">
        <a class="text-[#a49cba] no-underline hover:text-white" href="#">Notes &amp; Dispatches</a><b class="px-1.5 font-normal text-[#d6a24a]">/</b>Devlog
      </p>
      <span class="font-mono mt-[26px] inline-block rounded-full border border-[rgba(141,123,245,.4)] px-3.5 py-1 text-[.68rem] uppercase tracking-[.16em] text-[#8d7bf5]">Devlog</span>
      <h1 class="font-playfair mx-auto mt-5 max-w-[19ch] text-[clamp(2.2rem,5.2vw,3.7rem)] font-[420] leading-[1.07] tracking-[-.014em]">Rebuilding the publish command for version three</h1>
      <p class="mx-auto mt-5 max-w-[54ch] text-[1.12rem] leading-[1.6] text-[#a49cba]">One command now does the work of three. Why the old publish commands had to go, how the interactive picker works, and what designing a command surface actually means.</p>
      <div class="mt-8 flex flex-wrap items-center justify-center gap-3.5 text-[.88rem] text-[#a49cba]">
        <span class="font-playfair flex h-[38px] w-[38px] flex-none items-center justify-center rounded-full bg-[radial-gradient(circle_at_32%_28%,#8d7bf5,#5e50b8)] font-medium italic text-white" aria-hidden="true">E</span>
        <span><b class="font-semibold text-[#e9e5f2]">Emma De Silva</b></span>
        <span class="text-[#252031]">·</span>
        <span>July 2, 2026</span>
        <span class="text-[#252031]">·</span>
        <span>8 min read</span>
      </div>
      <div class="mx-auto mt-11 h-px max-w-[220px] bg-gradient-to-r from-transparent via-[#d6a24a] to-transparent"></div>
    </div>
  </header>

  <article class="mx-auto max-w-[720px] px-7 py-14 pb-20">
    <p class="opener mt-5 text-[#d6d0e4]">Hyde has always let you publish vendor files into your project, taking templates and configs that ship inside the framework and copying them into your codebase where you can edit them. The feature is good. The interface to it grew like ivy. By version two we had three separate commands doing variations of the same job:</p>

    <div class="mt-[26px] overflow-hidden rounded-[10px] border border-[rgba(164,156,186,.16)] bg-[#1c1827]">
      <div class="font-mono flex items-center gap-2 border-b border-[rgba(164,156,186,.16)] px-4 py-2.5 text-[.72rem] text-[#a49cba]">
        <span class="flex gap-[5px]"><i class="block h-2 w-2 rounded-full bg-[#252031]"></i><i class="block h-2 w-2 rounded-full bg-[#252031]"></i><i class="block h-2 w-2 rounded-full bg-[#252031]"></i></span>
        the old way
      </div>
      <pre class="font-mono overflow-x-auto px-5 py-[18px] text-[.82rem] leading-[1.8] text-[#d8d2e8]"><span class="text-[#d6a24a]">$</span> php hyde <span class="text-[#6f6786] line-through">publish:homepage</span>
<span class="text-[#d6a24a]">$</span> php hyde <span class="text-[#6f6786] line-through">publish:views</span>
<span class="text-[#d6a24a]">$</span> php hyde <span class="text-[#6f6786] line-through">publish:configs</span></pre>
    </div>

    <p class="mt-5 text-[#d6d0e4]">Each one had its own flags, its own prompts, and its own slightly different idea of what "publishing" meant. None of them were wrong. Together, they were a maze.</p>

    <h2 class="font-playfair mt-14 text-[1.75rem] font-[470] tracking-[-.01em]">Three front doors is zero front doors</h2>
    <p class="mt-5 text-[#d6d0e4]">The problem with parallel commands is discovery. A newcomer running <code class="font-mono whitespace-nowrap rounded-[5px] border border-[rgba(164,156,186,.16)] bg-[#252031] px-1.5 py-[1.5px] text-[.82em] text-[#e9e5f2]">php hyde list</code> sees three publish entries and has to reverse-engineer the taxonomy before they can act. Is a homepage a view? Are configs publishable per-file? The command list, which should be a map, becomes a quiz.</p>
    <p class="mt-5 text-[#d6d0e4]">A CLI is an API with a human on the other end, and it deserves the same design care. When we review a PHP interface we ask whether the method names reveal the model. The old publish commands revealed the git history instead: each was added when a need appeared, named for the moment rather than the whole.</p>

    <blockquote class="font-playfair mt-9 border-l-2 border-transparent py-1.5 pl-7 text-[1.35rem] italic leading-[1.45] text-[#e9e5f2] [border-image:linear-gradient(to_bottom,#d6a24a,#8d7bf5)_1]">A command surface should describe what the tool believes, and Hyde believes publishing is one action with many targets.</blockquote>

    <h2 class="font-playfair mt-14 text-[1.75rem] font-[470] tracking-[-.01em]">The new shape</h2>
    <p class="mt-5 text-[#d6d0e4]">Version three collapses everything into a single verb. Run it bare and Hyde asks what you want, using the same prompt toolkit Laravel developers already know:</p>

    <div class="mt-[26px] overflow-hidden rounded-[10px] border border-[rgba(164,156,186,.16)] bg-[#1c1827]">
      <div class="font-mono flex items-center gap-2 border-b border-[rgba(164,156,186,.16)] px-4 py-2.5 text-[.72rem] text-[#a49cba]">
        <span class="flex gap-[5px]"><i class="block h-2 w-2 rounded-full bg-[#252031]"></i><i class="block h-2 w-2 rounded-full bg-[#252031]"></i><i class="block h-2 w-2 rounded-full bg-[#252031]"></i></span>
        hyde ~ zsh
      </div>
      <pre class="font-mono overflow-x-auto px-5 py-[18px] text-[.82rem] leading-[1.8] text-[#d8d2e8]"><span class="text-[#d6a24a]">$</span> php hyde <span class="text-[#8d7bf5]">publish</span>

 <span class="text-[#6f6786]">Which group would you like to publish?</span>
 <span class="text-[#8fce8f]">❯</span> views    <span class="text-[#6f6786]">Blade templates and components</span>
   configs  <span class="text-[#6f6786]">Configuration files</span>
   layouts  <span class="text-[#6f6786]">Page and homepage layouts</span></pre>
    </div>

    <p class="mt-5 text-[#d6d0e4]">Know what you want? Name it. Want a single file? Pass a path fragment and Hyde matches it against everything publishable, so you never copy fourteen templates to edit one:</p>

    <div class="mt-[26px] overflow-hidden rounded-[10px] border border-[rgba(164,156,186,.16)] bg-[#1c1827]">
      <div class="font-mono flex items-center gap-2 border-b border-[rgba(164,156,186,.16)] px-4 py-2.5 text-[.72rem] text-[#a49cba]">
        <span class="flex gap-[5px]"><i class="block h-2 w-2 rounded-full bg-[#252031]"></i><i class="block h-2 w-2 rounded-full bg-[#252031]"></i><i class="block h-2 w-2 rounded-full bg-[#252031]"></i></span>
        hyde ~ zsh
      </div>
      <pre class="font-mono overflow-x-auto px-5 py-[18px] text-[.82rem] leading-[1.8] text-[#d8d2e8]"><span class="text-[#d6a24a]">$</span> php hyde <span class="text-[#8d7bf5]">publish</span> views navigation
<span class="text-[#8fce8f]">✓ Published components/navigation.blade.php</span></pre>
    </div>

    <p class="mt-5 text-[#d6d0e4]">The published file lands in your project as plain Blade, yours to reshape:</p>

    <div class="mt-[26px] overflow-hidden rounded-[10px] border border-[rgba(43,36,51,.14)] bg-[#ece7da] text-[#2b2433] shadow-[0_16px_40px_-24px_rgba(0,0,0,.6)]">
      <div class="font-mono flex items-center border-b border-[rgba(43,36,51,.14)] px-4 pt-2 text-[.72rem] text-[#6d6478]">
        <span class="translate-y-px rounded-t-md border border-b-0 border-[rgba(43,36,51,.14)] bg-[#e3ddcd] px-3 py-1 text-[#2b2433]">resources/views/vendor/hyde/components/navigation.blade.php</span>
        <span class="ml-auto pb-2">blade</span>
      </div>
      <pre class="font-mono overflow-x-auto px-5 py-[18px] text-[.82rem] leading-[1.8]"><span class="italic text-[#8a7f70]">{{-- Now yours. Edit freely, Hyde uses this copy from here on. --}}</span>
&lt;<span class="text-[#7a5cc4]">nav</span> <span class="text-[#7a5cc4]">aria-label</span>=<span class="text-[#8a6d3b]">"Main navigation"</span>&gt;
    @@foreach($navigation-&gt;items as $item)
        &lt;<span class="text-[#7a5cc4]">x-hyde::nav-link</span> <span class="text-[#7a5cc4]">:item</span>=<span class="text-[#8a6d3b]">"$item"</span> /&gt;
    @@endforeach
&lt;/<span class="text-[#7a5cc4]">nav</span>&gt;</pre>
    </div>

    <h2 class="font-playfair mt-14 text-[1.75rem] font-[470] tracking-[-.01em]">What we removed, and how</h2>
    <p class="mt-5 text-[#d6d0e4]">Deleting public API is a promise-keeping exercise, so the removal follows the same rules as every Hyde release:</p>
    <ul class="ml-1 mt-4 list-none">
      <li class="relative py-[6px] pl-6 text-[#d6d0e4] before:absolute before:left-0 before:top-[17px] before:h-0.5 before:w-2.5 before:bg-[#d6a24a] before:content-['']">The old command names keep working in v3 as aliases that forward to the new command.</li>
      <li class="relative py-[6px] pl-6 text-[#d6d0e4] before:absolute before:left-0 before:top-[17px] before:h-0.5 before:w-2.5 before:bg-[#d6a24a] before:content-['']">Calling an alias prints a one-line notice with the modern equivalent, once per session, never nagging.</li>
      <li class="relative py-[6px] pl-6 text-[#d6d0e4] before:absolute before:left-0 before:top-[17px] before:h-0.5 before:w-2.5 before:bg-[#d6a24a] before:content-['']">The upgrade guide documents every renamed flag with a before-and-after table.</li>
    </ul>
    <p class="mt-5 text-[#d6d0e4]">We also said no to some things along the way. A generic <code class="font-mono whitespace-nowrap rounded-[5px] border border-[rgba(164,156,186,.16)] bg-[#252031] px-1.5 py-[1.5px] text-[.82em] text-[#e9e5f2]">--config</code> override flag was proposed and rejected, because a flag that can change anything documents nothing. That decision got its own <a class="border-b border-[#5e50b8] text-[#8d7bf5] no-underline" href="#">write-up in May</a>.</p>

    <h2 class="font-playfair mt-14 text-[1.75rem] font-[470] tracking-[-.01em]">The lesson for your own tools</h2>
    <p class="mt-5 text-[#d6d0e4]">If you maintain a CLI, run <code class="font-mono whitespace-nowrap rounded-[5px] border border-[rgba(164,156,186,.16)] bg-[#252031] px-1.5 py-[1.5px] text-[.82em] text-[#e9e5f2]">list</code> on it and read the output as a stranger. Every command that makes a newcomer ask "how is this different from that one?" is a design debt with compounding interest. Merging three commands into one deleted code, deleted docs, and deleted a whole category of confused issues before they could be filed.</p>
    <p class="mt-5 text-[#d6d0e4]">Version three is being built in the open, and the publish rebuild is on the beta branch now. Try it, break it, and tell me what the picker should do that it doesn't. The issue tracker is the front door, and a human answers it.</p>

    <div class="mt-16 text-center text-[1.1rem] tracking-[.5em] text-[#d6a24a]">🎩</div>

    <div class="mt-14 flex flex-col items-start gap-5 rounded-[14px] border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-7 py-[26px] sm:flex-row">
      <span class="font-playfair flex h-[52px] w-[52px] flex-none items-center justify-center rounded-full bg-[radial-gradient(circle_at_32%_28%,#8d7bf5,#5e50b8)] text-[1.3rem] font-medium italic text-white" aria-hidden="true">E</span>
      <div>
        <h4 class="font-playfair text-[1.15rem] font-[520]">Emma De Silva</h4>
        <p class="mt-1 text-[.9rem] text-[#a49cba]">Creator and maintainer of HydePHP. Laravel contributor, conference speaker, and firm believer that a command line is a user interface.</p>
        <div class="font-mono mt-2.5 flex gap-4 text-[.74rem]">
          <a class="text-[#8d7bf5] underline decoration-[#8d7bf5] underline-offset-[6px] transition-colors hover:text-white" href="#">↗ GitHub</a>
          <a class="text-[#8d7bf5] underline decoration-[#8d7bf5] underline-offset-[6px] transition-colors hover:text-white" href="#">↗ emma.desilva.se</a>
          <a class="text-[#8d7bf5] underline decoration-[#8d7bf5] underline-offset-[6px] transition-colors hover:text-white" href="#">↗ More dispatches</a>
        </div>
      </div>
    </div>

    <div class="font-mono mt-11 flex flex-wrap justify-center gap-6 text-[.78rem]">
      <a class="text-[#a49cba] underline decoration-[#8d7bf5] underline-offset-[7px] transition-colors hover:text-white" href="#"><b class="font-normal text-[#d6a24a]">↗</b> Discuss on GitHub</a>
      <a class="text-[#a49cba] underline decoration-[#8d7bf5] underline-offset-[7px] transition-colors hover:text-white" href="#"><b class="font-normal text-[#d6a24a]">↗</b> Share this dispatch</a>
      <a class="text-[#a49cba] underline decoration-[#8d7bf5] underline-offset-[7px] transition-colors hover:text-white" href="#"><b class="font-normal text-[#d6a24a]">↗</b> Subscribe by RSS</a>
    </div>

    <nav class="mt-14 grid grid-cols-1 gap-4 sm:grid-cols-2" aria-label="Adjacent posts">
      <a class="rounded-xl border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-[22px] py-[18px] no-underline transition-colors hover:border-[#5e50b8]" href="#">
        <span class="font-mono text-[.68rem] uppercase tracking-[.18em] text-[#a49cba]">← Previous dispatch</span>
        <div class="font-playfair mt-1.5 text-[1.1rem] font-medium text-[#8d7bf5]">Writing design docs for AI agents</div>
      </a>
      <a class="rounded-xl border border-[rgba(164,156,186,.16)] bg-[#1c1827] px-[22px] py-[18px] text-left no-underline transition-colors hover:border-[#5e50b8] sm:text-right" href="#">
        <span class="font-mono text-[.68rem] uppercase tracking-[.18em] text-[#a49cba]">Next dispatch →</span>
        <div class="font-playfair mt-1.5 text-[1.1rem] font-medium text-[#8d7bf5]">Coming soon</div>
      </a>
    </nav>
  </article>

  <footer class="mt-20 border-t border-[rgba(164,156,186,.16)] py-[34px] text-[.85rem] text-[#a49cba]">
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
    (function() {
      const bar = document.getElementById('progress');

      function update() {
        const h = document.documentElement;
        const max = h.scrollHeight - h.clientHeight;
        bar.style.width = (max > 0 ? (h.scrollTop / max) * 100 : 0) + '%';
      }
      document.addEventListener('scroll', update, {
        passive: true
      });
      update();
    })();
  </script>
</body>

</html>