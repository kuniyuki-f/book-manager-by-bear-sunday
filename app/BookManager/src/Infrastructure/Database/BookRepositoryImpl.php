<?php

declare(strict_types=1);

namespace BookManager\Infrastructure\Database;

use Aura\Sql\ExtendedPdoInterface;
use DateTimeImmutable;
use BookManager\Domain\Model\Book;
use BookManager\Domain\Repository\BookRepository;

readonly class BookRepositoryImpl implements BookRepository
{

  public function __construct(
    private ExtendedPdoInterface $pdo
  )
  {

  }

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
    $sql = 'SELECT * FROM books';

    return array_map(
      fn($data) => $this->toModel($data),
      $this->pdo->fetchAll($sql));
  }

  /**
   * @param array<string, mixed> $data
   * @return Book
   */
  public function toModel(array $data): Book
  {
    try {
      return new Book(
        $data['id'],
        $data['title'],
        $data['author'],
        new DateTimeImmutable($data['release_date'])
      );
    } catch (\Exception $e) {
      throw new \RuntimeException('Failed to create Book model', 0, $e);
    }
  }
}