@php
    use Hyde\Foundation\Facades\Routes;
    use Illuminate\Support\Str;
    use Hyde\Pages\DocumentationPage;

    // Versions config, e.g. ['1.x' => 'old', '2.x' => 'current', 'master' => 'upcoming']
    $versions = config('docs.versions', []);

    // Determine current docs version & slug from route key like "docs/2.x/installation"
    $route = \Hyde\Hyde::currentRoute();
    $routeKey = $route?->getRouteKey() ?? '';
    $afterDocs = Str::after($routeKey, 'docs/');
    $currentVersion = Str::before($afterDocs, '/');
    $currentSlug = Str::after($afterDocs, $currentVersion.'/');
    $currentSlug = $currentSlug === '' ? 'index' : $currentSlug;

    $flattened = config('docs.flattened_output_paths', true);

    // Build a candidate route key that keeps the same page name/path between versions.
    $buildCandidate = function (string $ver) use ($flattened, $currentSlug) {
        $slug = $flattened ? basename($currentSlug) : trim($currentSlug, '/');
        return "docs/{$ver}/{$slug}";
    };

    // Resolve a URL for a version: same page if exists, else docs/{ver}/index
    $urlFor = function (string $ver) use ($buildCandidate) {
        $candidateKey = $buildCandidate($ver);

        if (Routes::exists($candidateKey)) {
            return Routes::get($candidateKey)->getLink();
        }

        $indexKey = "docs/{$ver}/index";
        if (Routes::exists($indexKey)) {
            return Routes::get($indexKey)->getLink();
        }

        return '#';
    };
@endphp

<nav id="mobile-navigation"
     x-data="{ vopen:false }"
     class="bg-white dark:bg-gray-800 md:hidden flex justify-between w-full h-16 z-40 fixed left-0 top-0 p-4 leading-8 shadow-lg print:hidden">

    <strong class="px-2 mr-auto truncate">
        @if(DocumentationPage::home() !== null)
            <a href="{{ DocumentationPage::home() }}">
                {{ config('docs.sidebar.header', 'Documentation') }}
            </a>
        @else
            {{ config('docs.sidebar.header', 'Documentation') }}
        @endif
    </strong>

    <ul class="flex items-center gap-2">
        {{-- Mobile version switcher --}}
        @if($versions && count($versions) > 1 && $currentVersion)
            <li class="relative">
                <button type="button"
                        @click="vopen = !vopen"
                        aria-haspopup="listbox"
                        :aria-expanded="vopen.toString()"
                        class="h-8 px-2 rounded-md border border-gray-300 dark:border-gray-700
                               bg-white/80 dark:bg-gray-800/80 text-sm flex items-center gap-1">
                    <span class="font-medium">{{ $currentVersion }}</span>
                    <svg class="w-4 h-4 opacity-70" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.173l3.71-3.94a.75.75 0 111.08 1.04l-4.24 4.5a.75.75 0 01-1.08 0l-4.24-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <div x-cloak x-show="vopen" @click.outside="vopen=false"
                     class="absolute right-0 mt-2 w-40 rounded-lg border border-gray-200 dark:border-gray-700
                            bg-white dark:bg-gray-800 shadow-lg z-50 py-1">
                    @foreach($versions as $ver => $label)
                        <a href="{{ $urlFor($ver) }}"
                           class="flex items-center justify-between px-3 py-2 text-sm rounded-md
                                  @if($ver === $currentVersion) bg-gray-100 dark:bg-gray-700 font-semibold @else hover:bg-gray-50 dark:hover:bg-gray-700 @endif">
                            <span>{{ $ver }}</span>
                            <span class="text-[11px] text-gray-500">{{ $label }}</span>
                        </a>
                    @endforeach
                </div>
            </li>
        @endif

        <li class="h-8 flex">
            <x-hyde::navigation.theme-toggle-button class="opacity-75 hover:opacity-100"/>
        </li>

        <li class="h-8 flex">
            @include('hyde::components.docs.sidebar-toggle-button')
        </li>
    </ul>
</nav>