<?php

return new class extends \App\Extend\Concerns\DataCollectionType
{
    public string $title;
    public string $description;
    public string $author;
    public string $date;
    public string $image;
    public string $url;
    public ?string $source;

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
