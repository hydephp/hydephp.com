<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog · HydePHP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght,SOFT,WONK@0,9..144,300..900,0..100,0..1;1,9..144,300..900,0..100,0..1&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=JetBrains+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <style>
        :root{
            --ink:#14111c;
            --ink-2:#1c1827;
            --ink-3:#252031;
            --paper:#ece7da;
            --paper-ink:#2b2433;
            --violet:#8d7bf5;
            --violet-dim:#5e50b8;
            --gold:#d6a24a;
            --fog:#a49cba;
            --line:rgba(164,156,186,.16);
        }
        *{margin:0;padding:0;box-sizing:border-box}
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
        .wrap{max-width:1000px;margin:0 auto;padding:0 28px}

        /* ---------- Nav ---------- */
        nav{
            position:sticky;top:0;z-index:50;
            background:color-mix(in srgb, var(--ink) 86%, transparent);
            backdrop-filter:blur(12px);
            border-bottom:1px solid var(--line);
        }
        .nav-inner{max-width:1160px;margin:0 auto;padding:0 28px;display:flex;align-items:center;gap:28px;height:64px}
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

        /* ---------- Masthead ---------- */
        .masthead{
            text-align:center;padding:76px 0 0;
        }
        .masthead .over{
            font-family:'JetBrains Mono',monospace;font-size:.72rem;letter-spacing:.26em;
            text-transform:uppercase;color:var(--gold);
        }
        .masthead h1{
            font-family:'Fraunces',serif;font-weight:420;
            font-size:clamp(2.8rem,6.5vw,4.6rem);line-height:1;letter-spacing:-.015em;
            margin-top:16px;
            font-variation-settings:'opsz' 144,'SOFT' 40,'WONK' 1;
        }
        .masthead h1 em{font-style:italic;color:var(--violet);font-variation-settings:'opsz' 144,'SOFT' 100,'WONK' 1}
        .masthead .rule{
            max-width:520px;margin:28px auto 0;
            display:flex;align-items:center;gap:16px;
            color:var(--fog);
        }
        .masthead .rule::before,.masthead .rule::after{
            content:'';flex:1;height:1px;
            background:linear-gradient(to right, transparent, var(--line) 30%, var(--line) 70%, transparent);
        }
        .masthead .rule span{
            font-family:'JetBrains Mono',monospace;font-size:.72rem;letter-spacing:.16em;
        }
        .masthead .rule a{color:var(--gold);text-decoration:none}
        .masthead .rule a:hover{text-decoration:underline}

        /* ---------- Filters ---------- */
        .filters{
            display:flex;gap:10px;justify-content:center;flex-wrap:wrap;
            padding:36px 0 0;
        }
        .filters button{
            font-family:'JetBrains Mono',monospace;font-size:.74rem;letter-spacing:.1em;
            color:var(--fog);border:1px solid var(--line);border-radius:99px;
            padding:6px 16px;background:none;cursor:pointer;
            transition:color .15s,border-color .15s;
        }
        .filters button:hover{color:#fff;border-color:var(--fog)}
        .filters button.on{
            color:var(--ink);background:var(--gold);border-color:var(--gold);
        }
        .filters button:focus-visible{outline:2px solid var(--violet);outline-offset:2px}

        /* ---------- Featured dispatch ---------- */
        .featured-outer{padding:48px 0 0}
        .featured{
            display:block;text-decoration:none;
            border:1px solid var(--line);border-radius:16px;
            padding:52px 56px;position:relative;overflow:hidden;
            background:
                    radial-gradient(700px 340px at 85% -20%, rgba(141,123,245,.16), transparent 65%),
                    radial-gradient(500px 300px at 0% 110%, rgba(214,162,74,.08), transparent 60%),
                    var(--ink-2);
            transition:border-color .2s;
        }
        .featured:hover{border-color:var(--violet-dim)}
        .featured .flag{
            font-family:'JetBrains Mono',monospace;font-size:.68rem;letter-spacing:.22em;
            text-transform:uppercase;color:var(--gold);
            display:flex;align-items:center;gap:12px;
        }
        .featured .flag::after{content:'';width:44px;height:1px;background:linear-gradient(to right,var(--gold),transparent)}
        .featured h2{
            font-family:'Fraunces',serif;font-weight:440;
            font-size:clamp(1.8rem,3.8vw,2.7rem);line-height:1.1;letter-spacing:-.012em;
            margin-top:18px;max-width:20ch;
            font-variation-settings:'opsz' 144,'SOFT' 40,'WONK' 1;
        }
        .featured p{color:var(--fog);margin-top:16px;max-width:58ch}
        .featured .byline{
            display:flex;align-items:center;gap:14px;margin-top:28px;
            font-size:.85rem;color:var(--fog);
        }
        .featured .avatar{
            width:34px;height:34px;border-radius:50%;flex:none;
            background:radial-gradient(circle at 32% 28%, var(--violet), var(--violet-dim));
            display:flex;align-items:center;justify-content:center;
            font-family:'Fraunces',serif;font-style:italic;font-weight:500;
            color:#fff;font-size:1rem;
        }
        .featured .byline b{color:#e9e5f2;font-weight:600}
        .featured .byline .sep{color:var(--ink-3)}
        .featured .go{
            position:absolute;right:44px;bottom:40px;
            font-family:'JetBrains Mono',monospace;font-size:.78rem;color:var(--gold);
        }

        /* ---------- The ledger of dispatches ---------- */
        .ledger-outer{padding:72px 0 40px}
        .yr{
            display:grid;grid-template-columns:170px 1fr;gap:40px;
            padding:44px 0 12px;
        }
        .yr + .yr{border-top:1px solid var(--line)}
        .yr .year{
            font-family:'Fraunces',serif;font-weight:380;font-style:italic;
            font-size:2.6rem;color:var(--ink-3);line-height:1;
            font-variation-settings:'opsz' 144,'SOFT' 80;
            position:sticky;top:96px;align-self:start;
            -webkit-text-stroke:1px rgba(164,156,186,.35);
        }
        .post{
            display:grid;grid-template-columns:100px 1fr auto;gap:24px;align-items:baseline;
            padding:20px 0;border-bottom:1px solid var(--line);
            text-decoration:none;position:relative;
        }
        .post:last-child{border-bottom:none}
        .post::before{
            content:'';position:absolute;left:-24px;top:26px;
            width:10px;height:2px;background:var(--gold);
            opacity:0;transform:translateX(-6px);transition:opacity .15s,transform .15s;
        }
        .post:hover::before{opacity:1;transform:none}
        .post .date{
            font-family:'JetBrains Mono',monospace;font-size:.74rem;color:var(--fog);
            letter-spacing:.06em;white-space:nowrap;
        }
        .post h3{
            font-family:'Fraunces',serif;font-weight:470;font-size:1.28rem;line-height:1.25;
            letter-spacing:-.005em;transition:color .15s;
            font-variation-settings:'opsz' 60,'SOFT' 50;
        }
        .post:hover h3{color:var(--violet)}
        .post .desc{
            color:var(--fog);font-size:.92rem;margin-top:5px;max-width:56ch;
            font-family:'Instrument Sans',sans-serif;font-weight:400;
        }
        .post .tag{
            font-family:'JetBrains Mono',monospace;font-size:.68rem;letter-spacing:.12em;
            text-transform:uppercase;white-space:nowrap;
            color:var(--fog);border:1px solid var(--line);border-radius:99px;padding:3px 12px;
        }
        .post .tag.release{color:var(--gold);border-color:rgba(214,162,74,.4)}
        .post .tag.devlog{color:var(--violet);border-color:rgba(141,123,245,.4)}

        /* ---------- Pager + RSS note ---------- */
        .pager-row{
            display:flex;align-items:center;justify-content:space-between;gap:20px;
            padding:20px 0 0;flex-wrap:wrap;
        }
        .older{
            text-decoration:none;font-family:'JetBrains Mono',monospace;font-size:.8rem;
            color:var(--fog);border:1px solid var(--line);border-radius:99px;padding:9px 20px;
            transition:color .15s,border-color .15s;
        }
        .older:hover{color:#fff;border-color:var(--fog)}
        .rss-note{
            color:var(--fog);font-size:.88rem;font-style:italic;
            font-family:'Fraunces',serif;font-variation-settings:'SOFT' 80;
        }
        .rss-note a{color:var(--gold);text-decoration:none;font-style:normal}
        .rss-note a:hover{text-decoration:underline}

        footer{border-top:1px solid var(--line);padding:34px 0;color:var(--fog);font-size:.85rem;margin-top:80px}
        .foot-inner{max-width:1160px;margin:0 auto;padding:0 28px;display:flex;align-items:center;gap:24px;flex-wrap:wrap}
        .foot-inner .links{margin-left:auto;display:flex;gap:20px}
        .foot-inner a{text-decoration:none;color:var(--fog)}
        .foot-inner a:hover{color:#fff}

        /* Reveals */
        .reveal{opacity:0;transform:translateY(14px);transition:opacity .6s ease,transform .6s ease}
        .reveal.in{opacity:1;transform:none}
        @media (prefers-reduced-motion:reduce){
            .reveal{opacity:1;transform:none;transition:none}
        }

        @media (max-width:860px){
            .yr{grid-template-columns:1fr;gap:8px;padding-top:36px}
            .yr .year{position:static;font-size:2rem}
            .post{grid-template-columns:1fr;gap:4px;padding:18px 0}
            .post .tag{justify-self:start;margin-top:6px}
            .featured{padding:36px 28px 44px}
            .featured .go{position:static;display:inline-block;margin-top:24px}
        }
        @media (max-width:640px){
            .nav-links a:not(.cta){display:none}
        }
    </style>
</head>
<body>

<nav>
    <div class="nav-inner">
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
</nav>

<header class="masthead wrap">
    <p class="over">The HydePHP Blog</p>
    <h1>Notes &amp; <em>Dispatches</em></h1>
    <div class="rule">
        <span>Est. 2022 · 47 entries · <a href="#">Subscribe by RSS</a></span>
    </div>
</header>

<div class="filters wrap" role="group" aria-label="Filter posts by category">
    <button class="on">All</button>
    <button>Releases</button>
    <button>Devlog</button>
    <button>Tutorials</button>
    <button>Essays</button>
</div>

<!-- Featured -->
<div class="featured-outer wrap reveal">
    <a class="featured" href="#">
        <p class="flag">Latest dispatch</p>
        <h2>Rebuilding the publish command for version three</h2>
        <p>One command now does the work of three. A look inside the v3 CLI cleanup: why the old publish commands had to go, how the interactive picker works, and what "designing a command surface" actually means in practice.</p>
        <div class="byline">
            <span class="avatar" aria-hidden="true">E</span>
            <span><b>Emma De Silva</b></span>
            <span class="sep">·</span>
            <span>July 2, 2026</span>
            <span class="sep">·</span>
            <span>8 min read</span>
        </div>
        <span class="go">Read the dispatch →</span>
    </a>
</div>

<!-- The ledger -->
<main class="ledger-outer wrap">

    <div class="yr reveal">
        <div class="year">2026</div>
        <div>
            <a class="post" href="#">
                <span class="date">Jun 14</span>
                <span>
          <h3>Writing design docs for AI agents</h3>
          <p class="desc">Why HydePHP now ships a design philosophy document, and what changed when the newest contributor stopped being human.</p>
        </span>
                <span class="tag devlog">Devlog</span>
            </a>
            <a class="post" href="#">
                <span class="date">May 20</span>
                <span>
          <h3>Saying no to the --config flag</h3>
          <p class="desc">Every rejected feature is a design decision. The case against a generic config override, argued in public.</p>
        </span>
                <span class="tag devlog">Devlog</span>
            </a>
            <a class="post" href="#">
                <span class="date">Mar 08</span>
                <span>
          <h3>Documentation sites in fifteen minutes</h3>
          <p class="desc">From an empty folder to a searchable, sidebar-navigated docs site, one Markdown file at a time.</p>
        </span>
                <span class="tag">Tutorial</span>
            </a>
            <a class="post" href="#">
                <span class="date">Jan 22</span>
                <span>
          <h3>HydePHP 2.3: smarter navigation</h3>
          <p class="desc">Automatic menu grouping, per-page priorities, and a handful of quality-of-life fixes from community reports.</p>
        </span>
                <span class="tag release">Release</span>
            </a>
        </div>
    </div>

    <div class="yr reveal">
        <div class="year">2025</div>
        <div>
            <a class="post" href="#">
                <span class="date">Nov 30</span>
                <span>
          <h3>How Hyde compiles your site</h3>
          <p class="desc">A guided tour through the build pipeline, from page discovery to the moment your HTML hits the disk.</p>
        </span>
                <span class="tag">Essay</span>
            </a>
            <a class="post" href="#">
                <span class="date">Sep 12</span>
                <span>
          <h3>Blade components for static sites</h3>
          <p class="desc">You don't need a running app to benefit from components. Patterns for reusable, testable static templates.</p>
        </span>
                <span class="tag">Tutorial</span>
            </a>
            <a class="post" href="#">
                <span class="date">Apr 03</span>
                <span>
          <h3>HydePHP 2.0 released</h3>
          <p class="desc">A leaner core, a refreshed frontend, and two hundred thousand downloads of lessons folded back into the architecture.</p>
        </span>
                <span class="tag release">Release</span>
            </a>
        </div>
    </div>

    <div class="yr reveal">
        <div class="year">2024</div>
        <div>
            <a class="post" href="#">
                <span class="date">Oct 17</span>
                <span>
          <h3>Why your blog doesn't need a database</h3>
          <p class="desc">The quiet case for static publishing: cheaper hosting, zero patching, and content that survives every framework you'll ever leave.</p>
        </span>
                <span class="tag">Essay</span>
            </a>
            <a class="post" href="#">
                <span class="date">Jun 05</span>
                <span>
          <h3>Deploying Hyde sites anywhere</h3>
          <p class="desc">GitHub Pages, Netlify, a five-dollar VPS, or a Raspberry Pi in your closet. If it serves files, it serves Hyde.</p>
        </span>
                <span class="tag">Tutorial</span>
            </a>
        </div>
    </div>

    <div class="pager-row reveal">
        <a class="older" href="#">Older dispatches →</a>
        <p class="rss-note">No newsletter popup here. <a href="#">Subscribe by RSS</a>, like nature intended.</p>
    </div>
</main>

<footer>
    <div class="foot-inner">
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
        // Filter pills (visual toggle for the concept)
        const pills = document.querySelectorAll('.filters button');
        pills.forEach(function(p){
            p.addEventListener('click', function(){
                pills.forEach(function(x){ x.classList.remove('on'); });
                p.classList.add('on');
            });
        });

        // Section reveals
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
