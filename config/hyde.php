<?php

/*
|--------------------------------------------------------------------------
| The HydePHP Configuration File
|--------------------------------------------------------------------------
|
| This configuration file lets you change and customize the behaviour
| of your HydePHP site. To customize the presentation options, like
| the site name, please see the new config/site.php file instead.
|
*/

use Hyde\Framework\Helpers\Features;
use Hyde\Framework\Helpers\Meta;
use Hyde\Framework\Models\Author;
use Hyde\Framework\Models\NavItem;
use Hyde\Framework\Models\Route;

return [

    /*
    |--------------------------------------------------------------------------
    | Site Name
    |--------------------------------------------------------------------------
    |
    | This value sets the name of your site and is, for example, used in
    | the compiled page titles and more. The default value is HydePHP.
    |
    | The name is stored in the $siteName variable so it can be
    | used again later on in this config.
    |
    */

    'name' => $siteName = env('SITE_NAME', 'HydePHP'),

    /*
    |--------------------------------------------------------------------------
    | Site URL Configuration
    |--------------------------------------------------------------------------
    |
    | Here are some configuration options for URL generation.
    |
    | A site_url is required to use sitemaps and RSS feeds.
    |
    | `site_url` is used to create canonical URLs and permalinks.
    | `prettyUrls` will when enabled create links that do not end in .html.
    | `generateSitemap` determines if a sitemap.xml file should be generated.
    |
    | To see the full documentation, please visit the (temporary link) below.
    | https://github.com/hydephp/framework/wiki/Documentation-Page-Drafts
    |
    |
    */

    'site_url' => 'https://hydephp.com/',

    'pretty_urls' => false,

    'generate_sitemap' => true,

    /*
    |--------------------------------------------------------------------------
    | Site Language
    |--------------------------------------------------------------------------
    |
    | This value sets the language of your site and is used for the
    | <html lang=""> element in the app layout. Default is 'en'.
    |
    */

    'language' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Global Site Meta Tags
    |--------------------------------------------------------------------------
    |
    | While you can add any number of meta tags in the meta.blade.php component
    | using standard HTML, you can also use the Meta helper. To add a regular
    | meta tag, use Meta::name() helper. To add an Open Graph property, use
    | Meta::property() helper which also adds the `og:` prefix for you.
    |
    | Please note that some pages like blog posts contain dynamic meta tags
    | which may override these globals when present in the front matter.
    |
    */

    'meta' => [
        Meta::name('author', 'Caen De Silva'),
        Meta::name('description', 'HydePHP - Elegant and Powerful Static Site Generator'),
        Meta::name('keywords', 'HydePHP, Static Site Generator, Static Sites, Blogs, Documentation'),
        Meta::name('generator', 'HydePHP '.Hyde\Framework\Hyde::version()),
        Meta::name('twitter:card', 'summary'),
        Meta::name('twitter:site', '@hyde_php'),
        Meta::name('twitter:creator', '@CodeWithCaen'),
        Meta::name('twitter:title', 'HydePHP - Elegant and Powerful Static Site Generator'),
        Meta::name('twitter:description', 'Make static websites, blogs, and documentation pages with the tools you already know and love.'),
        // Meta::name('twitter:image', 'https://opengraph.githubassets.com/1/hydephp/hyde'),
        Meta::name('twitter:image', 'https://hydephp.com/media/og-image-index.png'),
        Meta::property('site_name', $siteName),
        Meta::property('url', 'https://hydephp.com/'),
        Meta::property('title', 'HydePHP'),
        Meta::property('description', 'HydePHP - Elegant and Powerful Static Site Generator'),
        // Meta::property('image', 'https://opengraph.githubassets.com/1/hydephp/hyde'),
        // Meta::property('image:alt', 'GitHub OpenGraph Image'),
        Meta::property('image', 'https://hydephp.com/media/og-image-index.png'),
        Meta::property('image:alt', 'OpenGraph Image'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Features
    |--------------------------------------------------------------------------
    |
    | Some of Hyde's features are optional. Feel free to disable the features
    | you don't need by removing or commenting them out from this array.
    | This config concept is directly inspired by Laravel Jetstream.
    |
    */

    'features' => [
        // Page Modules
        Features::blogPosts(),
        Features::bladePages(),
        Features::markdownPages(),
        Features::documentationPages(),
        // Features::dataCollections(),

        // Frontend Features
        Features::darkmode(),
        Features::documentationSearch(),

        // Integrations
        Features::torchlight(),
    ],

    /*
    |--------------------------------------------------------------------------
    | Blog Post Authors
    |--------------------------------------------------------------------------
    |
    | Hyde has support for adding authors in front matter, for example to
    | automatically add a link to your website or social media profiles.
    | However, it's tedious to have to add those to each and every
    | post you make, and keeping them updated is even harder.
    |
    | Here you can add predefined authors. When writing posts,
    | just specify the username in the front matter, and the
    | rest of the data will be pulled from a matching entry.
    |
    */

    'authors' => [
        Author::create(
            username: 'caen',
            name: 'Caen',
            website: 'https://twitter.com/CodeWithCaen'
        )
    ],

    /*
    |--------------------------------------------------------------------------
    | Footer Text
    |--------------------------------------------------------------------------
    |
    | Here you can customize the footer Markdown text for your site.
    |
    | If you don't want to write Markdown here, you use a Markdown include.
    | You can also customize the Blade view if you want a more complex footer.
    | You can disable it completely by changing the setting to `false`.
    |
    | To read about the many configuration options here, visit:
    | https://hydephp.com/docs/master/customization#footer
    |
    */

    'footer' => 'Site proudly built with [HydePHP](https://github.com/hydephp/hyde) 🎩',

    /*
    |--------------------------------------------------------------------------
    | Navigation Menu Configuration
    |--------------------------------------------------------------------------
    |
    | If you are looking to customize the navigation menu links, this is the place!
    |
    | See the documentation for the full list of options:
    | https://hydephp.com/docs/master/customization#navigation-menu--sidebar
    |
    */

    'navigation' => [
        // These are the pages that should not show up in the navigation menu.
        'exclude' => [
            '404',
            'dashboard',
            'posts',
            'privacy',
            'legal',
            'changelog',
            'license',
            'security',
            'contributing',
            'code-of-conduct',
            'community',
            'docs/master/index',
            'testimonials',
            'accessibility',
            'sitemap',
            'docs',
            'features' // merged with about
        ],

        'order' => [
            'index' => 1,
            'live-demos' => 1100
        ],

        // Any extra links you want to add to the navigation menu can be added here.
        // To get started quickly, you can uncomment the defaults here.
        // See the documentation link above for more information.
        'custom' => [
            NavItem::toLink('https://github.com/hydephp/hyde', 'GitHub', 1200),
            NavItem::toLink('/posts', 'Blog', 1050),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Load app.css from CDN
    |--------------------------------------------------------------------------
    |
    | Hyde ships with an app.css file containing compiled TailwindCSS styles
    | in the _media/ directory. If you want to load this file from the
    | HydeFront JsDelivr CDN, you can set this setting to true.
    */

    'load_app_styles_from_cdn' => false,
];
