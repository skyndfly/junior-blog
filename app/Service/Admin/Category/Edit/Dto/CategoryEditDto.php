<?php

namespace App\Service\Admin\Category\Edit\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class CategoryEditDto extends DataTransferObject
{
    public int $id;

    public string $name;

    public ?int $parentId;
}
