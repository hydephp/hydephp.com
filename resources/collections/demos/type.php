<?php

return new class implements \App\Extend\Concerns\DataCollectionType
{
    private string $title;
    private string $description;
    private string $author;
    private string $date;
    private string $image;
    private string $url;
    private ?string $source;

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
