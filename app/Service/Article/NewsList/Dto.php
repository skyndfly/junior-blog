<?php

namespace App\Service\Article\NewsList;

use Spatie\DataTransferObject\DataTransferObject;

class Dto extends DataTransferObject
{
    public string $title;
    public string $slug;
    public string $shortDescription;
}
