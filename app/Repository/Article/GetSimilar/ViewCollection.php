<?php

namespace App\Repository\Article\GetSimilar;

class ViewCollection
{
    public array $items = [];

    public function setItem(Dto $item): void
    {
        $this->items[] = $item;
    }

    public function getItems(): array
    {
        return $this->items;
    }

}
