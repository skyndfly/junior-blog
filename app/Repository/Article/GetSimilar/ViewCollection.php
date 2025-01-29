<?php

namespace App\Repository\Article\GetSimilar;

class ViewCollection
{
    public array $items = [];

    public function setItem(GetSimilarDto $item): void
    {
        $this->items[] = $item;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
