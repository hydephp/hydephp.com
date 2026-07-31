@php
    use App\Repositories\BlogArchiveRepository;

    $featured = BlogArchiveRepository::featured();
    $ledger = BlogArchiveRepository::ledger();
    $ledgerByYear = collect([$featured + ['index' => -1]])
        ->concat($ledger)
        ->groupBy('year');
    $counts = BlogArchiveRepository::categoryCounts();
    $total = BlogArchiveRepository::entries()->count();
    $firstYear = BlogArchiveRepository::firstYear();
    $feed = Hyde::url(config('hyde.rss.filename', 'feed.xml'));

    // How many ledger entries a page holds once the client-side pagination takes over. Every entry
    // is in the HTML regardless; this only decides where the enhanced view draws its page breaks.
    $perPage = 12;

    // The filter index handed to Alpine carries only what filtering needs, so the enhancement
    // can control the server-rendered rows without re-rendering their contents.
    $describe = fn (array $entry, int $index): array => [
        'i' => $index,
        'c' => $entry['category']->value,
        'y' => $entry['year'],
    ];
@endphp
<!DOCTYPE html>
<html lang="{{ config('hyde.language', 'en') }}" class="scroll-smooth motion-reduce:scroll-auto">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blog · HydePHP</title>
<meta name="description" content="Release notes, devlogs, tutorials, and essays from the HydePHP project.">
<link rel="alternate" type="application/rss+xml" title="{{ config('hyde.name', 'HydePHP') }} RSS Feed" href="{{ $feed }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,opsz,wght@0,5..1200,400..900;1,5..1200,400..900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=JetBrains+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
  // Marks the document as script-capable before the first paint. That is what lets this page ship
  // the entire archive as HTML while still opening on page one, without the rest of the ledger
  // flashing past first. If Alpine never arrives, the class comes back off and everything shows.
  document.documentElement.classList.add('js');

  // A filtered URL must not paint the default featured card while Alpine is still loading.
  // Alpine removes this hand-off class once x-show has taken control of the card.
  if (@js(array_keys($counts)).includes(new URLSearchParams(window.location.search).get('category'))) {
    document.documentElement.classList.add('archive-filtered');
  }
  window.addEventListener('load', function () {
    setTimeout(function () {
      if (! window.Alpine) document.documentElement.classList.remove('js');
    }, 2000);
  });
