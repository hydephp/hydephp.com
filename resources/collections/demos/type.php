<?php

namespace App\DataCollections\Types;

class Demo extends \App\Extend\Concerns\DataCollectionType
{
    public string $title;
    public string $description;
    public string $author;
    public string $date;
    public string $image;
    public string $url;
    public ?string $source = null;
};
