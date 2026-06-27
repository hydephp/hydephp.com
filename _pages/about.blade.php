@extends('hyde::layouts.app')
@section('content')
@php($title = 'About HydePHP')
@php($navigation = ['title' => 'About'])
<style>
	/* Pink emphasis replaces the old yellow highlighter — solid colour, no gradient */
	mark {
		background: transparent;
		color: #db2777; /* pink-600 */
		font-weight: 600;
		padding: 0;
	}
	.dark mark {
		color: #f472b6; /* pink-400 */
	}

	html, body { scroll-behavior: smooth; }
	#main-navigation { z-index: 20; }

	/* Reusable section eyebrow */
	.eyebrow {
		font-size: 0.8125rem;
		font-weight: 600;
		letter-spacing: 0.08em;
		text-transform: uppercase;
	}

	/* Deep editorial backdrop with ambient pink/purple glow (dark mode) */
	.hero-bg {
		background:
			radial-gradient(55rem 38rem at 82% -5%, rgba(168, 85, 247, 0.10), transparent 60%),
			radial-gradient(45rem 36rem at 8% 28%, rgba(236, 72, 153, 0.06), transparent 55%);
	}
	.dark .hero-bg {
		background:
			radial-gradient(55rem 38rem at 82% -5%, rgba(168, 85, 247, 0.30), transparent 60%),
			radial-gradient(45rem 36rem at 8% 28%, rgba(236, 72, 153, 0.14), transparent 55%),
			linear-gradient(180deg, #0a0e1a 0%, #0b1020 100%);
	}

	/* Faint dotted grid floor under the hero illustration */
	.dot-grid {
		background-image: radial-gradient(currentColor 1px, transparent 1px);
		background-size: 22px 22px;
	}


</style>

{{-- ============================ HERO ============================ --}}
<section class="hero-bg relative overflow-hidden px-6 pt-16 pb-14 md:pt-20 md:pb-18">
	<div class="relative mx-auto max-w-3xl">
		<h1 class="mt-8 text-4xl font-extrabold leading-[1.05] tracking-tight text-gray-900 dark:text-white md:text-5xl lg:text-6xl whitespace-nowrap">
			The story behind <span class="text-pink-600 dark:text-pink-400">HydePHP</span>
		</h1>

		<p class="mt-6 max-w-xl text-lg leading-relaxed text-gray-600 dark:text-slate-300">
			HydePHP is an open-source static site generator that brings the power of the
			Laravel ecosystem to content-focused websites.
		</p>

	</div>
</section>

{{-- ===================== WHY HYDE EXISTS ===================== --}}
<section class="bg-white px-6 py-20 dark:bg-[#0a0e1a] md:py-28">
	<div class="mx-auto max-w-3xl">
		<p class="eyebrow mb-3 text-pink-600 dark:text-pink-400">Our story</p>
		<h2 class="mb-8 text-3xl font-bold tracking-tight text-gray-900 dark:text-white md:text-4xl">Why Hyde exists</h2>
		<div class="prose prose-lg max-w-none dark:prose-invert">
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
		</div>
	</div>
</section>

{{-- ===================== PRINCIPLES ===================== --}}
<section class="bg-gray-50 px-6 py-20 dark:bg-[#0b1020] md:py-28">
	<div class="mx-auto max-w-3xl">
		<div class="mb-12 max-w-2xl">
			<p class="eyebrow mb-3 text-pink-600 dark:text-pink-400">Principles</p>
			<h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white md:text-4xl">What HydePHP stands for</h2>
			<p class="mt-4 text-lg text-gray-600 dark:text-slate-300">A few principles guide every decision in the framework.</p>
		</div>
		<div class="grid gap-6 md:grid-cols-2">
			@foreach ([
				['01', 'Content over markup', 'Your words come first. Write in Markdown or Blade and let Hyde handle the templates, layouts, and HTML.'],
				['02', 'Convention over configuration', 'Sensible defaults mean HydePHP works the moment you install it. Files are discovered automatically — no routing required.'],
				['03', 'Simple, yet hackable', 'Start with a polished TailwindCSS frontend, then extend and override anything with Blade components when you need to.'],
				['04', 'Open and free', 'Hyde is MIT licensed and built in the open. No paywalls, no lock-in — just a tool you can trust and contribute to.'],
			] as [$num, $heading, $body])
				<div class="rounded-2xl border border-gray-200 bg-white p-6 transition hover:border-pink-300 hover:shadow-md dark:border-white/10 dark:bg-white/[0.03] dark:hover:border-pink-500/40">
					<div class="mb-3 flex items-center gap-3">
						<span class="flex h-9 w-9 items-center justify-center rounded-lg bg-pink-50 text-sm font-bold text-pink-600 dark:bg-pink-500/10 dark:text-pink-400">{{ $num }}</span>
						<h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $heading }}</h3>
					</div>
					<p class="text-gray-600 dark:text-slate-400">{{ $body }}</p>
				</div>
			@endforeach
		</div>
	</div>
