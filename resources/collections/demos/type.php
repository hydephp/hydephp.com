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
        return new static([
            'title' => $data['title'],
            'description' => $data['description'],
            'author' => $data['author'],
            'date' => $data['date'],
            'image' => $data['image'],
            'url' => $data['url'],
            'source' => $data['source'] ?? null
        ]);
    }
};
