# HydePHP Demo Websites

In this directory are YAML partial files that each will become an entry on the [HydePHP Live Demos](https://hydephp.com/demos) page.

## Adding a demo site

To add a demo site to the HydePHP Live Demos page, create a new YAML file in this directory with the following format:

```yaml
title: "Demo Site Title"
description: "A very brief description of the demo site."
author: "Author Name"
date: "YYYY-MM-DD"
image: "demos/example-site.png"
url: "https://example.com"
source: "https://github.com/username/repo" # Optional, but should be included if the source code is available
```

### Image guidelines

Please take a screenshot of the demo site and save it as a PNG file. The image should be `1280x800` pixels in size, and should be minified to reduce file size.

### License and permissions

Make sure that you have the right to use the image and that it is not copyrighted by someone else.
Generally, these links are from [`github.com/hydephp/awesome-hydephp`](https://github.com/hydephp/awesome-hydephp) 
which have been screened to ensure appropriate permissions.
