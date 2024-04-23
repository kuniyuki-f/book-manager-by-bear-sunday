<?php

namespace MyVendor\MyProject\Resource\Page;

use BEAR\Resource\Annotation\Embed;
use BEAR\Resource\ResourceObject;

class Books extends ResourceObject
{

  #[Embed(rel: '_self', src: 'app://self/books')]
  public function onGet(): static
    {
        return $this;
    }
}