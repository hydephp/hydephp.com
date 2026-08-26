@php
    /** @var \Hyde\Framework\Features\Navigation\DocumentationSidebar $sidebar */
    $sidebar = \Hyde\Framework\Features\Navigation\DocumentationSidebar::get();
    $article ??= \Hyde\Framework\Features\Documentation\SemanticDocumentationArticle::make($page);

    $homeRoute = $sidebar->getHomeRoute();
    $switcherVersions = \Hyde\Framework\Features\Documentation\Versioning\DocumentationVersions::all();
    $switcherCurrentPage = \Hyde\Support\Facades\Render::getPage();
    $switcherCurrentVersion = $sidebar->version;
    $searchIndexPath = \Hyde\Framework\Features\Documentation\DocumentationSearchIndex::routeKey(
        \Hyde\Framework\Features\Documentation\Versioning\DocumentationVersions::current()
    );

    $tableOfContents = [];
    if (config('docs.sidebar.table_of_contents.enabled', true) && isset($page->markdown)) {
        $tableOfContents = (new \Hyde\Framework\Actions\GeneratesTableOfContents($page->markdown))->execute();
    }

    $activeGroup = $sidebar->hasGroups() ? $sidebar->getActiveGroup() : null;
    $activeItem = null;

    if ($sidebar->hasGroups()) {
        foreach ($sidebar->getItems() as $candidateGroup) {
            foreach ($candidateGroup->getItems() as $candidateItem) {
                if ($candidateItem->isActive()) {
                    $activeItem = $candidateItem;

                    // The sidebar cannot always resolve the active group on its own, so we
                    // take the group that actually contains the page we are rendering.
                    $activeGroup = $candidateGroup;

                    break 2;
                }
            }
        }
    } else {
        foreach ($sidebar->getItems() as $candidateItem) {
            if ($candidateItem->isActive()) {
                $activeItem = $candidateItem;
                break;
            }
        }
    }

    $renderToc = function ($items, int $depth = 0) use (&$renderToc): string {
        if ($items instanceof \Illuminate\Support\Collection) {
            $items = $items->all();
        } elseif ($items instanceof \Traversable) {
            $items = iterator_to_array($items);
        }

        if (empty($items)) {
            return '';
        }

        $html = '<ul class="toc-list toc-depth-' . $depth . '">';

        foreach ($items as $item) {
            $html .= '<li>';

            if (isset($item['identifier'])) {
                $identifier = e((string) $item['identifier']);
                $title = e((string) ($item['title'] ?? $item['identifier']));
                $html .= '<a href="#' . $identifier . '" data-toc-link data-depth="' . $depth . '">' . $title . '</a>';
            }

            if (! empty($item['children'])) {
                $html .= $renderToc($item['children'], $depth + 1);
            }

            $html .= '</li>';
        }

        return $html . '</ul>';
    };

    $abstract = $page->matter->get('abstract') ?? $page->matter->get('description');

    $lastModified = \App\Repositories\DocumentationDateRepository::lastModified($page->getSourcePath());

    // The documentation sources live in the develop monorepo, where each version has its own branch.
    $docsVersion = $page->getDocumentationVersion()?->name;
    $isNonCurrentDocumentation = in_array($docsVersion, ['1.x', 'master'], true);
    $markdownAlternateUrl = Hyde::url($page->getRouteKey().'.md');
    $docsSourceFile = $docsVersion !== null
        ? \Illuminate\Support\Str::after($page->identifier, "$docsVersion/")
        : $page->identifier;

    $editSourceUrl = sprintf('https://github.com/hydephp/develop/blob/%s/docs/%s.md', $docsVersion ?? 'master', $docsSourceFile);
    $reportIssueUrl = 'https://github.com/hydephp/hyde/issues/new?'.http_build_query([
        'title' => sprintf('Documentation issue: %s', $page->title),
        'body' => sprintf("**Page:** %s\n\n", Hyde::url($page->getRouteKey())),
    ]);

    $versionNotice = null;
    $stableVersion = \Hyde\Framework\Features\Documentation\Versioning\DocumentationVersions::default();

    if ($switcherCurrentVersion !== null && $stableVersion !== null && $switcherCurrentVersion->name !== $stableVersion->name) {
        $versionOrder = $switcherVersions->keys()->all();
        $currentPosition = array_search($switcherCurrentVersion->name, $versionOrder, true);
        $stablePosition = array_search($stableVersion->name, $versionOrder, true);

        if ($currentPosition !== false && $stablePosition !== false) {
            $versionNotice = [
                'kind' => $currentPosition < $stablePosition ? 'outdated' : 'upcoming',
                'stable' => $stableVersion->name,
                'route' => $switcherCurrentPage !== null
                    ? (\Hyde\Framework\Features\Documentation\Versioning\DocumentationVersions::getEquivalentRoute($switcherCurrentPage, $stableVersion) ?? $stableVersion->home())
                    : $stableVersion->home(),
            ];
        }
    }

    $headerLinks = (array) config('docs.header_links', [
        'Blog' => Hyde::relativeLink('blog'),
        'GitHub' => 'https://github.com/hydephp/hyde',
    ]);
