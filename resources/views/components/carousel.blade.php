<style>
    .carousel-image-1 {
        background-image: url('{{ \Hyde\Facades\Asset::mediaLink('carousel-1-light.png') }}');
    }

    .carousel-image-2 {
        background-image: url('{{ \Hyde\Facades\Asset::mediaLink('carousel-2-light.png') }}');
    }

    .carousel-image-3 {
        background-image: url('{{ \Hyde\Facades\Asset::mediaLink('carousel-3-light.png') }}');
    }

    .dark .carousel-image-1 {
        background-image: url('{{ \Hyde\Facades\Asset::mediaLink('carousel-1-dark.png') }}');
    }

    .dark .carousel-image-2 {
        background-image: url('{{ \Hyde\Facades\Asset::mediaLink('carousel-2-dark.png') }}');
    }

    .dark .carousel-image-3 {
        background-image: url('{{ \Hyde\Facades\Asset::mediaLink('carousel-3-dark.png') }}');
    }
</style>
<div class="flex flex-col justify-center items-center py-4 pb-12">
    <div class="max-w-4xl mx-auto relative w-full h-96" x-data="{ activeSlide: 1, slides: [1, 2, 3] }" style="aspect-ratio: 4/3;">
        <div x-show="activeSlide === 1" class="h-full" :class="activeSlide === 1 ? 'visible' : 'hidden'"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-50"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-50">
            <figure class="carousel-image-1 bg-cover rounded-xl shadow-xl h-full w-full"></figure>
        </div>
        <div x-show="activeSlide === 2" x-cloak class="h-full" :class="activeSlide === 2 ? 'visible' : 'hidden'"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-50"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-50">
            <figure class="carousel-image-2 bg-cover rounded-xl shadow-xl h-full w-full"></figure>
        </div>
        <div x-show="activeSlide === 3" x-cloak class="h-full" :class="activeSlide === 3 ? 'visible' : 'hidden'"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-50"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-50">
            <figure class="carousel-image-3 bg-cover rounded-xl shadow-xl h-full w-full"></figure>
        </div>

        <div class="absolute left-0 right-0 flex -bottom-10">
            <div class="flex items-center justify-between h-full mx-auto">
                <button type="button" class="z-30 flex items-center justify-center p-2 m-1 rounded-full opacity-50 hover:opacity-100 focus:opacity-100"
                        x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1">
                    <span class="inline-flex items-center justify-center">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <strong class="text-gray-500 dark:text-gray-800 w-40 text-center">
                    <span x-show="activeSlide === 1">Blog Posts</span>
                    <span x-cloak="" x-show="activeSlide === 2">Documentation Sites</span>
                    <span x-cloak="" x-show="activeSlide === 3">Markdown Pages</span>
                </strong>
                <button type="button" class="z-30 flex items-center justify-center p-2 m-1 rounded-full opacity-50 hover:opacity-100 focus:opacity-100"
                        x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1">
                    <span class="inline-flex items-center justify-center">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>

{{--        <div class="absolute w-full flex items-center justify-center px-4">--}}
{{--            <template x-for="slide in slides" :key="slide">--}}
{{--                <button class="w-6 h-1.5 -mt-6 mx-1 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:opacity-75 hover:shadow-lg"--}}
{{--                        x-on:click="activeSlide = slide" :class="{--}}
{{--                  'bg-gray-400 opacity-75': activeSlide === slide,--}}
{{--                  'bg-gray-200 opacity-25': activeSlide !== slide--}}
{{--              }"></button>--}}
{{--            </template>--}}
{{--        </div>--}}
    </div>
</div>
