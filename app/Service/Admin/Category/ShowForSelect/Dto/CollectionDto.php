<?php

namespace App\Service\Admin\Category\ShowForSelect\Dto;

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
