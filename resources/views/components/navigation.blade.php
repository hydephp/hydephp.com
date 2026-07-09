{{--
    Main navigation — HydePHP

    A single, self-contained component. Pulls its links from `navigation.main`,
    keeps your visual design, adds an accessible mobile menu (Alpine.js) and a
    "Get started" button pointing at the docs.

    Place at:  resources/views/components/navigation.blade.php
    Use with:  <x-navigation />

    Needs:  Alpine.js (bundled with Hyde) and the "Fraunces" font loaded.
--}}

@php
    /** @var \Hyde\Framework\Features\Navigation\NavigationMenu $navigation */
    $navigation = app('navigation.main');

    // This nav is intentionally flat, so any dropdown groups are flattened into
    // plain links. Replace this with a group-aware loop if you ever want dropdowns.
    $items = collect($navigation->getItems())->flatMap(fn ($item) =>
        $item instanceof \Hyde\Framework\Features\Navigation\NavigationGroup
            ? $item->getItems()
            : [$item]
    );

    $home       = \Hyde\Foundation\Facades\Routes::get('index');
    $getStarted = \Hyde\Foundation\Facades\Routes::get('docs/index'); // change the key if your docs entry point differs
@endphp

<nav
    x-data="{ navigationOpen: false }"
    @keydown.escape.window="if (navigationOpen) { navigationOpen = false; $refs.toggle?.focus() }"
    aria-label="Main navigation"
    class="sticky top-0 z-50 border-b border-[rgba(164,156,186,.16)] bg-[#14111c]/85 backdrop-blur-xl"
>
    <div class="mx-auto flex h-16 max-w-[1160px] items-center gap-7 px-7">
        {{-- Brand --}}
        <a
            href="{{ $home ?? '/' }}"
            class="flex items-center gap-2.5 rounded-sm font-['Fraunces',serif] text-xl font-semibold text-white no-underline [font-variation-settings:'opsz'_40,'SOFT'_30] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70 focus-visible:ring-offset-4 focus-visible:ring-offset-[#14111c]"
        >
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" aria-hidden="true" focusable="false" class="block">
                <ellipse cx="13" cy="20" rx="11" ry="3" fill="#d6a24a"/>
                <rect x="6.5" y="5" width="13" height="15" rx="2" fill="#8d7bf5"/>
                <rect x="6.5" y="16" width="13" height="2.5" fill="#d6a24a"/>
            </svg>
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
                    href="{{ $getStarted ?? '#' }}"
                    class="rounded-full bg-[#d6a24a] px-4 py-[7px] text-[.92rem] font-semibold text-[#14111c] no-underline transition-colors hover:bg-[#e5b25e] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70 focus-visible:ring-offset-4 focus-visible:ring-offset-[#14111c]"
                >Get started</a>
            </li>
        </ul>

        {{-- Mobile toggle --}}
        <button
            type="button"
            x-ref="toggle"
            @click.stop="navigationOpen = ! navigationOpen"
            :aria-expanded="navigationOpen ? 'true' : 'false'"
            aria-controls="main-navigation-mobile"
            aria-label="Toggle navigation menu"
            class="ml-auto flex items-center justify-center rounded-lg p-2 text-[#a49cba] transition-colors hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70 md:hidden"
        >
            <svg x-show="! navigationOpen" style="display:block" width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                <path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <svg x-show="navigationOpen" style="display:none" width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                <path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
    </div>

    {{-- Mobile menu --}}
    <div
        id="main-navigation-mobile"
        x-show="navigationOpen"
        @click.outside="navigationOpen = false"
        x-transition:enter="transition ease-out duration-150 motion-reduce:transition-none"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100 motion-reduce:transition-none"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        style="display:none"
        class="border-b border-[rgba(164,156,186,.16)] bg-[#14111c]/95 backdrop-blur-xl md:hidden"
    >
        <ul class="mx-auto flex max-w-[1160px] flex-col gap-1 px-7 py-4">
            @foreach ($items as $item)
                <li>
                    <a
                        href="{{ $item }}"
                        @click="navigationOpen = false"
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

            <li class="mt-2">
                <a
                    href="{{ $getStarted ?? '#' }}"
                    @click="navigationOpen = false"
                    class="block rounded-full bg-[#d6a24a] px-4 py-2 text-center text-[.95rem] font-semibold text-[#14111c] no-underline transition-colors hover:bg-[#e5b25e] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#8d7bf5]/70"
                >Get started</a>
            </li>
        </ul>
    </div>
</nav>
