<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>The Exhibition · HydePHP Demos</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght,SOFT,WONK@0,9..144,300..900,0..100,0..1;1,9..144,300..900,0..100,0..1&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=JetBrains+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
<style>
:root{
  --ink:#14111c;
  --ink-2:#1c1827;
  --ink-3:#252031;
  --violet:#8d7bf5;
  --violet-dim:#5e50b8;
  --gold:#d6a24a;
  --fog:#a49cba;
  --line:rgba(164,156,186,.16);
}
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{
  background:var(--ink);
  color:#e9e5f2;
  font-family:'Instrument Sans',system-ui,sans-serif;
  font-size:17px;line-height:1.65;
  -webkit-font-smoothing:antialiased;
}
::selection{background:var(--violet);color:var(--ink)}
a{color:inherit}
.mono{font-family:'JetBrains Mono',monospace}
.wrap{max-width:1160px;margin:0 auto;padding:0 28px}

/* ---------- Nav (the constant) ---------- */
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

/* ---------- Masthead + giant index ---------- */
.masthead{padding:88px 0 30px}
.eyebrow{
  font-family:'JetBrains Mono',monospace;font-size:.74rem;letter-spacing:.24em;
  text-transform:uppercase;color:var(--gold);
}
.masthead h1{
  font-family:'Fraunces',serif;font-weight:410;
  font-size:clamp(2.6rem,6vw,4.6rem);line-height:1.02;letter-spacing:-.016em;
  margin-top:18px;max-width:16ch;
  font-variation-settings:'opsz' 144,'SOFT' 40,'WONK' 1;
}
.masthead h1 em{font-style:italic;color:var(--violet);font-variation-settings:'opsz' 144,'SOFT' 100,'WONK' 1}
.masthead .sub{color:var(--fog);max-width:52ch;margin-top:18px;font-size:1.06rem}

