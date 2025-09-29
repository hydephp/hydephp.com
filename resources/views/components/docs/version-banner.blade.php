@php
    use Hyde\Foundation\Facades\Routes;
    use Illuminate\Support\Str;

    $versions = config('docs.versions', []);
    $currentLabelKey = collect($versions)->search('current');
    $route = $route ?? \Hyde\Hyde::currentRoute();

    $routeKey = $route?->getRouteKey() ?? '';
    $afterDocs = Str::after($routeKey, 'docs/');
    $viewedVersion = Str::before($afterDocs, '/');
    $slug = Str::after($afterDocs, $viewedVersion.'/');
    $slug = $slug === '' ? 'index' : $slug;

    $flattened = config('docs.flattened_output_paths', true);

    $buildCandidate = function (string $ver) use ($flattened, $slug) {
        $s = $flattened ? basename($slug) : trim($slug, '/');
        return "docs/{$ver}/{$s}";
    };

    $urlFor = function (string $ver) use ($buildCandidate) {
        if ($candidate = Routes::get($buildCandidate($ver))) return $candidate->getLink();
        if ($index = Routes::get("docs/{$ver}/index")) return $index->getLink();
        return null;
    };

    $viewedLabel = $versions[$viewedVersion] ?? null;
    $isCurrent = $viewedLabel === 'current';

    // Color sets
    $styles = [
        'old' => 'bg-amber-50 text-amber-900 border-amber-200 dark:bg-amber-900/20 dark:text-amber-100 dark:border-amber-800',
        'upcoming' => 'bg-indigo-50 text-indigo-900 border-indigo-200 dark:bg-indigo-900/20 dark:text-indigo-100 dark:border-indigo-800',
        null => 'bg-gray-50 text-gray-900 border-gray-200 dark:bg-gray-800/50 dark:text-gray-100 dark:border-gray-700',
    ];
    $bannerClass = $styles[$viewedLabel] ?? $styles[null];

    $currentUrl = $currentLabelKey ? $urlFor($currentLabelKey) : null;
@endphp

@if(!$isCurrent && $versions && $currentLabelKey)
<div x-data="{ show:true }" x-show="show"
     class="w-full border-b {{ $bannerClass }} sticky top-0 z-20 print:hidden" aria-live="polite">
    <div class="mx-auto max-w-5xl pl-4 pr-28 py-2.5"> {{-- pr-28 reserves space for right-side controls --}}
        <div class="flex items-center justify-center gap-2 text-center">
            {{-- Contextual icon --}}
            @if($viewedLabel === 'old')
                <svg class="w-4 h-4 text-amber-700 dark:text-amber-300 mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.721-1.36 3.486 0l6.518 11.592c.75 1.336-.213 3.009-1.742 3.009H3.48c-1.529 0-2.492-1.673-1.742-3.009l6.519-11.592zM11 14a1 1 0 11-2 0 1 1 0 012 0zm-1-2a.75.75 0 01-.75-.75V8a.75.75 0 011.5 0v3.25A.75.75 0 0110 12z" clip-rule="evenodd"/>
                </svg>
            @elseif($viewedLabel === 'upcoming')
                <svg class="w-4 h-4 text-indigo-700 dark:text-indigo-300 mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M5.05 12.28a7.5 7.5 0 019.9-9.9l-2.12 4.95a3.5 3.5 0 01-1.83 1.83L5.05 12.28z"/>
                    <path d="M3.28 16.72a.75.75 0 001.06 0l2.83-2.83-1.06-1.06-2.83 2.83a.75.75 0 000 1.06z"/>
                </svg>
            @else
                <svg class="w-4 h-4 text-gray-700 dark:text-gray-300 mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M18 10A8 8 0 11.001 9.999 8 8 0 0118 10zM9 9h2v6H9V9zm0-4h2v2H9V5z" clip-rule="evenodd"/>
                </svg>
            @endif

            {{-- Message --}}
            @if($viewedLabel === 'old')
                <p class="text-sm font-medium">
                    You’re browsing the <strong>{{ $viewedVersion }}</strong> docs.
                    @if($currentUrl)
                        <a href="{{ $currentUrl }}" class="underline underline-offset-2 font-semibold">Consider upgrading to {{ $currentLabelKey }}</a>.
                    @endif
                </p>
            @elseif($viewedLabel === 'upcoming')
                <p class="text-sm font-medium">
                    You’re viewing an upcoming version (<strong>{{ $viewedVersion }}</strong>). Content may change before release.
                    @if($currentUrl)
                        <a href="{{ $currentUrl }}" class="underline underline-offset-2 font-semibold">See current ({{ $currentLabelKey }})</a>
                    @endif
                </p>
            @else
                <p class="text-sm font-medium">
                    You’re viewing <strong>{{ $viewedVersion }}</strong>.
                    @if($currentUrl)
                        <a href="{{ $currentUrl }}" class="underline underline-offset-2 font-semibold">Go to current ({{ $currentLabelKey }})</a>
                    @endif
                </p>
            @endif

            {{-- Dismiss --}}
            <button @click="show=false" aria-label="Dismiss version notice"
                    class="ml-2 p-1 rounded hover:bg-black/5 dark:hover:bg-white/10">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    </div>
</div>
@endif