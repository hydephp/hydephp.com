# Data Collections

This website uses the powerful data collections feature from HydePHP.

## Data Collection Types

We also have an experimental patch that allows for typed data collection objects.

A collection can be assigned a type in one of two ways:

### Anonymously

Create a `type.php` file in the collection directory that returns an anonymous class with the desired schema as public properties.
This is a quick and easy way to define a type for a collection, and conveniently co-locates the type definition with the collection data.

```php
<?php

return new class extends \App\Extend\Concerns\DataCollectionType
{
    public string $title;
    public string $description;
    public string $author;
    public string $date;
    public string $image;
    public string $url;
    public ?string $source = null;
};
```

### Named

Additionally, you can create a named class in the `App\DataCollections\Types` namespace that extends the `DataCollectionType` class.
This can provide better IDE support and code completion. The class name **must** match be the studly case version of the collection name.

- Todo: In the future we may use the singular form of the collection name for the class name. We may also support appending `Type` to the class name.

```php
<?php

namespace App\DataCollections\Types;

class Demos extends \App\Extend\Concerns\DataCollectionType
{
    public string $title;
    public string $description;
    public string $author;
    public string $date;
    public string $image;
    public string $url;
    public ?string $source = null;
};
```
