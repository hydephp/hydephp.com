<?php

return new class extends \App\Extend\Concerns\DataCollectionType
{
    public readonly string $title;
    public readonly string $description;
    public readonly string $author;
    public readonly string $date;
    public readonly string $image;
    public readonly string $url;
    public readonly ?string $source;

    public static function create(array $data): static
    {
        return new static(
            $data['title'],
            $data['description'],
            $data['author'],
            $data['date'],
            $data['image'],
            $data['url'],
            $data['source'] ?? null
        );
    }
};
