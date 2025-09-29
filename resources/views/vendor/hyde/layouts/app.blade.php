<!DOCTYPE html>
<html lang="{{ config('site.language', 'en') }}">
<head>
    @include('hyde::layouts.head')
</head>
<body id="app" class="flex flex-col min-h-screen overflow-x-hidden antialiased bg-standard"
    x-data="{ navigationOpen: false }" x-on:keydown.escape="navigationOpen = false;">
    @include('hyde::components.skip-to-content-button')
    @include('hyde::layouts.navigation')

    @include('components.banner')

    <section>
        @yield('content') 
    </section>

    @include('hyde::layouts.footer') 

    @include('hyde::layouts.scripts') 
</body>
</html>
