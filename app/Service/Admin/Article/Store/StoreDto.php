<?php

namespace App\Service\Admin\Article\Store;

use Spatie\DataTransferObject\DataTransferObject;

class StoreDto extends DataTransferObject
{
    public ?string $title = null;
    public ?string $slug = null;
    public ?string $description = null;
    public ?string $shortDescription = null;
    public ?string $mainImage = null;
    public ?string $status = null;
    public ?int $categoryId = null;

}
