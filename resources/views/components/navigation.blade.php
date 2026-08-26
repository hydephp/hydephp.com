@php
    /** @var \Hyde\Framework\Features\Navigation\NavigationMenu $navigation */
    $navigation = app('navigation.main');

    $items = collect($navigation->getItems())->flatMap(fn ($item) =>
        $item instanceof \Hyde\Framework\Features\Navigation\NavigationGroup
            ? $item->getItems()
            : [$item]
    );

    $home       = \Hyde\Foundation\Facades\Routes::get('index');
    $getStarted = \Hyde\Foundation\Facades\Routes::get('docs/2.x/index');
    $github     = 'https://github.com/hydephp/hyde';
@endphp

<nav
    data-navigation
    aria-label="Main navigation"
    class="sticky top-0 z-50 border-b border-[rgba(164,156,186,.16)] bg-[#14111c]/85 backdrop-blur-xl"
>
    <div class="mx-auto flex h-16 max-w-[1160px] items-center gap-7 px-7">
        {{-- Brand --}}
        <a
            href="{{ $home ?? '/' }}"
            class="flex items-center gap-2.5 rounded-sm font-['Playfair_Display',serif] opacity-90 text-xl font-semibold text-white no-underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70 focus-visible:ring-offset-4 focus-visible:ring-offset-[#14111c]"
        >
            <img src="{{ Asset::get('logo.svg') }}" alt="HydePHP Logo" class="inline-block" style="height: 2.5rem">
            HydePHP
        </a>

        {{-- Desktop links --}}
        <ul class="ml-auto hidden items-center gap-6 md:flex">
            @foreach ($items as $item)
                <li>
                    <a
                        href="{{ $item }}"
                        @foreach ($item->getExtraAttributes() as $attr => $value) {{ $attr }}="{{ $value }}" @endforeach
                        @if ($item->isActive()) aria-current="page" @endif
                        @class([
                            'rounded-sm text-[.92rem] no-underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70 focus-visible:ring-offset-4 focus-visible:ring-offset-[#14111c]',
                            'text-[#a49cba] hover:text-white' => ! $item->isActive(),
                            'relative pb-0.5 text-white after:absolute after:inset-x-0 after:-bottom-0.5 after:h-0.5 after:bg-gradient-to-r after:from-[#d6a24a] after:to-[#8d7bf5]' => $item->isActive(),
                        ])
                    >{{ $item->getLabel() }}</a>
                </li>
            @endforeach

            <li>
                <a
                    href="{{ $github }}"
                    target="_blank"
                    rel="noopener"
                    aria-label="View HydePHP on GitHub"
                    title="GitHub"
                    class="flex h-9 w-9 items-center justify-center rounded-full border border-[rgba(164,156,186,.24)] bg-white/[.025] text-[#a49cba] transition-[color,border-color,background-color] hover:border-[rgba(164,156,186,.45)] hover:bg-white/[.05] hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70 focus-visible:ring-offset-4 focus-visible:ring-offset-[#14111c]"
                >
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">
                        <path d="M12 .5C5.73.5.5 5.73.5 12a11.5 11.5 0 0 0 7.86 10.92c.58.1.79-.25.79-.56v-2c-3.2.7-3.88-1.54-3.88-1.54-.53-1.34-1.29-1.7-1.29-1.7-1.05-.72.08-.7.08-.7 1.16.08 1.77 1.19 1.77 1.19 1.03 1.77 2.71 1.26 3.37.96.1-.75.4-1.26.73-1.55-2.56-.29-5.25-1.28-5.25-5.7 0-1.26.45-2.29 1.19-3.1-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11 11 0 0 1 5.79 0c2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.12 3.05.74.81 1.18 1.84 1.18 3.1 0 4.43-2.69 5.4-5.26 5.69.41.36.78 1.07.78 2.16v3.2c0 .31.21.67.8.56A11.5 11.5 0 0 0 23.5 12C23.5 5.73 18.27.5 12 .5Z" />
                    </svg>
                </a>
            </li>

            <li>
                <a
                    href="{{ $getStarted ?? '#' }}"
                    class="rounded-full border border-[#aa8038]/70 bg-[#aa8038]/[.025] px-5 py-[7px] text-[.92rem] font-semibold text-[#bd9145] no-underline shadow-[0_0_10px_rgba(170,128,56,.08)] transition-[color,border-color,background-color,box-shadow] hover:border-[#bd9145]/85 hover:bg-[#aa8038]/[.05] hover:text-[#c9a05a] hover:shadow-[0_0_12px_rgba(170,128,56,.12)] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#aa8038]/60 focus-visible:ring-offset-4 focus-visible:ring-offset-[#14111c]"
                >Get started</a>
            </li>
        </ul>

        {{-- Mobile toggle --}}
        <button
            type="button"
            data-navigation-toggle
            aria-expanded="false"
            aria-controls="main-navigation-mobile"
            aria-label="Toggle navigation menu"
            class="ml-auto flex items-center justify-center rounded-lg p-2 text-[#a49cba] transition-colors hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70 md:hidden"
        >
            <svg data-navigation-open-icon width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                <path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <svg data-navigation-close-icon class="hidden" width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                <path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
    </div>

    {{-- Mobile menu --}}
    <div
        id="main-navigation-mobile"
        data-navigation-menu
        hidden
        class="border-b border-[rgba(164,156,186,.16)] bg-[#14111c]/95 backdrop-blur-xl md:hidden"
    >
        <ul class="mx-auto flex max-w-[1160px] flex-col gap-1 px-7 py-4">
            @foreach ($items as $item)
                <li>
                    <a
                        href="{{ $item }}"
                        data-navigation-link
                        @foreach ($item->getExtraAttributes() as $attr => $value) {{ $attr }}="{{ $value }}" @endforeach
                        @if ($item->isActive()) aria-current="page" @endif
                        @class([
                            'block rounded-lg px-3 py-2 text-[.95rem] no-underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70',
                            'text-[#a49cba] hover:bg-white/5 hover:text-white' => ! $item->isActive(),
                            'border-l-2 border-[#d6a24a] bg-white/5 pl-[10px] font-medium text-white' => $item->isActive(),
                        ])
                    >{{ $item->getLabel() }}</a>
                </li>
            @endforeach

            <li>
                <a
                    href="{{ $github }}"
                    target="_blank"
                    rel="noopener"
                    data-navigation-link
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-[.95rem] text-[#a49cba] no-underline transition-colors hover:bg-white/5 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70"
                >
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">
                        <path d="M12 .5C5.73.5.5 5.73.5 12a11.5 11.5 0 0 0 7.86 10.92c.58.1.79-.25.79-.56v-2c-3.2.7-3.88-1.54-3.88-1.54-.53-1.34-1.29-1.7-1.29-1.7-1.05-.72.08-.7.08-.7 1.16.08 1.77 1.19 1.77 1.19 1.03 1.77 2.71 1.26 3.37.96.1-.75.4-1.26.73-1.55-2.56-.29-5.25-1.28-5.25-5.7 0-1.26.45-2.29 1.19-3.1-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11 11 0 0 1 5.79 0c2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.12 3.05.74.81 1.18 1.84 1.18 3.1 0 4.43-2.69 5.4-5.26 5.69.41.36.78 1.07.78 2.16v3.2c0 .31.21.67.8.56A11.5 11.5 0 0 0 23.5 12C23.5 5.73 18.27.5 12 .5Z" />
                    </svg>
                    GitHub
                </a>
            </li>

            <li class="mt-2">
                <a
                    href="{{ $getStarted ?? '#' }}"
                    data-navigation-link
                    class="block rounded-full border border-[#aa8038]/70 bg-[#aa8038]/[.025] px-4 py-2 text-center text-[.95rem] font-semibold text-[#bd9145] no-underline shadow-[0_0_10px_rgba(170,128,56,.08)] transition-[color,border-color,background-color,box-shadow] hover:border-[#bd9145]/85 hover:bg-[#aa8038]/[.05] hover:text-[#c9a05a] hover:shadow-[0_0_12px_rgba(170,128,56,.12)] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#aa8038]/60"
                >Get started</a>
            </li>
        </ul>
    </div>
</nav>
