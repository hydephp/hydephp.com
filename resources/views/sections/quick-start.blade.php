<div class="bg-gray-50">
<!-- Quick Start Section -->
<section class="relative w-full py-12 sm:py-16 md:py-20 lg:py-24 xl:py-28 bg-gradient-to-br from-white via-purple-50/50 to-gray-50 overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 bg-grid-slate-200/20 bg-[size:40px_40px] sm:bg-[size:60px_60px]"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-white/50 via-transparent to-gray-50/30"></div>
    
    <div class="container relative z-10 flex flex-col items-center justify-center h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 lg:flex-row lg:items-center lg:justify-between gap-8 lg:gap-12 xl:gap-16">
        <div class="relative flex flex-col items-start justify-center w-full lg:w-2/5 xl:w-1/2">
            <!-- Badge -->
            <div class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 mb-4 sm:mb-6 text-xs sm:text-sm font-medium text-purple-700 bg-purple-100 border border-purple-200 rounded-full backdrop-blur-sm">
                <div class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-purple-500 rounded-full mr-2 sm:mr-3 animate-pulse"></div>
                New to Hyde?
            </div>
            
            <h2 class="mb-4 sm:mb-6 text-2xl sm:text-3xl md:text-4xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold leading-tight text-gray-900">
                Start your journey
                <span class="inline mt-1 sm:mt-2 bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-600">
                    here.
                </span>
            </h2>
            
            <p class="mb-6 sm:mb-8 text-base sm:text-lg lg:text-base xl:text-lg text-gray-600 leading-relaxed max-w-xl">
                HydePHP is an open-source console application that turns easy-to-use Markdown text files into 
                <span class="text-gray-900 font-medium">amazing static websites</span>, backed by the power of Laravel.
            </p>
            
            <!-- Enhanced CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 w-full sm:w-auto">
                <a href="docs/1.x/quickstart"
                    class="inline-flex items-center justify-center px-6 py-3 sm:px-7 sm:py-3.5
                            text-base sm:text-lg font-semibold
                            text-white bg-gradient-to-r from-purple-600/80 to-pink-600/80
                            rounded-lg shadow-sm border border-white/10
                            hover:from-purple-600 hover:to-pink-600
                            hover:shadow-md transition-all w-full sm:w-auto">
                    <span class="mr-2 opacity-90">🚀</span>
                    Get Started Now
                </a>
                <!-- secondary unchanged, just a hair softer -->
                <a href="#features"
                   class="inline-flex items-center justify-center px-6 py-3 sm:px-7 sm:py-3.5
                          text-base sm:text-lg font-medium
                          text-slate-700 bg-white/80 border border-slate-200 rounded-lg backdrop-blur
                          hover:bg-white hover:text-slate-900 transition-colors w-full sm:w-auto">
                    <span class="mr-2">📋</span>
                    See Features
                </a>
            </div>
        </div>
        
        <!-- Enhanced Video Section -->
        <div class="relative flex flex-col justify-center w-full lg:w-3/5 xl:w-1/2 mb-8 lg:mb-0">
            <div class="relative transform hover:scale-[1.02] lg:hover:scale-105 transition-transform duration-500">
                <!-- stronger but still soft glow -->
                <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 via-pink-600 to-cyan-400
                            rounded-xl blur-md opacity-30"></div>

                <div class="relative bg-white/85 backdrop-blur-sm border border-white/40 rounded-xl p-1.5 sm:p-2 shadow-2xl">
                    <div class="relative rounded-lg overflow-hidden aspect-video">
                        <!-- overlay call-to-action -->
                        <button
                            class="pointer-events-none absolute inset-0 grid place-items-center
                                   text-white/95 font-semibold text-sm sm:text-base
                                   transition-opacity duration-300">
                            <span class="inline-flex items-center gap-2 rounded-full px-3.5 py-2
                                         bg-black/35 backdrop-blur-md border border-white/20
                                         shadow-lg animate-pulse">
                                <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current"><path d="M8 5v14l11-7z"/></svg>
                                Watch 100s intro
                            </span>
                        </button>

                        <iframe
                            src="https://player.vimeo.com/video/727679114?h=839eaecd83&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                            frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                            class="absolute inset-0 w-full h-full rounded-lg"
                            title="HydePHP in 100 seconds"
                            onload="this.previousElementSibling.classList.add('opacity-0')">
                        </iframe>
                    </div>
                </div>

                <!-- keep the small floating badge -->
                <div class="absolute -top-2 -right-2 sm:-top-4 sm:-right-4 bg-gradient-to-r from-purple-500 to-pink-500
                            text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                    <span class="ml-1 hidden sm:inline">Great place to start</span><span class="ml-1 sm:hidden">100s</span>
                </div>
            </div>
        </div>
    </div>
</section>
</div>