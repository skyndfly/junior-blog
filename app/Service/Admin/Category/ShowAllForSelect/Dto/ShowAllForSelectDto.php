<?php

namespace App\Service\Admin\Category\ShowAllForSelect\Dto;

class ShowAllForSelectDto
{
    public function __construct(
        public int $id,
        public string $name,
        public ?int $parentId,
        public int $level
    ) {}
}
