<?php

namespace App\Service\Admin\Article\Store;

use Spatie\DataTransferObject\DataTransferObject;

class StoreDto extends DataTransferObject
{
    public string $title;
    public string $description;
    public string $shortDescription;
    public ?string $mainImage = null;
    public ?string $status = null;
    public int $categoryId;

}