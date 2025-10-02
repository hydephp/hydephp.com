@php
    // Logic from master
    $navigation = app('navigation.main');

    // Keep this for redesign styling conditions
    $isHomepage = isset($page) && $page->routeKey === 'index';

    // Check if banner is enabled
    $bannerConfig = config('hyde.banner');
    $bannerEnabled = $bannerConfig && isset($bannerConfig['text']) && $bannerConfig['enabled'];
@endphp

<nav aria-label="Main navigation" id="main-navigation"
     class="@if($isHomepage) absolute @if($bannerEnabled) top-12 @else top-0 @endif left-0 right-0 z-50 @else relative @endif">
    <div class="@if($isHomepage) backdrop-blur-md bg-gradient-to-b from-transparent to-[rgba(8,15,30,.35)] border-b border-white/10 @else bg-white dark:bg-gray-800 shadow-lg sm:shadow-xl md:shadow-none @endif">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex h-16 md:h-18 items-center justify-between">
                <div class="flex items-center">
                    @include('hyde::components.navigation.navigation-brand')

					<!-- Desktop Navigation Links -->
					<div class="hidden md:flex items-center gap-8">
						@foreach ($navigation->getItems() as $item)
							@include('hyde::components.navigation.navigation-link')
						@endforeach
					</div>

					<!-- Documentation Button -->
					<a id="docs-nav-button" href="{{ DocumentationPage::home() }}" class="@if($isHomepage) relative rounded-full px-4 py-2 font-semibold text-white bg-[#0B1220] shadow-[0_0_20px_rgba(139,92,246,0.3)] before:absolute before:inset-0 before:-z-10 before:rounded-full before:bg-gradient-to-r before:from-purple-500 before:to-pink-500 before:p-[1px] before:[mask:linear-gradient(#fff_0_0)_content-box,linear-gradient(#fff_0_0)] before:[mask-composite:xor] hover:shadow-[0_0_30px_rgba(139,92,246,0.5)] transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:ring-offset-2 focus:ring-offset-transparent @else inline-block relative mb-5 md:ml-4 mt-4 md:mt-0 md:mb-0 group @endif">
						@if($isHomepage)
							Documentation
						@else
							<span class="absolute top-0 left-0 w-full h-full hidden md:inline mt-1 ml-1 bg-black dark:bg-gray-600 rounded group-hover:m-0"></span>
							<span class="relative inline-block md:w-full h-full px-3 py-1 text-base font-bold bg-white border-2 border-black rounded fold-bold group-hover:bg-violet-300 dark:group-hover:bg-violet-200 group-hover:text-gray-900 dark:text-black">Documentation</span>
						@endif
					</a>

					<!-- Mobile Menu Toggle -->
					<div class="block md:hidden">
						<button id="navigation-toggle-button" @click="navigationOpen = ! navigationOpen" class="flex items-center px-3 py-1 @if($isHomepage) text-slate-200/80 hover:text-slate-200 @else hover:text-gray-700 dark:text-gray-200 @endif"
								aria-label="Toggle navigation menu">
							<svg x-show="! navigationOpen" title="Open Navigation Menu" class="@if($isHomepage) fill-slate-200/80 @else dark:fill-gray-200 @endif" style="display: block;"
								 id="open-main-navigation-menu-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
								 width="24"><title>Open Menu</title>
								<path d="M0 0h24v24H0z" fill="none"/>
								<path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
							</svg>
							<svg x-show="navigationOpen" title="Close Navigation Menu" class="@if($isHomepage) fill-slate-200/80 @else dark:fill-gray-200 @endif" style="display: none;"
								 id="close-main-navigation-menu-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
								 width="24"><title>Close Menu</title>
								<path d="M0 0h24v24H0z" fill="none"></path>
								<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
							</svg>
						</button>
					</div>

					@if(!$isHomepage)
					<div class="ml-auto hidden md:block">
						<x-hyde::navigation.theme-toggle-button />
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>

	<!-- Mobile Navigation Links -->
	<div id="main-navigation-links"
		 class="md:hidden @if($isHomepage) bg-[rgba(8,15,30,.9)] backdrop-blur-md border-b border-white/10 @else bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 @endif"
		 :class="navigationOpen ? '' : 'hidden'" x-cloak>
		<div class="mx-auto max-w-7xl px-6">
			<ul aria-label="Navigation links" class="py-4 space-y-2">
				@foreach ($navigation->getItems() as $item)
					<li>
						<x-hyde::navigation.navigation-link :item="$item"/>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</nav>