@php /** @var \Hyde\Pages\MarkdownPost $post */ @endphp
<article class="mt-4 mb-8" itemscope itemtype="https://schema.org/Article">
    <meta itemprop="identifier" content="{{ $post->identifier }}">
    @if(Hyde::hasSiteUrl())
        <meta itemprop="url" content="{{ Hyde::url('posts/' . $post->identifier) }}">
    @endif

    <header class="flex items-center justify-between">
        <a href="{{ $post->getRoute() }}" class="block w-fit">
            <h2 class="text-2xl font-bold text-gray-700 hover:text-gray-900 dark:text-gray-200 dark:hover:text-white transition-colors duration-75">
                {{ $post->data('title') ?? $post->title }}
            </h2>
        </a>
        @if($post->data('guest_post'))
            <span class="inline-block px-2 py-1 text-sm bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200 rounded-md mt-2">
                Guest Post
            </span>
        @endif
    </header>

    <footer>
        @isset($post->date)
            <span class="opacity-75">
                <span itemprop="dateCreated datePublished">{{ $post->date->short }}</span>{{ isset($post->author) ? ',' : '' }}
            </span>
        @endisset
        @isset($post->author)
            <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                <span class="opacity-75">by</span>
                @if($post->data('guest_post'))
                    <span>guest author</span>
                @endif
                <span itemprop="name">
                    @if($post->author->website)
                        <a href="{{ $post->author->website }}" class="hover:underline" rel="{{ $post->data('guest_post') ? 'author nofollow external' : 'author' }}" target="{{ $post->data('guest_post') ? '_blank' : '_self' }}">
                    @endif
                    {{ $post->author->name ?? $post->author->username }}
                    @if($post->author->website)
                        </a>
                    @endif
                </span>
            </span>
        @endisset
    </footer>

    @if($post->data('description') !== null)
        <section role="doc-abstract" aria-label="Excerpt">
            <p class="leading-relaxed my-1">
                {{ $post->data('description') }}
            </p>
        </section>
    @endisset

    <footer>
        <a href="{{ $post->getRoute() }}" class="text-indigo-500 hover:underline font-medium">
            Read post
        </a>
    </footer>
</article>