@props(['items', 'isChild' => false])

@if(! empty($items))
    <ul @class([$isChild ? 'pl-3' : 'pb-3'])>
        @foreach($items as $item)
            <li class="my-0.5">
                @if(isset($item['identifier']))
                    <a href="#{{ $item['identifier'] }}" class="block opacity-70 hover:opacity-100 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200 text-sm leading-snug py-0.5">
                        {{ preg_replace('/\[([^\]]+)\]\([^\)]*\)/', '$1', $item['title']) }}
                    </a>
                @endif

                @if(! empty($item['children']))
                    <x-hyde::docs.table-of-contents :items="$item['children']" :isChild="true" />
                @endif
            </li>
        @endforeach
    </ul>
@endif
