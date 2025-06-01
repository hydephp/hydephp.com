@php
$hackathonPost = \Hyde\Pages\MarkdownPost::get('hydephp-summer-hackathon-2025');
@endphp

<div class="bg-violet-600 text-sm text-white z-50">
    <div class="max-w-7xl mx-auto py-2 px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
            <div class="w-0 flex-1 flex items-center">
                <span class="flex p-2 rounded-lg bg-violet-800">
                    <svg class="h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                </span>
                <p class="ml-3 font-medium text-white truncate">
                    <span class="md:hidden">HydePHP Summer Hackathon is live!</span>
                    <span class="hidden md:inline">HydePHP is participating in ODHack #14 - Join us for our Summer Hackathon!</span>
                </p>
            </div>
            <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                <a href="{{ $hackathonPost->getRoute() }}" class="flex items-center justify-center px-3 py-1 border border-transparent rounded-md shadow-sm text-sm font-medium text-violet-600 bg-white hover:bg-violet-50">
                    Learn more
                </a>
            </div>
        </div>
    </div>
</div> 