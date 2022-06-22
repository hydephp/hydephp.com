@extends('hyde::layouts.app')
@section('content')
@php($title = 'Elegant and Powerful Static App Builder')
<style>
	mark {
		background: linear-gradient(-100deg, #fece2f2f, #fddf47a4 95%, #fece2f27);
		border-radius: 1em 0;
		padding: 0.125rem 0.5rem;
	}
	.dark mark {
		background: linear-gradient(-100deg, #fece2fbe, #fddf47a4 95%, #fece2fbd);
	}
	/* Gradients by https://uigradients.com/ */
	.dark .app-gradient {
		/* Royal */
		background: #141E30; /* fallback for old browsers */
		background: -webkit-linear-gradient(to left bottom, #243B55, #141E30); /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to left bottom, #243B55, #141E30); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	}
	#main-navigation {
		z-index: 10;
	}
</style>
@push('meta')
<meta name="author" content="Caen De Silva">
<meta name="description" content="HydePHP - Elegant and Powerful Static App Builder">
<meta name="keywords" content="HydePHP, Static App Builder, Static Sites, Blogs, Documentation">
@endpush

<header id="content" class="app-gradient w-full py-32 lg:pt-44 flex flex-col text-center items-center justify-center min-h-screen -mt-16">
	<h1 class="text-5xl sm:text-6xl md:text-7xl text-gray-800 font-black leading-7 md:leading-10 dark:text-white">
		HydePHP
	</h1>
	<div class="max-w-full sm:max-w-3xl p-8 mt-4">
		<strong role="doc-subtitle" class="text-3xl sm:text-4xl leading-8">
			A Laravel-powered 
			<strong>Static App Generator</strong>
		</strong>
		<p class="text-xl sm:text-2xl mt-4 sm:mt-2">
			that allows you to create blogs, documentation sites, and more. 
		</p>
		<!-- Syntax highlighted by torchlight.dev -->
		<pre class="hidden sm:block" style="margin-top: 2.5rem; margin-bottom: 0.5rem;"><code data-theme="material-theme-palenight" data-lang="bash" class="torchlight" style="background-color: #292D3E; padding: 0.5rem 1rem; border-radius: 0.25rem;"><span style="color: #FFCB6B;">composer</span> <span style="color: #C3E88D;">create-project hyde/hyde</span> <span style="color: #CCCCCC">--stability=dev</span></code></pre>
		<div class="sm:hidden">
		<pre class="max-w-full" style="margin-top: 2.5rem; margin-bottom: 0.5rem;"><code data-theme="material-theme-palenight" data-lang="bash" class="torchlight flex flex-wrap justify-center" style="background-color: #292D3E; padding: 0.5rem 1rem; border-radius: 0.25rem;"><span style="color: #FFCB6B; margin: 0 4px;">composer</span> <span style="color: #C3E88D; margin: 0 4px;">create-project hyde/hyde</span> <span style="color: #CCCCCC" margin: 0 4px;>--stability=dev</span></code></pre>
	</div>
	</div>
	<div class="sm:my-4 max-w-full flex flex-wrap justify-center">
		<a href="docs/master/index.html" class="btn btn-primary">Documentation</a>
		<a href="#features" class="btn btn-default">Explore the Features</a>
	</div>
</header>


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
<section id="first" class="py-16 px-4 text-center">
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
<section class="mx-auto items-center text-center py-16 px-4 bg-white dark:bg-slate-800">
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
<section class="mx-auto items-center text-center py-16 px-4">
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
			<img class="shrink-0 rounded-lg w-auto lg:w-70" style="max-width: 200px" data-aos="fade-left" src="https://raw.githubusercontent.com/hydephp/examples/master/media/devices/post_example_ios_8.png" />
		</div>
		<div class="snap-center shrink-0 first:pl-8 last:pr-8">
			<img class="shrink-0 rounded-lg w-auto lg:w-70" style="max-width: 200px" data-aos="fade-up" src="https://raw.githubusercontent.com/hydephp/examples/master/media/devices/post_feed_ios_8.png" />
		</div>
		<div class="snap-center shrink-0 first:pl-8 last:pr-8">
			<img class="shrink-0 rounded-lg w-auto lg:w-70" style="max-width: 200px" data-aos="fade-right" src="https://raw.githubusercontent.com/hydephp/examples/master/media/devices/docs_example_ios_8.png" />
		</div>
		<div class="snap-center shrink-0">
			<div class="shrink-0 w-4 sm:w-48"></div>
		</div>
	</div>
</section>
<section class="mx-auto items-center py-16 px-4  bg-white dark:bg-slate-800">
	<header class="text-center">
		<h1 class="text-2xl md:3-xl lg:text-5xl font-black text-slate-700 dark:text-gray-100 px-3 my-3 text-center ">
			Clean Semantic HTML
		</h1>
		<strong class="text-xl md:text-2xl lg:text-3xl text-slate-800 dark:text-gray-200 px-3 text-center ">
			Data Rich, SEO Friendly, and Accessible.
		</strong>
		<p class="text-md max-w-2xl mx-auto mt-4">
			The Hyde Blogging Module is compiles your Markdown into Semantic HTML enriched with Microdata.
			Automatic ARIA-roles ensure that your content is accessible to screenreaders.
		</p>
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
@include('sections.posts')

<style> html, body { scroll-behavior: smooth; } </style>
@endsection
