@php($title = 'In the News')
@extends('hyde::layouts.app')
@section('content')

<main id="content" class="mx-auto max-w-7xl py-12 px-8">
    <header class="lg:mb-12 xl:mb-16">
        <h1 class="text-3xl text-left leading-10 tracking-tight font-extrabold sm:leading-none mb-8 md:text-4xl md:text-center lg:text-5xl text-gray-700 dark:text-gray-200">
            HydePHP in the News
        </h1>

        <p class="sm:text-center text-lg mx-auto mt-4 mb-6 max-w-3xl">
            See what the community is saying about HydePHP! Here are recent mentions, features, and coverage from across the web.
        </p>
    </header>

    <div class="max-w-4xl mx-auto">
        @php($newsItems = DataCollections::yaml('news')->sortByDesc(function ($item) {
            return strtotime($item->date);
        }))

        @if($newsItems->isEmpty())
            <div class="text-center py-12">
                <p class="text-gray-600 dark:text-gray-400">No news items available at the moment.</p>
            </div>
        @else
            <div class="space-y-8">
                @foreach($newsItems as $item)
                    <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-200 dark:border-gray-700">
                        <div class="p-6">
                            <div class="flex flex-col lg:flex-row lg:items-start lg:space-x-6">
                                @if(!empty($item->image))
                                    <div class="flex-shrink-0 mb-4 lg:mb-0">
                                        <img src="{{ asset($item->image) }}"
                                             alt="{{ $item->title }}"
                                             class="w-full lg:w-48 h-32 object-cover rounded-md">
                                    </div>
                                @endif

                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200">
                                            {{ $item->source }}
                                        </span>
                                        <time class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ date('F j, Y', strtotime($item->date)) }}
                                        </time>
                                    </div>

                                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                        <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="block">
                                            {{ $item->title }}
                                        </a>
                                    </h2>

                                    <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                                        @if($item->excerpt)
                                            {{ strlen($item->excerpt) > 200 ? substr($item->excerpt, 0, 200) . '...' : $item->excerpt }}
                                        @endif
                                    </p>

                                    @if(!empty($item->tags))
                                        <div class="flex flex-wrap gap-2 mb-4">
                                            @foreach($item->tags as $tag)
                                                <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200">
                                                    #{{ $tag }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="flex items-center justify-between">
                                        <a href="{{ $item->url }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium text-sm transition-colors">
                                            Read full article
                                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                        </a>

                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>

    <div class="mt-12 text-center">
        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                Got a story about HydePHP?
            </h3>
            <p class="text-gray-600 dark:text-gray-300 mb-4">
                If you've written about HydePHP or featured it in your content, we'd love to hear about it!
            </p>
            <a href="/contact"
               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition-colors">
                Get in touch
            </a>
        </div>
    </div>
</main>

@endsection