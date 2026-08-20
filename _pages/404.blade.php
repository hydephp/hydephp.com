<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>404 - Lost in Ink - HydePHP</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,opsz,wght@0,5..1200,400..900;1,5..1200,400..900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=JetBrains+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.3/dist/cdn.min.js" integrity="sha256-gOkV4d9/FmMNEkjOzVlyM2eNAWSUXisT+1RbMTTIgXI=" crossorigin="anonymous"></script>
{!! config('hyde.head') !!}
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
  font-size:17px;line-height:1.65;
  -webkit-font-smoothing:antialiased;
  min-height:100vh;display:flex;flex-direction:column;
}
::selection{background:var(--violet);color:var(--ink)}
a{color:inherit}
.mono{font-family:'JetBrains Mono',monospace}
.wrap{max-width:1160px;margin:0 auto;padding:0 28px;width:100%}

/* ---------- Stage ---------- */
.stage{flex:1;display:flex;align-items:center;padding:60px 0}
.grid{
  display:grid;grid-template-columns:1.05fr .95fr;gap:56px;align-items:center;width:100%;
}

/* Left: the message */
.eyebrow{
  font-family:'JetBrains Mono',monospace;font-size:.74rem;letter-spacing:.22em;
  text-transform:uppercase;color:var(--gold);
}
.big{
  font-family:'Playfair Display',serif;font-weight:400;opacity:.9;
  font-size:clamp(5rem,15vw,11rem);line-height:.86;letter-spacing:-.02em;margin-top:10px;
  display:flex;align-items:baseline;gap:.06em;
}
.big .four{color:#e9e5f2}
.big .zero{
  color:var(--violet);font-style:italic;
}
.left h1{
  font-family:'Playfair Display',serif;font-weight:440;font-size:clamp(1.5rem,3vw,2.1rem);
  line-height:1.14;margin-top:22px;letter-spacing:-.01em;max-width:18ch;opacity:.9;
}
.blurb{color:var(--fog);margin-top:16px;max-width:44ch}
.actions{display:flex;gap:14px;flex-wrap:wrap;margin-top:32px;align-items:center}
.btn-primary{
  text-decoration:none;background:var(--gold);color:var(--ink);
  padding:11px 22px;border-radius:99px;font-weight:600;font-size:.95rem;
  transition:background .15s;
}
.btn-primary:hover{background:#e5b25e}
.btn-ghost{
  text-decoration:none;color:var(--fog);font-size:.95rem;
  border-bottom:1px solid var(--line);padding-bottom:2px;
  transition:color .15s,border-color .15s;
}
.btn-ghost:hover{color:#fff;border-color:var(--fog)}

.suggest{
  margin-top:40px;padding-top:24px;border-top:1px solid var(--line);
}
.suggest .label{
  font-family:'JetBrains Mono',monospace;font-size:.68rem;letter-spacing:.2em;
  text-transform:uppercase;color:var(--fog);
}
.suggest .links{display:flex;gap:8px;flex-wrap:wrap;margin-top:14px}
.suggest .links a{
  text-decoration:none;font-size:.88rem;color:#d6d0e4;
  border:1px solid var(--line);border-radius:99px;padding:6px 15px;
  transition:border-color .15s,color .15s;
}
.suggest .links a:hover{border-color:var(--violet-dim);color:#fff}

/* Right: the manuscript that didn't compile */
.card{
  background:var(--paper);color:var(--paper-ink);
  border-radius:12px;border:1px solid var(--line-paper);
  overflow:hidden;
  box-shadow:0 40px 90px -40px rgba(0,0,0,.75);
  transform:rotate(1deg);
}
.card .chrome{
  display:flex;align-items:center;gap:10px;
  border-bottom:1px solid var(--line-paper);
  padding:11px 18px;font-family:'JetBrains Mono',monospace;font-size:.74rem;color:#6d6478;
}
.card .tab{
  background:var(--paper-2);border:1px solid var(--line-paper);border-bottom:none;
  border-radius:6px 6px 0 0;padding:4px 12px;color:#9b3d2f;
  transform:translateY(1px);display:flex;align-items:center;gap:7px;
}
.card .tab::before{content:'';width:7px;height:7px;border-radius:50%;background:#c0492f;display:block}
.card .status{margin-left:auto;color:#9b3d2f}
.card pre{
  padding:24px 22px;font-family:'JetBrains Mono',monospace;font-size:.82rem;line-height:1.9;
  counter-reset:ln;
}
.card .row{display:flex;white-space:pre-wrap}
.card .row::before{
  counter-increment:ln;content:counter(ln);
  width:34px;flex:none;text-align:right;padding-right:18px;color:#a99f92;font-size:.72rem;
}
.card .fm{color:#8a7f70}
.card .key{color:#7a5cc4}
.card .str{color:#8a6d3b}
.card .miss{
  background:rgba(192,73,47,.14);color:#9b3d2f;
  border-radius:3px;padding:0 4px;text-decoration:line-through;
  text-decoration-color:rgba(155,61,47,.6);
}
.card .err{
  border-top:1px solid var(--line-paper);
  padding:14px 22px;font-family:'JetBrains Mono',monospace;font-size:.74rem;
  color:#9b3d2f;background:rgba(192,73,47,.06);
  display:flex;gap:10px;align-items:flex-start;
}
.card .err b{font-weight:700}

@media (max-width:860px){
  .grid{grid-template-columns:1fr;gap:40px}
  .card{transform:none;order:2}
  .left{order:1}
}
</style>
</head>
<body>

@php
  $routes = \Hyde\Foundation\Facades\Routes::getFacadeRoot();
@endphp

<x-navigation />

<main class="stage">
  <div class="wrap grid">

    <div class="left">
      <p class="eyebrow">Error 404 · Page not found</p>
      <div class="big"><span class="four">4</span><span class="zero">0</span><span class="four">4</span></div>
      <h1>This page has a first nature, but never got a second.</h1>
      <p class="blurb">Every page here starts as a file and gets compiled into a site. This one has no source, so there was nothing to render. Somewhere, a Markdown file is missing.</p>
      <div class="actions">
        <a class="btn-primary" href="{{ $routes->get('index') ?? '/' }}">Back to the homepage</a>
        <a class="btn-ghost" href="{{ $routes->get('docs/2.x/search') ?? '/docs/2.x/search' }}">Search the docs instead</a>
      </div>
      <div class="suggest">
        <span class="label">Try one of these instead</span>
        <div class="links">
          <a href="{{ $routes->get('docs/2.x/getting-started') ?? '/docs/2.x/getting-started' }}">Getting Started</a>
          <a href="{{ $routes->get('docs/2.x/installation') ?? '/docs/2.x/installation' }}">Installation</a>
          <a href="{{ $routes->get('demos') ?? '/demos' }}">Demos</a>
          <a href="{{ $routes->get('posts') ?? '/posts' }}">Blog</a>
        </div>
      </div>
    </div>

    <div class="card" aria-hidden="true">
      <div class="chrome">
        <span class="tab">404.md</span>
        <span class="status">unresolved</span>
      </div>
      <pre><div class="row"><span class="fm">---</span></div><div class="row"><span class="key">title</span><span class="fm">: </span><span class="miss">"Page not found"</span></div><div class="row"><span class="key">navigation</span><span class="fm">:</span></div><div class="row"><span class="fm">  </span><span class="key">hidden</span><span class="fm">: </span><span class="str">true</span></div><div class="row"><span class="fm">---</span></div><div class="row"> </div><div class="row"><span class="fm"># </span><span class="miss">Missing page</span></div></pre>
      <div class="err">
        <b>✦</b>
        <span>$ hyde build · Could not resolve a source file.</span>
      </div>
    </div>

  </div>
</main>

<x-footer />

</body>
</html>
