@php
	$isHomepage = isset($page) && $page->routeKey === 'index';
@endphp
<a aria-label="Home page link" href="{{ Routes::get('index') }}" class="flex items-center gap-2 @if($isHomepage) text-slate-200/90 hover:text-slate-200 @else font-bold px-4 text-gray-700 dark:text-gray-200 @endif transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:ring-offset-2 focus:ring-offset-transparent rounded">
	<img src="{{ Asset::mediaLink('logo-masked32-min.png') }}" alt="HydePHP Logo" class="@if($isHomepage) h-6 w-6 @else inline @endif">
	<span class="@if($isHomepage) font-semibold tracking-tight @else font-bold @endif">{{ config('hyde.name', 'HydePHP') }}</span>
</a>