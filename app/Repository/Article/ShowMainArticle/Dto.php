<?php

namespace App\Repository\Article\ShowMainArticle;

use Spatie\DataTransferObject\DataTransferObject;

final class Dto extends DataTransferObject
{
    public string $title;
    public string $slug;
    public string $shortDescription;
    public string $mainImage;
    public string $created_at;
}