</script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.3/dist/cdn.min.js" integrity="sha256-gOkV4d9/FmMNEkjOzVlyM2eNAWSUXisT+1RbMTTIgXI=" crossorigin="anonymous" onerror="document.documentElement.classList.remove('js')"></script>
<style>
  ::selection { background: #8d7bf5; color: #14111c }

  /* Controls that only mean something once Alpine is driving them. */
  [x-cloak] { display: none !important }

  /* Ledger rows past the first page. Hidden pre-paint, then handed over to Alpine's x-show. */
  .js [data-deferred] { display: none }

  /* Prevent default archive content flashing on a direct link to a filtered archive. */
  .js.archive-filtered [data-featured],
  .js.archive-filtered [data-ledger] { display: none }

  /* Scroll reveal. Scoped to .js so a scriptless page never hides its own content. */
  .js .reveal { opacity: 0; transform: translateY(14px); transition: opacity .6s ease-out, transform .6s ease-out }
  .js .reveal.revealed { opacity: 1; transform: none }

  /* Lets rows animate in as a wave rather than all at once. Set per row by Alpine. */
  .stagger { transition-delay: var(--stagger, 0ms) }

  /* Filter pills and page buttons take their state straight from their ARIA attributes, which
     keeps the styling in one place and out of reach of any class juggling at runtime. */
  .pill, .pg {
    border-radius: 9999px;
    border: 1px solid rgba(164, 156, 186, .16);
    color: #a49cba;
    font-family: 'JetBrains Mono', monospace;
    transition: color .25s ease, border-color .25s ease, background-color .25s ease, box-shadow .25s ease, transform .25s ease;
  }
  .pill { padding: .375rem 1rem; font-size: .74rem; letter-spacing: .1em }
  .pg { display: inline-flex; min-width: 2.25rem; height: 2.25rem; align-items: center; justify-content: center; padding: 0 .6rem; font-size: .8rem }

  .pill:hover, .pg:hover:not(:disabled) { border-color: #a49cba; color: #fff }
  .pill:active, .pg:active:not(:disabled) { transform: scale(.96) }
  .pill:focus-visible, .pg:focus-visible { outline: 2px solid #8d7bf5; outline-offset: 2px }

  .pill[aria-pressed="true"], .pg[aria-current="page"] {
    border-color: #d6a24a;
    background: #d6a24a;
    color: #14111c;
    box-shadow: 0 0 0 4px rgba(214, 162, 74, .12);
  }
  .pill[aria-pressed="true"]:hover, .pg[aria-current="page"]:hover { border-color: #e5b25e; background: #e5b25e; color: #14111c }

  .pill[data-empty="true"] { opacity: .38 }
  .pg:disabled { opacity: .3 }
  .pg-gap { border-color: transparent; color: #6f6785 }
  .pg-gap:hover { border-color: transparent; color: #6f6785 }

  .pill .tally { margin-left: .5em; opacity: .6; font-variant-numeric: tabular-nums }

  @media (prefers-reduced-motion: reduce) {
    .js .reveal { opacity: 1; transform: none; transition: none }
    .stagger { transition-delay: 0ms !important }
    .pill, .pg { transition: none }
    .pill:active, .pg:active:not(:disabled) { transform: none }
  }
</style>
</head>
<body class="bg-[#14111c] text-[#e9e5f2] antialiased font-['Instrument_Sans'] text-[17px] leading-[1.65]">

<x-navigation />

<header class="mx-auto max-w-[1000px] px-7 pt-[76px] text-center">
  <p class="font-['JetBrains_Mono'] text-[.72rem] uppercase tracking-[.26em] text-[#d6a24a]">The HydePHP Blog</p>
  <h1 class="mt-4 font-[Playfair_Display] opacity-90 text-[clamp(2.8rem,6.5vw,4.6rem)] font-[420] leading-none tracking-[-.015em]">
    Notes <span class="text-[0.85em] opacity-50">&amp;</span> Dispatches
  </h1>
  <div class="mx-auto mt-7 flex max-w-[560px] items-center gap-4 text-[#a49cba]">
    <span aria-hidden="true" class="h-px flex-1 bg-gradient-to-r from-transparent via-[rgba(164,156,186,.16)] to-transparent"></span>
    <span class="font-['JetBrains_Mono'] text-[.72rem] tracking-[.16em]">Est. {{ $firstYear }} · {{ $total }} entries · <a href="{{ $feed }}" class="text-[#a49cba] no-underline hover:underline">Subscribe by RSS</a></span>
    <span aria-hidden="true" class="h-px flex-1 bg-gradient-to-r from-transparent via-[rgba(164,156,186,.16)] to-transparent"></span>
  </div>
</header>

<div x-data="archive(@js([
    'ledger' => $ledger->map($describe)->all(),
    'featured' => $describe($featured, -1),
    'categories' => array_keys($counts),
    'perPage' => $perPage,
]))">

  {{-- Filtering is an enhancement, so its controls stay hidden until Alpine can run them. Without
       scripts the reader simply gets the whole archive, which is the honest fallback. --}}
  <div class="mx-auto max-w-[1000px] px-7 pt-9" x-cloak>
    <div class="flex flex-wrap justify-center gap-2.5" role="group" aria-label="Filter posts by category">
      <button type="button" class="pill" aria-pressed="true" @click="filterBy('all')" :aria-pressed="category === 'all'" :data-empty="tally('all') === 0">
        All<span class="tally" x-text="tally('all')">{{ $total }}</span>
      </button>
      @foreach ($counts as $value => $count)
        <button type="button" class="pill" aria-pressed="false" @click="filterBy('{{ $value }}')" :aria-pressed="category === '{{ $value }}'" :data-empty="tally('{{ $value }}') === 0">
          {{ \App\Enums\PostCategory::from($value)->pluralLabel() }}<span class="tally" x-text="tally('{{ $value }}')">{{ $count }}</span>
        </button>
      @endforeach
    </div>

    {{-- Announce filter changes without adding a redundant visible count. --}}
    <p class="sr-only" aria-live="polite" x-text="announcement"></p>
  </div>

  {{-- Featured --}}
  <div
    data-featured
    x-show="showFeatured"
    x-transition:enter="transition duration-500 ease-out motion-reduce:transition-none"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition duration-200 ease-in motion-reduce:transition-none"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
  >
    <div class="reveal mx-auto max-w-[1000px] px-7 pt-12">
      <a class="group relative block overflow-hidden rounded-2xl border border-[rgba(164,156,186,.16)] bg-[#1c1827] p-[52px] no-underline transition duration-500 ease-out hover:-translate-y-1 hover:border-[#5e50b8] hover:shadow-[0_34px_70px_-38px_rgba(94,80,184,.7)] motion-reduce:transform-none motion-reduce:transition-none max-[860px]:px-7 max-[860px]:pb-11 max-[860px]:pt-9" style="background: radial-gradient(700px 340px at 85% -20%, rgba(141,123,245,.16), transparent 65%), radial-gradient(500px 300px at 0% 110%, rgba(214,162,74,.08), transparent 60%), #1c1827;" href="{{ $featured['route'] }}">
        <p class="flex items-center gap-3 font-['JetBrains_Mono'] text-[.68rem] uppercase tracking-[.22em] text-[#d6a24a]">
          Latest dispatch
          <span aria-hidden="true" class="h-px w-11 origin-left bg-gradient-to-r from-[#d6a24a] to-transparent transition-transform duration-500 ease-out group-hover:scale-x-[1.6] motion-reduce:transition-none motion-reduce:group-hover:scale-x-100"></span>
        </p>
        <h2 class="mt-[18px] max-w-[20ch] font-[Playfair_Display] opacity-90 text-[clamp(1.8rem,3.8vw,2.7rem)] font-[440] leading-[1.1] tracking-[-.012em]">{{ $featured['title'] }}</h2>
        <p class="mt-4 max-w-[58ch] text-[#a49cba]">{{ $featured['description'] }}</p>
        <div class="mt-7 flex flex-wrap items-center gap-3.5 text-[.85rem] text-[#a49cba]">
          <span class="flex h-[34px] w-[34px] flex-none items-center justify-center rounded-full font-[Playfair_Display] opacity-90 text-base font-medium italic text-white" style="background: radial-gradient(circle at 32% 28%, #8d7bf5, #5e50b8);" aria-hidden="true">{{ mb_substr($featured['author']?->name ?? 'H', 0, 1) }}</span>
          <span><b class="font-semibold text-[#e9e5f2]">{{ $featured['author']?->name ?? config('hyde.name', 'HydePHP') }}</b></span>
          <span class="text-[#252031]" aria-hidden="true">·</span>
          <time datetime="{{ $featured['datetime'] }}">{{ $featured['date'] }}</time>
          <span class="text-[#252031]" aria-hidden="true">·</span>
          <span>{{ $featured['minutes'] }} min read</span>
          <span class="text-[#252031]" aria-hidden="true">·</span>
          <span class="whitespace-nowrap rounded-full border px-3 py-[3px] font-['JetBrains_Mono'] text-[.68rem] uppercase tracking-[.12em]" style="border-color: {{ $featured['category']->borderColor() }}; color: {{ $featured['category']->textColor() }}">{{ $featured['category']->label() }}</span>
        </div>
        <span class="absolute bottom-10 right-11 font-['JetBrains_Mono'] text-[.78rem] text-[#d6a24a] transition-transform duration-500 ease-out group-hover:translate-x-1 motion-reduce:transition-none motion-reduce:group-hover:translate-x-0 max-[860px]:static max-[860px]:mt-6 max-[860px]:inline-block">Read the dispatch →</span>
      </a>
    </div>
  </div>

  {{-- The ledger --}}
  <main data-ledger class="mx-auto max-w-[1000px] scroll-mt-24 px-7 pb-10 pt-[72px]" id="archive" x-ref="ledger">

    @foreach ($ledgerByYear as $year => $entries)
      <section
        x-show="yearVisible({{ $year }})"
        @if ($entries->min('index') >= $perPage) data-deferred @endif
      >
        <div class="reveal grid grid-cols-[170px_1fr] gap-10 pb-3 pt-11 max-[860px]:grid-cols-1 max-[860px]:gap-2 max-[860px]:pt-9">
          <div class="sticky top-24 self-start font-[Playfair_Display] opacity-90 text-[2.6rem] font-[380] italic leading-none text-[#252031] [-webkit-text-stroke:1px_rgba(164,156,186,.35)] max-[860px]:static max-[860px]:text-[2rem]">{{ $year }}</div>
          <div>
            @foreach ($entries as $entry)
              <a
                class="group relative grid grid-cols-[100px_1fr_auto] items-baseline gap-6 border-b border-[rgba(164,156,186,.16)] py-5 no-underline max-[860px]:grid-cols-1 max-[860px]:gap-1 max-[860px]:py-[18px]"
                href="{{ $entry['route'] }}"
                x-show="visible({{ $entry['index'] }})"
                @if ($entry['index'] === -1) x-cloak @endif
                :style="{ '--stagger': order({{ $entry['index'] }}) * 26 + 'ms' }"
                x-transition:enter="stagger transition duration-500 ease-out motion-reduce:transition-none"
                x-transition:enter-start="opacity-0 translate-y-3"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition duration-150 ease-in motion-reduce:transition-none"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @if ($entry['index'] >= $perPage) data-deferred @endif
              >
                <time datetime="{{ $entry['datetime'] }}" class="whitespace-nowrap font-['JetBrains_Mono'] text-[.74rem] tracking-[.06em] text-[#a49cba]">{{ $entry['day'] }}</time>
                <span class="transition-transform duration-300 ease-out group-hover:translate-x-1 motion-reduce:transform-none motion-reduce:transition-none">
                  <h3 class="font-[Playfair_Display] opacity-90 text-[1.28rem] font-[470] leading-[1.25] tracking-[-.005em] transition-colors group-hover:text-[#8d7bf5]">{{ $entry['title'] }}</h3>
                  <p class="mt-[5px] max-w-[56ch] font-['Instrument_Sans'] text-[.92rem] font-normal text-[#a49cba]">{{ $entry['description'] }}</p>
                </span>
                <span class="flex flex-none items-center gap-2 max-[860px]:mt-1.5 max-[860px]:justify-self-start">
                  @if ($entry['guest'])
                    <span class="whitespace-nowrap rounded-full border border-[rgba(164,156,186,.16)] px-2.5 py-[3px] font-['JetBrains_Mono'] text-[.62rem] uppercase tracking-[.12em] text-[#6f6785]" title="Written by a community contributor">Guest</span>
                  @endif
                  <span class="whitespace-nowrap rounded-full border px-3 py-[3px] font-['JetBrains_Mono'] text-[.68rem] uppercase tracking-[.12em]" style="border-color: {{ $entry['category']->borderColor() }}; color: {{ $entry['category']->textColor() }}">{{ $entry['category']->label() }}</span>
                </span>
              </a>
            @endforeach
          </div>
        </div>
      </section>
    @endforeach

    {{-- Only reachable once filtering exists, so it never shows on a scriptless page. --}}
    <div
      x-cloak
      x-show="isEmpty"
      x-transition:enter="transition duration-500 ease-out motion-reduce:transition-none"
      x-transition:enter-start="opacity-0 translate-y-2"
      x-transition:enter-end="opacity-100 translate-y-0"
      class="py-20 text-center"
    >
      <p class="font-[Playfair_Display] opacity-90 text-[1.7rem] font-[420] italic text-[#a49cba]">Nothing in the ledger for that.</p>
      <p class="mt-3 text-[.92rem] text-[#6f6785]">Try a different category, or <button type="button" @click="filterBy('all')" class="text-[#d6a24a] underline decoration-dotted underline-offset-4 hover:text-[#e5b25e] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8d7bf5]">show everything</button>.</p>
    </div>

    {{-- Pagination is purely an enhancement: the markup above already holds every post. --}}
    <div x-cloak x-show="pageCount > 1" class="pt-9">
      <nav class="flex flex-wrap items-center justify-center gap-2" aria-label="Archive pagination">
        <button type="button" class="pg" @click="go(page - 1)" :disabled="page === 1">
          <span aria-hidden="true">←</span><span class="sr-only">Previous page</span>
        </button>
        <template x-for="(number, position) in pageList" :key="position">
          <button
            type="button"
            class="pg"
            :class="{ 'pg-gap': number === '…' }"
            :disabled="number === '…'"
            :aria-hidden="number === '…'"
            :aria-current="number === page ? 'page' : null"
            :aria-label="number === '…' ? null : 'Page ' + number"
            @click="go(number)"
            x-text="number"
          ></button>
        </template>
        <button type="button" class="pg" @click="go(page + 1)" :disabled="page === pageCount">
          <span aria-hidden="true">→</span><span class="sr-only">Next page</span>
        </button>
      </nav>
      <p class="mt-4 text-center font-['JetBrains_Mono'] text-[.72rem] tracking-[.14em] text-[#6f6785]" x-text="rangeLabel"></p>
    </div>

    <div class="reveal flex flex-wrap items-center justify-center gap-5 pt-12">
      <p class="text-center font-[Playfair_Display] opacity-90 text-[.88rem] italic text-[#a49cba]">No newsletter popup here. <a href="{{ $feed }}" class="not-italic text-[#d6a24a] no-underline hover:underline">Subscribe by RSS</a>, like nature intended.</p>
    </div>
  </main>
</div>

<x-footer />

<script>
  document.addEventListener('alpine:init', function () {
    Alpine.data('archive', function (config) {
      return {
        ledger: config.ledger,
        featured: config.featured,
        categories: config.categories,
        perPage: config.perPage,

        category: 'all',
        page: 1,

        init() {
          this.everything = this.ledger.concat([this.featured]);
          this.readLocation();

          // Every post is in the HTML so the page works without scripts. Now that it has them,
          // hand visibility over to x-show. This runs before Alpine walks the rows below, so the
          // handover happens in one frame rather than flashing the full ledger first.
          this.$el.querySelectorAll('[data-deferred]').forEach(function (element) {
            element.removeAttribute('data-deferred');
          });

          // x-show now owns the featured card, so the pre-paint URL guard can step aside without
          // exposing it for a frame on filtered links.
          this.$nextTick(() => document.documentElement.classList.remove('archive-filtered'));

          window.addEventListener('popstate', () => this.readLocation());
        },

        /** Does an indexed post survive the current category filter? */
        keep(post, category) {
          return category === 'all' || post.c === category;
        },

        /** Ledger entries matching the current filters, in the order they are rendered. */
        get matches() {
          const candidates = this.category === 'all'
            ? this.ledger
            : [this.featured].concat(this.ledger);

          return candidates.filter((post) => this.keep(post, this.category));
        },

        /** The entries the enhanced view is currently showing. */
        get shown() {
          return this.matches.slice((this.page - 1) * this.perPage, this.page * this.perPage);
        },

        /** Ledger index to its position on the current page, which drives both x-show and the stagger. */
        get positions() {
          const positions = {};
          this.shown.forEach((post, position) => positions[post.i] = position);
          return positions;
        },

        visible(index) {
          return index in this.positions;
        },

        order(index) {
          return this.positions[index] || 0;
        },

        /** A year heading is only worth showing when the current page has posts from that year. */
        yearVisible(year) {
          return this.shown.some((post) => post.y === year);
        },

        /** The spotlight belongs to the default archive view; filters use the normal ledger row. */
        get showFeatured() {
          return this.category === 'all';
        },

        get pageCount() {
          return Math.max(1, Math.ceil(this.matches.length / this.perPage));
        },

        get pageList() {
          const total = this.pageCount;

          if (total <= 7) {
            return Array.from({ length: total }, (_, index) => index + 1);
          }

          const wanted = [1, this.page - 1, this.page, this.page + 1, total]
            .filter((number, index, all) => number >= 1 && number <= total && all.indexOf(number) === index)
            .sort((a, b) => a - b);

          return wanted.flatMap((number, index) =>
            index && number - wanted[index - 1] > 1 ? ['…', number] : [number]
          );
        },

        /** Everything visible in the enhanced view, including the spotlight on the default view. */
        get count() {
          return this.matches.length + (this.showFeatured ? 1 : 0);
        },

        get isEmpty() {
          return this.count === 0;
        },

        /** Per-category totals shown on the filter pills. */
        tally(category) {
          return this.everything.filter((post) => this.keep(post, category)).length;
        },

        get rangeLabel() {
          const from = (this.page - 1) * this.perPage + 1;
          const to = Math.min(this.page * this.perPage, this.matches.length);

          return 'Showing ' + from + '–' + to + ' of ' + this.matches.length + ' in the ledger';
        },

        get announcement() {
          const posts = this.count === 1 ? '1 dispatch' : this.count + ' dispatches';
          const pages = this.pageCount > 1 ? ', page ' + this.page + ' of ' + this.pageCount : '';

          return posts + ' shown' + pages + '.';
        },

        filterBy(category) {
          // Pressing the active pill again lifts the filter, so the pills work as a toggle.
          this.category = this.category === category && category !== 'all' ? 'all' : category;
          this.page = 1;
          this.sync();
        },

        go(page) {
          if (page < 1 || page > this.pageCount || page === this.page) {
            return;
          }

          this.page = page;
          this.sync();
          this.$nextTick(() => this.scrollToLedger());
        },

        scrollToLedger() {
          const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

          this.$refs.ledger.scrollIntoView({ behavior: reduced ? 'auto' : 'smooth', block: 'start' });
        },

        /** Keeps the address bar in step with the view, so any filtered page can be linked to. */
        sync() {
          const params = new URLSearchParams();

          if (this.category !== 'all') params.set('category', this.category);
          if (this.page > 1) params.set('page', this.page);

          const query = params.toString();

          history.replaceState(null, '', window.location.pathname + (query ? '?' + query : '') + window.location.hash);
        },

        readLocation() {
          const params = new URLSearchParams(window.location.search);
          const category = params.get('category');

          this.category = this.categories.includes(category) ? category : 'all';
          this.page = Math.min(Math.max(1, parseInt(params.get('page'), 10) || 1), this.pageCount);

          // A link can ask for a page or category that no longer exists. Write back what was
          // actually settled on, so the address bar never disagrees with what is on screen.
          this.sync();
        },
      };
    });
  });

  // Scroll reveal, kept independent of Alpine so the sections still appear if the CDN is unreachable.
  (function () {
    const sections = document.querySelectorAll('.reveal');

    if (! ('IntersectionObserver' in window)) {
      sections.forEach((section) => section.classList.add('revealed'));

      return;
    }

    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (! entry.isIntersecting) return;

        entry.target.classList.add('revealed');
        observer.unobserve(entry.target);
      });
    }, { threshold: 0.08 });

    sections.forEach((section) => observer.observe(section));
  })();
</script>
</body>
</html>
