<?php

namespace App\Service\Admin\Category\Show\Dto;

class Dto
{
    public int $id;
    public string $name;
    public ?int $parentId = null;
    public int $level;

    public function __construct(int $id, string $name, ?int $parentId, int $level)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parentId = $parentId;
        $this->level = $level;
    }


}
