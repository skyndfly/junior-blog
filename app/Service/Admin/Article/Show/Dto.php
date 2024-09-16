<?php

namespace App\Service\Admin\Article\Show;

use App\Models\Admin;
use Spatie\DataTransferObject\DataTransferObject;

class Dto extends DataTransferObject
{
    public int $id;
    public string $title;
    public string $slug;
    public string $description;
    public string $shortDescription;
    public ?string $mainImage = null;
    public ?string $status = null;
    public string $category;
    public int $categoryId;
    public ?Admin $admin;

}
