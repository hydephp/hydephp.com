@extends('hyde::layouts.app')
@section('content')
@php($title = "Live Demos")

<main class="mx-auto max-w-7xl py-16 px-8">
	<header>
		<h1 class="text-center mb-5 text-2xl font-black leading-tight xl:text-4xl">Live Demos</h1>
		<div class="prose dark:prose-invert mx-auto text-center">
			<p>Have an idea for a demo? Want to submit yours? <a href="https://github.com/hydephp/hydephp.com">Make a pull request</a>!</p>
		</div>
	</header>


	<div class="flex flex-col items-center justify-center py-10 sm:flex-row">
		<div class="p-4 px-6 sm:w-1/2 lg:w-1/3">
			<div class="flex flex-col overflow-hidden bg-white dark:bg-slate-900 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
				<a href="https://hydephp.github.io/portfolio-demo"><img class="h-56 rounded-t-lg" alt="article image"
					src="/media/portfolio-composite-min.png"></a>
				<div class="px-6 pt-4 mb-2 text-xl font-bold">
					<span>Markdown Portfolio Site</span>
				</div>
				<div class="px-6 pt-2">
					<small>By HydePHP.com | 2022-07-15</small>
					<div class="overflow-hidden h-16 mt-2">A simple one-page photography portfolio made with Markdown.</div>
				</div>
				<div class="px-6 pb-4 text-center mt-3">
					<a href="https://github.com/hydephp/portfolio-demo" class="inline-block px-3 py-1 my-1 mr-2 text-sm font-semibold text-white bg-gray-400 dark:bg-gray-500 rounded-full">GitHub Source Code</a>
					<a href="https://hydephp.github.io/portfolio-demo" class="inline-block px-3 py-1 my-1 mr-2 text-sm font-semibold text-white bg-indigo-500 dark:bg-indigo-400 rounded-full">Live Demo</a>
				</div>
			</div>
		</div>
		{{-- <div class="p-4 px-6 sm:w-1/2 lg:w-1/3">
			<div class="flex flex-col overflow-hidden bg-white dark:bg-slate-900 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
				<img class="h-56 rounded-t-lg" alt="article image"
					src="https://images.unsplash.com/photo-1593720219276-0b1eacd0aef4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1343&q=80">
				<div class="px-6 pt-4 mb-2 text-xl font-bold">
					<span>More coming soon!</span>
				</div>
				<div class="px-6 pt-2">
					<small>John Doe | 2022-01-01</small>
					<div class="overflow-hidden h-16 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
				</div>
				<div class="px-6 pb-4 text-center mt-3">
					<a class="inline-block px-3 py-1 my-1 mr-2 text-sm font-semibold text-white bg-gray-400 dark:bg-gray-500 rounded-full">GitHub Source Code</a>
					<a class="inline-block px-3 py-1 my-1 mr-2 text-sm font-semibold text-white bg-indigo-500 dark:bg-indigo-400 rounded-full">Live Demo</a>
				</div>
			</div>
		</div> --}}
	</div>
</main>

@endsection
