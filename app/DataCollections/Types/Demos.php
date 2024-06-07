<?php

declare(strict_types=1);

namespace App\DataCollections\Types;

use App\Extend\Concerns\DataCollectionType;

class Demos extends DataCollectionType
{
    public string $title;
    public string $description;
    public string $author;
    public string $date;
    public string $image;
    public string $url;
    public ?string $source = null;
}
