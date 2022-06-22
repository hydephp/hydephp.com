@extends('hyde::layouts.app')
@section('content')
<section class="py-16 px-4 text-center bg-gray-100 dark:bg-slate-900">
    <h2 class="text-2xl md:text-3-xl lg:text-4xl font-black text-slate-700 dark:text-slate-200 px-3 my-3">
        Statistics
    </h2>
    <p class="text-lg prose dark:prose-invert text-center mx-auto">
        Data compiled {{ Carbon\Carbon::now() }}.
        See more at <a href="https://packagist.org/packages/hyde/framework/stats">Packagist</a>
    </p>
    <div>
        @include('components.statistics')
    </div>
</section>
<section class="py-16 px-4 text-center">
    <h2 class="text-2xl md:text-3-xl lg:text-4xl font-black text-slate-700 dark:text-slate-200 px-3 my-3">
        Main Repositories
    </h2>
    <div class="flex flex-wrap justify-center max-w-7xl mx-auto my-4 lg:my-8">
        <div class="my-4 px-4 w-full md:w-1/2 xl:w-1/3 max-w-md">
            <article class="bg-white text-slate-900 p-4 rounded-lg shadow-xl">
                <header>
                    <h3 class="font-bold text-2xl text-left border-b mb-3 pb-3">The Hyde Template Repo</h3>
                    <a href="https://github.com/hydephp/hyde">
                        <img src="https://opengraph.githubassets.com/1/hydephp/hyde"
                            alt="Open Graph Image Repository Preview">
                    </a>
                </header>
                <div class="py-4 prose">
                    <p class="lead">
                        The main repo for creating new projects and contains Hyde/Framework as a dependency.
                    </p>
                    <a href="https://packagist.org/packages/hyde/hyde"><img style="display: inline; margin: 4px 2px;"
                            src="https://img.shields.io/packagist/v/hyde/hyde" alt="Latest Version on Packagist"></a>
                    <a href="https://github.com/hydephp/hyde/blob/master/LICENSE.md"><img
                            style="display: inline; margin: 4px 2px;"
                            src="https://img.shields.io/github/license/hydephp/hyde" alt="License"></a>
                    <a href="https://github.styleci.io/repos/471485402?branch=master"><img
                            style="display: inline; margin: 4px 2px;"
                            src="https://github.styleci.io/repos/471485402/shield?branch=master"
                            alt="StyleCI Status"></a>
                </div>
            </article>
        </div>
        <div class="my-4 px-4 w-full md:w-1/2 xl:w-1/3 max-w-md">
            <article class="bg-white text-slate-900 p-4 rounded-lg shadow-xl">
                <header>
                    <h3 class="font-bold text-2xl text-left border-b mb-3 pb-3">The Hyde Core Package</h3>
                    <a href="https://github.com/hydephp/framework">
                        <img src="https://opengraph.githubassets.com/1/hydephp/framework"
                            alt="Open Graph Image Repository Preview">
                    </a>
                </header>
                <div class="py-4 prose">
                    <p class="lead">
                        The core logic used for the Hyde Framework. Should be used together with Hyde/Hyde.
                    </p>
                    <a href="https://packagist.org/packages/hyde/framework"><img
                            style="display: inline; margin: 4px 2px;"
                            src="https://img.shields.io/packagist/dt/hyde/framework" alt="Total Downloads"></a>
                    <a href="https://packagist.org/packages/hyde/framework"><img
                            style="display: inline; margin: 4px 2px;"
                            src="https://img.shields.io/packagist/v/hyde/framework"
                            alt="Latest Version on Packagist"></a>
                    <a href="https://github.com/hydephp/framework/blob/master/LICENSE.md"><img
                            style="display: inline; margin: 4px 2px;"
                            src="https://img.shields.io/github/license/hydephp/framework" alt="License"></a>
                    <a
                        href="https://cdn.desilva.se/microservices/coverbadges/badges/9b8f6a9a7a48a2df54e6751790bad8bd910015301e379f334d6ec74c4c3806d1.svg"><img
                            style="display: inline; margin: 4px 2px;"
                            src="https://cdn.desilva.se/microservices/coverbadges/badges/9b8f6a9a7a48a2df54e6751790bad8bd910015301e379f334d6ec74c4c3806d1.svg"
                            alt="Test Coverage" title="Average coverage between categories"></a>
                    <a href="https://github.com/hydephp/hyde/actions/workflows/tests.yml"><img
                            style="display: inline; margin: 4px 2px;"
                            src="https://github.com/hydephp/framework/actions/workflows/test-suite.yml/badge.svg"
                            alt="GitHub Actions Test Suite"></a>
                    <a href="https://github.styleci.io/repos/472503421?branch=master"><img
                            style="display: inline; margin: 4px 2px;"
                            src="https://github.styleci.io/repos/472503421/shield?branch=master"
                            alt="StyleCI Status"></a>

                </div>
            </article>
        </div>
    </div>
