<?php

namespace App\Contracts\Comments;

use App\Repository\Comments\Store\Query;
use App\Service\Comment\Dto\CommentStoreAuthServiceDto;

interface CommentsStoreAuthServiceContract
{
    public function __construct(Query $query);

    public function handle(CommentStoreAuthServiceDto $dto): void;
}
