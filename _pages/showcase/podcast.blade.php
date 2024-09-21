@extends('hyde::layouts.app')
@php($title = "The Deep Dive Podcast: HydePHP")
@php($navigation = ['hidden' => true])
@section('content')

    <section class="dark:text-gray-100">
        <div class="py-12 px-8 bg-offset md:px-0">
            <main class="mx-auto max-w-7xl">
                <h1 class="text-center text-3xl xl:text-4xl font-bold py-4 mb-8 text-gray-700 dark:text-gray-200">The Deep Dive Podcast: HydePHP</h1>

                @include('sections.podcast-player')
            </main>

            <article class="mx-auto max-w-7xl bg-white dark:bg-slate-700 rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">About This AI-Generated Podcast</h2>
                <p class="mb-2">This podcast episode was created using advanced AI technology from <a href="https://notebooklm.google/" class="text-gray-700 dark:text-gray-300 hover:text-indigo-500 dark:hover:text-indigo-400" rel="noopener nofollow">NotebookML</a>. Here's what makes it special:</p>

                <ul class="list-disc list-inside mb-4 ml-2">
                    <li>Content is 100% AI-generated, based on information about HydePHP</li>
                    <li>Demonstrates the capabilities of AI in producing engaging, informative content</li>
                    <li>Offers a unique perspective on HydePHP's features and benefits</li>
                </ul>

                <p class="mb-2">While this content is AI-generated, it reflects our commitment to exploring innovative ways to share information about HydePHP.</p>
                <p>We hope you enjoy this blend of technology and creativity! Want to learn more about how this was created? Head to our
                    <a href="/posts/ai-podcast-episode">blog post on the topic</a> to learn more!</p>
            </article>
        </div>
    </section>
@endsection
