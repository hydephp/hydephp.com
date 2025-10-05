@php
	$isActive = $item->isActive();
	$isHomepage = isset($page) && $page->routeKey === 'index';

	if ($isHomepage) {
		// Homepage styling
		$linkClasses = 'relative font-medium tracking-tight text-[#E7E9FF]/80 hover:text-[#E7E9FF] hover:drop-shadow-[0_0_10px_rgba(103,232,249,0.25)] transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:ring-offset-2 focus:ring-offset-transparent rounded px-1';
		$activeClasses = $isActive ? ' after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:w-full after:bg-gradient-to-r after:from-purple-500 after:to-pink-500' : '';
		$classes = $linkClasses . $activeClasses;
	} else {
		// Default styling for other pages
		$classes = $isActive
			? 'my-2 md:my-0 py-1 text-gray-700 hover:text-gray-900 dark:text-gray-100 border-l-4 border-indigo-500 md:border-none font-medium -ml-6 pl-5 md:ml-0 md:pl-0 bg-gray-100 dark:bg-gray-800 md:bg-transparent dark:md:bg-transparent'
			: 'my-2 md:my-0 py-1 text-gray-700 hover:text-gray-900 dark:text-gray-100';
	}
@endphp
<a href="{{ $item->getLink() }}" @if($isActive) aria-current="page" @endif class="{{ $classes }}">{{ $item->getLabel() }}</a>
