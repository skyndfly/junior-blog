<?php

namespace App\Service\Comment\StoreAuth;

use Spatie\DataTransferObject\DataTransferObject;

class Dto extends DataTransferObject
{
    public int $id;
    public string $name;
    public string $comment;
}
