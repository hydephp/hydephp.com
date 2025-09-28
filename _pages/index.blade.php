@extends('hyde::layouts.app')
@section('content')
@php($title = 'Elegant and Powerful Static Site Generator')
<style>
    /* === Enhanced Hyde brand palette pulled from the logo === */
    :root{
        --hyde-magenta:#B1368F;  /* ribbon left */
        --hyde-coral:  #F15A4A;  /* ribbon right */
        --hyde-navy-1: #1E2A3C;  /* hat body top */
        --hyde-navy-2: #172434;  /* hat body base */
        --hyde-cyan:   #06B6D4;  /* cyan accent */
        --hyde-purple: #A855F7;  /* purple accent */
        --laravel-red:#F53003;   /* official Laravel */
        --plasma-purple:#A855F7; /* Markdown */ 
        --github-green:#5FED83;  /* GitHub */
        --php-blue:#7A86B8;      /* PHP */
    }

    /* Brand gradients */
    .text-hyde-ribbon{
        background-image: linear-gradient(90deg,var(--hyde-magenta) 0%,var(--hyde-coral) 100%);
        -webkit-background-clip:text; background-clip:text;
        color: transparent;
        filter: drop-shadow(0 0 18px rgba(241,90,74,.18)) drop-shadow(0 0 10px rgba(177,54,143,.18));
    }

    .bg-hyde-cyan{ background-color: var(--hyde-cyan); }
    .bg-hyde-purple{ background-color: var(--hyde-purple); }
    .text-hyde-cyan{ color: var(--hyde-cyan); }
    .text-hyde-purple{ color: var(--hyde-purple); }
    
    .bg-php-blue{ background-color: var(--php-blue); }
    .bg-github-green{ background-color: var(--github-green); }
    .bg-laravel-red{ background-color: var(--laravel-red); }

    /* Grid pattern */
    .bg-grid-white\/\[0\.02\] {
        background-image: radial-gradient(circle, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
    }
    .bg-grid-gray-100\/50 {
        background-image: radial-gradient(circle, rgba(156, 163, 175, 0.5) 1px, transparent 1px);
    }

    /* Animations */
    @keyframes tilt {
        0%, 50%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(0.5deg); }
        75% { transform: rotate(-0.5deg); }
    }
    .animate-tilt { animation: tilt 10s infinite linear; }

    /* Navigation and layout */
    #main-navigation {
        z-index: 50;
    }
    .theme-toggle-button {
        display: none!important;
    }
    #app {
        min-width: 100vw;
    }
    #docs-nav-button {
        margin-right: 0.75rem;
    }
    
    /* Add top padding to account for fixed navigation on homepage */
    body > section {
        padding-top: 0; /* Hero should start at the top */
    }

    /* Smooth scrolling */
    html, body { 
        scroll-behavior: smooth; 
    }

    /* Enhanced mark styling */
    mark {
        background: linear-gradient(-100deg, #fece2f2f, #fddf47a4 95%, #fece2f27);
        border-radius: 1em 0;
        padding: 0.125rem 0.5rem;
    }
    .dark mark {
        background: linear-gradient(-100deg, #fece2fbe, #fddf47a4 95%, #fece2fbd);
    }

    /* Dark theme app gradient */
    .dark .app-gradient {
        background: #141E30;
        background: -webkit-linear-gradient(to left bottom, #243B55, #141E30);
        background: linear-gradient(to left bottom, #243B55, #141E30);
    }

    /* Cursor blink animation */
    @keyframes cursor-blink {
        0%, 50% { opacity: 1; }
        51%, 100% { opacity: 0; }
    }
    .cursor-blink {
        animation: cursor-blink 1s infinite;
    }

    /* Typing animation */
    .typing-animation {
        overflow: hidden;
        border-right: 2px solid var(--hyde-cyan);
        white-space: nowrap;
        margin: 0 auto;
        animation: typing 2s steps(20, end), blink-caret 0.75s step-end infinite;
    }

    @keyframes typing {
        from { width: 0; }
        to { width: 100%; }
    }

    @keyframes blink-caret {
        from, to { border-color: transparent; }
        50% { border-color: var(--hyde-cyan); }
    }

    /* Line clamp utilities for text truncation */
    .line-clamp-2 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }

    .line-clamp-3 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
    }

    /* Enhanced prose styling for testimonials */
    .prose {
        color: #374151;
        max-width: none;
    }
    
    .prose p {
        margin-bottom: 1rem;
        line-height: 1.6;
    }
    
    .prose a {
        color: #9333ea;
        text-decoration: none;
        font-weight: 500;
    }
    
    .prose a:hover {
        color: #7c3aed;
        text-decoration: underline;
    }

    .prose strong {
        font-weight: 600;
        color: #111827;
    }

    .prose em {
        font-style: italic;
    }

    .prose code {
        background-color: #f3f4f6;
        padding: 0.125rem 0.25rem;
        border-radius: 0.25rem;
        font-size: 0.875em;
        font-weight: 500;
    }
</style>
@push('meta')
    <meta name="keywords" content="HydePHP, Static App Builder, Static Sites, Blogs, Documentation, Static Site Generator, Hyde, PHP, PHP Framework">
    <meta name="subtitle" content="The Static Site Generator You've Been Waiting For, is Here.">
    <meta name="twitter:image" content="https://hydephp.com/media/og-image-index.png">
    <meta property="og:image" content="https://hydephp.com/media/og-image-index.png">
    <!-- JSON-LD markup generated by Google Structured Data Markup Helper. -->
    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "SoftwareApplication",
          "name": "HydePHP",
          "image": "https://hydephp.com/media/logo.svg",
          "url": "https://hydephp.com",
          "author": {
            "@type": "Person",
            "name": "Emma De Silva"
          },
          "datePublished": "2023-03-14",
          "publisher": {
            "@type": "Organization",
            "name": "HydePHP"
          },
          "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "USD"
          },
          "applicationCategory": "DeveloperApplication",
          "applicationSubCategory": "Static Site Generator",
          "downloadUrl": "https://hydephp.com/docs/1.x/quickstart",
          "featureList": "Markdown, Laravel, PHP, Static Site Generator",
          "operatingSystem": "Windows, Linux, macOS",
          "requirements": "PHP 8.1",
          "screenshot": "https://opengraph.githubassets.com/1/hydephp/hyde",
          "softwareVersion": "v1.x"
        }
    </script>
    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "WebPage",
          "mainEntity": {
            "@type": "SoftwareSourceCode",
            "url": "https://github.com/hydephp/hyde",
            "codeRepository": "https://github.com/hydephp/hyde"
          }
        }
    </script>
