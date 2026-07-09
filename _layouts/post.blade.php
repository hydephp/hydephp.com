<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rebuilding the publish command for version three · HydePHP Blog</title>
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
  font-size:17.5px;line-height:1.75;
  -webkit-font-smoothing:antialiased;
}
::selection{background:var(--violet);color:var(--ink)}
a{color:inherit}
.mono{font-family:'JetBrains Mono',monospace}
.wrap{max-width:1160px;margin:0 auto;padding:0 28px}
.narrow{max-width:720px;margin:0 auto;padding:0 28px}

/* ---------- Nav + reading seam ---------- */
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
.nav-links a.cta{color:var(--ink);background:var(--gold);padding:7px 16px;border-radius:99px;font-weight:600}
.nav-links a.cta:hover{background:#e5b25e;color:var(--ink)}
.progress{
  position:absolute;left:0;bottom:-1px;height:2px;width:0%;
  background:linear-gradient(to right, var(--gold), var(--violet));
  box-shadow:0 0 12px rgba(214,162,74,.4);
}

/* ---------- Article header ---------- */
.post-head{
  padding:80px 0 0;text-align:center;
  background:radial-gradient(640px 300px at 50% -10%, rgba(141,123,245,.11), transparent 70%);
}
.crumbs{
  font-family:'JetBrains Mono',monospace;font-size:.72rem;letter-spacing:.16em;
  text-transform:uppercase;color:var(--fog);
}
.crumbs a{color:var(--fog);text-decoration:none}
.crumbs a:hover{color:#fff}
.crumbs b{color:var(--gold);font-weight:400;padding:0 6px}
.tag{
  display:inline-block;margin-top:26px;
  font-family:'JetBrains Mono',monospace;font-size:.68rem;letter-spacing:.16em;
  text-transform:uppercase;color:var(--violet);
  border:1px solid rgba(141,123,245,.4);border-radius:99px;padding:4px 14px;
}
h1{
  font-family:'Fraunces',serif;font-weight:420;
  font-size:clamp(2.2rem,5.2vw,3.7rem);line-height:1.07;letter-spacing:-.014em;
  margin:20px auto 0;max-width:19ch;
  font-variation-settings:'opsz' 144,'SOFT' 40,'WONK' 1;
}
.lede{color:var(--fog);max-width:54ch;margin:20px auto 0;font-size:1.12rem;line-height:1.6}
.byline{
  display:flex;align-items:center;justify-content:center;gap:14px;
  margin-top:32px;font-size:.88rem;color:var(--fog);flex-wrap:wrap;
}
.avatar{
  width:38px;height:38px;border-radius:50%;flex:none;
  background:radial-gradient(circle at 32% 28%, var(--violet), var(--violet-dim));
  display:flex;align-items:center;justify-content:center;
  font-family:'Fraunces',serif;font-style:italic;font-weight:500;color:#fff;
}
.byline b{color:#e9e5f2;font-weight:600}
.byline .sep{color:var(--ink-3)}
.head-rule{
  max-width:220px;margin:44px auto 0;height:1px;
  background:linear-gradient(to right, transparent, var(--gold), var(--violet), transparent);
}

/* ---------- Prose ---------- */
.prose{padding:56px 0 80px}
.prose > p{margin-top:20px;color:#d6d0e4}
.prose .opener::first-letter{
  font-family:'Fraunces',serif;font-weight:500;
  font-size:4.2rem;line-height:.82;color:var(--gold);
  float:left;padding:8px 14px 0 0;
  font-variation-settings:'opsz' 144,'SOFT' 60,'WONK' 1;
}
.prose h2{
  font-family:'Fraunces',serif;font-weight:470;font-size:1.75rem;
  margin:56px 0 0;letter-spacing:-.01em;
  font-variation-settings:'opsz' 100,'SOFT' 50;
}
.prose p code, .prose li code{
  font-family:'JetBrains Mono',monospace;font-size:.82em;
  background:var(--ink-3);border:1px solid var(--line);border-radius:5px;
  padding:1.5px 6px;white-space:nowrap;color:#e9e5f2;
}
.prose a{color:var(--violet);text-decoration:none;border-bottom:1px solid var(--violet-dim)}
.prose ul{margin:16px 0 0 4px;list-style:none}
.prose li{padding:6px 0 6px 24px;position:relative;color:#d6d0e4}
.prose li::before{content:'';position:absolute;left:0;top:17px;width:10px;height:2px;background:var(--gold)}

.prose blockquote{
  margin:36px 0 0;padding:6px 0 6px 28px;
  border-left:2px solid transparent;
  border-image:linear-gradient(to bottom, var(--gold), var(--violet)) 1;
  font-family:'Fraunces',serif;font-style:italic;font-size:1.35rem;line-height:1.45;
  color:#e9e5f2;font-variation-settings:'opsz' 60,'SOFT' 80;
}

/* Terminal: what runs is ink */
.terminal{
  margin-top:26px;border-radius:10px;overflow:hidden;
  border:1px solid var(--line);background:var(--ink-2);
}
.terminal .chrome{
  display:flex;align-items:center;gap:8px;
  border-bottom:1px solid var(--line);padding:10px 16px;
  font-family:'JetBrains Mono',monospace;font-size:.72rem;color:var(--fog);
}
.terminal .dots{display:flex;gap:5px}
.terminal .dots i{width:8px;height:8px;border-radius:50%;background:var(--ink-3);display:block}
.terminal pre{
  padding:18px 20px;font-family:'JetBrains Mono',monospace;font-size:.82rem;line-height:1.8;
  overflow-x:auto;color:#d8d2e8;
}
.terminal .dollar{color:var(--gold)}
.terminal .g{color:#8fce8f}
.terminal .v{color:var(--violet)}
.terminal .dim{color:#6f6786}
.terminal .strike{color:#6f6786;text-decoration:line-through}

/* File card: what you write is paper */
.file-card{
  margin-top:26px;border-radius:10px;overflow:hidden;
  border:1px solid var(--line-paper);
  background:var(--paper);color:var(--paper-ink);
  box-shadow:0 16px 40px -24px rgba(0,0,0,.6);
}
.file-card .chrome{
  display:flex;align-items:center;
  border-bottom:1px solid var(--line-paper);
  padding:8px 16px 0;font-family:'JetBrains Mono',monospace;font-size:.72rem;color:#6d6478;
}
.file-card .tab{
  background:var(--paper-2);border:1px solid var(--line-paper);border-bottom:none;
  border-radius:6px 6px 0 0;padding:4px 12px;color:var(--paper-ink);
  transform:translateY(1px);
}
.file-card .lang{margin-left:auto;padding-bottom:8px}
.file-card pre{
  padding:18px 20px;font-family:'JetBrains Mono',monospace;font-size:.82rem;line-height:1.8;overflow-x:auto;
}
.file-card .key{color:#7a5cc4}
.file-card .str{color:#8a6d3b}
.file-card .cm{color:#8a7f70;font-style:italic}

/* ---------- End matter ---------- */
.endmark{
  text-align:center;margin-top:64px;color:var(--gold);font-size:1.1rem;letter-spacing:.5em;
}
.author-card{
  margin-top:56px;display:flex;gap:20px;align-items:flex-start;
  border:1px solid var(--line);border-radius:14px;padding:26px 28px;
  background:var(--ink-2);
}
.author-card .avatar{width:52px;height:52px;font-size:1.3rem}
.author-card h4{
  font-family:'Fraunces',serif;font-weight:520;font-size:1.15rem;
  font-variation-settings:'SOFT' 50;
}
.author-card p{color:var(--fog);font-size:.9rem;margin-top:4px}
.author-card .row{display:flex;gap:16px;margin-top:10px;font-family:'JetBrains Mono',monospace;font-size:.74rem}
.author-card .row a{color:var(--violet);text-decoration:none}
.author-card .row a:hover{text-decoration:underline}

.discuss{
  display:flex;gap:24px;justify-content:center;margin-top:44px;
  font-family:'JetBrains Mono',monospace;font-size:.78rem;flex-wrap:wrap;
}
.discuss a{color:var(--fog);text-decoration:none;transition:color .15s}
.discuss a:hover{color:#fff}
.discuss b{color:var(--gold);font-weight:400}

.pager{
  display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:56px;
}
.pager a{
  text-decoration:none;border:1px solid var(--line);border-radius:12px;
  padding:18px 22px;transition:border-color .15s;background:var(--ink-2);
}
.pager a:hover{border-color:var(--violet-dim)}
.pager .dir{
  font-family:'JetBrains Mono',monospace;font-size:.68rem;letter-spacing:.18em;
  text-transform:uppercase;color:var(--fog);
}
.pager .title{
  font-family:'Fraunces',serif;font-size:1.1rem;font-weight:500;margin-top:6px;
  font-variation-settings:'SOFT' 50;
}
.pager a.next{text-align:right}

footer{border-top:1px solid var(--line);padding:34px 0;color:var(--fog);font-size:.85rem;margin-top:80px}
.foot-inner{display:flex;align-items:center;gap:24px;flex-wrap:wrap}
.foot-inner .links{margin-left:auto;display:flex;gap:20px}
.foot-inner a{text-decoration:none;color:var(--fog)}
.foot-inner a:hover{color:#fff}

@media (prefers-reduced-motion:reduce){
  .progress{transition:none}
}
@media (max-width:640px){
  .nav-links a:not(.cta){display:none}
  .post-head{padding-top:56px}
  .pager{grid-template-columns:1fr}
  .pager a.next{text-align:left}
  .author-card{flex-direction:column}
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
      <a href="#">About</a>
      <a href="#" class="here">Blog</a>
      <a href="#">GitHub</a>
      <a href="#" class="cta">Get started</a>
    </div>
  </div>
  <div class="progress" id="progress"></div>
</nav>

<header class="post-head">
  <div class="wrap">
    <p class="crumbs"><a href="#">Notes &amp; Dispatches</a><b>/</b>Devlog</p>
    <span class="tag">Devlog</span>
    <h1>Rebuilding the publish command for version three</h1>
    <p class="lede">One command now does the work of three. Why the old publish commands had to go, how the interactive picker works, and what designing a command surface actually means.</p>
    <div class="byline">
      <span class="avatar" aria-hidden="true">E</span>
      <span><b>Emma De Silva</b></span>
      <span class="sep">·</span>
      <span>July 2, 2026</span>
      <span class="sep">·</span>
      <span>8 min read</span>
    </div>
    <div class="head-rule"></div>
  </div>
</header>

<article class="prose narrow">
  <p class="opener">Hyde has always let you publish vendor files into your project, taking templates and configs that ship inside the framework and copying them into your codebase where you can edit them. The feature is good. The interface to it grew like ivy. By version two we had three separate commands doing variations of the same job:</p>

  <div class="terminal">
    <div class="chrome"><span class="dots"><i></i><i></i><i></i></span> the old way</div>
    <pre><span class="dollar">$</span> php hyde <span class="strike">publish:homepage</span>
<span class="dollar">$</span> php hyde <span class="strike">publish:views</span>
<span class="dollar">$</span> php hyde <span class="strike">publish:configs</span></pre>
  </div>

  <p>Each one had its own flags, its own prompts, and its own slightly different idea of what "publishing" meant. None of them were wrong. Together, they were a maze.</p>

  <h2>Three front doors is zero front doors</h2>
  <p>The problem with parallel commands is discovery. A newcomer running <code>php hyde list</code> sees three publish entries and has to reverse-engineer the taxonomy before they can act. Is a homepage a view? Are configs publishable per-file? The command list, which should be a map, becomes a quiz.</p>
  <p>A CLI is an API with a human on the other end, and it deserves the same design care. When we review a PHP interface we ask whether the method names reveal the model. The old publish commands revealed the git history instead: each was added when a need appeared, named for the moment rather than the whole.</p>

  <blockquote>A command surface should describe what the tool believes, and Hyde believes publishing is one action with many targets.</blockquote>

  <h2>The new shape</h2>
  <p>Version three collapses everything into a single verb. Run it bare and Hyde asks what you want, using the same prompt toolkit Laravel developers already know:</p>

  <div class="terminal">
    <div class="chrome"><span class="dots"><i></i><i></i><i></i></span> hyde ~ zsh</div>
    <pre><span class="dollar">$</span> php hyde <span class="v">publish</span>

 <span class="dim">Which group would you like to publish?</span>
 <span class="g">❯</span> views    <span class="dim">Blade templates and components</span>
   configs  <span class="dim">Configuration files</span>
   layouts  <span class="dim">Page and homepage layouts</span></pre>
  </div>

  <p>Know what you want? Name it. Want a single file? Pass a path fragment and Hyde matches it against everything publishable, so you never copy fourteen templates to edit one:</p>

  <div class="terminal">
    <div class="chrome"><span class="dots"><i></i><i></i><i></i></span> hyde ~ zsh</div>
    <pre><span class="dollar">$</span> php hyde <span class="v">publish</span> views navigation
<span class="g">✓ Published components/navigation.blade.php</span></pre>
  </div>

  <p>The published file lands in your project as plain Blade, yours to reshape:</p>

  <div class="file-card">
    <div class="chrome"><span class="tab">resources/views/vendor/hyde/components/navigation.blade.php</span><span class="lang">blade</span></div>
    <pre><span class="cm">{{-- Now yours. Edit freely, Hyde uses this copy from here on. --}}</span>
&lt;<span class="key">nav</span> <span class="key">aria-label</span>=<span class="str">"Main navigation"</span>&gt;
    @@foreach($navigation->items as $item)
        &lt;<span class="key">x-hyde::nav-link</span> <span class="key">:item</span>=<span class="str">"$item"</span> /&gt;
    @@endforeach
&lt;/<span class="key">nav</span>&gt;</pre>
  </div>

  <h2>What we removed, and how</h2>
  <p>Deleting public API is a promise-keeping exercise, so the removal follows the same rules as every Hyde release:</p>
  <ul>
    <li>The old command names keep working in v3 as aliases that forward to the new command.</li>
    <li>Calling an alias prints a one-line notice with the modern equivalent, once per session, never nagging.</li>
    <li>The upgrade guide documents every renamed flag with a before-and-after table.</li>
  </ul>
  <p>We also said no to some things along the way. A generic <code>--config</code> override flag was proposed and rejected, because a flag that can change anything documents nothing. That decision got its own <a href="#">write-up in May</a>.</p>

  <h2>The lesson for your own tools</h2>
  <p>If you maintain a CLI, run <code>list</code> on it and read the output as a stranger. Every command that makes a newcomer ask "how is this different from that one?" is a design debt with compounding interest. Merging three commands into one deleted code, deleted docs, and deleted a whole category of confused issues before they could be filed.</p>
  <p>Version three is being built in the open, and the publish rebuild is on the beta branch now. Try it, break it, and tell me what the picker should do that it doesn't. The issue tracker is the front door, and a human answers it.</p>

  <div class="endmark">🎩</div>

  <div class="author-card">
    <span class="avatar" aria-hidden="true">E</span>
    <div>
      <h4>Emma De Silva</h4>
      <p>Creator and maintainer of HydePHP. Laravel contributor, conference speaker, and firm believer that a command line is a user interface.</p>
      <div class="row">
        <a href="#">↗ GitHub</a>
        <a href="#">↗ emma.desilva.se</a>
        <a href="#">↗ More dispatches</a>
      </div>
    </div>
  </div>

  <div class="discuss">
    <a href="#"><b>↗</b> Discuss on GitHub</a>
    <a href="#"><b>↗</b> Share this dispatch</a>
    <a href="#"><b>↗</b> Subscribe by RSS</a>
  </div>

  <nav class="pager" aria-label="Adjacent posts">
    <a href="#">
      <span class="dir">← Previous dispatch</span>
      <div class="title">Writing design docs for AI agents</div>
    </a>
    <a href="#" class="next">
      <span class="dir">Next dispatch →</span>
      <div class="title">Coming soon</div>
    </a>
  </nav>
</article>

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
  const bar = document.getElementById('progress');
  function update(){
    const h = document.documentElement;
    const max = h.scrollHeight - h.clientHeight;
    bar.style.width = (max > 0 ? (h.scrollTop / max) * 100 : 0) + '%';
  }
  document.addEventListener('scroll', update, { passive: true });
  update();
})();
</script>
</body>
</html>
