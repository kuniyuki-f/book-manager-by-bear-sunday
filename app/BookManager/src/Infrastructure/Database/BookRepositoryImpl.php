<?php

declare(strict_types=1);

namespace BookManager\Infrastructure\Database;

use DateTimeImmutable;
use BookManager\Domain\Model\Book;
use BookManager\Domain\Repository\BookRepository;

class BookRepositoryImpl implements BookRepository
{

    public function find(int $id): Book
    {
        return new Book(
            1,
            'PHP Book',
            'PHP Author',
            new DateTimeImmutable('2021-01-01')
        );
    }

    /**
     * @return array<Book>
     */
    public function findAll(): array
    {
        $books = [];
        $books[] = new Book(
            1,
            'PHP Book',
            'PHP Author',
            new DateTimeImmutable('2021-01-01')
        );
        $books[] = new Book(
            2,
            'Java Book',
            'Java Author',
            new DateTimeImmutable('2021-01-02')
        );

        return $books;
    }
}