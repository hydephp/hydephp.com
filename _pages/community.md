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

### Subproject locations

Most of the Hyde development is made in the monorepo found on GitHub in the [HydePHP/Develop](https://github.com/hydephp/develop) repository. Here are quick links to take you to the subprojects within.

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

  
<!-- Became very long, saving for a blog post. It's a separate package for a few reasons. Partly to separate presentation and logic, and also to allow hosting of the styles on a CDN. We take advantage of this as we control the HydeFront version in the Framework package, so we can be sure that Blade templates always use the correct version. This also means that we can issue bug-fixing patches to live sites without needing users to recompile their sites.

This great power also requires great responsibility. Even though HydePHP itself is in the beta stage and is in the 0.x semantic versioning range and has no compatibility guarantees, HydeFront is strictly versioned and is in the 1.x semantic versioning range.

This means that developers must never introduce breaking changes in minor or patch releases. Since the package is in the NPM registry, releases are only ever rolled out manually by the maintainer to ensure that no vulnerable or malicious code is introduced as automatic patch updates could be a security issue. -->


<!-- 
Wondering how these components interact with each other?
Let's visualize the flow of generating a static page from a Markdown file.

When we run `php hyde build`, we do this from the root directory of the project, which is the Hyde package.

On a low level, running `php hyde` starts the HydeCLI which is the entry point for the entire application. From here, all dependencies are loaded and the application is bootstrapped.

The build command source is located in the Framework package. When running the command, the Framework will scan the content source directories in the Hyde project directory. The Framework will then compile the Markdown and build HTML based on Blade templates around the content.

The compiled output is written to the Hyde project's output directory, and is styled using the HydeFront package. -->
