<?php

namespace App\Repository\Admin\Article\GetAll;

final class Collection
{
    public array $items = [];

    public function setItems(Dto $dto): void
    {
        $this->items[] = $dto;
    }

    public function getItems(): array
    {
        return $this->items;
    }

}
