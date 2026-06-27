# Community Portal

## Quick Links

<div style="display: flex; flex-wrap: wrap; margin: 0 -40px; margin-top: -20px;">

<div style="margin: 0 40px;">

### Community Health Files

- [Contribution Guide](contributing)
- [Code of Conduct](code-of-conduct)
- [Security Policy](security)

</div>

<div style="margin: 0 40px;">

### Other Resources

- [Documentation](docs)
- [Legal Information](legal)
- [MIT License](license)
  
</div>

<div style="margin: 0 40px;">

### Important Repositories

- [The Hyde Project](https://github.com/hydephp/hyde)![External link](media/external.svg "External link"){.ext-link}
- [The Core Framework](https://github.com/hydephp/framework)![External link](media/external.svg "External link"){.ext-link}
- [The Development Monorepo](https://github.com/hydephp/develop)![External link](media/external.svg "External link"){.ext-link}

</div>

</div>

### Subproject Locations

Most of the Hyde development is done in the monorepo found on GitHub in the [HydePHP/Develop](https://github.com/hydephp/develop) repository. Here are quick links to take you to the subprojects within.

#### I want to contribute to the...

- [Hyde project](https://github.com/hydephp/develop)
- [Core framework](https://github.com/hydephp/develop/tree/master/packages/framework)
- [Documentation](https://github.com/hydephp/develop/tree/master/docs)
- [Frontend](https://github.com/hydephp/develop/tree/master/packages/hydefront)
- [Test Suite](https://github.com/hydephp/develop/tree/master/tests)
- [Website](https://github.com/hydephp/hydephp.com)
{.flex-list}

---

<a id="developers"></a>

# Developer Resources

This section is written for those who are interested in contributing to the HydePHP Framework.

If you are looking to build an application using Hyde, you might be looking for the [official documentation](docs).

## How HydePHP is Structured

**HydePHP consists of a few core components, and development is done in a monorepo.**

This means that when contributing to the code, we submit the code to a single "mono" repository where the code is automatically split into separate read-only repositories for each component.

The two most important components are **Hyde** and **Framework**. We also use **HydeFront** for frontend assets.

Here is a quick overview of the components. Keep on reading to learn more about the repositories. 

| Name:                             | Hyde                                                  | Framework                                                                               | HydeFront                                                                               |
|-----------------------------------|-------------------------------------------------------|-----------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------|
| Repository:                       | [hydephp/hyde](https://github.com/hydephp/hyde)       | [hydephp/framework](https://github.com/hydephp/framework)                               | [hydephp/hydefront](https://github.com/hydephp/hydefront)                               |
| Package:                          | [hyde/hyde](https://packagist.org/packages/hyde/hyde) | [hyde/framework](https://packagist.org/packages/hyde/framework)                         | [hydefront](https://www.npmjs.com/package/hydefront)                                    |
| Monorepo path:                    | [Root directory](https://github.com/hydephp/develop/) | [packages/framework](https://github.com/hydephp/develop/tree/master/packages/framework) | [packages/hydefront](https://github.com/hydephp/develop/tree/master/packages/hydefront) |

### Hyde/Hyde - The HydePHP Project

**The Hyde package is what the end-user sees and interacts with.** When creating a new HydePHP site, this is done using the Hyde project. The package contains all the necessary files to run a HydePHP site and bootstraps the entire system. _Equivalent to Laravel/Laravel_

### Hyde/Framework - The Core Framework

**The Framework package holds most of the logic of the Hyde framework.** This is where all the data models, static site generators, HydeCLI commands, Blade views, and more, are stored. Having this in a package makes it much easier to version and update using Composer. _Equivalent to Laravel/Framework_

### Hyde/HydeFront - The Frontend Assets

**The HydeFront package contains stylesheets and scripts** to help make HydePHP sites accessible and interactive. It also includes a pre-compiled TailwindCSS file containing all the styles needed for the built-in Blade templates.

<section id="repositories" class="py-16 px-4 text-center lg:-mx-32">
<h2 class="text-2xl md:text-3-xl lg:text-4xl font-black text-slate-700 dark:text-slate-200 px-3 my-3 not-prose">
Main Repositories
</h2>
<div class="flex flex-wrap justify-center max-w-7xl mx-auto my-4 lg:my-8">
<div class="my-4 px-4 w-full md:w-1/2 xl:w-1/3 max-w-md">
<article class="bg-white text-slate-900 p-4 rounded-lg shadow-xl">
<header>
<h3 class="font-bold text-2xl text-left border-b mb-3 pb-3 dark:text-black mt-0">The Hyde Project Repo</h3>
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
<h3 class="font-bold text-2xl text-left border-b mb-3 pb-3 dark:text-black mt-0">The Development Monorepo</h3>
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
<h3 class="font-bold text-2xl text-left border-b mb-3 pb-3 dark:text-black mt-0">The Hyde Core Package</h3>
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