@endpush
@include('sections.homepage-header')

<!-- Quick Start Section -->
<section class="relative w-full py-24 bg-gradient-to-br from-slate-900 via-purple-900/20 to-slate-900 overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:60px_60px]"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-transparent to-slate-900/50"></div>
    
    <div class="container relative z-10 flex flex-col items-center justify-center h-full max-w-6xl mx-auto px-8 sm:flex-row sm:justify-between">
        <div class="relative flex flex-col items-start justify-center w-full mb-16 sm:w-1/2 lg:w-2/5 sm:mb-0 sm:pr-12">
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 mb-6 text-sm font-medium text-purple-300 bg-purple-500/10 border border-purple-500/20 rounded-full backdrop-blur-sm">
                <div class="w-2 h-2 bg-purple-400 rounded-full mr-3 animate-pulse"></div>
                New to Hyde?
            </div>
            
            <h2 class="mb-6 text-3xl font-bold leading-tight text-white lg:text-4xl xl:text-5xl">
                Start your journey
                <span class="block mt-2 bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-pink-400">
                    here.
                </span>
            </h2>
            
            <p class="mb-8 text-lg text-gray-300 leading-relaxed max-w-xl">
                HydePHP is an open-source console application that turns easy-to-use Markdown text files into 
                <span class="text-white font-medium">amazing static websites</span>, backed by the power of Laravel.
            </p>
            
            <!-- Enhanced CTA Button -->
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="docs/1.x/quickstart" class="group relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                    <span class="relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white bg-slate-900 border border-transparent rounded-lg group-hover:bg-slate-800 transition-colors">
                        <span class="mr-2">🚀</span>
                        Get Started Now
                    </span>
                </a>
                
                <a href="#features" class="inline-flex items-center justify-center px-8 py-4 text-lg font-medium text-gray-300 bg-white/5 border border-white/10 rounded-lg backdrop-blur-sm hover:bg-white/10 hover:text-white transition-all">
                    <span class="mr-2">📋</span>
                    See Features
                </a>
            </div>
        </div>
        
        <!-- Enhanced Video Section -->
        <div class="relative flex flex-col justify-center w-full h-full sm:w-1/2 lg:w-3/5">
            <div class="relative transform hover:scale-105 transition-transform duration-500">
                <!-- Glowing border effect -->
                <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl blur opacity-20"></div>
                
                <!-- Video container with glassmorphism -->
                <div class="relative bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-2 shadow-2xl">
                    <div class="relative rounded-lg overflow-hidden" style="padding:56.25% 0 0 0;">
                        <iframe 
                            src="https://player.vimeo.com/video/727679114?h=839eaecd83&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" 
                            frameborder="0" 
                            allow="autoplay; fullscreen; picture-in-picture" 
                            allowfullscreen 
                            style="position:absolute;top:0;left:0;width:100%;height:100%;" 
                            title="HydePHP in 100 seconds"
                            class="rounded-lg">
                        </iframe>
                    </div>
                </div>
                
                <!-- Floating badge -->
                <div class="absolute -top-4 -right-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                    <span class="mr-1">⏱️</span>
                    100 seconds
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features Section -->
<section id="features" class="relative w-full py-24 bg-gradient-to-br from-gray-50 to-white overflow-hidden">
    <!-- Subtle background pattern -->
    <div class="absolute inset-0 bg-grid-gray-100/50 bg-[size:60px_60px]"></div>
    
    <div class="container relative z-10 max-w-7xl px-8 mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-4 py-2 mb-6 text-sm font-medium text-purple-600 bg-purple-50 border border-purple-200 rounded-full">
                <span class="mr-2">✨</span>
                Features & Benefits
            </div>
            
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6">
                Why Choose
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-600">
                    HydePHP?
                </span>
            </h2>
            
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                While Hyde is packed with far too many quality features to list on this page, 
                here are some highlights that make Hyde a great choice for your next project.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
            <!-- Left Column - Feature Cards -->
            <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Easy Content Creation -->
                <div class="group relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-purple-400 rounded-2xl blur opacity-0 group-hover:opacity-20 transition duration-1000"></div>
                    <div class="relative bg-white border border-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <!-- Icon -->
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Easy Content Creation</h3>
                        
                        <div class="inline-flex items-center px-3 py-1 mb-4 text-xs font-medium text-purple-600 bg-purple-50 rounded-full">
                            Markdown, Blade, both? It's up to you.
                        </div>
                        
                        <p class="text-gray-600 leading-relaxed">
                            Create content with Markdown and let Hyde do the heavy lifting. 
                            Sprinkle in some Front Matter for extra credit.
                        </p>
                    </div>
                </div>

                <!-- Built-in Frontend -->
                <div class="group relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-blue-400 rounded-2xl blur opacity-0 group-hover:opacity-20 transition duration-1000"></div>
                    <div class="relative bg-white border border-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <!-- Icon -->
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Built-in Frontend</h3>
                        
                        <div class="inline-flex items-center px-3 py-1 mb-4 text-xs font-medium text-blue-600 bg-blue-50 rounded-full">
                            Batteries (and more) Included
                        </div>
                        
                        <p class="text-gray-600 leading-relaxed">
                            Hyde comes shipped with a full-featured frontend using TailwindCSS 
                            and customizable Laravel Blade templates.
                        </p>
                    </div>
                </div>

                <!-- Laravel Power -->
                <div class="group relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-red-600 to-red-400 rounded-2xl blur opacity-0 group-hover:opacity-20 transition duration-1000"></div>
                    <div class="relative bg-white border border-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <!-- Icon -->
                        <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3">The Power of Laravel</h3>
                        
                        <div class="inline-flex items-center px-3 py-1 mb-4 text-xs font-medium text-red-600 bg-red-50 rounded-full">
                            Based on Laravel Zero
                        </div>
                        
                        <p class="text-gray-600 leading-relaxed">
                            Laravel Developers will feel right at home with Hyde. 
                            You're gonna love our Artisan-based CLI and Blade templating.
                        </p>
                    </div>
                </div>

                <!-- Customizable -->
                <div class="group relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-600 to-emerald-400 rounded-2xl blur opacity-0 group-hover:opacity-20 transition duration-1000"></div>
                    <div class="relative bg-white border border-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <!-- Icon -->
                        <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Customizable to the Core</h3>
                        
                        <div class="inline-flex items-center px-3 py-1 mb-4 text-xs font-medium text-emerald-600 bg-emerald-50 rounded-full">
                            Convention over configuration
                        </div>
                        
                        <p class="text-gray-600 leading-relaxed">
                            Hyde is pre-configured for the majority of use cases. 
                            Not happy with something? You have the power to change it.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Column - Showcase Image -->
            <div class="lg:col-span-1 flex items-center justify-center">
                <div class="relative group">
                    <!-- Glow effect -->
                    <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600 rounded-2xl blur-sm opacity-20 group-hover:opacity-30 transition duration-1000"></div>
                    
                    <!-- Image container -->
                    <div class="relative bg-white/80 backdrop-blur-sm border border-gray-200 rounded-2xl p-4 shadow-2xl transform group-hover:scale-105 transition-transform duration-500">
                        <div class="rounded-xl overflow-hidden">
                            <img 
                                src="media/markdown-pages.png" 
                                alt="Splitscreen view of the Markdown source for a HydePHP website, and its rendered preview" 
                                class="w-full h-auto object-cover"
                            >
                        </div>
                        
                        <!-- Overlay badge -->
                        <div class="absolute -top-3 -right-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <span class="mr-1">📝</span>
                            Live Preview
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Enhanced Testimonials Section -->
    <div class="py-24">
        @include('testimonials')
    </div>
    
    <!-- Wave transition -->
    <svg class="w-full text-slate-900 fill-current" viewBox="0 0 1400 74" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 24C87.243 11.422 173.12 5.133 257.633 5.133 468.305 5.133 578.027 74 700 74c136.015 0 290.882-96.208 481.234-68.867C1268.807 17.71 1341.73 24 1400 24v50H0V24z" />
    </svg>
