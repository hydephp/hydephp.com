@php
$links = Hyde\Framework\Actions\GeneratesNavigationMenu::getNavigationLinks($currentPage);
$homeRoute = ($links[array_search('Home', array_column($links, 'title'))])['route'] ?? Hyde::pageLink('index.html');
@endphp

<nav aria-label="Main navigation" id="main-navigation" class="flex flex-wrap items-center justify-between p-4 shadow-lg sm:shadow-xl md:shadow-none dark:bg-gray-800">
	<div class="flex flex-grow items-center flex-shrink-0 text-gray-700 dark:text-gray-200">
		@include('hyde::components.navigation.navigation-brand')

		<div class="ml-auto">
		@include('hyde::components.navigation.theme-toggle-button')
		</div>
	</div>

	<div class="block md:hidden">
		<button id="navigation-toggle-button" class="flex items-center px-3 py-1 hover:text-gray-700 dark:text-gray-200" aria-label="Toggle navigation menu">
			<svg title="Open Navigation Menu" class="dark:fill-gray-200" style="display: block;" id="open-main-navigation-menu-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><title>Open Menu</title><path d="M0 0h24v24H0z" fill="none"/><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
			<svg title="Close Navigation Menu" class="dark:fill-gray-200" style="display: none;" id="close-main-navigation-menu-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><title>Close Menu</title> <path d="M0 0h24v24H0z" fill="none"></path> <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path> </svg>
		</button>
	</div>

	<div id="main-navigation-links" class="w-full hidden md:flex flex-grow md:flex-grow-0 md:items-center md:w-auto px-6 -mx-4 border-t mt-3 pt-3 md:border-none md:mt-0 md:py-0 border-gray-200 dark:border-gray-700">
		<ul aria-label="Navigation links" class="md:flex-grow md:flex justify-end">
			@foreach ($links as $item)
			<li class="md:mx-2">
				@include('hyde::components.navigation.navigation-link')
			</li>
			@endforeach
		</ul>
		<a id="docs-nav-button" href="docs" class="relative mb-5 ml-4 sm:mb-0">
			<span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-black rounded"></span>
			<span class="relative inline-block w-full h-full px-3 py-1 text-base font-bold transition duration-100 bg-white border-2 border-black rounded fold-bold hover:bg-violet-400 hover:text-gray-900">Documentation</span>
		</a>
	</div>
</nav>
