<?php

namespace App\Service\Admin\Category\Store\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class StoreDto extends DataTransferObject
{
    public string $name;
    public ?int $parentId = null;
}
