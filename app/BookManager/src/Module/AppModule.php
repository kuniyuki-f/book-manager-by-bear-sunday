<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Module;

use BEAR\Dotenv\Dotenv;
use BEAR\Package\AbstractAppModule;
use BEAR\Package\PackageModule;

use BookManager\Domain\Repository\BookRepository;
use BookManager\Infrastructure\Database\BookRepositoryImpl;
use BookManager\Service\Book\GetBooksUsecase;
use MyVendor\MyProject\Resource\App\Book;
use function dirname;

class AppModule extends AbstractAppModule
{
  protected function configure(): void
  {
    (new Dotenv())->load(dirname(__DIR__, 2));

    $this->bind(BookRepository::class)
      ->to(BookRepositoryImpl::class);
    $this->bind(GetBooksUsecase::class)
      ->to(GetBooksUsecase::class);


    $this->install(new PackageModule());
  }
}
