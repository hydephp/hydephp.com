@php
    $bannerConfig = config('hyde.banner');
@endphp

@if($bannerConfig && isset($bannerConfig['text']))
    @php
        $color = $bannerConfig['color'] ?? 'blue';
        $colorClasses = [
            'blue' => 'bg-blue-600 text-white',
            'green' => 'bg-green-600 text-white',
            'red' => 'bg-red-600 text-white',
            'yellow' => 'bg-yellow-500 text-black',
            'purple' => 'bg-purple-600 text-white',
            'indigo' => 'bg-indigo-600 text-white',
            'gray' => 'bg-gray-800 text-white'
        ];
        $bgClass = $colorClasses[$color] ?? $colorClasses['blue'];

        $buttonConfig = $bannerConfig['button'] ?? null;
    @endphp

    <div class="relative {{ $bgClass }} py-3 px-4 text-center">
        <div class="flex items-center justify-center space-x-4">
            <span class="text-sm md:text-base font-medium">
                {{ $bannerConfig['text'] }}
            </span>

            @if($buttonConfig && isset($buttonConfig['text']) && isset($buttonConfig['link']))
                <a href="{{ $buttonConfig['link'] }}"
                   class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md border-2 border-current hover:bg-white hover:text-{{ $color }}-600 transition-colors duration-200">
                    {{ $buttonConfig['text'] }}
                </a>
            @endif
        </div>

        {{-- Close button --}}
        <button onclick="this.parentElement.style.display='none'"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-current hover:opacity-75 transition-opacity">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
@endif