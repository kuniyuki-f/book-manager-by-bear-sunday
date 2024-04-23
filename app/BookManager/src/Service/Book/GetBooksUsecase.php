<?php
declare(strict_types=1);

namespace BookManager\Service\Book;

use BookManager\Domain\Repository\BookRepository;

readonly class GetBooksUsecase
{
  public function __construct(private BookRepository $bookRepository)
  {
  }

  /**
   * @return array<BookDto>
   */
  public function invoke(): array
  {
    $books = $this->bookRepository->findAll();
    return $this->of($books);
  }

  /**
   * @param array $books
   * @return array<BookDto>
   */
  public function of(array $books): array
  {
    return array_map(
      fn($book) => [
        'id' => $book->getId(),
        'title' => $book->getTitle(),
        'author' => $book->getAuthor(),
        'releaseDate' => $book->getReleaseDate()->format('Y-m-d')
      ],
      $books
    );
  }
}

/**
 * @property-read int $id
 * @property-read string $title
 * @property-read string $author
 * @property-read string $releaseDate
 */
final class BookDto
{
  public function __construct(
    private int    $id,
    private string $title,
    private string $author,
    private string $releaseDate)
  {
  }

}