</div>

<!-- Who's It For Section -->
<section class="relative w-full py-24 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:60px_60px]"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-purple-900/20 via-transparent to-pink-900/20"></div>

    <div class="container relative z-10 max-w-7xl px-8 mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-4 py-2 mb-6 text-sm font-medium text-cyan-300 bg-cyan-500/10 border border-cyan-500/20 rounded-full backdrop-blur-sm">
                <span class="mr-2">👥</span>
                Built for Developers
            </div>
            
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                Who's it
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-purple-400">
                    for?
                </span>
            </h2>
            
            <p class="text-xl text-gray-300 max-w-4xl mx-auto leading-relaxed">
                While you don't need to know PHP or Laravel, Hyde is aimed at developers and requires basic command-line knowledge.
                Here is a breakdown of some key bullet points tailored to various use cases.
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Laravel Artisans -->
            <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-red-600 to-red-400 rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-1000"></div>
                <div class="relative h-full bg-slate-800/80 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8 hover:border-red-500/30 transition-all duration-300">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl mb-4 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl">🎩</span>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-2">Laravel Artisans</h4>
                        <p class="text-gray-300">
                            Are Hyde <span class="font-bold text-red-400">first-class citizens</span>.
                        </p>
                    </div>

                    <!-- Features List -->
                    <ul class="space-y-4 mb-8 flex-1">
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-red-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300">HydePHP is based on Laravel Zero</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-red-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300">Render <span class="text-red-400 font-medium">Blade</span> files to HTML</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-red-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300">Artisan-based CLI interface</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-red-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300">Automatic <span class="text-red-400 font-medium">pseudo-routing</span></span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-red-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300">Preconfigured Laravel Mix</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-red-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300">File-based <span class="text-red-400 font-medium">Collections</span></span>
                        </li>
                    </ul>

                    <!-- CTA Button -->
                    <a href="https://hydephp.com/docs/1.x/architecture-concepts" class="group/btn relative block">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-red-600 to-red-400 rounded-lg blur opacity-0 group-hover/btn:opacity-100 transition duration-300"></div>
                        <span class="relative inline-flex items-center justify-center w-full px-6 py-3 text-sm font-bold text-white bg-red-500 hover:bg-red-600 rounded-lg transition-colors">
                            <span class="mr-2">🏗️</span>
                            Architecture Concepts
                        </span>
                    </a>
                </div>
            </div>

            <!-- Markdown Aficionados -->
            <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-blue-400 rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-1000"></div>
                <div class="relative h-full bg-slate-800/80 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8 hover:border-blue-500/30 transition-all duration-300">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl mb-4 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl">📝</span>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-2">Markdown Aficionados</h4>
                        <p class="text-gray-300">
                            Have <span class="font-bold text-blue-400">their rightful place</span>, at last.
                        </p>
                    </div>

                    <!-- Features List -->
                    <ul class="space-y-4 mb-8 flex-1">
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300"><span class="text-blue-400 font-medium">Simple</span> Markdown Pages</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300"><span class="text-blue-400 font-medium">Easy</span> Documentation sites</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300"><span class="text-blue-400 font-medium">Smart</span> Blog Posts</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300">Torchlight Syntax Highlighting</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300">YAML Front Matter</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300">Automatic RSS feed</span>
                        </li>
                    </ul>

                    <!-- CTA Button -->
                    <a href="https://hydephp.com/docs/1.x/blog-posts" class="group/btn relative block">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-blue-400 rounded-lg blur opacity-0 group-hover/btn:opacity-100 transition duration-300"></div>
                        <span class="relative inline-flex items-center justify-center w-full px-6 py-3 text-sm font-bold text-white bg-blue-500 hover:bg-blue-600 rounded-lg transition-colors">
                            <span class="mr-2">📚</span>
                            Markdown Documentation
                        </span>
                    </a>
                </div>
            </div>

            <!-- Developers & More -->
            <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-600 to-emerald-400 rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-1000"></div>
                <div class="relative h-full bg-slate-800/80 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8 hover:border-emerald-500/30 transition-all duration-300">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl mb-4 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl">💻</span>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-2">Developers & More</h4>
                        <p class="text-gray-300">
                            And some <span class="font-bold text-emerald-400">more features</span>.
                        </p>
                    </div>

                    <!-- Features List -->
                    <ul class="space-y-4 mb-8 flex-1">
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300"><span class="text-emerald-400 font-medium">Free</span> and Open Source</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300"><span class="text-emerald-400 font-medium">Automatic</span> Navigation Menus</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300"><span class="text-emerald-400 font-medium">Customizable</span> & Configurable</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300">No databases needed</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300">Version controllable</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full mt-2.5 mr-3 flex-shrink-0"></div>
                            <span class="text-gray-300">And Much More</span>
                        </li>
                    </ul>

                    <!-- CTA Button -->
                    <a href="https://hydephp.com/docs/1.x/quickstart" class="group/btn relative block">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-600 to-emerald-400 rounded-lg blur opacity-0 group-hover/btn:opacity-100 transition duration-300"></div>
                        <span class="relative inline-flex items-center justify-center w-full px-6 py-3 text-sm font-bold text-white bg-emerald-500 hover:bg-emerald-600 rounded-lg transition-colors">
                            <span class="mr-2">⚡</span>
                            Installation Guide
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Wave transition -->
    <svg class="absolute bottom-0 w-full text-white fill-current" viewBox="0 0 1400 74" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 24C87.243 11.422 173.12 5.133 257.633 5.133 468.305 5.133 578.027 74 700 74c136.015 0 290.882-96.208 481.234-68.867C1268.807 17.71 1341.73 24 1400 24v50H0V24z" />
    </svg>
</section>

<!-- Blog Posts Section -->
<section class="relative bg-white py-24">
    @include('sections.posts')
</section>

@endsection
