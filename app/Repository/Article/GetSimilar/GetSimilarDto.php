<?php

namespace App\Repository\Article\GetSimilar;

use Spatie\DataTransferObject\DataTransferObject;

class GetSimilarDto extends DataTransferObject
{
    public int $id;

    public string $title;

    public string $slug;

    public string $shortDescription;

    public ?string $mainImage = null;
}
