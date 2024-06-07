<?php

return new class implements \App\Extend\Concerns\DataCollectionType
{
    public readonly string $title;
    public readonly string $description;
    public readonly string $author;
    public readonly string $date;
    public readonly string $image;
    public readonly string $url;
    public readonly ?string $source;

    public function __construct(array $data)
    {
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->author = $data['author'];
        $this->date = $data['date'];
        $this->image = $data['image'];
        $this->url = $data['url'];
        $this->source = isset($data['source']) ? $data['source'] : null;
    }
};
