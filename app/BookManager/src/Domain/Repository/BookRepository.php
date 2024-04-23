<?php
declare(strict_types=1);

namespace BookManager\Domain\Repository;

use BookManager\Domain\Model\Book;

interface BookRepository
{
    public function find(int $id): Book;

    /**
     * @return array<Book>
     */
    public function findAll(): array;
}