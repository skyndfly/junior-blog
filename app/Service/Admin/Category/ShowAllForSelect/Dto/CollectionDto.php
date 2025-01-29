<?php

namespace App\Service\Admin\Category\ShowAllForSelect\Dto;

class CollectionDto
{
    public array $items = [];

    public function setItem(ShowAllForSelectDto $dto): void
    {
        $this->items[] = $dto;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
