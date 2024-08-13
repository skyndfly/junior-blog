<?php

namespace App\Service\Admin\Category\Show;

use Spatie\DataTransferObject\DataTransferObject;

class Dto extends DataTransferObject
{
    public int $id;
    public string $name;
    public ?int $parentId = null;
    public string $created_at;
    public string $status;
}
