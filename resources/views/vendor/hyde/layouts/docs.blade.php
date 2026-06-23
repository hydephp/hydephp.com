<!DOCTYPE html>
<html lang="{{ config('hyde.language', 'en') }}">
<head>
    @include('hyde::layouts.head')
    @include('components.docs.theme')
</head>
<body id="hyde-docs" class="bg-white dark:bg-gray-900 dark:text-white min-h-screen w-screen relative overflow-x-hidden overflow-y-auto"
      x-data="{ sidebarOpen: false, searchWindowOpen: false }" x-on:keydown.escape="searchWindowOpen = false; sidebarOpen = false" x-on:keydown.slash="searchWindowOpen = true">

    @include('hyde::components.skip-to-content-button')
    @include('hyde::components.docs.mobile-navigation')
    @include('hyde::components.docs.sidebar')

    <main id="content" class="dark:bg-gray-900 min-h-screen bg-gray-50 md:bg-white absolute top-16 md:top-0 w-screen md:left-64 md:w-[calc(100vw_-_16rem)] print:top-0">
        @include('components.docs.version-switcher')
        <div class="flex">
            <div class="flex-1 min-w-0">
                @include('hyde::components.docs.documentation-article')
            </div>
            @if(config('docs.table_of_contents.enabled', true) && isset($page->markdown))
                @php
                    $tocItems = (new \Hyde\Framework\Actions\GeneratesTableOfContents($page->markdown))->execute();
                @endphp
                @if(!empty($tocItems))
                    <aside id="on-this-page" class="hidden xl:block w-56 shrink-0 sticky top-0 h-screen overflow-y-auto py-12 pr-6 print:hidden">
                        <div class="border-l border-gray-200 dark:border-gray-700 pl-4">
                            <h5 class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-3">On this page</h5>
                            <x-hyde::docs.table-of-contents :items="$tocItems" />
                        </div>
                    </aside>
                @endif
            @endif
        </div>
    </main>

    <div id="support">
        @include('hyde::components.docs.sidebar-backdrop')

        @if(Hyde\Facades\Features::hasDocumentationSearch())
            @include('hyde::components.docs.search-modal')
        @endif
    </div>

    @include('hyde::layouts.scripts')
</body>
</html>
