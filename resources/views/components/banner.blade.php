@php
    $bannerConfig = config('hyde.banner');
@endphp

@if($bannerConfig && isset($bannerConfig['text']) && $bannerConfig['enabled'])
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

        $buttonHoverClasses = [
            'blue' => 'hover:text-blue-600',
            'green' => 'hover:text-green-600',
            'red' => 'hover:text-red-600',
            'yellow' => 'hover:text-yellow-600',
            'purple' => 'hover:text-purple-600',
            'indigo' => 'hover:text-indigo-600',
            'gray' => 'hover:text-gray-800'
        ];
        $bgClass = $colorClasses[$color] ?? $colorClasses['blue'];
        $buttonHoverClass = $buttonHoverClasses[$color] ?? $buttonHoverClasses['blue'];

        $buttonConfig = $bannerConfig['button'] ?? null;
    @endphp

    <div class="{{ $bgClass }} py-3 px-4 text-center">
        <div class="flex items-center justify-center space-x-4">
            <span class="text-sm md:text-base font-medium">
                {{ $bannerConfig['text'] }}
            </span>

            @if($buttonConfig && isset($buttonConfig['text']) && isset($buttonConfig['link']))
                <a href="{{ $buttonConfig['link'] }}"
                   class="inline-block px-3 py-1 text-xs font-medium rounded-md border-2 border-current hover:bg-white {{ $buttonHoverClass }} transition-colors duration-200 relative z-10">
                    {{ $buttonConfig['text'] }}
                </a>
            @endif
        </div>
    </div>
@endif