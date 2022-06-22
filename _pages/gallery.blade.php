@extends('hyde::layouts.app')
@section('content')
@php($title = 'Gallery')

<link rel="stylesheet" href="https://github.githubassets.com/assets/gist-embed-d3de7836d004.css">

<script>
	// Are animations enabled?
	var animationsEnabled = true;
	
	// Disable animations if prefers-reduced-motion is enabled
	if (window.matchMedia && window.matchMedia('(prefers-reduced-motion)').matches) {
		console.log('Prefers reduced motion detected. Animations disabled.');
		animationsEnabled = false;
	} else {
		// Add the stylesheet
		var link = document.createElement('link');
		link.rel = 'stylesheet';
		link.href = 'https://unpkg.com/aos@next/dist/aos.css';
		document.head.appendChild(link);
	}
</script>
<section id="first" class="py-16 px-4 lg:min-h-screen text-center">
	<h1 class="text-2xl md:3-xl lg:text-5xl font-black text-slate-700 dark:text-gray-100 px-3 my-3">
		Turn Markdown into Blog Posts
	</h1>
	<strong class="text-xl md:text-2xl lg:text-3xl text-slate-800 dark:text-gray-200 px-3">
		Write content. Not code.*
	</strong>
	<div class="text-xl text-slate-700  dark:text-gray-100">
		<small>*Unless you want to, of course.</small>
	</div>
	<style>
		#argon-section-header {
			align-items: center;
		}
	</style>
	<div class="lg:hidden sm:px-8 py-4">
		@include('components.gallery.example-delta-interactive-header')
	</div>
	<div id="argon-section-header" class="hidden lg:flex max-w-7xl my-8 mx-auto items-center clear-both lg:px-8">
		<div class="float-left z-10" style="margin-right: -40px;" data-aos="fade-right">
			@include('components.gallery.example-argon-header')
		</div>
		<div class="float-right" data-aos="fade-up">
			@include('components.gallery.example-argon-image-header')
		</div>
	</div>
	<div class="clear-both"></div>
</section>
@include('components.gallery.section-pages')
<section class="mx-auto items-center text-center py-16 px-4 lg:min-h-screen bg-slate-100 dark:bg-slate-800">
	<h1 class="text-2xl md:3-xl lg:text-5xl font-black text-slate-700 dark:text-gray-100 px-3 my-3">
		Beautiful Documentation Pages
	</h1>
	<strong class="text-xl md:text-2xl lg:text-3xl text-slate-800 dark:text-gray-200 px-3">
		All without breaking a sweat.
	</strong>

	<div class="p-8  max-w-5xl mx-auto" data-aos="fade-up">
		<picture>
			<source media="(max-width: 425px)" srcset="./media/documentation-page-example-ios.png">
			<img class="shadow-2xl mx-auto"
				src="./media/documentation-page-example-mbp.png"
				alt="documentation-page-example">
		</picture>
	</div>
	<p>
		<a href="https://github.com/hydephp/examples/blob/24218d98cf86aea217729337ad80801d6930f5a0/examples/markdown-documentation/installation.md">View source on GitHub</a>
	</p>
</section>
<section class="mx-auto items-center text-center py-16 px-4 lg:min-h-screen">
	<h1 class="text-2xl md:3-xl lg:text-5xl font-black text-slate-700 dark:text-gray-100 px-3 my-3">
		Fully Mobile Friendly, of course.
	</h1>
	<strong class="text-xl md:text-2xl lg:text-3xl text-slate-800 dark:text-gray-200 px-3">
		Enjoy your site in any size of screen.
	</strong>
	<div class="devices relative w-full flex gap-6 lg:gap-10 snap-x snap-mandatory overflow-x-auto lg:overflow-hidden justify-center py-8 lg:mt-4">
		<div class="snap-center shrink-0">
			<div class="shrink-0 w-4 sm:w-48"></div>
		</div>
		<div class="snap-center shrink-0 first:pl-8 last:pr-8">
			<img class="shrink-0 rounded-lg w-auto lg:w-80" data-aos="fade-left" src="https://raw.githubusercontent.com/hydephp/examples/master/media/devices/post_example_ios_8.png" />
		</div>
		<div class="snap-center shrink-0 first:pl-8 last:pr-8">
			<img class="shrink-0 rounded-lg w-auto lg:w-80" data-aos="fade-up" src="https://raw.githubusercontent.com/hydephp/examples/master/media/devices/post_feed_ios_8.png" />
		</div>
		<div class="snap-center shrink-0 first:pl-8 last:pr-8">
			<img class="shrink-0 rounded-lg w-auto lg:w-80" data-aos="fade-right" src="https://raw.githubusercontent.com/hydephp/examples/master/media/devices/docs_example_ios_8.png" />
		</div>
		<div class="snap-center shrink-0">
			<div class="shrink-0 w-4 sm:w-48"></div>
		</div>
	</div>
</section>
<section class="mx-auto items-center py-16 px-4 lg:min-h-screen  bg-slate-100 dark:bg-slate-800">
	<header class="text-center">
		<h1 class="text-2xl md:3-xl lg:text-5xl font-black text-slate-700 dark:text-gray-100 px-3 my-3 text-center ">
			Clean Semantic HTML
		</h1>
		<strong class="text-xl md:text-2xl lg:text-3xl text-slate-800 dark:text-gray-200 px-3 text-center ">
			Data Rich, SEO Friendly, and Accessible.
		</strong>
		<p class="text-md max-w-2xl mx-auto mt-4">
			The Hyde Blogging Module is compiles your Markdown into Semantic HTML enriched with Microdata.
			Automatic ARIA-roles ensure that your content is accessible to those using screenreaders.
		</p>
		<div class="prose dark:prose-invert mx-auto mt-2">
			<p>
				This section will show you some of the rich data that Hyde is able to extract and generate from a simple Markdown post.
			</p>
			<p>
				Try switching the tabs using the radio buttons to see diffrent views!
			</p>
		</div>
		<p class="sm:hidden">
			<strong>The mobile version of this section is still work in progress.</strong>
		</p>
	</header>
	<style>
		.explorer-section {
			margin: 40px auto;
			max-width: 1200px;
		}
		.explorer-section iframe {
			min-width: 640px;
			min-height: 800px;
			margin: 40px auto;
		}
	</style>
	
	<section class="explorer-section">
		<iframe loading="lazy" width="100%" height="100%" src="https://cdn.desilva.se/frontend/df6bc4b6-8665-4125-89e3-aee46ef7905e/explorer.html" frameborder="0"></iframe>
	</section>
</section>

<style>
	.devices img {
		max-height: 80vh;
	}
</style>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
	// If animations are enabled
	if (animationsEnabled === true) {
		AOS.init();
	}
</script> 
@endsection