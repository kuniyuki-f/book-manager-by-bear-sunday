<?php

declare(strict_types=1);

namespace BookManager\Domain\Model;

use DateTimeImmutable;

class Book
{
    private int $id;
    private string $title;
    private string $author;
    private DateTimeImmutable $releaseDate;

    public function __construct(int $id, string $title, string $author, DateTimeImmutable $releaseDate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->releaseDate = $releaseDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getReleaseDate(): DateTimeImmutable
    {
        return $this->releaseDate;
    }
}