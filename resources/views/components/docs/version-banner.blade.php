@php
    use Hyde\Foundation\Facades\Routes;
    use Illuminate\Support\Str;

    $versions = config('docs.versions', []);                  // e.g. ['1.x'=>'old','2.x'=>'current','master'=>'upcoming']
    $currentLabelKey = collect($versions)->search('current'); // '2.x' typically
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
        if ($candidate = Routes::get($buildCandidate($ver))) {
            return $candidate->getLink();
        }
        if ($index = Routes::get("docs/{$ver}/index")) {
            return $index->getLink();
        }
        return null;
    };

    $viewedLabel = $versions[$viewedVersion] ?? null;
    $isCurrent = $viewedLabel === 'current';

    // Pick style by label
    $styles = [
        'old' => 'bg-amber-50 text-amber-900 border-amber-200 dark:bg-amber-900/20 dark:text-amber-100 dark:border-amber-800',
        'upcoming' => 'bg-indigo-50 text-indigo-900 border-indigo-200 dark:bg-indigo-900/20 dark:text-indigo-100 dark:border-indigo-800',
        'current' => 'hidden', // never shown
        null => 'bg-gray-50 text-gray-900 border-gray-200 dark:bg-gray-800/50 dark:text-gray-100 dark:border-gray-700',
    ];
    $bannerClass = $styles[$viewedLabel] ?? $styles[null];

    $currentUrl = $currentLabelKey ? $urlFor($currentLabelKey) : null;
@endphp

@if(!$isCurrent && $versions && $currentLabelKey)
<div x-data="{ show:true }" x-show="show"
     class="w-full border-b {{ $bannerClass }}">
    <div class="mx-auto max-w-5xl px-4 py-2.5 flex items-start md:items-center gap-3">
        @if($viewedLabel === 'old')
            <p class="text-sm">
                You’re viewing the <strong>{{ $viewedVersion }}</strong> documentation (old).
                @if($currentUrl)
                    <a href="{{ $currentUrl }}" class="underline hover:no-underline font-medium">Switch to current ({{ $currentLabelKey }})</a>.
                @endif
            </p>
        @elseif($viewedLabel === 'upcoming')
            <p class="text-sm">
                You’re viewing the <strong>{{ $viewedVersion }}</strong> documentation (upcoming/pre-release).
                @if($currentUrl)
                    <a href="{{ $currentUrl }}" class="underline hover:no-underline font-medium">See the current stable ({{ $currentLabelKey }})</a>.
                @endif
            </p>
        @else
            <p class="text-sm">
                You’re viewing <strong>{{ $viewedVersion }}</strong>. 
                @if($currentUrl)
                    <a href="{{ $currentUrl }}" class="underline hover:no-underline font-medium">Go to current ({{ $currentLabelKey }})</a>.
                @endif
            </p>
        @endif

        <button @click="show=false" aria-label="Dismiss version notice"
                class="ml-auto p-1 rounded hover:bg-black/5 dark:hover:bg-white/10">
            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </button>
    </div>
</div>
@endif