</section>
<section class="py-16 px-4 text-center bg-gray-100 dark:bg-slate-900">
    <h2 class="text-2xl md:text-3-xl lg:text-4xl font-black text-slate-700 dark:text-slate-200 px-3 my-3">
        CI Repositories
    </h2>
    <p class="text-lg">
        Hyde uses a three stage automatic CI/CD pipeline to build and deploy this site.
    </p>
    <div class="flex flex-wrap justify-center max-w-7xl mx-auto my-4 lg:my-8 items-stretch">
        <div class="my-4 px-4 w-full md:w-1/2 xl:w-1/3 max-w-md h-auto">
            <article class="bg-white text-slate-900 p-4 rounded-lg shadow-xl h-full">
                <header>
                    <h3 class="font-bold text-2xl text-left border-b mb-3 pb-3">Markdown Docs Repo</h3>
                    <a href="https://github.com/hydephp/docs">
                        <img src="https://opengraph.githubassets.com/1/hydephp/docs"
                            alt="Open Graph Image Repository Preview">
                    </a>
                </header>
                <div class="py-4 prose">
                    <p class="lead">
                        Source Markdown Documentation Files.
                    </p>
                    <p>
                        When contributing to the Docs, this is the place!
                        All changes here are propagated to the DocsCI repo to be compiled into this static site.
                    </p>
                    <a href="https://github.com/hydephp/docs/actions/workflows/deploy.yml">
                        <img style="display: inline; margin: 4px 2px;"
                            src="https://github.com/hydephp/docs/actions/workflows/deploy.yml/badge.svg"
                            alt="CI Deploy">
                    </a>
                </div>
            </article>
        </div>
        <div class="my-4 px-4 w-full md:w-1/2 xl:w-1/3 max-w-md h-auto">
            <article class="bg-white text-slate-900 p-4 rounded-lg shadow-xl h-full">
                <header>
                    <h3 class="font-bold text-2xl text-left border-b mb-3 pb-3">Hyde DocsCI Repo</h3>
                    <a href="https://github.com/hydephp/DocsCI">
                        <img src="https://opengraph.githubassets.com/1/hydephp/DocsCI"
                            alt="Open Graph Image Repository Preview">
                    </a>
                </header>
                <div class="py-4 prose">
                    <p class="lead">
                        Hyde Static Site CI Compiler.
                    </p>
                    <p>
                        This is a Hyde app with the source files for this site.
                        When a file is changed here the CI builder kicks in and compiles the site to static HTML
                        and uploads it to the GitHub Pages repo.
                    </p>
                    <a href="https://github.com/hydephp/DocsCI/actions/workflows/build.yml">
                        <img style="display: inline; margin: 4px 2px;"
                            src="https://github.com/hydephp/DocsCI/actions/workflows/build.yml/badge.svg"
                            alt="Build the site">
                    </a>
                </div>
            </article>
        </div>
        <div class="my-4 px-4 w-full md:w-1/2 xl:w-1/3 max-w-md h-auto">
            <article class="bg-white text-slate-900 p-4 rounded-lg shadow-xl h-full">
                <header>
                    <h3 class="font-bold text-2xl text-left border-b mb-3 pb-3">GitHub Pages Repo</h3>
                    <a href="https://github.com/hydephp/hydephp.github.io">
                        <img src="https://opengraph.githubassets.com/1/hydephp/hydephp.github.io"
                            alt="Open Graph Image Repository Preview">
                    </a>
                </header>
                <div class="py-4 prose">
                    <p class="lead">
                        Hosts the static site for GitHub Pages.
                    </p>
                    <p>
                        The final step in the CI process.
                        The compiled site is uploaded here by the DocsCI and is then deployed automatically to GitHub
                        Pages.
                    </p>
                    <a
                        href="https://github.com/hydephp/hydephp.github.io/actions/workflows/pages/pages-build-deployment">
                        <img style="display: inline; margin: 4px 2px;"
                            src="https://github.com/hydephp/hydephp.github.io/actions/workflows/pages/pages-build-deployment/badge.svg?branch=gh-pages"
                            alt="Pages build and deployment">
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection