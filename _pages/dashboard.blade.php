@extends('hyde::layouts.app')
@section('content')
<section class="py-16 px-4 text-center bg-gray-100 dark:bg-slate-900">
    <h2 class="text-2xl md:text-3-xl lg:text-4xl font-black text-slate-700 dark:text-slate-200 px-3 my-3">
        HydePHP Statistics
    </h2>
    <p class="text-lg prose dark:prose-invert text-center mx-auto">
        Data compiled {{ Carbon\Carbon::now() }}.
        See more at <a href="https://packagist.org/packages/hyde/framework/stats">Packagist</a>
        and the <a href="https://git.desilva.se/GitHubAnalyticsExplorer/">Open GitHub Data Analytics Explorer</a>
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
                    <h3 class="font-bold text-2xl text-left border-b mb-3 pb-3">The Hyde Project Repo</h3>
                    <a href="https://github.com/hydephp/hyde">
                        <img src="https://opengraph.githubassets.com/1/hydephp/hyde"
                            alt="Open Graph Image Repository Preview">
                    </a>
                </header>
                <div class="py-4 prose">
                    <p class="lead">
                        The main repo for creating new projects and contains Hyde/Framework as a dependency.
                    </p>
                    <a href="https://packagist.org/packages/hyde/framework"><img style="display: inline; margin: 4px 2px;" src="https://img.shields.io/packagist/v/hyde/framework?include_prereleases" alt="Latest Version on Packagist"></a> 
                    <a href="https://packagist.org/packages/hyde/framework"><img style="display: inline; margin: 4px 2px;" src="https://img.shields.io/packagist/dt/hyde/framework" alt="Total Downloads on Packagist"></a> 
                    <a href="https://github.com/hydephp/hyde/blob/master/LICENSE.md"> <img style="display: inline; margin: 4px 2px;" src="https://img.shields.io/github/license/hydephp/hyde" alt="License MIT"> </a>
                    <a href="https://cdn.desilva.se/microservices/coverbadges/badges/9b8f6a9a7a48a2df54e6751790bad8bd910015301e379f334d6ec74c4c3806d1.svg"><img style="display: inline; margin: 4px 2px;" src="https://cdn.desilva.se/microservices/coverbadges/badges/9b8f6a9a7a48a2df54e6751790bad8bd910015301e379f334d6ec74c4c3806d1.svg" alt="Test Coverage" title="Average coverage between categories"></a>
                    <a href="https://github.com/hydephp/develop/actions/workflows/continuous-integration.yml"><img style="display: inline; margin: 4px 2px;" src="https://github.com/hydephp/develop/actions/workflows/continuous-integration.yml/badge.svg" alt="Test Suite"></a>
                </div>
            </article>
        </div>
        
        <div class="my-4 px-4 w-full md:w-1/2 xl:w-1/3 max-w-md">
            <article class="bg-white text-slate-900 p-4 rounded-lg shadow-xl">
                <header>
                    <h3 class="font-bold text-2xl text-left border-b mb-3 pb-3">The Development Monorepo</h3>
                    <a href="https://github.com/hydephp/develop">
                        <img src="https://opengraph.githubassets.com/1/hydephp/develop"
                            alt="Open Graph Image Repository Preview">
                    </a>
                </header>
                <div class="py-4 prose">
                    <p class="lead">
                        Where all the magic happens. Oh, and the occasional development.
                    </p>

                    <a href="https://github.com/hydephp/develop/actions/workflows/continuous-integration.yml"><img  style="display: inline; margin: 4px 2px;" src="https://github.com/hydephp/develop/actions/workflows/continuous-integration.yml/badge.svg" alt="Test &amp; Build" /></a>
                        <a href="https://github.com/hydephp/framework/actions/workflows/run-tests.yml"><img  style="display: inline; margin: 4px 2px;" src="https://github.com/hydephp/framework/actions/workflows/run-tests.yml/badge.svg" alt="Framework Tests (Matrix)" /></a>
                        <a href="https://github.com/hydephp/hyde/actions/workflows/run-tests.yml"><img  style="display: inline; margin: 4px 2px;" src="https://github.com/hydephp/hyde/actions/workflows/run-tests.yml/badge.svg" alt="Hyde Tests" /></a>
                        <a href="https://codecov.io/gh/hydephp/develop"><img  style="display: inline; margin: 4px 2px;" src="https://codecov.io/gh/hydephp/develop/branch/master/graph/badge.svg?token=G6N2161TOT" alt="codecov" /></a>
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
                    <a href="https://packagist.org/packages/hyde/framework"><img style="display: inline; margin: 4px 2px;" src="https://img.shields.io/packagist/v/hyde/framework?include_prereleases" alt="Latest Version on Packagist"></a> 
                    <a href="https://packagist.org/packages/hyde/framework"><img style="display: inline; margin: 4px 2px;" src="https://img.shields.io/packagist/dt/hyde/framework" alt="Total Downloads on Packagist"></a> 
                    <a href="https://github.com/hydephp/hyde/blob/master/LICENSE.md"> <img style="display: inline; margin: 4px 2px;" src="https://img.shields.io/github/license/hydephp/hyde" alt="License MIT"> </a>
                    <a href="https://hydephp.com/developer-tools/coverage-report/"><img style="display: inline; margin: 4px 2px;" src="https://cdn.desilva.se/microservices/coverbadges/badges/9b8f6a9a7a48a2df54e6751790bad8bd910015301e379f334d6ec74c4c3806d1.svg" alt="Test Coverage" title="Average coverage between categories"></a>
                    <a href="https://github.com/hydephp/develop/actions/workflows/continuous-integration.yml"><img style="display: inline; margin: 4px 2px;" src="https://github.com/hydephp/develop/actions/workflows/continuous-integration.yml/badge.svg" alt="Test Suite"></a>

                </div>
            </article>
        </div>

    </div>
</section>
@endsection