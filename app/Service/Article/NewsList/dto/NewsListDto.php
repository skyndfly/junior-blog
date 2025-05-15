<?php

namespace App\Service\Article\NewsList\dto;

use Spatie\DataTransferObject\DataTransferObject;

class NewsListDto extends DataTransferObject
{
    public string $title;

    public string $slug;

    public string $categorySlug;

    public string $shortDescription;
}
