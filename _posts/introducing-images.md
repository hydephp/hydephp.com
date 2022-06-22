---
title: Introducing images!
description: The v0.10.0 release introduces featured images for blog posts.
category: blog
author: Caen
date: 2022-04-11 14:57
---

The v0.10.0 release introduces featured images for blog posts.

Add images to your posts by setting the `image` in the front matter. If you pass a string it will be used to find an image in the `_media` directory if the file is local. If you supply a full URI starting with `https://` it will be used as-is.

## Adding basic images
### Add a Local image
```markdown
---
image: image.jpg # Will load the following `_site/_media/image.jpg` 
---
```

### Add a Remote image
```markdown
---
image: https://cdn.example.com/image.jpg # Will load the URI directly
---
```

## Using the full power of the Image object to create rich and accessible images
If you want to be fancy you can supply extra data to the image. To do this you instead pass an array as the image parameter.

```markdown
---
image:
  path: image.jpg
  description: Alt text
  title: Tooltip
---

```

## Supported properties:

Here are the properties supported by the Image object, paired with examples and descriptions.

### Local image path
```yaml
path: _media/image.jpg
```

### Remote image URI

Will override the path property if both are set.
```yaml
uri: https://example.com/media/image.jpg
```

### Alt description

Used for alt text for screen readers. You should always set this to provide accessibility.

```yaml
description: "This is an image of a cat sitting in a basket."
```

### Image title
Shows a tooltip on hover.
```yaml
title: "My Cat Archer"
```

### Copyright text
```yaml
copyright: "Copyright (c) 2020 John Doe"
```

### License name.
```yaml
license: "CC BY-NC-SA 4.0"
```

### License URL.
```yaml
licenseUrl: "https://creativecommons.org/licenses/by-nc-sa/4.0/"
```

### Image author
The author of the image, for example, the photographer, illustrator, stock photo website, etc.
```yaml
author: "John Doe"
```

### Image source
Used together with the `author` property to give credit to the source of the image.

```yaml
credit: "htps://unsplash.com/photos/example"
```

## Practical example
Using all of the supported properties described above, we can create an image that is accessible and data-rich.

### The source markdown
```markdown
---
title: A cute kitten I found on Pixabay
description: I found this cute kitten, and thought it would make a great example for featured images in posts!
category: example
author: Caen
date: 2022-04-11 15:51
image:
  description: "Image of a small kitten with its head tilted, sitting in a basket weaved from nature material."
  title: "Kitten Gray Kitty [sic]"
  uri: https://raw.githubusercontent.com/hydephp/hydephp.github.io/gh-pages/media/kitten-756956_640-min.jpg
  copyright: Copyright (c) 2022
  license: Pixabay License
  licenseUrl: https://pixabay.com/service/license/
  credit: https://pixabay.com/photos/kitten-gray-kitty-kitty-756956/
  author: Godsgirl_madi
---

## Write something awesome.
```

### Parsed HTML output
```html
<figure role="doc-cover" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject"> 
    <img src="https://raw.githubusercontent.com/hydephp/hydephp.github.io/gh-pages/media/kitten-756956_640-min.jpg" alt="Image of a small kitten with its head tilted, sitting in a basket weaved from nature material." title="Kitten Gray Kitty [sic]" itemprop="image" class="mb-0"> 
    <figcaption itemprop="caption"> 
        Image by <span itemprop="creator" itemscope="" itemtype="https://schema.org/Person"><a href="https://pixabay.com/photos/kitten-gray-kitty-kitty-756956/" rel="author noopener" itemprop="url"><span itemprop="name">Godsgirl_madi</span></a></span>. <span itemprop="copyrightNotice">Copyright (c) 2022</span>. License by <a href="https://pixabay.com/service/license/" rel="license nofollow noopener" itemprop="license">Pixabay License</a> 
    </figcaption> 
  <meta itemprop="text" content="Image of a small kitten with its head tilted, sitting in a basket weaved from nature material."> 
  <meta itemprop="name" content="Kitten Gray Kitty [sic]"> 
</figure>
```

### Screenshot of the output
![](https://raw.githubusercontent.com/hydephp/hydephp.github.io/gh-pages/media/post-with-kitten-image.jpg)

## Deep dive into the Image object
If you are a package developer, or just curious, here is an overview of how the Image object is created internally.

An `Image` object is created by passing an array of values to the constructor.

Here is an example, with all the supported properties, and example values.

```php
public static function exampleImage(): self
{
  return new Hyde\Framework\Models\Image([
    'path' => '_media/image.jpg',
    'uri' => 'https://picsum.photos/300/200',
    'description' => 'A random image.',
    'title' => 'An image from Picsum',
    'copyright' => 'Copyright (c) 2022',
    'license' => 'CC BY-NC-SA 4.0',
    'licenseUrl' => 'https://creativecommons.org/licenses/by-nc-sa/4.0/',
    'credit' => 'https://picsum.photos',
    'author' => 'John Doe',
  ]);
}