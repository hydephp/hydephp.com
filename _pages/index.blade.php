@extends('hyde::layouts.app')
@section('content')
@php($title = 'Elegant and Powerful Static Site Generator')
<style>
    /* === Enhanced Hyde brand palette pulled from the logo === */
    :root {
        --hyde-magenta: #B1368F;  /* ribbon left */
        --hyde-coral: #F15A4A;    /* ribbon right */
        --hyde-navy-1: #1E2A3C;   /* hat body top */
        --hyde-navy-2: #172434;   /* hat body base */
        --hyde-cyan: #06B6D4;     /* cyan accent */
        --hyde-purple: #A855F7;   /* purple accent */
        --laravel-red: #F53003;   /* official Laravel */
        --plasma-purple: #A855F7; /* Markdown */ 
        --github-green: #5FED83;  /* GitHub */
        --php-blue: #7A86B8;      /* PHP */
    }

    /* Brand gradients */
    .text-hyde-ribbon {
        background-image: linear-gradient(90deg, var(--hyde-magenta) 0%, var(--hyde-coral) 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        filter: drop-shadow(0 0 18px rgba(241, 90, 74, .18)) drop-shadow(0 0 10px rgba(177, 54, 143, .18));
    }

    .bg-hyde-cyan { background-color: var(--hyde-cyan); }
    .bg-hyde-purple { background-color: var(--hyde-purple); }
    .text-hyde-cyan { color: var(--hyde-cyan); }
    .text-hyde-purple { color: var(--hyde-purple); }
    
    .bg-php-blue { background-color: var(--php-blue); }
    .bg-github-green { background-color: var(--github-green); }
    .bg-laravel-red { background-color: var(--laravel-red); }

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
        display: none !important;
    }
    #app {
        min-width: 100vw;
    }
    #docs-nav-button {
        margin-right: 0.75rem;
    }
    
    /* Ensure proper spacing for fixed navigation */
    body > section:first-of-type {
        padding-top: 0; /* Hero should start at the top */
    }
    
    /* Better responsive spacing */
    @media (max-width: 640px) {
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }
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
    <meta name="twitter:image" content="https://hydephp.com/media/banner.png">
    <meta property="og:image" content="https://hydephp.com/media/banner.png">
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
          "downloadUrl": "https://hydephp.com/docs/2.x/quickstart",
          "featureList": "Markdown, Laravel, PHP, Static Site Generator",
          "operatingSystem": "Windows, Linux, macOS",
          "requirements": "PHP 8.1",
          "screenshot": "https://opengraph.githubassets.com/1/hydephp/hyde",
          "softwareVersion": "v2.x"
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

@include('sections.how-it-works')

@include('sections.quick-start')
@include('sections.features-enhanced')
@include('sections.who-its-for')
@include('testimonials')

@include('sections.posts')

@endsection
