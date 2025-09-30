@php
    use Hyde\Foundation\Facades\Routes;
    use Illuminate\Support\Str;

    $versions = config('docs.versions', []);
    $route = $route ?? \Hyde\Hyde::currentRoute();

    $routeKey = $route?->getRouteKey() ?? '';
    $afterDocs = Str::after($routeKey, 'docs/');
    $currentVersion = Str::before($afterDocs, '/');
    $currentSlug = Str::after($afterDocs, $currentVersion.'/');
    $currentSlug = $currentSlug === '' ? 'index' : $currentSlug;

    $flattened = config('docs.flattened_output_paths', true);

    $buildCandidate = function (string $ver) use ($flattened, $currentSlug) {
        $slug = $flattened ? basename($currentSlug) : trim($currentSlug, '/');
        return "docs/{$ver}/{$slug}";
    };

    $urlFor = function (string $ver) use ($buildCandidate) {
        if ($candidate = Routes::get($buildCandidate($ver))) return $candidate->getLink();
        if ($index = Routes::get("docs/{$ver}/index")) return $index->getLink();
        return null;
    };

    // Shared button style to keep heights identical
    $btn = 'inline-flex items-center gap-2 h-9 px-3 text-sm rounded-md border border-gray-300 dark:border-gray-700
            bg-white/80 dark:bg-gray-800/80 backdrop-blur hover:bg-white dark:hover:bg-gray-800';
@endphp

{{-- Search button (desktop) --}}
<div class="hidden md:flex items-center gap-2 absolute right-4 top-4 z-30">
    <button type="button"
            @click="searchWindowOpen = true; $nextTick(() => setTimeout(() => document.getElementById('search-input')?.focus(), 0));"
            class="{{ $btn }}"
            aria-label="Open search window">
        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M12.9 14.32a7 7 0 111.414-1.414l3.387 3.387a1 1 0 01-1.414 1.414l-3.387-3.387zM14 9a5 5 0 11-10 0 5 5 0 0110 0z" clip-rule="evenodd"/>
        </svg>
        <span>Search</span>
        <kbd class="ml-1 text-[10px] px-1.5 py-0.5 rounded border border-gray-300 dark:border-gray-600">/</kbd>
    </button>
</div>
<style>
@media (min-width: 768px){ #searchMenuButton{ display:none !important; } }
</style>