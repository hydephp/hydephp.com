@php /** @var \Hyde\Framework\Features\Navigation\NavItem $item */ @endphp
@use('Hyde\Framework\Actions\GeneratesTableOfContents')
@props(['grouped' => false])
<li @class(['sidebar-item -ml-4 pl-4', $grouped
        ? 'active -ml-8 pl-8'
        : 'active' => $item->isActive()
    ]) role="listitem">
    @if($item->isActive())
        <a href="{{ $item->getLink() }}" aria-current="true" @class([$grouped
            ? '-ml-8 pl-4 py-1 px-2 block text-indigo-600 dark:text-indigo-400 font-semibold border-l-[0.25rem] border-indigo-500 bg-indigo-50/50 dark:bg-indigo-900/20 transition-colors duration-300 ease-in-out hover:bg-indigo-50 dark:hover:bg-indigo-900/30'
            : '-ml-4 p-2 block text-indigo-600 dark:text-indigo-400 font-semibold border-l-[0.25rem] border-indigo-500 bg-indigo-50/50 dark:bg-indigo-900/20 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 transition-colors duration-300 ease-in-out'
        ])>
            {{ $item->getLabel() }}
        </a>

        @if(config('docs.table_of_contents.enabled', true))
            <span class="sr-only">Table of contents</span>
            <x-hyde::docs.table-of-contents :items="(new GeneratesTableOfContents($page->markdown))->execute()" />
        @endif
    @else
        <a href="{{ $item->getLink() }}" @class([$grouped
            ? '-ml-8 pl-4 py-1 px-2 block border-l-[0.325rem] border-transparent transition-colors duration-300 ease-in-out hover:bg-black/10'
            : 'block -ml-4 p-2 border-l-[0.325rem] border-transparent hover:bg-black/5 dark:hover:bg-black/10'
        ])>
            {{ $item->getLabel() }}
        </a>
    @endif
</li>
