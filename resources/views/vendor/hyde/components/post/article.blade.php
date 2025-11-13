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
                <div class="shrink-0 mt-0.5">
                    <svg class="h-5 w-5 text-indigo-600 dark:text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-indigo-800 dark:text-indigo-300 mt-0">Community Contribution</h3>
                    <div class="my-0 text-sm text-gray-700 dark:text-gray-300">
                        <p class="mt-0 mb-1">This article was written by a member of the HydePHP community. We're excited to share diverse perspectives and expertise!</p>
                        <p class="my-0 text-xs text-gray-500 dark:text-gray-400 max-w-3xl">The content reflects the author's own views and opinions. While we've reviewed this post for quality and adherence to our guidelines, the author retains full responsibility for and ownership of their content. Read more about our <a href="{{ route('legal') }}#guest-posts" class="text-indigo-600 dark:text-indigo-400 hover:underline">guest posts here</a>.</p>
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
    @if($page->matter('guest_post'))
        <footer class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-700">
            <div class="bg-gray-50 dark:bg-gray-800/50 rounded-lg p-6 shadow-sm">
                <div class="flex flex-col sm:flex-row items-start gap-4">
                    <div class="shrink-0 hidden sm:block">
                        @if($page->matter('author.avatar'))
                            <img src="{{ $page->matter('author.avatar') }}" alt="{{ $page->matter('author.name') }}" class="h-16 w-16 rounded-full object-cover border-2 border-indigo-100 dark:border-indigo-900">
                        @else
                            <div class="h-16 w-16 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center">
                                <svg class="h-8 w-8 text-indigo-600 dark:text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    <div class="flex-1">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mt-0">About the Author</h3>
                        <p class="my-1 text-gray-700 dark:text-gray-300">Thanks to <strong>{{ $page->matter('author.name') }}</strong> for contributing this insightful article to the HydePHP community.</p>
                        
                        <div class="flex flex-wrap gap-3 mt-2">
                            <span class="text-sm text-gray-500 dark:text-gray-400 font-semibold">Author links:</span>
                            @if($page->matter('author.website'))
                                <a href="{{ $page->matter('author.website') }}?ref=hydephp.com" class="inline-flex items-center text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300" rel="nofollow external noopener" target="_blank">
                                    <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                    </svg>
                                    Website
                                </a>
                            @endif
                            
                            @if($page->matter('author.x'))
                                <a href="https://x.com/{{ $page->matter('author.x') }}" class="inline-flex items-center text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300" rel="nofollow external noopener" target="_blank">
                                    <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.14l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                    </svg>
                                    X (Twitter)
                                </a>
                            @endif
                            
                            @if($page->matter('author.github'))
                                <a href="https://github.com/{{ $page->matter('author.github') }}" class="inline-flex items-center text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300" rel="nofollow external noopener" target="_blank">
                                    <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                    GitHub
                                </a>
                            @endif
                            
                            @if($page->matter('author.linkedin'))
                                <a href="https://linkedin.com/in/{{ $page->matter('author.linkedin') }}" class="inline-flex items-center text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300" rel="nofollow external noopener" target="_blank">
                                    <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                    LinkedIn
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="mt-5 text-center">
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        <p>Want to contribute a post to HydePHP? We'd love to hear from you!</p>
                        <a href="https://hydephp.com/posts/guest-posts/" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium mt-0">
                            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            Submit Your Own Guest Post
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    @endif
</article>
