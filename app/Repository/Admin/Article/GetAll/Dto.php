<?php

namespace App\Repository\Admin\Article\GetAll;

use Spatie\DataTransferObject\DataTransferObject;

final class Dto extends DataTransferObject
{
    public int $id;
    public string $title;
    public string $slug;
    public string $shortDescription;
    public ?string $status = null;
    public string $category;

}
