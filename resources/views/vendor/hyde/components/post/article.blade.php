<article aria-label="Article" id="{{ $page->identifier }}" itemscope itemtype="https://schema.org/Article"
    @class(['post-article mx-auto', config('markdown.prose_classes', 'prose dark:prose-invert'), 'torchlight-enabled' => Features::hasTorchlight()])>
    <meta itemprop="identifier" content="{{ $page->identifier }}">
    @if($page->getCanonicalUrl() !== null)
        <meta itemprop="url" content="{{ $page->getCanonicalUrl() }}">
    @endif

    <header aria-label="Header section" role="doc-pageheader">
        <h1 itemprop="headline" class="mb-4">{{ $page->title }}</h1>
        <div id="byline" aria-label="About the post" role="doc-introduction">
            @includeWhen(isset($page->date), 'hyde::components.post.date')
            @includeWhen(isset($page->author), 'hyde::components.post.author')
            @includeWhen(isset($page->category), 'hyde::components.post.category')
        </div>
       @if($page->matter('guest_post') && $page->matter('canonical_guest_post_url'))
            <p class="text-sm text-gray-600 dark:text-gray-400 italic mb-0 mt-2">
                Originally posted at <a href="{{ $page->matter('canonical_guest_post_url') }}?ref=hydephp.com" class="text-indigo-600 dark:text-indigo-400 hover:underline" rel="canonical nofollow external noopener" target="_blank">
                    {{ parse_url($page->matter('canonical_guest_post_url'), PHP_URL_HOST) }}
                </a>
            </p>
        @endif
    </header>
    @includeWhen(isset($page->image), 'hyde::components.post.image')

    @if($page->matter('guest_post'))
        <div class="my-6 p-4 border border-indigo-200 dark:border-indigo-800 bg-indigo-50 dark:bg-indigo-900/30 rounded-lg shadow-sm">
            <div class="flex items-start">
                <div class="flex-shrink-0 mt-0.5">
                    <svg class="h-5 w-5 text-indigo-600 dark:text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-indigo-800 dark:text-indigo-300">Community Contribution</h3>
                    <div class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                        <p>This article was written by a member of the HydePHP community and published after editorial review. We're excited to share diverse perspectives and expertise!</p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">The content reflects the author's own views and opinions. While we've reviewed this post for quality and adherence to our guidelines, the author retains full responsibility for their content.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div aria-label="Article body" itemprop="articleBody">
        @if($page->matter('guest_post'))
            {!! preg_replace('/<a\s+(?![^>]*rel=)[^>]*(href=[\'"]https?:[^"\']*)(?![^>]*rel=)[^>]*>/i', '<a $1 rel="nofollow external noopener" target="_blank">', $content) !!}
        @else
            {{ $content }}
        @endif
    </div>
    <span class="sr-only">End of article</span>
</article>