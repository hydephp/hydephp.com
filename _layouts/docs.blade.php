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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,opsz,wght@0,5..1200,400..900;1,5..1200,400..900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=JetBrains+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <style>
        :root {
            --docs-ink: #14111c;
            --docs-ink-2: #1c1827;
            --docs-ink-3: #252031;
            --docs-paper: #ece7da;
            --docs-paper-2: #e3ddcd;
            --docs-paper-ink: #2b2433;
            --docs-violet: #8d7bf5;
            --docs-violet-dim: #5e50b8;
            --docs-gold: #d6a24a;
            --docs-fog: #a49cba;
            --docs-text: #d6d0e4;
            --docs-line: rgba(164, 156, 186, .16);
            --docs-line-strong: rgba(164, 156, 186, .3);
            --docs-line-paper: rgba(43, 36, 51, .14);
            --docs-topbar-height: 60px;
            --docs-sidebar-width: 264px;
        }

        [x-cloak] { display: none !important; }
        *, *::before, *::after { box-sizing: border-box; }

        html { background: var(--docs-ink); }

        body#hyde-docs {
            margin: 0;
            min-height: 100vh;
            overflow-x: hidden;
            background: var(--docs-ink);
            color: #e9e5f2;
            font-family: 'Instrument Sans', system-ui, sans-serif;
            font-size: 16.5px;
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
        }

        body#hyde-docs ::selection {
            background: var(--docs-violet);
            color: var(--docs-ink);
        }

        a { color: inherit; }

        /* Keep form controls inheriting by default without out-specificitying
           the deliberately styled search and version controls below. */
        button, input { font: inherit; }
        button { color: inherit; }

        .docs-skip-link {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1000;
            padding: 8px 12px;
            border-radius: 6px;
            background: var(--docs-paper);
            color: var(--docs-paper-ink);
            transform: translateY(-150%);
            transition: transform .15s ease;
        }

        .docs-skip-link:focus { transform: translateY(0); }

        /* Top bar */
        .docs-topbar {
            position: sticky;
            top: 0;
            z-index: 60;
            border-bottom: 1px solid var(--docs-line);
            background: rgba(20, 17, 28, .9);
            backdrop-filter: blur(12px);
        }

        .docs-topbar-inner {
            display: flex;
            align-items: center;
            gap: 16px;
            width: min(100%, 1440px);
            height: var(--docs-topbar-height);
            margin: 0 auto;
            padding: 0 24px;
        }

        .docs-wordmark {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            flex: 0 0 auto;
            color: #fff;
            font-family: 'Playfair Display', serif;
            opacity: .9;
            font-size: 1.15rem;
            font-weight: 600;
            text-decoration: none;
        }

        .docs-wordmark-logo {
            display: block;
            width: 24px;
            height: 24px;
            flex: 0 0 24px;
            object-fit: contain;
        }

        .docs-product-name {
            padding-left: 16px;
            border-left: 1px solid var(--docs-line);
            color: var(--docs-fog);
            font-size: .9rem;
            text-decoration: none;
            white-space: nowrap;
        }

        /* Keep these controls at the compact dimensions from the concept.
           The body typography and framework button reset must not scale them up. */
        body#hyde-docs .docs-search-trigger {
            display: flex;
            align-items: center;
            flex: 0 0 280px;
            gap: 10px;
            width: 280px;
            height: 36px;
            min-height: 36px;
            margin-left: auto;
            padding: 7px 12px;
            border: 1px solid var(--docs-line);
            border-radius: 8px;
            background: var(--docs-ink-2);
            color: var(--docs-fog);
            cursor: pointer;
            font: 400 .78rem/1.35 'JetBrains Mono', monospace;
            letter-spacing: .01em;
            text-align: left;
            white-space: nowrap;
            appearance: none;
            transition: border-color .15s ease, color .15s ease;
        }

        body#hyde-docs .docs-search-trigger > svg {
            width: 13px;
            height: 13px;
            flex: 0 0 13px;
        }

        .docs-search-trigger:hover,
        .docs-search-trigger:focus-visible {
            border-color: var(--docs-line-strong);
            color: #fff;
            outline: none;
        }

        body#hyde-docs .docs-search-trigger kbd {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
            height: 20px;
            margin-left: auto;
            padding: 0 6px;
            border: 1px solid var(--docs-line);
            border-radius: 4px;
            background: transparent;
            color: inherit;
            font: 400 .68rem/1 'JetBrains Mono', monospace;
            box-shadow: none;
        }

        .docs-version-switcher { position: relative; }

        body#hyde-docs .docs-version-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            width: auto;
            height: 28px;
            min-height: 28px;
            padding: 3px 10px;
            border: 1px solid rgba(214, 162, 74, .4);
            border-radius: 999px;
            background: transparent;
            color: var(--docs-gold);
            cursor: pointer;
            font: 400 .72rem/1 'JetBrains Mono', monospace;
            letter-spacing: 0;
            white-space: nowrap;
            appearance: none;
        }

        body#hyde-docs .docs-version-button svg {
            width: 12px;
            height: 12px;
            flex: 0 0 12px;
        }

        body#hyde-docs .docs-version-button svg { transition: transform .15s ease; }

        .docs-version-menu {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            z-index: 80;
            min-width: 160px;
            max-height: 300px;
            margin: 0;
            padding: 6px;
            overflow-y: auto;
            border: 1px solid var(--docs-line-strong);
            border-radius: 9px;
            background: var(--docs-ink-2);
            box-shadow: 0 18px 50px rgba(0, 0, 0, .35);
            list-style: none;
        }

        .docs-version-menu a,
        .docs-version-menu span {
            display: block;
            padding: 7px 10px;
            border-radius: 6px;
            color: var(--docs-fog);
            font-family: 'JetBrains Mono', monospace;
            font-size: .76rem;
            text-decoration: none;
        }

        .docs-version-menu a:hover { background: var(--docs-ink-3); color: #fff; }
        .docs-version-menu [aria-current='page'] { color: var(--docs-gold); }
        .docs-version-menu [aria-disabled='true'] { opacity: .45; }

        .docs-top-links {
            display: flex;
            gap: 18px;
            color: var(--docs-fog);
            font-size: .9rem;
        }

        .docs-top-links a { text-decoration: none; }
        .docs-top-links a:hover { color: #fff; }

        .docs-mobile-action {
            display: none;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            padding: 0;
            border: 0;
            background: transparent;
            cursor: pointer;
        }

        /* Layout */
        .docs-shell {
            display: grid;
            grid-template-columns: var(--docs-sidebar-width) minmax(0, 1fr) 220px;
            width: min(100%, 1440px);
            margin: 0 auto;
        }

        /* Sidebar */
        .docs-sidebar {
            position: sticky;
            top: var(--docs-topbar-height);
            align-self: start;
            width: var(--docs-sidebar-width);
            min-width: var(--docs-sidebar-width);
            max-width: var(--docs-sidebar-width);
            height: calc(100vh - var(--docs-topbar-height));
            padding: 36px 24px 60px;
            overflow-y: auto;
            border-right: 1px solid var(--docs-line);
            background: var(--docs-ink);
            scrollbar-color: var(--docs-ink-3) transparent;
            scrollbar-width: thin;
        }

        .docs-sidebar-version { display: none; margin-bottom: 24px; }

        .docs-side-group { margin: 0 0 34px; list-style: none; }

        .docs-side-group-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 12px;
        }

        .docs-side-group-heading {
            margin: 0;
            color: var(--docs-gold);
            font-family: 'JetBrains Mono', monospace;
            font-size: .68rem;
            font-weight: 400;
            line-height: 1.4;
            letter-spacing: .22em;
            text-transform: uppercase;
        }

        .docs-group-toggle {
            display: inline-grid;
            width: 24px;
            height: 24px;
            place-items: center;
            padding: 0;
            border: 0;
            background: transparent;
            color: var(--docs-fog);
            cursor: pointer;
        }

        .docs-side-items,
        .docs-sidebar-groups {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .docs-side-item a {
            display: block;
            padding: 6px 0 6px 14px;
            border-left: 1px solid var(--docs-line);
            color: var(--docs-fog);
            font: 400 .92rem/1.55 'Instrument Sans', system-ui, sans-serif;
            text-decoration: none;
            transition: color .15s ease, border-color .15s ease;
        }

        .docs-side-item a:hover {
            border-color: var(--docs-fog);
            color: #fff;
        }

        .docs-side-item.is-active > a {
            border-left: 2px solid transparent;
            border-image: linear-gradient(to bottom, var(--docs-gold), var(--docs-violet)) 1;
            color: #fff;
            font-weight: 600;
        }

        .docs-sidebar-footer {
            margin-top: 36px;
            padding-top: 20px;
            border-top: 1px solid var(--docs-line);
            color: var(--docs-fog);
            font-size: .8rem;
        }

        .docs-sidebar-footer p { margin: 0; }
        .docs-sidebar-footer a { color: var(--docs-violet); }

        .docs-sidebar-inline-toc { display: none; margin: 10px 0 0 14px; }
        .docs-sidebar-inline-toc .toc-list { margin: 0; padding: 0; list-style: none; }
        .docs-sidebar-inline-toc a { padding: 3px 0 3px 12px; font-size: .78rem; font-weight: 400; }

        /* Article */
        .docs-main { min-width: 0; }

        #document {
            width: min(100%, 820px);
            min-height: calc(100vh - var(--docs-topbar-height));
            margin: 0;
            padding: 44px 56px 90px;
            color: var(--docs-text);
        }

        .docs-breadcrumb {
            margin: 0 0 16px;
            color: var(--docs-fog);
            font-family: 'JetBrains Mono', monospace;
            font-size: .72rem;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .docs-breadcrumb-separator { padding: 0 6px; color: var(--docs-gold); }

        /* Version notices */
        .docs-version-notice {
            display: grid;
            grid-template-columns: auto minmax(0, 1fr);
            align-items: start;
            gap: 5px 12px;
            margin: 0 0 34px;
            padding: 16px 20px 18px;
            border: 1px solid var(--docs-notice-line);
            border-left: 3px solid var(--docs-notice-accent);
            border-radius: 7px;
            background: var(--docs-notice-tint);
            color: var(--docs-text);
            font-size: .95rem;
            line-height: 1.6;
        }

        .docs-version-notice--outdated {
            --docs-notice-accent: var(--docs-gold);
            --docs-notice-line: rgba(214, 162, 74, .26);
            --docs-notice-tint: rgba(214, 162, 74, .07);
        }

        .docs-version-notice--upcoming {
            --docs-notice-accent: #e0834c;
            --docs-notice-line: rgba(224, 131, 76, .28);
            --docs-notice-tint: rgba(224, 131, 76, .08);
        }

        .docs-version-notice > svg {
            grid-area: 1 / 1;
            margin-top: 1px;
            color: var(--docs-notice-accent);
        }

        .docs-version-notice strong {
            grid-area: 1 / 2;
            color: var(--docs-notice-accent);
            font-family: 'JetBrains Mono', monospace;
            font-size: .7rem;
            font-weight: 500;
            letter-spacing: .14em;
            line-height: 1.5;
            text-transform: uppercase;
        }

        .docs-version-notice p {
            grid-area: 2 / 2;
            max-width: 62ch;
            margin: 0;
        }

        .docs-version-notice a {
            grid-area: 3 / 2;
            justify-self: start;
            margin-top: 9px;
            color: var(--docs-notice-accent);
            font-size: .9rem;
            text-decoration: underline;
            text-decoration-color: var(--docs-notice-line);
            text-decoration-thickness: 1px;
            text-underline-offset: 4px;
        }

        .docs-version-notice a:hover { text-decoration-color: currentColor; }

        #document-header {
            display: block;
            padding-bottom: 28px;
            border-bottom: 1px solid var(--docs-line);
        }

        #document-header h1,
        #document > h1 {
            margin: 0;
            color: #e9e5f2;
            font-family: 'Playfair Display', serif;
            opacity: .9;
            font-size: clamp(2.1rem, 4vw, 3rem);
            font-weight: 430;
            letter-spacing: -.012em;
            line-height: 1.08;
        }

        #document-header p,
        #document-header .docs-abstract {
            max-width: 58ch;
            margin: 14px 0 0;
            color: var(--docs-fog);
            font-size: 1.1rem;
        }

        #document-header .docs-abstract p {
            margin: 0;
            color: inherit;
            font-size: inherit;
        }

        #document-main-content { padding-top: 1px; }

        #document-main-content h2,
        #document-main-content h3,
        #document-main-content h4 {
            position: relative;
            color: #e9e5f2;
            scroll-margin-top: calc(var(--docs-topbar-height) + 24px);
        }

        #document-main-content h2 {
            margin: 52px 0 0;
            font-family: 'Playfair Display', serif;
            opacity: .9;
            font-size: 1.7rem;
            font-weight: 470;
            letter-spacing: -.01em;
        }

        #document-main-content h3 {
            margin: 36px 0 0;
            color: var(--docs-violet);
            font-family: 'Playfair Display', serif;
            opacity: .9;
            font-size: 1.2rem;
            font-weight: 500;
        }

        #document-main-content h4 {
            margin: 28px 0 0;
            color: var(--docs-gold);
            font-family: 'JetBrains Mono', monospace;
            font-size: .9rem;
            font-weight: 500;
        }

        .docs-heading-anchor {
            margin-left: 8px;
            color: var(--docs-violet-dim);
            font-family: 'JetBrains Mono', monospace;
            font-size: .75em;
            text-decoration: none;
            opacity: 0;
            transition: opacity .15s ease;
        }

        #document-main-content h2:hover .docs-heading-anchor,
        #document-main-content h3:hover .docs-heading-anchor,
        #document-main-content h4:hover .docs-heading-anchor,
        .docs-heading-anchor:focus { opacity: 1; }

        #document-main-content p { margin: 16px 0 0; color: var(--docs-text); }

        #document-main-content a,
        #document-footer a {
            color: var(--docs-violet);
            text-decoration-color: rgba(141, 123, 245, .5);
            text-underline-offset: 3px;
        }

        #document-main-content a:hover,
        #document-footer a:hover { color: #b6aaff; }

        #document-main-content strong { color: #f0edf7; }

        #document-main-content :not(pre) > code,
        #document-header code,
        #document-footer code {
            padding: 1.5px 6px;
            border: 1px solid var(--docs-line);
            border-radius: 5px;
            background: var(--docs-ink-3);
            color: #e9e5f2;
            font-family: 'JetBrains Mono', monospace;
            font-size: .82em;
            white-space: nowrap;
        }

        #document-main-content pre {
            position: relative;
            margin: 22px 0 0;
            padding: 20px;
            overflow-x: auto;
            border: 1px solid var(--docs-line);
            border-radius: 10px;
            background: var(--docs-ink-2);
            color: #d8d2e8;
            box-shadow: none;
            font-family: 'JetBrains Mono', monospace;
            font-size: .82rem;
            line-height: 1.8;
        }

        #document-main-content pre code {
            padding: 0;
            border: 0;
            background: transparent;
            color: inherit;
            font: inherit;
            white-space: pre;
        }

        #document-main-content ul,
        #document-main-content ol { margin: 14px 0 0 4px; padding: 0; }

        #document-main-content ul { list-style: none; }
        #document-main-content ol { padding-left: 24px; }

        #document-main-content li {
            position: relative;
            padding: 5px 0 5px 24px;
            color: var(--docs-text);
        }

        #document-main-content ul > li::before {
            position: absolute;
            top: 16px;
            left: 0;
            width: 10px;
            height: 2px;
            background: var(--docs-gold);
            content: '';
        }

        /* Coloured blockquotes are callouts. Hyde's Markdown converter tags each
           variant with a Tailwind border class (and leaves plain quotes bare), so
           each rule below just sets the accent colour and the label text, which
           the shared ::before renders. */
        #document-main-content blockquote {
            --docs-quote-accent: var(--docs-gold);
            --docs-quote-accent-rgb: 214, 162, 74;
            --docs-quote-label: 'Note';

            margin: 28px 0 0;
            padding: 20px 26px 22px;
            border: 0;
            border-left: 3px solid var(--docs-quote-accent);
            border-radius: 0 10px 10px 0;
            background: linear-gradient(
                90deg,
                rgba(var(--docs-quote-accent-rgb), .075),
                rgba(var(--docs-quote-accent-rgb), .02) 60%,
                transparent
            ), var(--docs-ink-2);
            color: var(--docs-text);
            font-style: normal;
        }

        #document-main-content blockquote::before {
            display: block;
            margin-bottom: 8px;
            color: var(--docs-quote-accent);
            content: var(--docs-quote-label);
            font-family: 'Playfair Display', serif;
            opacity: .9;
            font-size: 1.02rem;
            font-style: italic;
            font-weight: 600;
            line-height: 1.3;
        }

        /* Plain quotes keep the gold-to-violet spine used elsewhere in the theme. */
        #document-main-content blockquote:not([class]) {
            border-left-color: transparent;
            border-image: linear-gradient(to bottom, var(--docs-gold), var(--docs-violet)) 1;
        }

        #document-main-content blockquote:is(.border-blue-500, .info) {
            --docs-quote-accent: #60a5fa;
            --docs-quote-accent-rgb: 96, 165, 250;
            --docs-quote-label: 'Good to know';
        }

        #document-main-content blockquote:is(.border-amber-500, .warning) {
            --docs-quote-accent: #e08f7a;
            --docs-quote-accent-rgb: 224, 143, 122;
            --docs-quote-label: 'Heads up';
        }

        #document-main-content blockquote:is(.border-red-600, .danger) {
            --docs-quote-accent: #e5484d;
            --docs-quote-accent-rgb: 229, 72, 77;
            --docs-quote-label: 'Danger zone';
        }

        #document-main-content blockquote:is(.border-green-500, .success) {
            --docs-quote-accent: #78c99b;
            --docs-quote-accent-rgb: 120, 201, 155;
            --docs-quote-label: 'Pro tip';
        }

        #document-main-content blockquote > :first-child { margin-top: 0; }
        #document-main-content blockquote > :last-child { margin-bottom: 0; }
        #document-main-content blockquote p { color: inherit; }

        /* The Coloured Blockquotes docs need to show what the quotes look like in
           Hyde's default Blade views, so quotes inside this wrapper opt out of the
           callout treatment and render with the stock Tailwind styling instead. */
        #document-main-content .docs-default-blockquotes {
            margin-top: 1.5rem;
        }

        #document-main-content .docs-default-blockquotes blockquote {
            margin: 12px 0 0;
            padding: 10px 16px;
            border: 0;
            border-left: 4px solid #d1d5db;
            border-image: none;
            border-radius: 0;
            background: #272e3f;
            color: #d1d5db;
        }

        #document-main-content .docs-default-blockquotes blockquote::before { content: none; }
        #document-main-content .docs-default-blockquotes blockquote p { margin: 0; }
        #document-main-content .docs-default-blockquotes blockquote.border-blue-500 { border-left-color: #3b82f6; }
        #document-main-content .docs-default-blockquotes blockquote.border-amber-500 { border-left-color: #f59e0b; }
        #document-main-content .docs-default-blockquotes blockquote.border-red-600 { border-left-color: #dc2626; }
        #document-main-content .docs-default-blockquotes blockquote.border-green-500 { border-left-color: #22c55e; }

        #document-main-content table {
            width: 100%;
            margin: 22px 0 0;
            border-collapse: collapse;
            font-size: .9rem;
        }

        #document-main-content th {
            padding: 0 16px 10px 0;
            border-bottom: 1px solid var(--docs-line);
            color: var(--docs-gold);
            font-family: 'JetBrains Mono', monospace;
            font-size: .7rem;
            font-weight: 400;
            letter-spacing: .16em;
            text-align: left;
            text-transform: uppercase;
        }

        #document-main-content td {
            padding: 12px 16px 12px 0;
            border-bottom: 1px solid var(--docs-line);
            color: var(--docs-text);
            vertical-align: top;
        }

        #document-main-content img {
            max-width: 100%;
            height: auto;
            margin-top: 22px;
            border-radius: 10px;
        }

        #document-main-content hr {
            margin: 44px 0;
            border: 0;
            border-top: 1px solid var(--docs-line);
        }

        #document-footer {
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            justify-content: space-between;
            gap: 16px;
            margin-top: 64px;
            padding-top: 28px;
            border-top: 1px solid var(--docs-line);
            color: var(--docs-fog);
            font-family: 'JetBrains Mono', monospace;
            font-size: .74rem;
        }

        #document-footer > * { margin: 0; }

        #document-footer nav,
        #document-footer .pagination,
        #document-footer .page-navigation {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
            width: 100%;
        }

        #document-footer nav a,
        #document-footer .pagination a,
        #document-footer .page-navigation a {
            display: block;
            padding: 18px 22px;
            border: 1px solid var(--docs-line);
            border-radius: 12px;
            background: var(--docs-ink-2);
            color: #e9e5f2;
            font-family: 'Playfair Display', serif;
            opacity: .9;
            font-size: 1rem;
            text-decoration: none;
        }

        #document-footer nav a:hover,
        #document-footer .pagination a:hover,
        #document-footer .page-navigation a:hover { border-color: var(--docs-violet-dim); }

        #document-footer .edit-page-link { margin-left: auto; }

        /* Right-side table of contents */
        .docs-toc {
            position: sticky;
            top: var(--docs-topbar-height);
            align-self: start;
            height: calc(100vh - var(--docs-topbar-height));
            padding: 44px 24px 24px 8px;
            overflow-y: auto;
            font-size: .85rem;
        }

        .docs-toc-heading {
            margin: 0 0 12px;
            color: var(--docs-gold);
            font-family: 'JetBrains Mono', monospace;
            font-size: .66rem;
            font-weight: 400;
            letter-spacing: .22em;
            text-transform: uppercase;
        }

        .toc-list { margin: 0; padding: 0; list-style: none; }
        .toc-list .toc-list { margin: 0; }

        .docs-toc a,
        .docs-sidebar-inline-toc a {
            display: block;
            padding: 5px 0 5px 14px;
            border-left: 1px solid var(--docs-line);
            color: var(--docs-fog);
            line-height: 1.45;
            text-decoration: none;
            transition: color .15s ease, border-color .15s ease;
        }

        .docs-toc a[data-depth='1'] { padding-left: 28px; font-size: .8rem; }
        .docs-toc a[data-depth='2'] { padding-left: 40px; font-size: .76rem; }
        .docs-toc a:hover { color: #fff; }

        .docs-toc a.is-current {
            border-left: 2px solid transparent;
            border-image: linear-gradient(to bottom, var(--docs-gold), var(--docs-violet)) 1;
            color: #fff;
        }

        .docs-toc-links {
            margin-top: 28px;
            padding-top: 24px;
            border-top: 1px solid var(--docs-line);
        }

        .docs-toc-links:first-child {
            margin-top: 0;
            padding-top: 0;
            border-top: 0;
        }

        .docs-last-updated {
            margin: 0 0 12px;
            color: var(--docs-fog);
            font-size: .74rem;
        }

        .docs-toc .docs-toc-links a {
            padding: 5px 0;
            border-left: 0;
            color: var(--docs-violet);
        }

        .docs-toc .docs-toc-links a:hover {
            color: #b6aaff;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        /* Search */
        .docs-search-layer {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: grid;
            place-items: start center;
            padding: 9vh 24px 24px;
        }

        .docs-search-backdrop {
            position: absolute;
            inset: 0;
            border: 0;
            background: rgba(7, 5, 11, .72);
            cursor: pointer;
        }

        .docs-search-dialog {
            position: relative;
            z-index: 1;
            width: min(720px, 100%);
            max-height: 82vh;
            padding: 20px;
            overflow: hidden;
            border: 1px solid var(--docs-line-strong);
            border-radius: 14px;
            background: var(--docs-ink-2);
            box-shadow: 0 32px 90px rgba(0, 0, 0, .5);
        }

        .docs-search-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 16px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--docs-line);
        }

        .docs-search-header strong {
            font-family: 'Playfair Display', serif;
            opacity: .9;
            font-size: 1.15rem;
            font-weight: 550;
        }

        .docs-search-close {
            display: grid;
            width: 32px;
            height: 32px;
            place-items: center;
            padding: 0;
            border: 1px solid var(--docs-line);
            border-radius: 7px;
            background: transparent;
            color: var(--docs-fog);
            cursor: pointer;
        }

        #hyde-search { min-height: 230px; }

        .docs-search-input-wrap { position: relative; }

        #search-input {
            width: 100%;
            padding: 12px 44px 12px 14px;
            border: 1px solid var(--docs-line-strong);
            border-radius: 9px;
            outline: none;
            background: var(--docs-ink-3);
            color: #fff;
            font-family: 'JetBrains Mono', monospace;
            font-size: .9rem;
        }

        #search-input:focus { border-color: var(--docs-violet); }
        #search-input::placeholder { color: var(--docs-fog); }

        .docs-search-spinner {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 18px;
            height: 18px;
            border: 2px solid var(--docs-line-strong);
            border-top-color: var(--docs-violet);
            border-radius: 999px;
            animation: docs-spin .7s linear infinite;
        }

        @keyframes docs-spin { to { transform: rotate(360deg); } }

        .docs-search-status {
            margin: 14px 0 8px;
            color: var(--docs-fog);
            font-family: 'JetBrains Mono', monospace;
            font-size: .75rem;
        }

        .docs-search-results {
            max-height: 52vh;
            margin: 0;
            padding: 0 4px 0 0;
            overflow-y: auto;
        }

        .docs-search-result {
            padding: 14px 0;
            border-bottom: 1px solid var(--docs-line);
        }

        .docs-search-result dt { margin: 0; }
        .docs-search-result dt a { color: #fff; font-weight: 650; text-decoration: none; }
        .docs-search-result dt a:hover { color: var(--docs-violet); }
        .docs-search-result-count { margin-left: 6px; color: var(--docs-fog); font-size: .75rem; }
        .docs-search-result dd { margin: 6px 0 0; color: var(--docs-text); font-size: .86rem; }
        .docs-search-result mark { padding: 0 2px; background: var(--docs-gold); color: var(--docs-ink); }

        .docs-search-help {
            margin: 16px 0 0;
            color: var(--docs-fog);
            font-family: 'JetBrains Mono', monospace;
            font-size: .72rem;
            text-align: center;
        }

        .docs-search-help kbd {
            padding: 1px 5px;
            border: 1px solid var(--docs-line-strong);
            border-radius: 4px;
            background: var(--docs-ink-3);
        }

        .docs-sidebar-backdrop {
            position: fixed;
            inset: var(--docs-topbar-height) 0 0;
            z-index: 49;
            border: 0;
            background: rgba(7, 5, 11, .66);
            cursor: pointer;
        }

        .docs-site-footer {
            border-top: 1px solid var(--docs-line);
            color: var(--docs-fog);
            font-size: .84rem;
        }

        .docs-site-footer-inner {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            width: min(100%, 1440px);
            margin: 0 auto;
            padding: 30px 24px;
        }

        .docs-site-footer-inner > :last-child { margin-left: auto; }
        .docs-site-footer p { margin: 0; }
        .docs-site-footer a { color: var(--docs-violet); }

        @media (max-width: 1200px) {
            :root { --docs-sidebar-width: 250px; }
            .docs-shell { grid-template-columns: var(--docs-sidebar-width) minmax(0, 1fr); }
            .docs-toc { display: none; }
            .docs-sidebar-inline-toc { display: block; }
        }

        @media (max-width: 860px) {
            .docs-topbar-inner { gap: 10px; padding: 0 16px; }
            .docs-product-name, .docs-top-links, .docs-search-trigger { display: none; }
            .docs-wordmark { margin-right: auto; }
            .docs-mobile-action { display: inline-flex; }
            .docs-version-switcher.docs-version-desktop { display: none; }

            .docs-shell { display: block; }

            .docs-sidebar {
                position: fixed;
                top: var(--docs-topbar-height);
                bottom: 0;
                left: 0;
                z-index: 50;
                width: min(320px, 88vw);
                min-width: 0;
                max-width: min(320px, 88vw);
                height: auto;
                transform: translateX(-105%);
                transition: transform .25s ease;
                box-shadow: 24px 0 60px rgba(0, 0, 0, .35);
            }

            .docs-sidebar.is-open { transform: translateX(0); }
            .docs-sidebar-version { display: block; }

            #document { width: 100%; padding: 36px 24px 70px; }
            #document-footer nav,
            #document-footer .pagination,
            #document-footer .page-navigation { grid-template-columns: 1fr; }

            .docs-search-layer { padding: 72px 12px 12px; }
            .docs-search-dialog { max-height: calc(100vh - 84px); padding: 16px; }
            .docs-search-results { max-height: calc(100vh - 270px); }
        }

        @media (max-width: 520px) {
            .docs-wordmark span { display: none; }
            .docs-version-button { padding-inline: 8px; }
            #document { padding-inline: 20px; }
            #document-main-content table { display: block; overflow-x: auto; }
            .docs-site-footer-inner > :last-child { margin-left: 0; }
        }

        @media print {
            .docs-topbar,
            .docs-sidebar,
            .docs-toc,
            .docs-site-footer,
            #document-footer,
            .docs-search-layer { display: none !important; }

            body#hyde-docs,
            html { background: #fff; color: #111; }
            .docs-shell { display: block; }
            #document { width: 100%; max-width: none; padding: 0; color: #111; }
            #document-main-content p,
            #document-main-content li,
            #document-main-content td { color: #222; }

            .docs-version-notice { color: #222; }
        }
    </style>
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
