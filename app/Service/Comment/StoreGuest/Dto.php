<?php

namespace App\Service\Comment\StoreGuest;

use Spatie\DataTransferObject\DataTransferObject;

class Dto extends DataTransferObject
{
    public int $id;
    public string $email;
    public string $comment;

}
