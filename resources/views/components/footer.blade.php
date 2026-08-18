@php
    use Hyde\Foundation\Facades\Routes;

    // Route objects rather than hardcoded paths, so pretty URLs and relative resolution keep
    // working; the fallbacks mirror the idiom the footer already used, since a missing route
    // otherwise renders an empty href.
    $columns = [
        'Resources' => [
            ['Documentation', Routes::get('docs/index') ?? '/docs'],
            ['Community Portal', Routes::get('community') ?? '/community'],
            ['Legal Information', Routes::get('legal') ?? '/legal'],
        ],
        'Developers' => [
            ['Developer Resources', (Routes::get('community') ?? '/community') . '#developers'],
            ['GitHub Organization', 'https://github.com/hydephp'],
            ['Source Code', 'https://github.com/hydephp/develop'],
        ],
        'Extra' => [
            ['Sitemap', Routes::get('sitemap') ?? '/sitemap'],
            ['Blog Posts', Routes::get('posts') ?? '/posts'],
            ['RSS Feed', Hyde::relativeLink(config('hyde.rss.filename', 'feed.xml'))],
        ],
    ];

    // Kept as paths rather than an icon font so the marks stay inline like every other glyph on
    // the site. Each entry is [label, href, svg path data, viewBox].
    $socials = [
        ['GitHub', 'https://github.com/hydephp', 'M12 .5C5.73.5.5 5.73.5 12a11.5 11.5 0 0 0 7.86 10.92c.58.1.79-.25.79-.56v-2c-3.2.7-3.88-1.54-3.88-1.54-.53-1.34-1.29-1.7-1.29-1.7-1.05-.72.08-.7.08-.7 1.16.08 1.77 1.19 1.77 1.19 1.03 1.77 2.71 1.26 3.37.96.1-.75.4-1.26.73-1.55-2.56-.29-5.25-1.28-5.25-5.7 0-1.26.45-2.29 1.19-3.1-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11 11 0 0 1 5.79 0c2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.12 3.05.74.81 1.18 1.84 1.18 3.1 0 4.43-2.69 5.4-5.26 5.69.41.36.78 1.07.78 2.16v3.2c0 .31.21.67.8.56A11.5 11.5 0 0 0 23.5 12C23.5 5.73 18.27.5 12 .5Z', '0 0 24 24'],
        ['Twitter', 'https://twitter.com/HydeFramework', 'M23.64 4.57a9.6 9.6 0 0 1-2.75.75 4.8 4.8 0 0 0 2.1-2.65 9.6 9.6 0 0 1-3.04 1.16 4.79 4.79 0 0 0-8.16 4.37A13.6 13.6 0 0 1 1.9 3.15a4.79 4.79 0 0 0 1.48 6.4 4.75 4.75 0 0 1-2.17-.6v.06a4.79 4.79 0 0 0 3.84 4.7 4.8 4.8 0 0 1-2.16.08 4.79 4.79 0 0 0 4.47 3.33A9.61 9.61 0 0 1 0 19.13a13.56 13.56 0 0 0 7.35 2.16c8.82 0 13.64-7.3 13.64-13.64l-.02-.62a9.74 9.74 0 0 0 2.39-2.48Z', '0 0 24 24'],
        ['Discord', 'https://discord.hydephp.com', 'M20.32 4.94A19.8 19.8 0 0 0 15.43 3.4a.07.07 0 0 0-.08.04c-.21.38-.44.87-.61 1.26a18.3 18.3 0 0 0-5.48 0 12.6 12.6 0 0 0-.62-1.26.08.08 0 0 0-.08-.04c-1.71.3-3.35.81-4.89 1.54a.07.07 0 0 0-.03.03C.44 9.6-.26 14.13.08 18.6c0 .02.02.05.04.06a19.9 19.9 0 0 0 6 3.03.08.08 0 0 0 .09-.03c.46-.63.87-1.3 1.23-2a.08.08 0 0 0-.05-.11 13.1 13.1 0 0 1-1.87-.89.08.08 0 0 1 0-.13l.37-.29a.07.07 0 0 1 .08 0 14.2 14.2 0 0 0 12.06 0 .07.07 0 0 1 .08 0l.37.3a.08.08 0 0 1 0 .12c-.6.35-1.22.65-1.87.89a.08.08 0 0 0-.04.1c.36.71.77 1.38 1.22 2.01a.08.08 0 0 0 .09.03 19.84 19.84 0 0 0 6.01-3.03.08.08 0 0 0 .03-.06c.41-5.18-.68-9.67-2.87-13.64a.06.06 0 0 0-.03-.03ZM8.02 15.88c-1.18 0-2.16-1.09-2.16-2.42s.96-2.42 2.16-2.42c1.21 0 2.18 1.1 2.16 2.42 0 1.33-.96 2.42-2.16 2.42Zm7.97 0c-1.18 0-2.16-1.09-2.16-2.42s.96-2.42 2.16-2.42c1.21 0 2.18 1.1 2.16 2.42 0 1.33-.95 2.42-2.16 2.42Z', '0 0 24 24'],
        ['Open Collective', 'https://opencollective.com/hydephp', 'M12 21s-7.5-4.35-7.5-9.6A4.4 4.4 0 0 1 12 8.6a4.4 4.4 0 0 1 7.5 2.8c0 5.25-7.5 9.6-7.5 9.6Z', '0 0 24 24'],
    ];
