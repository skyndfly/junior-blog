<?php

namespace App\Service\Comment\Dto;

use Spatie\DataTransferObject\DataTransferObject;

final class CommentStoreAuthServiceDto extends DataTransferObject
{
    public int $id;
    public int $userId;
    public string $comment;
}
