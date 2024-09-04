<?php

namespace App\Service\Comment\StoreAuth;

use Spatie\DataTransferObject\DataTransferObject;

final class Dto extends DataTransferObject
{
    public int $id;
    public int $userId;
    public string $comment;
}
