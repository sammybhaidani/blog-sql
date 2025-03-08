<?php

class PostEntity
{
    private int $id;
    private string $title;
    private ?string $author_name;
    private string $content;
    private string $created_at;
    private int $category_id;
    private int $likes;
    private int $dislikes;
    private string $category;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthorName(): ?string
    {
        return $this->author_name;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function getLikes(): int
    {
        return $this->likes;
    }

    public function getDislikes(): int
    {
        return $this->dislikes;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
}