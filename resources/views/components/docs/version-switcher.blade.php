@php
    use Hyde\Foundation\Facades\Routes;
    use Illuminate\Support\Str;

    // Versions defined in config/docs.php:
    // 'versions' => ['1.x' => 'old', '2.x' => 'current', 'master' => 'upcoming']
    $versions = config('docs.versions', []);

    // Get current route (Hyde usually passes $route to layouts)
    $route = $route ?? \Hyde\Hyde::currentRoute();

    // Expect route keys like: 'docs/2.x/installation' or 'docs/2.x/index'
    $routeKey = $route?->getRouteKey() ?? '';
    $afterDocs = Str::after($routeKey, 'docs/');
    $currentVersion = Str::before($afterDocs, '/');
    $currentSlug = Str::after($afterDocs, $currentVersion.'/'); // may be 'index' or 'foo/bar.html-ish'
    $currentSlug = $currentSlug === '' ? 'index' : $currentSlug;

    $flattened = config('docs.flattened_output_paths', true);

    // Build a candidate route key for a given version that keeps the same page.
    $buildCandidate = function (string $ver) use ($flattened, $currentSlug) {
        if ($flattened) {
            // Flattened outputs: use the basename
            $slug = basename($currentSlug);
            return "docs/{$ver}/{$slug}";
        }
        // Nested outputs: keep path
        $slug = trim($currentSlug, '/');
        return "docs/{$ver}/{$slug}";
    };

    // Resolve a URL for a version: same page if exists, else docs/{ver}/index
    $urlFor = function (string $ver) use ($buildCandidate) {
        if ($candidate = Routes::get($buildCandidate($ver))) {
            return $candidate->getLink();
        }
        if ($index = Routes::get("docs/{$ver}/index")) {
            return $index->getLink();
        }
        return null; // disabled if no route found
    };
@endphp

@if($versions && count($versions) > 1)
<div class="hidden md:flex items-center gap-2 absolute right-4 top-4 z-30">
    <label class="sr-only" for="version-switcher">Version</label>

    <div x-data="{ open:false }" class="relative">
        <button id="version-switcher"
                type="button"
                @click="open = !open"
                class="px-3 py-1.5 text-sm rounded-md border border-gray-300 dark:border-gray-700
                       bg-white/80 dark:bg-gray-800/80 backdrop-blur
                       hover:bg-white dark:hover:bg-gray-800">
            <span class="font-medium">{{ $currentVersion ?: 'unknown' }}</span>
            @if(isset($versions[$currentVersion]))
                <span class="ml-2 text-xs text-gray-500">{{ $versions[$currentVersion] }}</span>
            @endif
            <svg class="inline w-4 h-4 ml-1 align-middle" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.173l3.71-3.94a.75.75 0 111.08 1.04l-4.24 4.5a.75.75 0 01-1.08 0l-4.24-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
            </svg>
        </button>

        <div x-cloak x-show="open" @click.outside="open=false"
             class="absolute right-0 mt-2 min-w-[12rem] rounded-lg border border-gray-200 dark:border-gray-700
                    bg-white dark:bg-gray-800 shadow-lg p-1">
            @foreach($versions as $ver => $label)
                @php $url = $urlFor($ver); @endphp
                <a href="{{ $url ?? '#' }}"
                   class="flex items-center justify-between px-3 py-2 rounded-md text-sm
                          @if($ver === $currentVersion) bg-gray-100 dark:bg-gray-700 font-semibold @else hover:bg-gray-50 dark:hover:bg-gray-700 @endif
                          @unless($url) opacity-50 pointer-events-none @endunless">
                    <span>{{ $ver }}</span>
                    <span class="text-xs text-gray-500">{{ $label }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endif
