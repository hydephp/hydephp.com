<header class="bg-gradient-to-br from-gray-950 via-purple-950 to-pink-950">
    <div class="relative items-center justify-center w-screen min-h-screen overflow-hidden">
        <!-- Subtle background patterns -->
        <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:60px_60px]"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-950/90 via-purple-950/20 to-gray-950/50"></div>
        
        <!-- Floating elements for depth -->
        {{-- <div class="absolute top-20 left-10 w-2 h-2 bg-hyde-cyan rounded-full animate-pulse opacity-60"></div>
        <div class="absolute top-40 right-20 w-1 h-1 bg-hyde-purple rounded-full animate-ping opacity-40"></div>
        <div class="absolute bottom-40 left-20 w-1.5 h-1.5 bg-white rounded-full animate-pulse opacity-30"></div>
         --}}
        <div class="pt-48 md:pt-60 container self-center my-auto flex flex-col items-center justify-center h-full max-w-7xl pl-0 mx-auto -mt-24 sm:pl-8 xl:pl-0 md:flex-row md:justify-between relative z-10">
            
            <!-- Left Content -->
            <div class="flex flex-col items-center w-5/6 md:items-start sm:w-1/2 lg:w-2/5 lg:-mt-4">
                <div class="relative md:text-left text-center">
                    <!-- Version badge -->
                    <div class="inline-flex items-center px-3 py-1 mb-6 text-xs font-medium text-hyde-cyan bg-hyde-cyan/10 border border-hyde-cyan/20 rounded-full backdrop-blur-sm">
                        <div class="w-1.5 h-1.5 bg-hyde-cyan rounded-full mr-2 animate-pulse"></div>
                        Version 2.0 Released
                    </div>
                    
                    <h1 class="relative mb-6 text-5xl font-black leading-tight text-white lg:text-6xl xl:text-7xl md:text-left text-center">
                        <span class="bg-clip-text text-transparent text-hyde-ribbon">HydePHP <small>v2.0</small></span>
                    </h1>
                    
                    <div class="relative mb-0 text-xl font-semibold leading-relaxed text-gray-300 lg:text-2xl xl:text-3xl md:text-left text-center">
                        The
                        <span class="font-bold text-white">Static Site Generator</span>
                        with the power of
                        <span class="font-bold text-white">Laravel</span>
                        and the simplicity of
                        <span class="font-bold text-white">Markdown</span>
                        that developers love.
                    </div>
                </div>
                
                <p class="my-6 text-base text-center text-gray-400 xl:text-lg md:text-left leading-relaxed max-w-lg">
                    Transform your ideas into blazing-fast websites. Combine the power of Laravel's ecosystem with the simplicity of Markdown. 
                    <span class="text-purple-300">Your next project starts here.</span>
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 mt-8 w-full sm:w-auto">
                    <a href="#" class="group relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt"></div>
                        <span class="relative inline-flex items-center justify-center w-full px-8 py-4 text-base font-bold text-white bg-slate-900 border border-transparent rounded-lg group-hover:bg-slate-800 transition-colors xl:text-lg">
                            <span class="mr-2">⚡</span>
                            Get Started
                        </span>
                    </a>
                    
                    <a href="#" class="relative group">
                        <span class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-medium text-gray-300 bg-white/5 border border-white/10 rounded-lg backdrop-blur-sm group-hover:bg-white/10 group-hover:text-white transition-all xl:text-lg">
                            <span class="mr-2 font-mono">$</span>
                            View Docs
                        </span>
                    </a>
                </div>
                
                <!-- Quick stats -->
                <div class="flex items-center gap-8 mt-12 text-sm text-gray-500">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-github-green rounded-full mr-2"></div>
                        <span>Open Source</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-php-blue rounded-full mr-2"></div>
                        <span>PHP 8+</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-laravel-red rounded-full mr-2"></div>
                        <span>Laravel Powered</span>
                    </div>
                </div>
            </div>
            
            <!-- Right Content - Hyde Build Graphic -->
            <div class="flex flex-col items-center justify-center w-5/6 h-auto pl-0 pr-0 mt-16 mb-12 sm:pl-8 sm:pr-8 xl:pr-0 md:mt-0 md:h-full sm:w-1/2 lg:w-3/5 lg:-mt-4">
                <div class="relative transform hover:scale-105 transition-transform duration-500">
                    <!-- Terminal Window -->
                    <div class="bg-slate-800/90 backdrop-blur-sm rounded-xl border border-slate-700/50 shadow-2xl w-96 mr-8 transform -rotate-2 hover:rotate-0 transition-transform duration-300">
                        <!-- Terminal Header -->
                        <div class="flex items-center px-4 py-3 bg-slate-700/80 rounded-t-xl border-b border-slate-600/50">
                            <div class="flex space-x-2">
                                <div class="w-3 h-3 bg-red-500 rounded-full hover:bg-red-400 transition-colors cursor-pointer"></div>
                                <div class="w-3 h-3 bg-yellow-500 rounded-full hover:bg-yellow-400 transition-colors cursor-pointer"></div>
                                <div class="w-3 h-3 bg-green-500 rounded-full hover:bg-green-400 transition-colors cursor-pointer"></div>
                            </div>
                            <div class="ml-4 text-xs text-gray-400 font-mono">hyde@terminal</div>
                        </div>
                        
                        <!-- Terminal Content -->
                        <div class="p-6 font-mono text-sm">
                            <h1 class="text-hyde-purple text-4xl font-bold mb-4">hyde</h1>
                            <div class="text-hyde-cyan text-lg mb-4 typing-animation">
                                <span class="text-gray-400">$</span> php hyde build
                            </div>
                            <div class="text-gray-300 space-y-1">
                                <div class="opacity-75 animate-fade-in-1">Preparing build environment</div>
                                <div class="opacity-75 animate-fade-in-2">Compiling Blade and Markdown</div>
                                <div class="opacity-75 animate-fade-in-3">
                                    <span class="text-green-400">✓</span> 80 files compiled in 
                                    <span class="text-hyde-cyan">756ms</span>
                                </div>
                                <div class="animate-fade-in-4 text-green-400">
                                    🎉 Congratulations! Your static site
                                </div>
                                <div class="opacity-0 animate-fade-in-5 text-green-400">has been built!</div>
                            </div>
                            <div class="text-hyde-cyan mt-4 opacity-0 animate-fade-in-6 cursor-blink">—</div>
                        </div>
                    </div>

                    <!-- Browser Window -->
                    <div class="bg-white/95 backdrop-blur-sm rounded-xl border border-gray-200/50 shadow-2xl w-80 absolute top-16 -right-32 transform rotate-3 hover:rotate-1 transition-transform duration-300">
                        <!-- Browser Header -->
                        <div class="flex items-center justify-between px-4 py-3 bg-gray-50/80 rounded-t-xl border-b border-gray-200/50">
                            <div class="flex space-x-2">
                                <div class="w-3 h-3 bg-gray-300 rounded-full hover:bg-gray-400 transition-colors cursor-pointer"></div>
                                <div class="w-3 h-3 bg-gray-300 rounded-full hover:bg-gray-400 transition-colors cursor-pointer"></div>
                                <div class="w-3 h-3 bg-gray-300 rounded-full hover:bg-gray-400 transition-colors cursor-pointer"></div>
                            </div>
                            <div class="flex space-x-6 text-sm font-medium text-gray-600">
                                <span class="hover:text-hyde-purple cursor-pointer transition-colors">Home</span>
                                <span class="hover:text-hyde-purple cursor-pointer transition-colors">About</span>
                            </div>
                        </div>
                        
                        <!-- Browser Content -->
                        <div class="p-6">
                            <h1 class="text-2xl font-bold text-gray-900 mb-2">My Hyde Site</h1>
                            <h2 class="text-xl font-semibold text-gray-800 mb-2">Hello World</h2>
                            <div class="text-sm text-gray-500 mb-4">Built with HydePHP</div>
                            
                            <!-- Content lines -->
                            <div class="space-y-2 mb-4">
                                <div class="h-2 bg-gradient-to-r from-gray-300 to-gray-200 rounded w-full"></div>
                                <div class="h-2 bg-gradient-to-r from-gray-300 to-gray-200 rounded w-3/4"></div>
                            </div>
                            
                            <!-- Two boxes with Hyde colors -->
                            <div class="flex space-x-2 mb-4">
                                <div class="w-20 h-16 bg-slate-800 rounded-lg shadow-sm"></div>
                                <div class="w-20 h-16 bg-gradient-to-br from-hyde-purple to-hyde-cyan rounded-lg shadow-sm"></div>
                            </div>
                            
                            <!-- More content lines -->
                            <div class="space-y-2">
                                <div class="h-2 bg-gradient-to-r from-gray-300 to-gray-200 rounded w-2/3"></div>
                                <div class="h-2 bg-gradient-to-r from-gray-300 to-gray-200 rounded w-1/2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* === Hyde brand palette pulled from the logo === */
        :root{
            --hyde-magenta:#B1368F;  /* ribbon left */
            --hyde-coral:  #F15A4A;  /* ribbon right */
            --hyde-navy-1: #1E2A3C;  /* hat body top */
            --hyde-navy-2: #172434;  /* hat body base */
            --laravel-red:#F53003;   /* official Laravel */
            --plasma-purple:#A855F7; /* Markdown */ 
            --github-green:#5FED83;  /* GitHub */
            --php-blue:#7A86B8;      /* PHP */
        }

        /* Ribbon gradient for "Hyde" */
        .text-hyde-ribbon{
            background-image: linear-gradient(90deg,var(--hyde-magenta) 0%,var(--hyde-coral) 100%);
            -webkit-background-clip:text; background-clip:text;
            color: transparent;
            filter: drop-shadow(0 0 18px rgba(241,90,74,.18)) drop-shadow(0 0 10px rgba(177,54,143,.18));
        }

        /* Lightened navy gradient for "PHP" so it reads on dark bg */
        .text-hyde-navy{
            background-image: linear-gradient(90deg,
                color-mix(in oklab, var(--hyde-navy-1) 70%, #ffffff 30%),
                color-mix(in oklab, var(--hyde-navy-2) 70%, #ffffff 30%)
            );
            -webkit-background-clip:text; background-clip:text;
            color: transparent;
            text-shadow: 0 0 1px rgba(255,255,255,.06);
        }

        /* Optional: soft highlight chips used in tagline */
        .text-hyde-coral{ color: var(--hyde-coral); }
        .text-laravel-red{ color: var(--laravel-red); }
        .text-plasma-purple{ color: var(--plasma-purple); }
    
        .bg-php-blue{ background-color: var(--php-blue); }
        .bg-github-green{ background-color: var(--github-green); }
        .bg-laravel-red{ background-color: var(--laravel-red); }


        @keyframes fade-in-1 { 0% { opacity: 0; } 20% { opacity: 0; } 30% { opacity: 1; } }
        @keyframes fade-in-2 { 0% { opacity: 0; } 40% { opacity: 0; } 50% { opacity: 1; } }
        @keyframes fade-in-3 { 0% { opacity: 0; } 60% { opacity: 0; } 70% { opacity: 1; } }
        @keyframes fade-in-4 { 0% { opacity: 0; } 80% { opacity: 0; } 90% { opacity: 1; } }
        @keyframes fade-in-5 { 0% { opacity: 0; } 90% { opacity: 0; } 100% { opacity: 1; } }
        @keyframes fade-in-6 { 0% { opacity: 0; } 95% { opacity: 0; } 100% { opacity: 1; } }

        .animate-fade-in-1 { animation: fade-in-1 3s ease-in-out; animation-fill-mode: forwards; }
        .animate-fade-in-2 { animation: fade-in-2 3s ease-in-out; animation-fill-mode: forwards; }
        .animate-fade-in-3 { animation: fade-in-3 3s ease-in-out; animation-fill-mode: forwards; }
        .animate-fade-in-4 { animation: fade-in-4 3s ease-in-out; animation-fill-mode: forwards; }
        .animate-fade-in-5 { animation: fade-in-5 3s ease-in-out; animation-fill-mode: forwards; }
        .animate-fade-in-6 { animation: fade-in-6 3s ease-in-out; animation-fill-mode: forwards; }

        .bg-grid-white\/\[0\.02\] {
            background-image: radial-gradient(circle, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
        }
    </style>
</header>
