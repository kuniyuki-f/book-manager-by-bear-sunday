<?php
declare(strict_types=1);

namespace MyVendor\MyProject\Resource\App;

use BEAR\Resource\ResourceObject;
use BookManager\Service\Book\GetBooksUsecase;

class Books extends ResourceObject
{
  public function __construct(private readonly GetBooksUsecase $getBooksUsecase)
  {
  }

  public function onGet(): static
  {
    $this->body = ['books' => $this->getBooksUsecase->invoke()];

    return $this;
  }
}