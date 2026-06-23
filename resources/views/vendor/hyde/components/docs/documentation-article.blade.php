@php
    $article ??= \Hyde\Framework\Features\Documentation\SemanticDocumentationArticle::make($page);
@endphp

@if($article)
    <article id="document" itemscope itemtype="https://schema.org/Article" @class([
            'mx-auto lg:ml-8 max-w-3xl p-12 md:px-16 max-w-[1000px] min-h-[calc(100vh_-_4rem)]',
            config('markdown.prose_classes', 'prose dark:prose-invert'),
            'torchlight-enabled' => $article->hasTorchlight()])>
        @yield('content')

        <header id="document-header" class="flex items-start flex-wrap justify-between prose-h1:mb-3">
            {{ $article->renderHeader() }}
            <div class="hidden md:flex items-center gap-2">
                <x-docs.version-switcher-inline />
                <button
                    id="copy-markdown-btn"
                    type="button"
                    title="Copy page as Markdown"
                    onclick="(function(btn){
                        var md = document.getElementById('page-markdown-source').value;
                        navigator.clipboard.writeText(md).then(function(){
                            btn.querySelector('.btn-label').textContent = 'Copied!';
                            setTimeout(function(){ btn.querySelector('.btn-label').textContent = 'Copy Markdown'; }, 2000);
                        });
                    })(this)"
                    class="inline-flex items-center gap-1.5 h-9 px-3 text-sm rounded-md border border-gray-300 dark:border-gray-700 bg-white/80 dark:bg-gray-800/80 backdrop-blur hover:bg-white dark:hover:bg-gray-800 transition-colors"
                >
                    <svg class="w-3.5 h-3.5 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                    </svg>
                    <span class="btn-label">Copy Markdown</span>
                </button>
                <textarea id="page-markdown-source" class="sr-only" readonly aria-hidden="true">{{ $page->markdown->body() }}</textarea>
            </div>
        </header>
        <x-docs.version-banner />
        <section id="document-main-content" itemprop="articleBody">
            {{ $article->renderBody() }}
        </section>
        <footer id="document-footer" class="flex items-center flex-wrap mt-8 prose-p:my-3 justify-between text-[90%]">
            {{ $article->renderFooter() }}
        </footer>
    </article>
@endif