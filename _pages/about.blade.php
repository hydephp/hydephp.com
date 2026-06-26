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

	/* 3D-ish lift for the floating code window */
	.code-window {
		transform: perspective(1400px) rotateY(-14deg) rotateX(5deg);
		transform-style: preserve-3d;
	}
</style>

{{-- ============================ HERO ============================ --}}
<section class="hero-bg relative overflow-hidden px-6 pt-24 pb-20 md:pt-32 md:pb-28">
	<div class="relative mx-auto grid max-w-6xl items-center gap-16 lg:grid-cols-2">

		{{-- Left: copy --}}
		<div class="text-center lg:text-left">
			<div class="inline-flex items-center gap-2 rounded-full border border-pink-200 bg-pink-50 px-4 py-1.5 text-xs font-semibold tracking-wide text-pink-700 dark:border-pink-500/20 dark:bg-pink-500/10 dark:text-pink-300">
				<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
				OPEN SOURCE &middot; MIT LICENSED
			</div>

			<h1 class="mt-8 text-5xl font-extrabold leading-[1.05] tracking-tight text-gray-900 dark:text-white md:text-7xl">
				The story behind
				<span class="block text-pink-600 dark:text-pink-400">HydePHP</span>
			</h1>

			<p class="mx-auto mt-7 max-w-xl text-lg leading-relaxed text-gray-600 dark:text-slate-300 lg:mx-0">
				HydePHP is an open-source static site generator that brings the power of the
				Laravel ecosystem to content-focused websites.
			</p>

			{{-- CTAs --}}
			<div class="mt-9 flex flex-wrap items-center justify-center gap-4 lg:justify-start">
				<a href="{{ DocumentationPage::home() }}"
				   class="group inline-flex items-center gap-2.5 rounded-xl bg-gradient-to-r from-pink-500 via-fuchsia-500 to-purple-600 px-6 py-3.5 font-semibold text-white shadow-lg shadow-pink-500/25 transition hover:shadow-pink-500/40 hover:brightness-110">
					<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
					Read the Documentation
					<svg class="h-4 w-4 transition group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
				</a>
				<a href="https://github.com/hydephp" rel="noopener nofollow"
				   class="inline-flex items-center gap-2.5 rounded-xl border border-gray-300 bg-white px-6 py-3.5 font-semibold text-gray-800 transition hover:bg-gray-50 dark:border-white/10 dark:bg-white/5 dark:text-white dark:hover:bg-white/10">
					<svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .5C5.7.5.5 5.7.5 12c0 5.1 3.3 9.4 7.9 10.9.6.1.8-.3.8-.6v-2c-3.2.7-3.9-1.5-3.9-1.5-.5-1.3-1.3-1.7-1.3-1.7-1.1-.7.1-.7.1-.7 1.2.1 1.8 1.2 1.8 1.2 1 1.8 2.7 1.3 3.4 1 .1-.8.4-1.3.8-1.6-2.6-.3-5.3-1.3-5.3-5.7 0-1.3.5-2.3 1.2-3.1-.1-.3-.5-1.5.1-3.1 0 0 1-.3 3.3 1.2a11.5 11.5 0 0 1 6 0C17.3 4.7 18.3 5 18.3 5c.6 1.6.2 2.8.1 3.1.8.8 1.2 1.8 1.2 3.1 0 4.4-2.7 5.4-5.3 5.7.4.4.8 1.1.8 2.2v3.3c0 .3.2.7.8.6 4.6-1.5 7.9-5.8 7.9-10.9C23.5 5.7 18.3.5 12 .5z"/></svg>
					View on GitHub
				</a>
			</div>

			{{-- Feature strip --}}
			<div class="mt-12 grid max-w-2xl grid-cols-1 divide-y divide-gray-200 rounded-2xl border border-gray-200 bg-white/60 sm:grid-cols-3 sm:divide-x sm:divide-y-0 dark:divide-white/10 dark:border-white/10 dark:bg-white/[0.03] lg:mx-0">
				@foreach ([
					['lightning', 'Blazing fast', 'Static by default'],
					['code', 'Laravel ecosystem', 'Familiar &amp; powerful'],
					['cube', 'Markdown first', 'Write content, ship fast'],
				] as [$icon, $heading, $sub])
					<div class="flex items-center gap-3 px-5 py-4">
						<span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-pink-50 text-pink-600 dark:bg-pink-500/10 dark:text-pink-400">
							@if ($icon === 'lightning')
								<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2 3 14h9l-1 8 10-12h-9l1-8z"/></svg>
							@elseif ($icon === 'code')
								<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 18 6-6-6-6M8 6l-6 6 6 6"/></svg>
							@else
								<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.7l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.7l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path d="m3.3 7 8.7 5 8.7-5M12 22V12"/></svg>
							@endif
						</span>
						<div class="text-left">
							<p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $heading }}</p>
							<p class="text-xs text-gray-500 dark:text-slate-400">{!! $sub !!}</p>
						</div>
					</div>
				@endforeach
			</div>
		</div>

		{{-- Right: floating code window illustration --}}
		<div class="relative hidden lg:block" aria-hidden="true">
			{{-- ambient sphere --}}
			<div class="absolute -right-10 top-4 h-72 w-72 rounded-full bg-gradient-to-br from-fuchsia-500 to-purple-700 opacity-40 blur-2xl"></div>
			{{-- dotted floor --}}
			<div class="dot-grid absolute inset-x-0 bottom-0 h-40 text-slate-700/40 [mask-image:linear-gradient(to_top,black,transparent)]"></div>

			<div class="code-window relative rounded-2xl border border-white/10 bg-[#0d1326] shadow-2xl shadow-purple-900/40 ring-1 ring-white/5">
				{{-- window chrome --}}
				<div class="flex items-center gap-2 border-b border-white/5 px-5 py-3.5">
					<span class="h-3 w-3 rounded-full bg-rose-400/80"></span>
					<span class="h-3 w-3 rounded-full bg-amber-400/80"></span>
					<span class="h-3 w-3 rounded-full bg-emerald-400/80"></span>
				</div>
				{{-- code --}}
				<pre class="overflow-x-auto px-6 py-6 font-mono text-[15px] leading-7"><code><span class="text-pink-400">route</span><span class="text-slate-500">(</span><span class="text-emerald-400">'/about'</span><span class="text-slate-500">,</span> <span class="text-purple-400">function</span> <span class="text-slate-500">() {</span>
    <span class="text-purple-400">return</span> <span class="text-pink-400">view</span><span class="text-slate-500">(</span><span class="text-emerald-400">'about'</span><span class="text-slate-500">);</span>
<span class="text-slate-500">});</span></code></pre>

				{{-- footer row: file + perf gauge --}}
				<div class="flex items-center justify-between gap-4 border-t border-white/5 px-6 py-5">
					<div class="flex items-center gap-3 rounded-xl border border-white/5 bg-white/[0.03] px-4 py-3">
						<svg class="h-7 w-7 text-pink-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/></svg>
						<span class="font-mono text-sm text-slate-300">index.md</span>
					</div>
					<div class="relative flex h-16 w-16 items-center justify-center">
						<svg class="h-16 w-16 -rotate-90" viewBox="0 0 36 36">
							<circle cx="18" cy="18" r="15.9" fill="none" stroke="currentColor" class="text-white/10" stroke-width="3"/>
							<circle cx="18" cy="18" r="15.9" fill="none" stroke="currentColor" class="text-cyan-400" stroke-width="3" stroke-dasharray="100 100" stroke-linecap="round"/>
						</svg>
						<div class="absolute text-center leading-none">
							<span class="block text-lg font-bold text-cyan-300">100</span>
							<span class="block text-[7px] uppercase tracking-wider text-slate-400">Perf</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

