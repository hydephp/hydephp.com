@extends('hyde::layouts.app')
@section('content')
@php($title = "Live Demos")
@php($navigation = ['title' => 'Demos'])

<main class="mx-auto max-w-7xl py-16 px-8">
	<header>
		<h1 class="text-center mb-5 text-2xl font-black leading-tight xl:text-4xl">Live Demos</h1>
		<div class="prose dark:prose-invert mx-auto text-center">
			<p class="lead mb-3">Wondering what a HydePHP site looks like?</p>
			<p class="mt-3">
				Here are some live demo websites built with Hyde that you can try out!
			</p>
		</div>
	</header>

	<div class="flex flex-col items-center justify-center py-10 sm:flex-row">
		@foreach(\Hyde\Support\DataCollections::yaml('demos') as $demo)
			<div class="py-4 sm:px-6 w-96 max-w-full">
				<div class="flex flex-col overflow-hidden bg-slate-100 dark:bg-slate-900 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
					<a href="{{ $demo->url }}"><img class="h-56 rounded-t-lg m-0 w-full" alt="article image"
													  src="{{ Hyde::asset ($demo->image) }}"></a>
					<div class="px-6 pt-4 mb-2 text-xl font-bold">
						<span>{{ $demo->title }}</span>
					</div>
					<div class="px-6 pt-2">
						<small>By {{ $demo->author }} | {{ $demo->date }}</small>
						<div class="overflow-hidden h-16 mt-2">{{ $demo->description }}</div>
					</div>
					<div class="px-6 pb-4 text-center mt-3">
						@if($demo->source)
							<a href="{{ $demo->source }}?ref=hydephp.com" rel="nofollow noopener" class="inline-block px-3 py-1 my-1 mr-2 text-sm font-semibold text-white bg-gray-400 dark:bg-gray-500 rounded-full">GitHub Source Code</a>
						@endif
						<a href="{{ $demo->url }}?ref=hydephp.com" rel="nofollow noopener" class="inline-block px-3 py-1 my-1 mr-2 text-sm font-semibold text-white bg-indigo-500 dark:bg-indigo-400 rounded-full">Live Demo</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<footer>
		<div class="prose dark:prose-invert mx-auto text-center">
			<p>Have an idea for a demo? Want to submit yours? <a href="https://github.com/hydephp/hydephp.com/tree/master/resources/collections/demos" rel="nofollow">Make a pull request</a>!</p>
		</div>
	</footer>
</main>
@endsection
