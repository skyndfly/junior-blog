<?php

namespace App\Service\Admin\Article\Update;

use Spatie\DataTransferObject\DataTransferObject;

class Dto extends DataTransferObject
{
    public string $title;
    public string $slug;
    public string $description;
    public string $shortDescription;
    public ?string $mainImage = null;
    public ?string $status = null;
    public int $categoryId;

}