@endphp

<footer class="border-t border-[rgba(164,156,186,.16)]" style="background: radial-gradient(760px 260px at 50% 100%, rgba(141,123,245,.07), transparent 72%);">
  <div class="mx-auto max-w-[1160px] px-7 py-16">
    <div class="grid grid-cols-2 items-start gap-x-8 gap-y-12 sm:grid-cols-3 lg:grid-cols-[minmax(0,2.1fr)_repeat(3,minmax(0,1fr))_auto]">

      {{-- Brand --}}
      <div class="col-span-2 sm:col-span-3 lg:col-span-1 lg:pr-8">
        <a
          href="{{ Routes::get('index') ?? '/' }}"
          class="inline-flex items-center gap-2.5 rounded-sm [font-family:'Playfair_Display',serif] text-xl font-semibold text-white no-underline opacity-90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70 focus-visible:ring-offset-4 focus-visible:ring-offset-[#14111c]"
        >
          <img src="{{ Asset::get('logo.svg') }}" alt="" class="inline-block" style="height: 2.25rem">
          HydePHP
        </a>

        <p class="mt-5 max-w-[38ch] text-[.9rem] leading-[1.7] text-[#a49cba]">Create websites, blogs, and documentation with the power of Laravel and the simplicity of Markdown. Write plain files, run one command, and ship your next site.</p>

        <div class="mt-7 h-px max-w-[180px] bg-gradient-to-r from-[#d6a24a] to-transparent lg:hidden" aria-hidden="true"></div>
      </div>

      {{-- Link columns --}}
      @foreach ($columns as $heading => $links)
        <nav aria-labelledby="footer-{{ strtolower($heading) }}">
          <h2 id="footer-{{ strtolower($heading) }}" class="[font-family:'JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">{{ $heading }}</h2>

          <ul class="mt-5 space-y-3">
            @foreach ($links as [$label, $href])
              <li>
                <a
                  href="{{ $href }}"
                  class="rounded-sm text-[.9rem] text-[#a49cba] no-underline transition-colors hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70 focus-visible:ring-offset-4 focus-visible:ring-offset-[#14111c]"
                >{{ $label }}</a>
              </li>
            @endforeach
          </ul>
        </nav>
      @endforeach

      {{-- Connect. Given the full row below the link columns until the layout is wide enough for
           the icons to sit in a column of their own without crowding them. --}}
      <div class="col-span-2 sm:col-span-3 lg:col-span-1">
        <h2 id="footer-connect" class="[font-family:'JetBrains_Mono',monospace] text-[.72rem] uppercase tracking-[.22em] text-[#d6a24a]">Connect</h2>

        <ul class="mt-5 flex flex-wrap gap-2.5" aria-labelledby="footer-connect">
          @foreach ($socials as [$label, $href, $path, $viewBox])
            <li>
              <a
                href="{{ $href }}"
                aria-label="HydePHP on {{ $label }}"
                title="{{ $label }}"
                class="flex h-10 w-10 items-center justify-center rounded-[10px] border border-[rgba(164,156,186,.16)] bg-[#1c1827] text-[#a49cba] transition-colors hover:border-[rgba(214,162,74,.45)] hover:bg-[#231e30] hover:text-[#d6a24a] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70 focus-visible:ring-offset-4 focus-visible:ring-offset-[#14111c]"
              >
                <svg width="18" height="18" viewBox="{{ $viewBox }}" fill="currentColor" aria-hidden="true" focusable="false">
                  <path d="{{ $path }}" />
                </svg>
              </a>
            </li>
          @endforeach
        </ul>
      </div>

    </div>
  </div>

  <div class="border-t border-[rgba(164,156,186,.16)]">
    <div class="mx-auto flex max-w-[1160px] flex-wrap items-center justify-center gap-x-6 gap-y-2 px-7 py-6 text-[.85rem] text-[#a49cba]">
      <span>Site proudly built with <a class="rounded-sm text-[#8d7bf5] no-underline transition-colors hover:text-[#a794ff] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70 focus-visible:ring-offset-4 focus-visible:ring-offset-[#14111c]" href="https://github.com/hydephp/hyde">HydePHP</a> 🎩</span>
    </div>
  </div>
</footer>