</section>

{{-- ===================== PEOPLE ===================== --}}
<section class="bg-white px-6 py-20 dark:bg-[#0a0e1a] md:py-28">
	<div class="mx-auto max-w-3xl">
		<h2 class="mb-8 text-3xl font-bold tracking-tight text-gray-900 dark:text-white md:text-4xl">Who builds HydePHP</h2>
		<div class="prose prose-lg max-w-none dark:prose-invert">
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

{{-- ===================== CTA ===================== --}}
<section class="bg-gray-50 px-6 py-20 text-center dark:bg-[#0b1020] md:py-28">
	<div class="mx-auto max-w-3xl">
		<p class="eyebrow mb-3 text-pink-600 dark:text-pink-400">Get involved</p>
		<h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white md:text-4xl">Join the community</h2>
		<p class="mt-5 text-lg text-gray-600 dark:text-slate-300">
			Hyde is more than a tool &mdash; it's a growing community of developers who care about a calmer,
			content-first way to build for the web. Come say hello.
		</p>
		<div class="mt-10 flex flex-wrap items-center justify-center gap-4">
			<a href="https://github.com/hydephp" rel="noopener nofollow"
			   class="inline-flex items-center gap-2 rounded-xl border border-gray-300 bg-white px-6 py-3 font-semibold text-gray-800 transition hover:bg-gray-100 dark:border-white/10 dark:bg-white/5 dark:text-white dark:hover:bg-white/10">
				<svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .5C5.7.5.5 5.7.5 12c0 5.1 3.3 9.4 7.9 10.9.6.1.8-.3.8-.6v-2c-3.2.7-3.9-1.5-3.9-1.5-.5-1.3-1.3-1.7-1.3-1.7-1.1-.7.1-.7.1-.7 1.2.1 1.8 1.2 1.8 1.2 1 1.8 2.7 1.3 3.4 1 .1-.8.4-1.3.8-1.6-2.6-.3-5.3-1.3-5.3-5.7 0-1.3.5-2.3 1.2-3.1-.1-.3-.5-1.5.1-3.1 0 0 1-.3 3.3 1.2a11.5 11.5 0 0 1 6 0C17.3 4.7 18.3 5 18.3 5c.6 1.6.2 2.8.1 3.1.8.8 1.2 1.8 1.2 3.1 0 4.4-2.7 5.4-5.3 5.7.4.4.8 1.1.8 2.2v3.3c0 .3.2.7.8.6 4.6-1.5 7.9-5.8 7.9-10.9C23.5 5.7 18.3.5 12 .5z"/></svg>
				Star us on GitHub
			</a>
			<a href="https://discord.hydephp.com" rel="noopener nofollow"
			   class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-pink-500 via-fuchsia-500 to-purple-600 px-6 py-3 font-semibold text-white shadow-lg shadow-pink-500/25 transition hover:brightness-110">
				Join the Discord
			</a>
			<a href="{{ DocumentationPage::home() }}"
			   class="inline-flex items-center gap-2 rounded-xl border border-gray-300 px-6 py-3 font-semibold text-gray-700 transition hover:bg-gray-100 dark:border-white/10 dark:text-slate-200 dark:hover:bg-white/5">
				Read the docs
			</a>
		</div>
		<p class="mt-12 text-gray-600 dark:text-slate-400">
			Ready to build something?
			<a href="/docs/2.x/quickstart" class="font-semibold text-pink-600 hover:underline dark:text-pink-400">Get started in minutes &rarr;</a>
		</p>
	</div>
</section>
@endsection