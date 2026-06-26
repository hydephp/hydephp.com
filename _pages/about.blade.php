@extends('hyde::layouts.app')
@section('content')
@php($title = 'About HydePHP')
@php($navigation = ['title' => 'About'])
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
	html, body { scroll-behavior: smooth; }
	/* Reusable section eyebrow */
	.eyebrow {
		font-size: 0.8125rem;
		font-weight: 600;
		letter-spacing: 0.08em;
		text-transform: uppercase;
	}
</style>

{{-- Intro --}}
<section class="px-6 pt-28 pb-20 text-center md:pt-36 md:pb-28">
	<div class="max-w-3xl mx-auto">
		<div class="inline-flex items-center px-4 py-1.5 mb-8 text-sm font-medium border rounded-full text-cyan-700 bg-cyan-50 border-cyan-200 dark:text-cyan-300 dark:bg-cyan-950 dark:border-cyan-900">
			<span class="w-1.5 h-1.5 mr-2 rounded-full bg-cyan-500"></span>
			Open Source &middot; MIT Licensed
		</div>
		<h1 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white md:text-6xl">
			The story behind <span class="text-cyan-600 dark:text-cyan-400">HydePHP</span>
		</h1>
		<p class="max-w-2xl mx-auto mt-8 text-lg leading-relaxed text-gray-600 dark:text-gray-300 md:text-xl">
			HydePHP is an open-source static site generator that brings the power of the Laravel
			ecosystem to content-focused websites. It exists to make building blogs, documentation,
			and personal sites feel effortless &mdash; so you can spend your time writing, not wrestling with markup.
		</p>
	</div>
</section>

{{-- Origin story --}}
<section class="px-6 py-20 md:py-24">
	<div class="max-w-3xl mx-auto">
		<p class="mb-3 eyebrow text-cyan-600 dark:text-cyan-400">Our story</p>
		<h2 class="mb-8 text-3xl font-bold tracking-tight text-gray-900 dark:text-white md:text-4xl">Why Hyde exists</h2>
		<div class="prose prose-lg dark:prose-invert max-w-none">
			<p>
				Spinning up a simple website shouldn't mean fighting your tools. Yet too often, building
				a blog or a documentation site turns into hours of boilerplate, routing, and configuration
				before you write a single word of content.
			</p>
			<p>
				Hyde was born from a simple belief: <mark>if you can write Markdown, you should be able to
				ship a website.</mark> Inspired by static site generators like Jekyll, but built for the PHP
				world, Hyde lets you drop Markdown and Blade files into source folders and compiles them into
				fast, static HTML &mdash; with navigation, sidebars, and metadata generated automatically.
			</p>
			<p>
				Under the hood, Hyde is powered by <a href="https://laravel-zero.com" rel="noopener nofollow">Laravel Zero</a>,
				a stripped-down version of the Laravel framework. That means you get the elegance of Blade
				templating and the familiarity of the Laravel ecosystem, without the overhead of a full
				web application. It favours convention over configuration, so it works beautifully out of
				the box &mdash; and stays fully hackable when you want to make it your own.
			</p>
		</div>
	</div>
</section>

{{-- Principles --}}
<section class="px-6 py-20 bg-offset md:py-24">
	<div class="max-w-5xl mx-auto">
		<div class="max-w-2xl mb-12">
			<p class="mb-3 eyebrow text-cyan-600 dark:text-cyan-400">Principles</p>
			<h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white md:text-4xl">What Hyde stands for</h2>
			<p class="mt-4 text-lg text-gray-600 dark:text-gray-300">A few principles guide every decision in the framework.</p>
		</div>
		<div class="grid gap-6 md:grid-cols-2">
			@foreach ([
				['01', 'Content over markup', 'Your words come first. Write in Markdown or Blade and let Hyde handle the templates, layouts, and HTML.'],
				['02', 'Convention over configuration', 'Sensible defaults mean Hyde works the moment you install it. Files are discovered automatically — no routing required.'],
				['03', 'Simple, yet hackable', 'Start with a polished TailwindCSS frontend, then extend and override anything with Blade components when you need to.'],
				['04', 'Open and free', 'Hyde is MIT licensed and built in the open. No paywalls, no lock-in — just a tool you can trust and contribute to.'],
			] as [$num, $heading, $body])
				<div class="p-6 transition-shadow shadow-sm bg-standard rounded-xl hover:shadow-md">
					<div class="flex items-center gap-3 mb-3">
						<span class="flex items-center justify-center text-sm font-bold rounded-lg w-9 h-9 text-cyan-600 bg-cyan-50 dark:text-cyan-300 dark:bg-cyan-950">{{ $num }}</span>
						<h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $heading }}</h3>
					</div>
					<p class="text-gray-600 dark:text-gray-300">{{ $body }}</p>
				</div>
			@endforeach
		</div>
	</div>
</section>

{{-- People --}}
<section class="px-6 py-20 md:py-24">
	<div class="max-w-3xl mx-auto">
		<p class="mb-3 eyebrow text-cyan-600 dark:text-cyan-400">The team</p>
		<h2 class="mb-8 text-3xl font-bold tracking-tight text-gray-900 dark:text-white md:text-4xl">Who builds Hyde</h2>
		<div class="prose prose-lg dark:prose-invert max-w-none">
			<p>
				Hyde was created by <a href="https://twitter.com/EmmaDSCodes" rel="noopener nofollow">Emma De Silva</a>,
				and is maintained as a community-driven open-source project. It's shaped by everyone who files an issue,
				opens a pull request, writes documentation, or simply builds something with it and shares the result.
			</p>
			<p>
				Development happens entirely in the open on
				<a href="https://github.com/hydephp" rel="noopener nofollow">GitHub</a>. Whether you've found a bug,
				have an idea for a feature, or want to help improve the docs, your contributions are genuinely welcome &mdash;
				see the <a href="contributing">contribution guide</a> to get started.
			</p>
		</div>
	</div>
</section>

{{-- Get involved / CTA --}}
<section class="px-6 py-20 text-center bg-offset md:py-24">
	<div class="max-w-2xl mx-auto">
		<p class="mb-3 eyebrow text-cyan-600 dark:text-cyan-400">Get involved</p>
		<h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white md:text-4xl">Join the community</h2>
		<p class="mt-5 text-lg text-gray-600 dark:text-gray-300">
			Hyde is more than a tool &mdash; it's a growing community of developers who care about a calmer,
			content-first way to build for the web. Come say hello.
		</p>
		<div class="flex flex-wrap items-center justify-center gap-4 mt-10">
			<a href="https://github.com/hydephp" rel="noopener nofollow" class="px-6 py-3 font-semibold text-white transition-colors rounded-lg bg-slate-800 hover:bg-slate-700 dark:bg-slate-700 dark:hover:bg-slate-600">
				Star us on GitHub
			</a>
			<a href="https://discord.hydephp.com" rel="noopener nofollow" class="px-6 py-3 font-semibold text-white transition-colors rounded-lg bg-cyan-600 hover:bg-cyan-700">
				Join the Discord
			</a>
			<a href="{{ DocumentationPage::home() }}" class="px-6 py-3 font-semibold transition-colors border rounded-lg text-gray-700 border-gray-300 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-slate-800">
				Read the docs
			</a>
		</div>
		<p class="mt-12 text-gray-600 dark:text-gray-300">
			Ready to build something?
			<a href="/docs/2.x/quickstart" class="font-semibold text-cyan-600 hover:underline dark:text-cyan-400">Get started in minutes &rarr;</a>
		</p>
	</div>
</section>

@endsection