@endphp
<!DOCTYPE html>
<html lang="{{ config('hyde.language', 'en') }}" class="scroll-smooth">
<head>
    @include('hyde::layouts.head')

    <link rel="preload" href="{{ Asset::get('fonts/instrument-sans-latin-wght-normal.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ Asset::get('fonts/playfair-display-latin-wght-normal.woff2') }}" as="font" type="font/woff2" crossorigin>

    @if($isNonCurrentDocumentation)
        <meta name="robots" content="noindex,follow">
    @endif

    <link rel="alternate" type="text/markdown" href="{{ $markdownAlternateUrl }}">

    @if(Vite::running())
        {{ Vite::assets(['resources/assets/docs.css']) }}
    @elseif(Asset::exists('docs.css'))
        <link rel="stylesheet" href="{{ Asset::get('docs.css') }}">
    @endif

</head>
<body id="hyde-docs"
      x-data="{ sidebarOpen: false, searchWindowOpen: false }"
      x-on:keydown.escape.window="searchWindowOpen = false; sidebarOpen = false"
      x-on:keydown.slash.window="if (!['INPUT', 'TEXTAREA', 'SELECT'].includes($event.target.tagName)) { $event.preventDefault(); searchWindowOpen = true; $nextTick(() => document.getElementById('search-input')?.focus()); }"
      x-on:keydown.meta.k.window.prevent="searchWindowOpen = true; $nextTick(() => document.getElementById('search-input')?.focus())"
      x-on:keydown.ctrl.k.window.prevent="searchWindowOpen = true; $nextTick(() => document.getElementById('search-input')?.focus())">

    <a class="docs-skip-link" href="#content">Skip to content</a>

    <header class="docs-topbar">
        <div class="docs-topbar-inner">
            <a class="docs-wordmark" href="{{ Hyde::relativeLink('') }}" aria-label="HydePHP home">
                <img class="docs-wordmark-logo" src="{{ Asset::get('logo.svg') }}" alt="" width="24" height="24">
                <span>{{ config('hyde.name', 'HydePHP') }}</span>
            </a>

            <a class="docs-product-name" href="{{ $homeRoute ?? Hyde::relativeLink('docs') }}">{{ $sidebar->getHeader() }}</a>

            @if(Hyde\Facades\Features::hasDocumentationSearch())
                <button class="docs-search-trigger" type="button"
                        x-on:click="searchWindowOpen = true; $nextTick(() => document.getElementById('search-input')?.focus())"
                        aria-label="Search the documentation">
                    <svg width="13" height="13" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                        <circle cx="7" cy="7" r="5" stroke="currentColor" stroke-width="1.4"/>
                        <path d="M11 11 L14.5 14.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
                    </svg>
                    Search the docs
                    <kbd>⌘K</kbd>
                </button>
            @endif

            @if($switcherCurrentVersion !== null)
                <div class="docs-version-switcher docs-version-desktop"
                     @if($switcherVersions->count() > 1)
                         x-data="{ versionSwitcherOpen: false }"
                         @click.outside="versionSwitcherOpen = false"
                         @keydown.escape.window="versionSwitcherOpen = false"
                     @endif>
                    @if($switcherVersions->count() > 1)
                        <button id="docs-version-switcher-button" class="docs-version-button" type="button"
                                x-ref="versionSwitcherButton"
                                @click="versionSwitcherOpen = ! versionSwitcherOpen"
                                :aria-expanded="versionSwitcherOpen"
                                aria-controls="docs-version-switcher-list"
                                aria-label="Switch documentation version">
                            <span>{{ $switcherCurrentVersion->name }}</span>
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"
                                 :style="versionSwitcherOpen ? 'transform: rotate(180deg)' : ''">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <ul id="docs-version-switcher-list" class="docs-version-menu" x-cloak x-show="versionSwitcherOpen"
                            aria-labelledby="docs-version-switcher-button">
                            @foreach($switcherVersions as $switcherVersion)
                                @php
                                    $switcherRoute = $switcherCurrentPage !== null
                                        ? (\Hyde\Framework\Features\Documentation\Versioning\DocumentationVersions::getEquivalentRoute($switcherCurrentPage, $switcherVersion) ?? $switcherVersion->home())
                                        : $switcherVersion->home();
                                @endphp
                                <li>
                                    @if($switcherVersion->name === $switcherCurrentVersion->name)
                                        <span aria-current="page">{{ $switcherVersion->name }}</span>
                                    @elseif($switcherRoute !== null)
                                        <a href="{{ $switcherRoute }}">{{ $switcherVersion->name }}</a>
                                    @else
                                        <span aria-disabled="true">{{ $switcherVersion->name }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <span class="docs-version-button">{{ $switcherCurrentVersion->name }}</span>
                    @endif
                </div>
            @endif

            <nav class="docs-top-links" aria-label="Site links">
                @foreach($headerLinks as $label => $href)
                    <a href="{{ $href }}" @if(str_starts_with((string) $href, 'http')) rel="noopener" @endif>{{ $label }}</a>
                @endforeach
            </nav>

            @if(Hyde\Facades\Features::hasDocumentationSearch())
                <button class="docs-mobile-action" type="button"
                        x-on:click="searchWindowOpen = true; $nextTick(() => document.getElementById('search-input')?.focus())"
                        aria-label="Search the documentation">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                        <circle cx="11" cy="11" r="7" stroke-width="1.8"/>
                        <path d="m20 20-3.8-3.8" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </button>
            @endif

            <button class="docs-mobile-action" type="button" @click="sidebarOpen = ! sidebarOpen"
                    :aria-expanded="sidebarOpen" aria-controls="sidebar" aria-label="Toggle documentation navigation">
                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                    <path x-show="! sidebarOpen" d="M4 7h16M4 12h16M4 17h16" stroke-width="1.8" stroke-linecap="round"/>
                    <path x-cloak x-show="sidebarOpen" d="m6 6 12 12M18 6 6 18" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </header>

    <div class="docs-shell">
        <aside id="sidebar" class="docs-sidebar" :class="sidebarOpen ? 'is-open' : ''" aria-label="Documentation navigation">
            @if($switcherCurrentVersion !== null && $switcherVersions->count() > 1)
                <div class="docs-sidebar-version" x-data="{ versionSwitcherOpen: false }" @click.outside="versionSwitcherOpen = false">
                    <button class="docs-version-button" style="width: 100%; justify-content: space-between" type="button"
                            @click="versionSwitcherOpen = ! versionSwitcherOpen" :aria-expanded="versionSwitcherOpen">
                        <span>Version {{ $switcherCurrentVersion->name }}</span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"
                             :style="versionSwitcherOpen ? 'transform: rotate(180deg)' : ''">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <ul class="docs-version-menu" style="left: 0; right: auto; width: 100%" x-cloak x-show="versionSwitcherOpen">
                        @foreach($switcherVersions as $switcherVersion)
                            @php
                                $mobileSwitcherRoute = $switcherCurrentPage !== null
                                    ? (\Hyde\Framework\Features\Documentation\Versioning\DocumentationVersions::getEquivalentRoute($switcherCurrentPage, $switcherVersion) ?? $switcherVersion->home())
                                    : $switcherVersion->home();
                            @endphp
                            <li>
                                @if($switcherVersion->name === $switcherCurrentVersion->name)
                                    <span aria-current="page">{{ $switcherVersion->name }}</span>
                                @elseif($mobileSwitcherRoute !== null)
                                    <a href="{{ $mobileSwitcherRoute }}">{{ $switcherVersion->name }}</a>
                                @else
                                    <span aria-disabled="true">{{ $switcherVersion->name }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <nav>
                @if(! $sidebar->hasGroups())
                    <div class="docs-side-group">
                        <div class="docs-side-group-header">
                            <h2 class="docs-side-group-heading">{{ $sidebar->getHeader() }}</h2>
                        </div>
                        <ul class="docs-side-items" role="list">
                            @foreach($sidebar->getItems() as $item)
                                <li class="docs-side-item {{ $item->isActive() ? 'is-active' : '' }}">
                                    <a href="{{ $item->getLink() }}" @if($item->isActive()) aria-current="page" @endif>
                                        {{ $item->getLabel() }}
                                    </a>
                                    @if($item->isActive() && $tableOfContents !== [])
                                        <div class="docs-sidebar-inline-toc" aria-label="On this page">
                                            {!! $renderToc($tableOfContents) !!}
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <ul class="docs-sidebar-groups" role="list">
                        @foreach($sidebar->getItems() as $group)
                            <li class="docs-side-group"
                                @if($sidebar->isCollapsible())
                                    x-data="{ groupOpen: {{ ($activeGroup === $group) ? 'true' : 'false' }} }"
                                @endif>
                                <div class="docs-side-group-header">
                                    <h2 class="docs-side-group-heading">{{ $group->getLabel() }}</h2>
                                    @if($sidebar->isCollapsible())
                                        <button class="docs-group-toggle" type="button" @click="groupOpen = ! groupOpen"
                                                :aria-expanded="groupOpen" aria-label="Toggle {{ $group->getLabel() }} group">
                                            <svg width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true"
                                                 :style="groupOpen ? 'transform: rotate(0deg)' : 'transform: rotate(-90deg)'">
                                                <path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                                <ul class="docs-side-items" role="list"
                                    @if($sidebar->isCollapsible()) x-show="groupOpen" @endif>
                                    @foreach($group->getItems() as $item)
                                        <li class="docs-side-item {{ $item->isActive() ? 'is-active' : '' }}">
                                            <a href="{{ $item->getLink() }}" @if($item->isActive()) aria-current="page" @endif>
                                                {{ $item->getLabel() }}
                                            </a>
                                            @if($item->isActive() && $tableOfContents !== [])
                                                <div class="docs-sidebar-inline-toc" aria-label="On this page">
                                                    {!! $renderToc($tableOfContents) !!}
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </nav>

            @if($sidebar->hasFooter())
                <footer class="docs-sidebar-footer">
                    {{ Hyde::markdown($sidebar->getFooter()) }}
                </footer>
            @endif
        </aside>

        <main id="content" class="docs-main">
            <article id="document" itemscope itemtype="https://schema.org/Article">
                @if($versionNotice !== null)
                    <aside class="docs-version-notice docs-version-notice--{{ $versionNotice['kind'] }}" role="note">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                            <path d="M12 4 2.9 20h18.2L12 4Z" stroke-width="1.7" stroke-linejoin="round"/>
                            <path d="M12 10.5v4" stroke-width="1.7" stroke-linecap="round"/>
                            <circle cx="12" cy="17.3" r="1" fill="currentColor" stroke="none"/>
                        </svg>

                        @if($versionNotice['kind'] === 'outdated')
                            <strong>Outdated version</strong>
                            <p>You are reading the documentation for HydePHP {{ $switcherCurrentVersion->name }}, which is no longer the latest release.</p>
                        @else
                            <strong>Unreleased version</strong>
                            <p>You are reading the documentation for {{ $switcherCurrentVersion->name }}, an upcoming version still in development. Anything described here may change before release.</p>
                        @endif

                        @if($versionNotice['route'] !== null)
                            <a href="{{ $versionNotice['route'] }}">Go to the {{ $versionNotice['stable'] }} documentation</a>
                        @endif
                    </aside>
                @endif

                @if($activeGroup !== null || $activeItem !== null)
                    <p class="docs-breadcrumb">
                        @if($activeGroup !== null)
                            <span>{{ $activeGroup->getLabel() }}</span>
                            <span class="docs-breadcrumb-separator">/</span>
                        @endif
                        @if($activeItem !== null)
                            <span>{{ $activeItem->getLabel() }}</span>
                        @endif
                    </p>
                @endif

                @yield('content')

                @if($article)
                    <header id="document-header">
                        {{ $article->renderHeader() }}

                        @if($abstract)
                            <div class="docs-abstract">{{ Hyde::markdown($abstract) }}</div>
                        @endif

                    </header>
                    <section id="document-main-content" itemprop="articleBody">
                        {{ $article->renderBody() }}
                    </section>
                    <footer id="document-footer">
                        {{ $article->renderFooter() }}
                    </footer>
                @endif
            </article>
        </main>

        <aside class="docs-toc" aria-label="On this page">
            @if($tableOfContents !== [])
                <h2 class="docs-toc-heading">On this page</h2>
                {!! $renderToc($tableOfContents) !!}
            @endif

            <div class="docs-toc-links">
                @if($lastModified)
                    <p class="docs-last-updated">Updated {{ $lastModified->format('M Y') }}</p>
                @endif
                <nav aria-label="Page actions">
                    <a href="{{ $editSourceUrl }}" rel="noopener">Edit on GitHub</a>
                    <a href="{{ $reportIssueUrl }}" rel="noopener">Report an issue</a>
                </nav>
            </div>
        </aside>
    </div>

    @if(Hyde\Facades\Features::hasDocumentationSearch())
        <div class="docs-search-layer" x-cloak x-show="searchWindowOpen" role="dialog" aria-modal="true"
             aria-labelledby="docs-search-title">
            <button class="docs-search-backdrop" type="button" @click="searchWindowOpen = false"
                    aria-label="Close search window"></button>

            <section class="docs-search-dialog" @click.outside="searchWindowOpen = false">
                <header class="docs-search-header">
                    <strong id="docs-search-title">Search the documentation</strong>
                    <button class="docs-search-close" type="button" @click="searchWindowOpen = false"
                            aria-label="Close search window">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" aria-hidden="true">
                            <path d="M5 5l10 10M15 5 5 15" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </button>
                </header>

                <div id="hyde-search" x-data="hydeSearch">
                    <template id="search-highlight-template">
                        <mark></mark>
                    </template>

                    <div class="docs-search-input-wrap">
                        <input type="search" name="search" id="search-input" x-model="searchTerm" @input="search()"
                               placeholder="Search the docs…" autocomplete="off">
                        <div class="docs-search-spinner" x-cloak x-show="isLoading" aria-hidden="true"></div>
                    </div>

                    <div x-cloak x-show="searchTerm">
                        <p class="docs-search-status" x-text="statusMessage"></p>

                        <dl class="docs-search-results">
                            <template x-for="result in results" :key="result.slug">
                                <div class="docs-search-result">
                                    <dt>
                                        <a :href="result.destination" x-text="result.title"></a>
                                        <span class="docs-search-result-count"
                                              x-text="`${result.matches} occurrence${result.matches !== 1 ? 's' : ''}`"></span>
                                    </dt>
                                    <dd x-html="result.context"></dd>
                                </div>
                            </template>
                        </dl>
                    </div>

                    <p class="docs-search-help" x-data="{ hasResults: false }"
                       @search-results-updated.window="hasResults = $event.detail.hasResults" x-show="! hasResults">
                        Press <kbd>/</kbd> or <kbd>⌘K</kbd> to search and <kbd>Esc</kbd> to close.
                    </p>

                    <script>
                        {!! file_get_contents(file_exists(Hyde::path('resources/js/HydeSearch.js'))
                            ? Hyde::path('resources/js/HydeSearch.js')
                            : Hyde::vendorPath('resources/js/HydeSearch.js')
                        ) !!}

                        document.addEventListener('alpine:init', () => {
                            Alpine.data('hydeSearch', () =>
                                initHydeSearch('{{ Hyde::relativeLink($searchIndexPath) }}')
                            );
                        });
                    </script>
                </div>
            </section>
        </div>
    @endif

    <button class="docs-sidebar-backdrop" type="button" x-cloak x-show="sidebarOpen"
            @click="sidebarOpen = false" aria-label="Close navigation"></button>

    <footer class="docs-site-footer">
        <div class="docs-site-footer-inner">
            @if($sidebar->hasFooter())
                <div>{{ Hyde::markdown($sidebar->getFooter()) }}</div>
            @else
                <span>Site proudly built with HydePHP 🎩</span>
            @endif
            <span>MIT licensed</span>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const contentHeadings = [...document.querySelectorAll('#document-main-content h2[id], #document-main-content h3[id], #document-main-content h4[id]')];

            for (const heading of contentHeadings) {
                const existingAnchor = [...heading.children].find(child =>
                    child.tagName === 'A' && child.getAttribute('href') === `#${heading.id}`
                );

                if (existingAnchor) {
                    existingAnchor.classList.add('docs-heading-anchor');
                    continue;
                }

                const anchor = document.createElement('a');
                anchor.className = 'docs-heading-anchor';
                anchor.href = `#${heading.id}`;
                anchor.setAttribute('aria-label', `Link to ${heading.textContent.trim()}`);
                anchor.textContent = '#';
                heading.append(anchor);
            }

            const tocLinks = [...document.querySelectorAll('.docs-toc [data-toc-link]')];
            if (!tocLinks.length || !contentHeadings.length || !('IntersectionObserver' in window)) return;

            const linksById = new Map(tocLinks.map(link => [decodeURIComponent(link.hash.slice(1)), link]));
            const visible = new Map();

            const updateCurrent = () => {
                const candidates = contentHeadings
                    .filter(heading => visible.has(heading.id) || heading.getBoundingClientRect().top <= 120)
                    .sort((a, b) => Math.abs(a.getBoundingClientRect().top - 90) - Math.abs(b.getBoundingClientRect().top - 90));

                const current = candidates[0] ?? contentHeadings[0];
                tocLinks.forEach(link => link.classList.remove('is-current'));
                linksById.get(current.id)?.classList.add('is-current');
            };

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => entry.isIntersecting ? visible.set(entry.target.id, true) : visible.delete(entry.target.id));
                updateCurrent();
            }, { rootMargin: '-80px 0px -70% 0px' });

            contentHeadings.forEach(heading => observer.observe(heading));
            updateCurrent();
        });
    </script>

    @include('hyde::layouts.scripts')
</body>
</html>