.index{padding:44px 0 110px}
.index-label{
  font-family:'JetBrains Mono',monospace;font-size:.7rem;letter-spacing:.24em;
  text-transform:uppercase;color:var(--fog);border-bottom:1px solid var(--line);
  padding-bottom:14px;
}
.index a{
  display:flex;align-items:baseline;gap:28px;
  text-decoration:none;padding:26px 0;border-bottom:1px solid var(--line);
  transition:padding-left .25s ease;
}
.index a:hover{padding-left:20px}
.index .no{
  font-family:'Fraunces',serif;font-style:italic;font-size:1.3rem;color:var(--fog);
  width:44px;flex:none;font-variation-settings:'SOFT' 80;
  transition:color .2s;
}
.index .name{
  font-family:'Fraunces',serif;font-weight:400;
  font-size:clamp(2rem,5.4vw,4rem);line-height:1;letter-spacing:-.015em;
  font-variation-settings:'opsz' 144,'SOFT' 40,'WONK' 1;
  transition:color .2s;
}
.index .tease{
  margin-left:auto;text-align:right;color:var(--fog);font-size:.9rem;max-width:24ch;
  transition:color .2s;
}
.index a:hover .no{color:currentColor}
.index a.to-nordlys:hover .name,.index a.to-nordlys:hover .no{color:#e8501e}
.index a.to-lemonade:hover .name,.index a.to-lemonade:hover .no{color:#f2cf3a}
.index a.to-alpine:hover .name,.index a.to-alpine:hover .no{color:#7fb08c}

/* ---------- Exhibits: the page changes its nature ---------- */
.exhibit{padding:110px 0 130px;position:relative}
.plaque{
  display:flex;gap:28px;align-items:baseline;flex-wrap:wrap;
}
.plaque .no{
  font-family:'JetBrains Mono',monospace;font-size:.72rem;letter-spacing:.24em;
  text-transform:uppercase;
  border:1px solid;border-radius:99px;padding:5px 14px;
}
.plaque h2{
  font-family:'Fraunces',serif;font-weight:420;
  font-size:clamp(2.2rem,5vw,3.6rem);line-height:1.02;letter-spacing:-.015em;
  font-variation-settings:'opsz' 144,'SOFT' 40,'WONK' 1;
}
.plaque .live{
  margin-left:auto;
  font-family:'JetBrains Mono',monospace;font-size:.8rem;text-decoration:none;
  border:1px solid;border-radius:99px;padding:9px 20px;
  transition:transform .15s;white-space:nowrap;
}
.plaque .live:hover{transform:translateY(-2px)}
.curator{
  margin-top:20px;max-width:60ch;font-size:1.04rem;
}
.specs{
  display:flex;gap:44px;flex-wrap:wrap;margin-top:30px;
  font-family:'JetBrains Mono',monospace;font-size:.76rem;
}
.specs .k{letter-spacing:.18em;text-transform:uppercase;opacity:.55;display:block;margin-bottom:4px}

.frame{
  margin-top:48px;border-radius:14px;overflow:hidden;
  border:1px solid;
  transform:rotate(-.6deg);
  transition:transform .35s ease, box-shadow .35s ease;
}
.frame:hover{transform:rotate(0deg) scale(1.005)}
.frame .bar{
  display:flex;align-items:center;gap:10px;padding:10px 16px;
  font-family:'JetBrains Mono',monospace;font-size:.74rem;
  border-bottom:1px solid;
}
.frame .dots{display:flex;gap:5px}
.frame .dots i{width:8px;height:8px;border-radius:50%;display:block;opacity:.4;background:currentColor}
.frame .url{opacity:.7}
.frame img{display:block;width:100%;height:auto}

/* — Exhibit i: Nordlys (arctic operations) — */
.ex-nordlys{
  background:
    linear-gradient(rgba(20,51,59,.05) 1px, transparent 1px),
    linear-gradient(90deg, rgba(20,51,59,.05) 1px, transparent 1px),
    #e9eeed;
  background-size:44px 44px, 44px 44px, auto;
  color:#14333b;
}
.ex-nordlys .plaque .no{color:#e8501e;border-color:#e8501e}
.ex-nordlys .plaque .live{color:#e9eeed;background:#14333b;border-color:#14333b}
.ex-nordlys .curator{color:#3c5a61}
.ex-nordlys .specs{color:#14333b}
.ex-nordlys .frame{border-color:rgba(20,51,59,.25);box-shadow:0 40px 80px -40px rgba(20,51,59,.5);background:#f4f7f6}
.ex-nordlys .frame .bar{color:#14333b;border-color:rgba(20,51,59,.15)}
.ex-nordlys ::selection{background:#e8501e;color:#e9eeed}

/* — Exhibit ii: Lemonade (endless summer) — */
.ex-lemonade{
  background:radial-gradient(640px 340px at 82% 0%, rgba(242,207,58,.35), transparent 65%), #fbf6dc;
  color:#26241a;
}
.ex-lemonade .plaque .no{color:#8a7414;border-color:#c9ae2e}
.ex-lemonade .plaque .live{color:#26241a;background:#f2cf3a;border-color:#f2cf3a}
.ex-lemonade .curator{color:#5c5636}
.ex-lemonade .specs{color:#26241a}
.ex-lemonade .frame{border-color:rgba(38,36,26,.2);box-shadow:0 40px 80px -40px rgba(120,100,20,.45);background:#fffdf2}
.ex-lemonade .frame .bar{color:#26241a;border-color:rgba(38,36,26,.12)}
.ex-lemonade ::selection{background:#f2cf3a;color:#26241a}

/* — Exhibit iii: Alpine (the dependable one) — */
.ex-alpine{
  background:#efe7db;
  color:#1e4633;
}
.ex-alpine .plaque .no{color:#8a5a33;border-color:#8a5a33}
.ex-alpine .plaque .live{color:#efe7db;background:#1e4633;border-color:#1e4633}
.ex-alpine .curator{color:#4c5f50}
.ex-alpine .specs{color:#1e4633}
.ex-alpine .frame{border-color:rgba(30,70,51,.25);box-shadow:0 40px 80px -40px rgba(30,70,51,.5);background:#f7f1e8}
.ex-alpine .frame .bar{color:#1e4633;border-color:rgba(30,70,51,.15)}
.ex-alpine ::selection{background:#1e4633;color:#efe7db}

/* Ribbon between exhibits: the constant, restated */
.ribbon{
  background:var(--ink);color:var(--fog);
  border-top:1px solid var(--line);border-bottom:1px solid var(--line);
  overflow:hidden;white-space:nowrap;
  font-family:'JetBrains Mono',monospace;font-size:.72rem;letter-spacing:.26em;
  text-transform:uppercase;
  padding:13px 0;
}
.ribbon .tick{color:var(--gold);padding:0 26px}
.ribbon-inner{display:inline-block;animation:slide 36s linear infinite}
@keyframes slide{from{transform:translateX(0)}to{transform:translateX(-50%)}}
@media (prefers-reduced-motion:reduce){.ribbon-inner{animation:none}}

/* ---------- Finale ---------- */
.finale{
  text-align:center;padding:120px 0;
  background:radial-gradient(600px 300px at 50% 0%, rgba(141,123,245,.13), transparent 70%);
}
.finale h2{
  font-family:'Fraunces',serif;font-weight:420;
  font-size:clamp(2rem,4.4vw,3.2rem);line-height:1.08;letter-spacing:-.014em;
  margin:16px auto 0;max-width:20ch;
  font-variation-settings:'opsz' 144,'SOFT' 40,'WONK' 1;
}
.finale h2 em{font-style:italic;color:var(--gold);font-variation-settings:'SOFT' 100,'WONK' 1}
.finale p{color:var(--fog);max-width:48ch;margin:18px auto 0}
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
.submit-note{
  margin-top:40px;font-family:'Fraunces',serif;font-style:italic;color:var(--fog);
  font-variation-settings:'SOFT' 80;
}
.submit-note a{color:var(--violet);text-decoration:none}
.submit-note a:hover{text-decoration:underline}

footer{border-top:1px solid var(--line);padding:34px 0;color:var(--fog);font-size:.85rem}
.foot-inner{display:flex;align-items:center;gap:24px;flex-wrap:wrap}
.foot-inner .links{margin-left:auto;display:flex;gap:20px}
.foot-inner a{text-decoration:none;color:var(--fog)}
.foot-inner a:hover{color:#fff}

/* Reveals */
.reveal{opacity:0;transform:translateY(16px);transition:opacity .6s ease,transform .6s ease}
.reveal.in{opacity:1;transform:none}
@media (prefers-reduced-motion:reduce){
  .reveal{opacity:1;transform:none;transition:none}
  html{scroll-behavior:auto}
  .frame{transform:none}
}

@media (max-width:860px){
  .index .tease{display:none}
  .plaque .live{margin-left:0}
  .exhibit{padding:80px 0 90px}
  .specs{gap:24px}
}
@media (max-width:640px){
  .nav-links a:not(.cta){display:none}
  .index a{gap:16px;padding:20px 0}
  .index .no{width:30px}
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
      <a href="#" class="here">Demos</a>
      <a href="#">GitHub</a>
      <a href="#" class="cta">Get started</a>
    </div>
  </div>
</nav>

<header class="masthead wrap">
  <p class="eyebrow">Live demos · The Exhibition</p>
  <h1>Hyde has as many <em>natures</em> as you need.</h1>
  <p class="sub">Every site below is HydePHP: same generator, same Markdown, same build command. None of them look like it, and none of them look like each other. Each exhibit takes over this page as you reach it.</p>
</header>

<div class="index wrap">
  <p class="index-label">Programme · Three exhibits · All built with Hyde, all open source</p>
  <a href="#nordlys" class="to-nordlys">
    <span class="no">i.</span>
    <span class="name">Nordlys Air</span>
    <span class="tease">An airline above the Arctic Circle</span>
  </a>
  <a href="#lemonade" class="to-lemonade">
    <span class="no">ii.</span>
    <span class="name">Lemonade Days</span>
    <span class="tease">An endless Los Angeles summer</span>
  </a>
  <a href="#alpine" class="to-alpine">
    <span class="no">iii.</span>
    <span class="name">Alpine Scouts</span>
    <span class="tease">A troop site done by Friday</span>
  </a>
</div>

<div class="ribbon" aria-hidden="true">
  <div class="ribbon-inner">
    <span>The generator remains the same</span><span class="tick">✦</span><span>The site does not</span><span class="tick">✦</span><span>composer create-project hyde/hyde</span><span class="tick">✦</span><span>The generator remains the same</span><span class="tick">✦</span><span>The site does not</span><span class="tick">✦</span><span>composer create-project hyde/hyde</span><span class="tick">✦</span>
  </div>
</div>

<!-- Exhibit i -->
<section class="exhibit ex-nordlys" id="nordlys">
  <div class="wrap reveal">
    <div class="plaque">
      <span class="no mono">Exhibit i</span>
      <h2>Nordlys Air</h2>
      <a class="live mono" href="https://nordlys.hydephp.site/">Visit the live site ↗</a>
    </div>
    <p class="curator">A fictional Arctic airline with scheduled routes, a fleet page, an ops manual, and a timetable it refuses to miss. Built to prove a Hyde site can carry a complete design system: technical grids, schematic illustrations, and a type treatment that would survive a Norwegian aviation authority audit.</p>
    <div class="specs">
      <span><span class="k">Medium</span>Blade components · Tailwind · data collections</span>
      <span><span class="k">Demonstrates</span>Custom design systems on Hyde</span>
      <span><span class="k">Source</span><a href="#" style="text-decoration:underline">github.com/hydephp/nordlys ↗</a></span>
    </div>
    <div class="frame">
      <div class="bar">
        <span class="dots"><i></i><i></i><i></i></span>
        <span class="url">nordlys.hydephp.site</span>
      </div>
      <img src="demo-nordlys.png" alt="Nordlys Air demo site: a technical, blueprint-styled homepage for a fictional Arctic airline with the headline 'We fly the polar night'">
    </div>
  </div>
</section>

<!-- Exhibit ii -->
<section class="exhibit ex-lemonade" id="lemonade">
  <div class="wrap reveal">
    <div class="plaque">
      <span class="no mono">Exhibit ii</span>
      <h2>Lemonade Days</h2>
      <a class="live mono" href="https://lemonade-days.hydephp.site/">Visit the live site ↗</a>
    </div>
    <p class="curator">Sun-drenched recipes from a Los Angeles that never runs out of July. Full-bleed photography, a serif that belongs on a juice label, and a reading experience built entirely from Markdown posts. Proof that static doesn't mean stiff.</p>
    <div class="specs">
      <span><span class="k">Medium</span>Markdown posts · image-led layouts · RSS</span>
      <span><span class="k">Demonstrates</span>Photo-heavy blogging on Hyde</span>
      <span><span class="k">Source</span><a href="#" style="text-decoration:underline">github.com/hydephp/lemonade ↗</a></span>
    </div>
    <div class="frame">
      <div class="bar">
        <span class="dots"><i></i><i></i><i></i></span>
        <span class="url">lemonade-days.hydephp.site</span>
      </div>
      <img src="demo-lemonade.png" alt="Lemonade Days demo site: a warm summery recipe blog with a beach photo hero and the headline 'Squeeze the Day: A Taste of LA Summer'">
    </div>
  </div>
</section>

<!-- Exhibit iii -->
<section class="exhibit ex-alpine" id="alpine">
  <div class="wrap reveal">
    <div class="plaque">
      <span class="no mono">Exhibit iii</span>
      <h2>Alpine Scouts</h2>
      <a class="live mono" href="https://alpine-scouts.hydephp.site/">Visit the live site ↗</a>
    </div>
    <p class="curator">Not every site needs to be a statement. Troop 404's site is what most of the web actually is: news, an about page, a gear checklist, and a join form, assembled from Hyde's stock components with a palette swap. Warm, clear, and done by Friday. That's the exhibit.</p>
    <div class="specs">
      <span><span class="k">Medium</span>Stock Hyde components · one config file</span>
      <span><span class="k">Demonstrates</span>What defaults get you</span>
      <span><span class="k">Source</span><a href="#" style="text-decoration:underline">github.com/hydephp/alpine ↗</a></span>
    </div>
    <div class="frame">
      <div class="bar">
        <span class="dots"><i></i><i></i><i></i></span>
        <span class="url">alpine-scouts.hydephp.site</span>
      </div>
      <img src="demo-alpine.png" alt="Alpine Scouts demo site: a cozy scout troop homepage with a campfire photo and the headline 'Adventure Awaits. Join Troop 404'">
    </div>
  </div>
</section>

<div class="ribbon" aria-hidden="true">
  <div class="ribbon-inner">
    <span>The generator remains the same</span><span class="tick">✦</span><span>The site does not</span><span class="tick">✦</span><span>composer create-project hyde/hyde</span><span class="tick">✦</span><span>The generator remains the same</span><span class="tick">✦</span><span>The site does not</span><span class="tick">✦</span><span>composer create-project hyde/hyde</span><span class="tick">✦</span>
  </div>
</div>

<!-- Finale -->
<section class="finale">
  <div class="wrap reveal">
    <p class="eyebrow">Exhibit no. 4</p>
    <h2>This space is <em>reserved</em> for your site.</h2>
    <p>Every exhibit started as the same blank project. Yours will too.</p>
    <div class="cta-row">
      <div class="cmd mono">
        <span><span class="dollar">$</span> composer create-project hyde/hyde</span>
      </div>
      <a class="docs-link" href="#">Follow the quickstart</a>
    </div>
    <p class="submit-note">Built something with Hyde? <a href="#">Submit your site to the exhibition.</a></p>
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
  }, { threshold: 0.08 });
  document.querySelectorAll('.reveal').forEach(function(el){ io.observe(el); });
})();
</script>
</body>
</html>
