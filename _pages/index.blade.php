<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HydePHP · Markdown with a second nature</title>
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
  --radius:10px;
}
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{
  background:var(--ink);
  color:#e9e5f2;
  font-family:'Instrument Sans',system-ui,sans-serif;
  font-size:17px;
  line-height:1.6;
  -webkit-font-smoothing:antialiased;
}
::selection{background:var(--violet);color:var(--ink)}
a{color:inherit}
button{font:inherit;color:inherit;background:none;border:none;cursor:pointer}
.mono{font-family:'JetBrains Mono',monospace}
.wrap{max-width:1160px;margin:0 auto;padding:0 28px}

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
  font-family:'Fraunces',serif;font-weight:600;font-size:1.25rem;letter-spacing:.01em;
  font-variation-settings:'opsz' 40,'SOFT' 30;
}
.wordmark svg{display:block}
.nav-links{display:flex;gap:24px;margin-left:auto;align-items:center}
.nav-links a{
  text-decoration:none;font-size:.92rem;color:var(--fog);
  transition:color .15s;
}
.nav-links a:hover{color:#fff}
.nav-links a.cta{
  color:var(--ink);background:var(--gold);padding:7px 16px;border-radius:99px;
  font-weight:600;
}
.nav-links a.cta:hover{background:#e5b25e;color:var(--ink)}
.ver{font-size:.72rem;color:var(--violet);border:1px solid var(--violet-dim);border-radius:99px;padding:2px 9px}

/* ---------- Hero ---------- */
.hero{padding:72px 0 20px;text-align:center}
.eyebrow{
  font-family:'JetBrains Mono',monospace;font-size:.74rem;letter-spacing:.22em;
  text-transform:uppercase;color:var(--gold);
}
h1{
  font-family:'Fraunces',serif;
  font-weight:420;
  font-size:clamp(2.6rem,6.2vw,4.9rem);
  line-height:1.04;
  letter-spacing:-.015em;
  margin:22px auto 0;
  max-width:15ch;
  font-variation-settings:'opsz' 144,'SOFT' 40,'WONK' 1;
}
h1 em{
  font-style:italic;color:var(--violet);
  font-variation-settings:'opsz' 144,'SOFT' 100,'WONK' 1;
}
.sub{
  color:var(--fog);max-width:52ch;margin:22px auto 0;font-size:1.08rem;
}
.cta-row{
  display:flex;gap:14px;justify-content:center;align-items:center;flex-wrap:wrap;
  margin-top:34px;
}
.cmd{
  display:flex;align-items:center;gap:14px;
  background:var(--ink-2);border:1px solid var(--line);border-radius:var(--radius);
  padding:12px 18px;font-size:.9rem;color:#d8d2e8;
}
.cmd .dollar{color:var(--gold)}
.cmd button{
  color:var(--fog);font-size:.78rem;border-left:1px solid var(--line);padding-left:14px;
  transition:color .15s;
}
.cmd button:hover{color:#fff}
.cmd button:focus-visible{outline:2px solid var(--violet);outline-offset:2px;border-radius:4px}
.docs-link{
  font-size:.95rem;color:var(--fog);text-decoration:none;border-bottom:1px solid var(--line);
  padding-bottom:2px;transition:color .15s,border-color .15s;
}
.docs-link:hover{color:#fff;border-color:var(--fog)}

/* ---------- The Seam (signature) ---------- */
.stage-outer{padding:54px 0 0}
.hint{
  text-align:center;font-family:'JetBrains Mono',monospace;font-size:.75rem;
  color:var(--fog);letter-spacing:.12em;margin-bottom:14px;
}
.hint b{color:var(--gold);font-weight:400}
.stage{
  position:relative;
  height:560px;
  border:1px solid var(--line);
  border-radius:16px;
  overflow:hidden;
  cursor:col-resize;
  touch-action:none;
  box-shadow:0 40px 90px -40px rgba(0,0,0,.7);
}
.layer{position:absolute;inset:0;overflow:hidden}

/* Jekyll side: the manuscript */
.jekyll{background:var(--paper);color:var(--paper-ink)}
.file-chrome{
  display:flex;align-items:center;gap:10px;
  border-bottom:1px solid var(--line-paper);
  padding:12px 20px;font-family:'JetBrains Mono',monospace;font-size:.76rem;
  color:#6d6478;
}
.file-chrome .tab{
  background:var(--paper-2);border:1px solid var(--line-paper);border-bottom:none;
  border-radius:6px 6px 0 0;padding:5px 14px;color:var(--paper-ink);
  transform:translateY(13px);
}
.file-chrome .dialect{margin-left:auto}
.src{
  padding:34px 0 0;font-family:'JetBrains Mono',monospace;font-size:.86rem;line-height:1.85;
  counter-reset:ln;
}
.src .row{display:flex;padding:0 20px 0 0;white-space:pre-wrap}
.src .row::before{
  counter-increment:ln;content:counter(ln);
  width:56px;flex:none;text-align:right;padding-right:22px;
  color:#a99f92;font-size:.76rem;line-height:2.1;
}
.src .fm{color:#8a7f70}
.src .key{color:#7a5cc4}
.src .h{color:var(--paper-ink);font-weight:700}
.src .li{color:#4c4356}

/* Hyde side: the rendered site */
.hyde{
  background:
    radial-gradient(900px 480px at 78% -10%, rgba(141,123,245,.16), transparent 60%),
    radial-gradient(700px 420px at 95% 100%, rgba(214,162,74,.08), transparent 60%),
    var(--ink-2);
  color:#eae6f4;
}
.site-chrome{
  display:flex;align-items:center;gap:18px;
  border-bottom:1px solid var(--line);
  padding:16px 26px;font-size:.82rem;color:var(--fog);
}
.site-chrome .dot{width:8px;height:8px;border-radius:50%;background:var(--gold);flex:none}
.site-chrome .site-name{font-family:'Fraunces',serif;color:#fff;font-size:.95rem}
.site-chrome .site-nav{margin-left:auto;display:flex;gap:16px}
.rendered{padding:44px 54px;max-width:640px}
.rendered .meta{
  font-family:'JetBrains Mono',monospace;font-size:.7rem;letter-spacing:.18em;
  text-transform:uppercase;color:var(--gold);
}
.rendered h2{
  font-family:'Fraunces',serif;font-weight:450;font-size:2.5rem;line-height:1.08;
  margin:14px 0 6px;letter-spacing:-.01em;
  font-variation-settings:'opsz' 144,'SOFT' 40;
}
.rendered .date{font-size:.82rem;color:var(--fog)}
.rendered p{margin-top:20px;color:#cfc8e0}
.rendered h3{
  font-family:'Fraunces',serif;font-weight:500;font-size:1.3rem;margin-top:28px;
  color:var(--violet);font-variation-settings:'SOFT' 60;
}
.rendered ul{margin:14px 0 0 2px;list-style:none}
.rendered li{padding:7px 0 7px 26px;position:relative;color:#cfc8e0}
.rendered li::before{
  content:'';position:absolute;left:2px;top:15px;width:10px;height:2px;background:var(--gold);
}

/* the seam itself */
.seam{
  position:absolute;top:0;bottom:0;width:2px;
  background:linear-gradient(to bottom, var(--gold), var(--violet), var(--gold));
  z-index:5;
  box-shadow:0 0 24px rgba(214,162,74,.45);
}
.handle{
  position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);
  width:52px;height:52px;border-radius:50%;
  background:var(--ink);
  border:1.5px solid var(--gold);
  display:flex;align-items:center;justify-content:center;
  cursor:col-resize;
  box-shadow:0 6px 24px rgba(0,0,0,.55);
  transition:transform .15s;
}
.handle:hover{transform:translate(-50%,-50%) scale(1.08)}
.handle:focus-visible{outline:2px solid var(--violet);outline-offset:3px}
.handle svg{display:block}

/* ---------- Sections ---------- */
section{padding:110px 0}
.sec-head{max-width:640px}
.sec-eyebrow{
  font-family:'JetBrains Mono',monospace;font-size:.72rem;letter-spacing:.22em;
  text-transform:uppercase;color:var(--gold);
}
.sec-title{
  font-family:'Fraunces',serif;font-weight:430;font-size:clamp(1.9rem,3.6vw,2.8rem);
  line-height:1.12;margin-top:14px;letter-spacing:-.01em;
  font-variation-settings:'opsz' 100,'SOFT' 40;
}
.sec-body{color:var(--fog);margin-top:16px;max-width:56ch}

/* Transformation: a real sequence */
.steps{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--line);border:1px solid var(--line);border-radius:14px;overflow:hidden;margin-top:54px}
.step{background:var(--ink-2);padding:32px 28px}
.step .n{
  font-family:'Fraunces',serif;font-style:italic;font-size:1rem;color:var(--gold);
}
.step h3{font-family:'Fraunces',serif;font-weight:500;font-size:1.25rem;margin-top:10px;font-variation-settings:'SOFT' 50}
.step p{color:var(--fog);font-size:.92rem;margin-top:8px;min-height:66px}
.step pre{
  margin-top:18px;background:var(--ink);border:1px solid var(--line);border-radius:8px;
  padding:16px;font-family:'JetBrains Mono',monospace;font-size:.78rem;line-height:1.7;
  overflow-x:auto;color:#d8d2e8;
}
.step pre .c{color:#6f6786}
.step pre .g{color:#8fce8f}
.step pre .y{color:var(--gold)}
.step pre .v{color:var(--violet)}

/* Features: quiet two-column ledger */
.ledger{margin-top:54px;border-top:1px solid var(--line)}
.entry{
  display:grid;grid-template-columns:280px 1fr 340px;gap:40px;
  padding:36px 0;border-bottom:1px solid var(--line);align-items:start;
}
.entry h3{
  font-family:'Fraunces',serif;font-weight:480;font-size:1.35rem;
  font-variation-settings:'SOFT' 50;
}
.entry .desc{color:var(--fog);font-size:.95rem}
.entry code.chip, .entry pre{
  font-family:'JetBrains Mono',monospace;font-size:.78rem;
}
.entry pre{
  background:var(--ink-2);border:1px solid var(--line);border-radius:8px;
  padding:14px 16px;line-height:1.7;color:#d8d2e8;overflow-x:auto;
}
.entry pre .v{color:var(--violet)}
.entry pre .y{color:var(--gold)}
.entry pre .c{color:#6f6786}

/* Numbers strip */
.numbers{
  display:flex;justify-content:space-between;gap:24px;flex-wrap:wrap;
  border:1px solid var(--line);border-radius:14px;padding:30px 40px;
  background:linear-gradient(180deg, var(--ink-2), var(--ink));
}
.num .val{
  font-family:'Fraunces',serif;font-weight:420;font-size:2.1rem;
  font-variation-settings:'opsz' 100;
}
.num .val i{font-style:italic;color:var(--gold);font-size:1.2rem}
.num .label{font-family:'JetBrains Mono',monospace;font-size:.7rem;letter-spacing:.16em;text-transform:uppercase;color:var(--fog);margin-top:2px}

/* Quote */
.quote{max-width:820px;margin:0 auto;text-align:center}
.quote blockquote{
  font-family:'Fraunces',serif;font-weight:400;font-style:italic;
  font-size:clamp(1.5rem,3vw,2.1rem);line-height:1.35;
  font-variation-settings:'opsz' 100,'SOFT' 70;
}
.quote blockquote b{color:var(--gold);font-weight:500}
.quote figcaption{margin-top:24px;color:var(--fog);font-size:.9rem}
.quote figcaption a{color:var(--violet);text-decoration:none}

/* Final CTA */
.finale{
  text-align:center;
  background:
    radial-gradient(600px 300px at 50% 0%, rgba(141,123,245,.14), transparent 70%);
  border-top:1px solid var(--line);
}
.finale .sec-title{margin:14px auto 0;max-width:20ch}

/* Footer */
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
  html{scroll-behavior:auto}
}

/* ---------- Responsive ---------- */
@media (max-width:960px){
  .entry{grid-template-columns:1fr;gap:14px}
  .steps{grid-template-columns:1fr}
  .step p{min-height:0}
}
@media (max-width:720px){
  .nav-links a:not(.cta){display:none}
  .stage{height:640px}
  .rendered{padding:32px 26px}
  .rendered h2{font-size:1.9rem}
  .src{font-size:.78rem}
  .src .row::before{width:40px;padding-right:14px}
  .site-chrome .site-nav{display:none}
  .numbers{padding:24px}
  section{padding:80px 0}
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
    <span class="ver mono">v2.x</span>
    <div class="nav-links">
      <a href="#">Docs</a>
      <a href="#">Demos</a>
      <a href="#">Blog</a>
      <a href="#">GitHub</a>
      <a href="#" class="cta">Get started</a>
    </div>
  </div>
</nav>

<header class="hero wrap">
  <p class="eyebrow">Static sites · Laravel · Markdown</p>
  <h1>Every Markdown file has a <em>second nature</em>.</h1>
  <p class="sub">HydePHP transforms the plain files you already write into fast, elegant static sites. Laravel's tooling works behind the curtain. No database, no runtime, no fuss.</p>
  <div class="cta-row">
    <div class="cmd mono">
      <span><span class="dollar">$</span> composer create-project hyde/hyde</span>
      <button id="copyCmd" aria-label="Copy install command">copy</button>
    </div>
    <a class="docs-link" href="#">Read the documentation</a>
  </div>
</header>

<div class="stage-outer wrap">
  <p class="hint">DRAG THE SEAM <b>⟷</b> TO BUILD</p>
  <div class="stage" id="stage" aria-label="Interactive demo: drag to reveal the built site behind the Markdown source">

    <!-- Hyde: the rendered site (base layer) -->
    <div class="layer hyde" aria-hidden="true">
      <div class="site-chrome">
        <span class="dot"></span>
        <span class="site-name">A Study in Static</span>
        <span class="site-nav mono">Home · Essays · About</span>
      </div>
      <article class="rendered">
        <p class="meta">Essays</p>
        <h2>A Study in Static</h2>
        <p class="date">July 9, 2026 · 2 min read</p>
        <p>Every site has two natures. The one you write, and the one you ship. Hyde keeps them in the same file.</p>
        <h3>The experiment</h3>
        <ul>
          <li>One Markdown file</li>
          <li>One build command</li>
          <li>Zero servers to keep alive</li>
        </ul>
      </article>
    </div>

    <!-- Jekyll: the manuscript (clipped layer) -->
    <div class="layer jekyll" id="jekyll" aria-hidden="true">
      <div class="file-chrome">
        <span class="tab">a-study-in-static.md</span>
        <span class="dialect">markdown · utf-8</span>
      </div>
      <div class="src">
        <div class="row"><span class="fm">---</span></div>
        <div class="row"><span class="key">title</span><span class="fm">: "A Study in Static"</span></div>
        <div class="row"><span class="key">date</span><span class="fm">: 2026-07-09</span></div>
        <div class="row"><span class="key">category</span><span class="fm">: essays</span></div>
        <div class="row"><span class="fm">---</span></div>
        <div class="row"> </div>
        <div class="row"><span class="h"># A Study in Static</span></div>
        <div class="row"> </div>
        <div class="row"><span class="li">Every site has two natures. The one you</span></div>
        <div class="row"><span class="li">write, and the one you ship. Hyde keeps</span></div>
        <div class="row"><span class="li">them in the same file.</span></div>
        <div class="row"> </div>
        <div class="row"><span class="h">## The experiment</span></div>
        <div class="row"> </div>
        <div class="row"><span class="li">- One Markdown file</span></div>
        <div class="row"><span class="li">- One build command</span></div>
        <div class="row"><span class="li">- Zero servers to keep alive</span></div>
      </div>
    </div>

    <!-- the seam -->
    <div class="seam" id="seam">
      <button class="handle" id="handle" aria-label="Reveal slider. Use arrow keys to move between the Markdown source and the built site." role="slider" aria-valuemin="0" aria-valuemax="100" aria-valuenow="58">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
          <path d="M7 4 L3 10 L7 16" stroke="#d6a24a" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M13 4 L17 10 L13 16" stroke="#8d7bf5" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>
    </div>
  </div>
</div>

<!-- The transformation: a real three-step sequence -->
<section class="wrap reveal">
  <div class="sec-head">
    <p class="sec-eyebrow">The transformation</p>
    <h2 class="sec-title">Write. Build. Vanish from the server bill.</h2>
    <p class="sec-body">The whole workflow is three moves. What comes out is plain HTML you can host anywhere, from a five-dollar VPS to a free static host.</p>
  </div>
  <div class="steps">
    <div class="step">
      <span class="n">i.</span>
      <h3>Write</h3>
      <p>Markdown for content, Blade when you want full control. Front matter handles the metadata.</p>
      <pre><span class="c">// or plain .md, your call</span>
php hyde <span class="v">make:post</span> <span class="y">"A Study in Static"</span></pre>
    </div>
    <div class="step">
      <span class="n">ii.</span>
      <h3>Build</h3>
      <p>One command compiles everything: pages, posts, docs, navigation, RSS, sitemap.</p>
      <pre>$ php hyde <span class="v">build</span>
<span class="g">✓ 80 files compiled in 756 ms</span></pre>
    </div>
    <div class="step">
      <span class="n">iii.</span>
      <h3>Ship</h3>
      <p>The output is a folder of static files. No PHP on the server, nothing to patch at 2 am.</p>
      <pre>_site/
├── index.html
├── posts/
└── <span class="y">feed.xml</span></pre>
    </div>
  </div>
</section>

<!-- Features as a ledger -->
<section class="wrap reveal">
  <div class="sec-head">
    <p class="sec-eyebrow">What's in the box</p>
    <h2 class="sec-title">Familiar to Artisans. Gentle to everyone else.</h2>
    <p class="sec-body">Hyde is built on Laravel Zero. If you know Artisan and Blade you already know Hyde, and if you don't, Markdown is all you need to get a site out the door.</p>
  </div>
  <div class="ledger">
    <div class="entry">
      <h3>Two dialects, one site</h3>
      <p class="desc">Mix Markdown pages and Blade views freely in the same project. Sprinkle in YAML front matter when a page needs metadata, skip it when it doesn't.</p>
      <pre><span class="c">---</span>
<span class="v">navigation</span>:
  <span class="v">priority</span>: <span class="y">1</span>
<span class="c">---</span></pre>
    </div>
    <div class="entry">
      <h3>A frontend you don't have to build</h3>
      <p class="desc">Ships with a full Tailwind frontend, responsive navigation, dark mode, and customizable Blade components. Publish the templates when you want to make it yours.</p>
      <pre>php hyde <span class="v">publish</span> <span class="y">views</span></pre>
    </div>
    <div class="entry">
      <h3>Documentation sites in minutes</h3>
      <p class="desc">Drop Markdown files in a folder and get a searchable docs site with a generated sidebar. This very concept page's real-world sibling documents Hyde itself.</p>
      <pre>_docs/
├── index.md
└── getting-started.md</pre>
    </div>
    <div class="entry">
      <h3>Everything is versionable</h3>
      <p class="desc">No database means your whole site lives in Git. Content, config, and templates travel together, and every deploy is reproducible from a single commit.</p>
      <pre>git push <span class="c"># that's the deploy</span></pre>
    </div>
  </div>
</section>

<!-- Numbers -->
<section class="wrap reveal" style="padding-top:0">
  <div class="numbers mono">
    <div class="num"><div class="val">203<i>k</i></div><div class="label">GitHub clones</div></div>
    <div class="num"><div class="val">28<i>k</i></div><div class="label">Packagist installs</div></div>
    <div class="num"><div class="val">449</div><div class="label">GitHub stars</div></div>
    <div class="num"><div class="val">MIT</div><div class="label">Licensed, forever</div></div>
  </div>
</section>

<!-- One quote, given room -->
<section class="wrap reveal">
  <figure class="quote">
    <blockquote>"I'm not a PHP developer and I can barely write a function in this language, but the project actually delivers on what it promises. Docs: <b>10/10</b>. Project: <b>10/10</b>."</blockquote>
    <figcaption><a href="#">@peteralexbizjak</a> on X</figcaption>
  </figure>
</section>

<!-- Finale -->
<section class="finale">
  <div class="wrap reveal">
    <p class="sec-eyebrow">Begin the experiment</p>
    <h2 class="sec-title">Your next site is one command away.</h2>
    <div class="cta-row">
      <div class="cmd mono">
        <span><span class="dollar">$</span> composer create-project hyde/hyde</span>
        <button id="copyCmd2" aria-label="Copy install command">copy</button>
      </div>
      <a class="docs-link" href="#">Quickstart guide</a>
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

  // Entrance: the seam sweeps once, revealing the built site
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

  // Pointer drag
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

  // Keyboard on the handle
  handle.addEventListener('keydown', function(e){
    if (e.key === 'ArrowLeft')  { apply(pct - 3); e.preventDefault(); }
    if (e.key === 'ArrowRight') { apply(pct + 3); e.preventDefault(); }
    if (e.key === 'Home') { apply(4); e.preventDefault(); }
    if (e.key === 'End')  { apply(96); e.preventDefault(); }
  });

  // Copy buttons
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

  // Section reveals
  const io = new IntersectionObserver(function(entries){
    entries.forEach(function(en){
      if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); }
    });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(function(el){ io.observe(el); });
})();
</script>
</body>
</html>
