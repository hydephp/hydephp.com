<!DOCTYPE html>
<html lang="{{ config('site.language', 'en') }}">
<head>
    <meta id="meta-color-scheme" name="color-scheme" content="{{ config('hyde.default_color_scheme', 'light') }}">
    <script>if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) { document.documentElement.classList.add('dark'); document.getElementById('meta-color-scheme').setAttribute('content', 'dark');} else { document.documentElement.classList.remove('dark') } </script>
    @include('hyde::layouts.styles')
    <meta name="robots" content="noindex, nofollow">
    <link rel="canonical" href="https://hydephp.com/showcase/podcast">

    <script>
        if (!window.location.search.includes('embed=true')) {
            window.location.href = 'https://hydephp.com/showcase/podcast';
        }
    </script>
</head>
<body class="bg-standard dark:bg-slate-700">
    @include('sections.podcast-player', ['embed' => true])
    @include('hyde::layouts.scripts')
</body>
</html>
