<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About · HydePHP</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght,SOFT,WONK@0,9..144,300..900,0..100,0..1;1,9..144,300..900,0..100,0..1&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=JetBrains+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
<style>
:root{
  --ink:#14111c;
  --ink-2:#1c1827;
  --ink-3:#252031;
  --paper:#ece7da;
  --paper-2:#e3ddcd;
  --paper-ink:#2b2433;
  --violet:#8d7bf5;
  --violet-dim:#5e50b8;
  --gold:#d6a24a;
  --fog:#a49cba;
  --line:rgba(164,156,186,.16);
  --line-paper:rgba(43,36,51,.14);
}
*{margin:0;padding:0;box-sizing:border-box}
body{
  background:var(--ink);
  color:#e9e5f2;
  font-family:'Instrument Sans',system-ui,sans-serif;
  font-size:17px;
  line-height:1.7;
  -webkit-font-smoothing:antialiased;
}
::selection{background:var(--violet);color:var(--ink)}
a{color:inherit}
.mono{font-family:'JetBrains Mono',monospace}
.wrap{max-width:1160px;margin:0 auto;padding:0 28px}
.narrow{max-width:720px;margin:0 auto;padding:0 28px}

/* ---------- Nav ---------- */
nav{
  position:sticky;top:0;z-index:50;
  background:color-mix(in srgb, var(--ink) 86%, transparent);
  backdrop-filter:blur(12px);
  border-bottom:1px solid var(--line);
}
.nav-inner{display:flex;align-items:center;gap:28px;height:64px}
.wordmark{
  display:flex;align-items:center;gap:10px;text-decoration:none;
  font-family:'Fraunces',serif;font-weight:600;font-size:1.25rem;
  font-variation-settings:'opsz' 40,'SOFT' 30;
}
.nav-links{display:flex;gap:24px;margin-left:auto;align-items:center}
.nav-links a{text-decoration:none;font-size:.92rem;color:var(--fog);transition:color .15s}
.nav-links a:hover{color:#fff}
.nav-links a.here{color:#fff;border-bottom:2px solid transparent;border-image:linear-gradient(to right,var(--gold),var(--violet)) 1;padding-bottom:2px}
.nav-links a.cta{color:var(--ink);background:var(--gold);padding:7px 16px;border-radius:99px;font-weight:600;border:none}
.nav-links a.cta:hover{background:#e5b25e;color:var(--ink)}

/* ---------- Hero ---------- */
.hero{
  padding:96px 0 84px;text-align:center;
  background:radial-gradient(700px 340px at 50% -10%, rgba(141,123,245,.12), transparent 70%);
}
.eyebrow{
  font-family:'JetBrains Mono',monospace;font-size:.74rem;letter-spacing:.22em;
  text-transform:uppercase;color:var(--gold);
}
h1{
  font-family:'Fraunces',serif;font-weight:420;
  font-size:clamp(2.4rem,5.6vw,4.2rem);line-height:1.06;letter-spacing:-.015em;
  margin:22px auto 0;max-width:18ch;
  font-variation-settings:'opsz' 144,'SOFT' 40,'WONK' 1;
}
h1 em{font-style:italic;color:var(--violet);font-variation-settings:'opsz' 144,'SOFT' 100,'WONK' 1}
.hero .sub{color:var(--fog);max-width:52ch;margin:20px auto 0;font-size:1.08rem}

/* ---------- Story ---------- */
.story{padding:40px 0 100px}
.story h2{
  font-family:'Fraunces',serif;font-weight:470;font-size:1.8rem;margin:60px 0 0;
  letter-spacing:-.01em;font-variation-settings:'opsz' 100,'SOFT' 50;
}
.story p{margin-top:18px;color:#d6d0e4}
.story p a{color:var(--violet);text-decoration:none;border-bottom:1px solid var(--violet-dim)}
.story p code{
  font-family:'JetBrains Mono',monospace;font-size:.82em;
  background:var(--ink-3);border:1px solid var(--line);border-radius:5px;
  padding:1.5px 6px;white-space:nowrap;
}
.story .opener::first-letter{
  font-family:'Fraunces',serif;font-weight:500;font-style:normal;
  font-size:4.4rem;line-height:.82;color:var(--gold);
  float:left;padding:8px 14px 0 0;
  font-variation-settings:'opsz' 144,'SOFT' 60,'WONK' 1;
}

/* ---------- Principles ledger ---------- */
.principles{padding:0 0 100px}
.sec-eyebrow{
  font-family:'JetBrains Mono',monospace;font-size:.72rem;letter-spacing:.22em;
  text-transform:uppercase;color:var(--gold);
}
.sec-title{
  font-family:'Fraunces',serif;font-weight:430;font-size:clamp(1.9rem,3.4vw,2.6rem);
  line-height:1.12;margin-top:14px;letter-spacing:-.01em;
  font-variation-settings:'opsz' 100,'SOFT' 40;
}
.ledger{margin-top:48px;border-top:1px solid var(--line)}
.entry{
  display:grid;grid-template-columns:300px 1fr;gap:40px;
  padding:32px 0;border-bottom:1px solid var(--line);
}
.entry h3{
  font-family:'Fraunces',serif;font-weight:480;font-size:1.3rem;
  font-variation-settings:'SOFT' 50;
}
.entry p{color:var(--fog);font-size:.97rem}

/* ---------- The letter ---------- */
.letter-outer{padding:0 0 100px}
.letter{
  max-width:680px;margin:0 auto;
  background:var(--paper);color:var(--paper-ink);
  border-radius:12px;border:1px solid var(--line-paper);
  padding:56px 60px 48px;
  box-shadow:0 40px 90px -40px rgba(0,0,0,.75);
  position:relative;
}
.letter .from{
  font-family:'JetBrains Mono',monospace;font-size:.72rem;letter-spacing:.18em;
  text-transform:uppercase;color:#8a7f70;
}
.letter h2{
  font-family:'Fraunces',serif;font-weight:460;font-size:1.9rem;margin-top:12px;
  letter-spacing:-.01em;font-variation-settings:'opsz' 100,'SOFT' 50;
}
.letter p{margin-top:16px;font-size:.99rem;color:#3b3345}
.letter .sig{
  margin-top:32px;display:flex;align-items:center;gap:18px;
}
.letter .sig-name{
  font-family:'Fraunces',serif;font-style:italic;font-weight:500;font-size:1.4rem;
  font-variation-settings:'opsz' 60,'SOFT' 100,'WONK' 1;
}
.letter .sig-role{font-size:.8rem;color:#8a7f70}
.seal{
  position:absolute;top:44px;right:52px;
  width:58px;height:58px;border-radius:50%;
  background:radial-gradient(circle at 34% 30%, #e5b25e, #b3801f 70%);
  display:flex;align-items:center;justify-content:center;
  box-shadow:inset 0 2px 6px rgba(255,255,255,.35), inset 0 -3px 8px rgba(0,0,0,.3), 0 4px 14px rgba(0,0,0,.2);
}
.seal svg{opacity:.85}

/* ---------- Timeline ---------- */
.timeline-outer{padding:0 0 100px}
.timeline{margin-top:48px;position:relative;padding-left:36px}
.timeline::before{
  content:'';position:absolute;left:8px;top:6px;bottom:6px;width:2px;
  background:linear-gradient(to bottom, var(--gold), var(--violet));
}
.moment{position:relative;padding:0 0 40px}
.moment:last-child{padding-bottom:0}
.moment::before{
  content:'';position:absolute;left:-33.5px;top:8px;
  width:11px;height:11px;border-radius:50%;
  background:var(--ink);border:2px solid var(--gold);
}
.moment .year{
  font-family:'JetBrains Mono',monospace;font-size:.74rem;letter-spacing:.16em;
  color:var(--gold);
}
.moment h3{
  font-family:'Fraunces',serif;font-weight:490;font-size:1.25rem;margin-top:4px;
  font-variation-settings:'SOFT' 50;
}
.moment p{color:var(--fog);font-size:.95rem;margin-top:6px;max-width:56ch}
.moment.now::before{background:var(--violet);border-color:var(--violet);box-shadow:0 0 14px rgba(141,123,245,.6)}

/* ---------- Stewardship ---------- */
.steward{padding:0 0 100px}
.pledges{
  display:grid;grid-template-columns:repeat(4,1fr);gap:1px;
  background:var(--line);border:1px solid var(--line);border-radius:14px;overflow:hidden;
  margin-top:48px;
}
.pledge{background:var(--ink-2);padding:28px 26px}
.pledge .k{
  font-family:'Fraunces',serif;font-weight:440;font-size:1.5rem;
  font-variation-settings:'opsz' 100;
}
.pledge .k i{font-style:italic;color:var(--gold);font-size:1rem}
.pledge p{font-size:.85rem;color:var(--fog);margin-top:8px}

/* ---------- Finale ---------- */
.finale{
  text-align:center;padding:100px 0;
  border-top:1px solid var(--line);
  background:radial-gradient(600px 300px at 50% 0%, rgba(214,162,74,.08), transparent 70%);
}
.finale .sec-title{margin:14px auto 0;max-width:22ch}
.cta-row{display:flex;gap:14px;justify-content:center;align-items:center;flex-wrap:wrap;margin-top:34px}
.cmd{
  display:flex;align-items:center;gap:14px;
  background:var(--ink-2);border:1px solid var(--line);border-radius:10px;
  padding:12px 18px;font-size:.9rem;color:#d8d2e8;
}
.cmd .dollar{color:var(--gold)}
.docs-link{
  font-size:.95rem;color:var(--fog);text-decoration:none;border-bottom:1px solid var(--line);
  padding-bottom:2px;transition:color .15s,border-color .15s;
}
.docs-link:hover{color:#fff;border-color:var(--fog)}
.community{
  display:flex;gap:28px;justify-content:center;margin-top:44px;
  font-family:'JetBrains Mono',monospace;font-size:.8rem;
}
.community a{color:var(--fog);text-decoration:none}
.community a:hover{color:#fff}
.community b{color:var(--violet);font-weight:400}

footer{border-top:1px solid var(--line);padding:34px 0;color:var(--fog);font-size:.85rem}
.foot-inner{display:flex;align-items:center;gap:24px;flex-wrap:wrap}
.foot-inner .links{margin-left:auto;display:flex;gap:20px}
.foot-inner a{text-decoration:none;color:var(--fog)}
.foot-inner a:hover{color:#fff}

/* Reveals */
.reveal{opacity:0;transform:translateY(14px);transition:opacity .6s ease,transform .6s ease}
.reveal.in{opacity:1;transform:none}
@media (prefers-reduced-motion:reduce){
  .reveal{opacity:1;transform:none;transition:none}
}

@media (max-width:900px){
  .entry{grid-template-columns:1fr;gap:10px}
  .pledges{grid-template-columns:1fr 1fr}
}
@media (max-width:640px){
  .nav-links a:not(.cta){display:none}
  .letter{padding:44px 30px 40px}
  .seal{top:30px;right:28px;width:46px;height:46px}
  .pledges{grid-template-columns:1fr}
  .hero{padding:72px 0 60px}
}
</style>
</head>
<body>

<nav>
  <div class="wrap nav-inner">
    <a class="wordmark" href="#">
      <svg width="26" height="26" viewBox="0 0 26 26" fill="none" aria-hidden="true">
        <ellipse cx="13" cy="20" rx="11" ry="3" fill="#d6a24a"/>
        <rect x="6.5" y="5" width="13" height="15" rx="2" fill="#8d7bf5"/>
        <rect x="6.5" y="16" width="13" height="2.5" fill="#d6a24a"/>
      </svg>
      HydePHP
    </a>
    <div class="nav-links">
      <a href="#">Docs</a>
      <a href="#" class="here">About</a>
      <a href="#">Blog</a>
      <a href="#">GitHub</a>
      <a href="#" class="cta">Get started</a>
    </div>
  </div>
</nav>

<header class="hero">
  <div class="wrap">
    <p class="eyebrow">About the project</p>
    <h1>The strange case of a <em>static</em> site generator.</h1>
    <p class="sub">Where Hyde came from, what it believes, and why it will still be here when your next redesign rolls around.</p>
  </div>
</header>

<!-- The story -->
<section class="story narrow reveal">
  <p class="opener">Hyde started with a simple frustration. Jekyll, the Ruby generator that popularized the modern static site, had the right idea: write plain files, run one command, ship folders of HTML. But for a developer who lives in PHP and thinks in Laravel, reaching for a Ruby toolchain every time you want a simple site feels like borrowing a neighbor's kitchen to make toast.</p>
  <p>So Hyde takes Jekyll's philosophy and rebuilds it on the tools Laravel developers already trust. Blade for templating. Artisan-style commands for the workflow. Composer for everything else. The name is a small literary joke with a serious point: Jekyll and Hyde are the same person, and your Markdown and your website are the same file. Hyde just brings out the other side.</p>

  <h2>What Hyde optimizes for</h2>
  <p>Most tools optimize for the first five minutes. Hyde does too, a new project compiles out of the box with zero configuration, but the real design work went into the five years after that. Content lives in plain Markdown files that any tool can read, so nothing you write is held hostage by the generator. The frontend ships complete but every template can be published into your project and made yours. Configuration exists in layers: ignore it entirely, set a few values in YAML, or drop down to full PHP config files when a project demands it.</p>
  <p>That's the pattern everywhere in Hyde. Simple by default, powerful when asked, and never a cliff between the two.</p>

  <h2>What Hyde is not</h2>
  <p>Honesty is cheaper than churn, so here it is. Hyde builds static sites: blogs, documentation, portfolios, marketing pages, anything that can be compiled ahead of time and served as files. If you need user accounts, a checkout flow, or a dashboard that changes by the second, you want full Laravel, and Hyde will wave at you warmly from across the street. Plenty of people run both: Laravel for the app, Hyde for the docs and the blog.</p>
</section>

<!-- Principles -->
<section class="principles wrap reveal">
  <p class="sec-eyebrow">Principles</p>
  <h2 class="sec-title">Opinions we're prepared to defend.</h2>
  <div class="ledger">
    <div class="entry">
      <h3>Zero config until you want it</h3>
      <p>A fresh project builds with no setup at all. Every default is chosen so that doing nothing is a reasonable decision, and every default can be overridden the moment it isn't.</p>
    </div>
    <div class="entry">
      <h3>Your content outlives the tool</h3>
      <p>Everything you write is plain Markdown with standard front matter. If you leave Hyde someday, your files come with you unchanged. Lock-in is a business model, and it isn't ours.</p>
    </div>
    <div class="entry">
      <h3>Boring on purpose</h3>
      <p>Semantic versioning, written upgrade guides, and a test suite that runs on every commit. Excitement belongs in your content, never in your build pipeline.</p>
    </div>
    <div class="entry">
      <h3>Small enough to understand</h3>
      <p>You can read Hyde's source in an afternoon. When something behaves unexpectedly, the answer is in code you can step through, and the architecture docs explain why it's built that way.</p>
    </div>
  </div>
</section>

<!-- Letter from the maintainer -->
<section class="letter-outer wrap reveal">
  <div class="letter">
    <div class="seal" aria-hidden="true">
      <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
        <ellipse cx="13" cy="19" rx="9" ry="2.4" fill="#5c3f0e"/>
        <rect x="7.5" y="6" width="11" height="12.5" rx="1.6" fill="#5c3f0e"/>
      </svg>
    </div>
    <p class="from">A note from the maintainer</p>
    <h2>Why I keep building this</h2>
    <p>I built Hyde because I wanted it to exist, and I maintain it because other people turned out to want it too. That's the whole business plan. There's no venture funding waiting for a return, no telemetry phoning home, no premium tier holding features for ransom. It's MIT licensed, and it stays that way.</p>
    <p>What you get instead is a maintainer who uses Hyde daily, answers issues personally, and treats the documentation as part of the product rather than an apology for it. When you file a bug, a human who knows every line of the codebase reads it.</p>
    <p>Give it twenty minutes. If it doesn't feel right, your Markdown files will work anywhere else. But I don't think you'll need them to.</p>
    <div class="sig">
      <div>
        <div class="sig-name">Emma De Silva</div>
        <div class="sig-role">Creator &amp; maintainer · Laravel contributor</div>
      </div>
    </div>
  </div>
</section>

<!-- Timeline -->
<section class="timeline-outer narrow reveal">
  <p class="sec-eyebrow">The record so far</p>
  <h2 class="sec-title">Four years, versioned carefully.</h2>
  <div class="timeline">
    <div class="moment">
      <span class="year">2022</span>
      <h3>First release</h3>
      <p>Hyde ships as a weekend experiment: Jekyll's workflow, rebuilt on Laravel Zero and Blade. The experiment refuses to stay small.</p>
    </div>
    <div class="moment">
      <span class="year">2023</span>
      <h3>Version 1.0</h3>
      <p>The public API stabilizes under semantic versioning. From here on, upgrades come with guides and breaking changes come with warnings.</p>
    </div>
    <div class="moment">
      <span class="year">2025</span>
      <h3>Version 2.0</h3>
      <p>A leaner core, a refined frontend, and the lessons of two hundred thousand downloads folded back into the architecture.</p>
    </div>
    <div class="moment now">
      <span class="year">2026</span>
      <h3>Version 3, in the open</h3>
      <p>A unified publish command, a cleaner CLI surface, and design documentation written for humans and AI agents alike. Developed in public, as always.</p>
    </div>
  </div>
</section>

<!-- Stewardship -->
<section class="steward wrap reveal">
  <p class="sec-eyebrow">Stewardship</p>
  <h2 class="sec-title">The fine print, in large type.</h2>
  <div class="pledges">
    <div class="pledge">
      <div class="k">MIT</div>
      <p>Free for any use, commercial or personal, forever. No license keys, no seat counts.</p>
    </div>
    <div class="pledge">
      <div class="k">SemVer</div>
      <p>Breaking changes only in major versions, and every major version ships with an upgrade guide.</p>
    </div>
    <div class="pledge">
      <div class="k">0 <i>trackers</i></div>
      <p>No telemetry, no analytics, no calling home. Hyde doesn't know you exist, and prefers it that way.</p>
    </div>
    <div class="pledge">
      <div class="k">100<i>%</i> <i>open</i></div>
      <p>Development, roadmap, and decisions all happen in public on GitHub. Watch, argue, contribute.</p>
    </div>
  </div>
</section>

<!-- Finale -->
<section class="finale">
  <div class="wrap reveal">
    <p class="sec-eyebrow">The other side of this page</p>
    <h2 class="sec-title">You've read enough. Build something.</h2>
    <div class="cta-row">
      <div class="cmd mono">
        <span><span class="dollar">$</span> composer create-project hyde/hyde</span>
      </div>
      <a class="docs-link" href="#">Follow the quickstart</a>
    </div>
    <div class="community">
      <a href="#"><b>↗</b> Star on GitHub</a>
      <a href="#"><b>↗</b> Join the Discord</a>
      <a href="#"><b>↗</b> Read the source</a>
    </div>
  </div>
</section>

<footer>
  <div class="wrap foot-inner">
    <span>Site proudly built with HydePHP 🎩</span>
    <div class="links">
      <a href="#">GitHub</a>
      <a href="#">Discord</a>
      <a href="#">RSS</a>
      <a href="#">Legal</a>
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
