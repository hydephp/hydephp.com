<div class="hyde-code-block not-prose my-4 overflow-hidden rounded-[14px] border border-[rgba(164,156,186,.16)] bg-[#1c1827]">
    @isset($label)
        <div class="hyde-code-block-header flex items-center gap-3 border-b border-[rgba(164,156,186,.16)] bg-[#1c1827] px-4 py-3 font-mono text-xs leading-[1.2] text-[#a49cba]">
            <span class="hyde-code-block-tab min-w-0 truncate"><span class="sr-only">Title: </span>{{ $label }}</span>
            @if($language)
                <span class="hyde-code-block-language ml-auto shrink-0 text-[#6f6786]">{{ $language }}</span>
            @endif
        </div>
    @endisset

    <div class="hyde-code-block-body [&>pre]:my-0">
        {!! $contents !!}
    </div>
</div>