{{-- ===================== WHY HYDE EXISTS ===================== --}}
<section class="bg-white px-6 py-20 dark:bg-[#0a0e1a] md:py-28">
	<div class="mx-auto grid max-w-6xl gap-14 lg:grid-cols-2 lg:gap-16">

		{{-- Left: prose --}}
		<div>
			<p class="eyebrow mb-3 inline-flex rounded-full border border-pink-200 px-3 py-1 text-pink-600 dark:border-pink-500/30 dark:text-pink-400">Our story</p>
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

			{{-- Laravel Zero callout --}}
			<div class="mt-8 flex items-start gap-4 rounded-2xl border border-gray-200 bg-gray-50 p-6 dark:border-white/10 dark:bg-white/[0.03]">
				<span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-pink-500 to-purple-600 text-white shadow-lg shadow-pink-500/20">
					<svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.7l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.7l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path d="m3.3 7 8.7 5 8.7-5M12 22V12"/></svg>
				</span>
				<p class="text-sm leading-relaxed text-gray-600 dark:text-slate-300">
					Under the hood, Hyde is powered by
					<a href="https://laravel-zero.com" rel="noopener nofollow" class="font-semibold text-pink-600 hover:underline dark:text-pink-400">Laravel Zero</a>,
					a stripped-down version of the Laravel framework. You get the elegance of Blade templating and
					the familiarity of the Laravel ecosystem &mdash; without the overhead of a full web application.
				</p>
			</div>
		</div>

		{{-- Right: pull-quote + highlight cards --}}
		<div class="space-y-6">
			<figure class="relative overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 p-8 dark:border-white/10 dark:bg-white/[0.03]">
				<div class="dot-grid pointer-events-none absolute -right-2 top-4 h-24 w-24 text-pink-500/40"></div>
				<svg class="h-9 w-9 text-pink-500" viewBox="0 0 24 24" fill="currentColor"><path d="M9.5 6C6.5 6 4 8.6 4 12v6h6v-6H7c0-1.9 1.1-3 2.5-3V6zm10 0c-3 0-5.5 2.6-5.5 6v6h6v-6h-3c0-1.9 1.1-3 2.5-3V6z"/></svg>
				<blockquote class="mt-4 text-2xl font-bold leading-snug text-gray-900 dark:text-white">
					Write content.<br>We'll handle the rest.
				</blockquote>
				<figcaption class="mt-4 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-slate-500">The Hyde principle</figcaption>
			</figure>

			<div class="grid gap-5 sm:grid-cols-3">
				@foreach ([
					['rocket', 'Fast', 'Static HTML output for top performance'],
					['cube', 'Simple', 'Convention over configuration'],
					['heart', 'Open', 'Built by the community, for the community'],
				] as [$icon, $heading, $body])
					<div class="rounded-2xl border border-gray-200 bg-white p-5 transition hover:border-pink-300 dark:border-white/10 dark:bg-white/[0.03] dark:hover:border-pink-500/40">
						<span class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-pink-50 text-pink-600 dark:bg-pink-500/10 dark:text-pink-400">
							@if ($icon === 'rocket')
								<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.3-2 5-2 5s3.7-.5 5-2c.7-.8.7-2 0-2.8a2 2 0 0 0-3 0z"/><path d="M12 15 9 12a13 13 0 0 1 7-9 13 13 0 0 1 5 0 13 13 0 0 1 0 5 13 13 0 0 1-9 7z"/><path d="M9 12H4s.5-2.8 2-4c1.7-1.3 5 0 5 0M12 15v5s2.8-.5 4-2c1.3-1.7 0-5 0-5"/></svg>
							@elseif ($icon === 'cube')
								<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.7l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.7l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path d="m3.3 7 8.7 5 8.7-5M12 22V12"/></svg>
							@else
								<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.5-1.5 3-3.3 3-5.5A4.5 4.5 0 0 0 12 5 4.5 4.5 0 0 0 2 8.5c0 2.2 1.5 4 3 5.5l7 7z"/></svg>
							@endif
						</span>
						<h3 class="text-base font-semibold text-gray-900 dark:text-white">{{ $heading }}</h3>
						<p class="mt-1 text-sm text-gray-500 dark:text-slate-400">{{ $body }}</p>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>

{{-- ===================== PRINCIPLES ===================== --}}
<section class="bg-gray-50 px-6 py-20 dark:bg-[#0b1020] md:py-28">
	<div class="mx-auto max-w-5xl">
		<div class="mb-12 max-w-2xl">
			<p class="eyebrow mb-3 text-pink-600 dark:text-pink-400">Principles</p>
			<h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white md:text-4xl">What Hyde stands for</h2>
			<p class="mt-4 text-lg text-gray-600 dark:text-slate-300">A few principles guide every decision in the framework.</p>
		</div>
		<div class="grid gap-6 md:grid-cols-2">
			@foreach ([
				['01', 'Content over markup', 'Your words come first. Write in Markdown or Blade and let Hyde handle the templates, layouts, and HTML.'],
				['02', 'Convention over configuration', 'Sensible defaults mean Hyde works the moment you install it. Files are discovered automatically — no routing required.'],
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
		<p class="eyebrow mb-3 text-pink-600 dark:text-pink-400">The team</p>
		<h2 class="mb-8 text-3xl font-bold tracking-tight text-gray-900 dark:text-white md:text-4xl">Who builds Hyde</h2>
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
	<div class="mx-auto max-w-2xl">
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
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

@endsection