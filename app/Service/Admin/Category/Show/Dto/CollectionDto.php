<?php

namespace App\Service\Admin\Category\Show\Dto;

class CollectionDto
{
    public array $items = [];

    public function setItem(Dto $dto): void
    {
        $this->items[] = $dto;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
