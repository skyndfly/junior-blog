<?php

namespace App\Service\Article\NewsList;

class Collection
{
    public array $items = [];

    public function setItem(Dto $item): void{
        $this->items[] = $item;
    }
    public function getItems(): array{
        return $this->items;
    }
}
