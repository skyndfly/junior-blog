<?php

namespace App\Service\Comment\Dto;

use Spatie\DataTransferObject\DataTransferObject;

final class CommentStoreGuestDto extends DataTransferObject
{
    public int $id;
    public string $email;
    public string $comment;

}
