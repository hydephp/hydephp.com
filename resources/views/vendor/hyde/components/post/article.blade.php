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
                Originally posted at <a href="{{ $page->matter('canonical_guest_post_url') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline" rel="canonical nofollow external" target="_blank">
                    {{ parse_url($page->matter('canonical_guest_post_url'), PHP_URL_HOST) }}
                </a>
            </p>
        @endif
    </header>
    @includeWhen(isset($page->image), 'hyde::components.post.image')
    <div aria-label="Article body" itemprop="articleBody">
        {{ $content }}
    </div>
    <span class="sr-only">End of article</span>
</article>