<?php

namespace App\Contracts\Comments;

use App\Repository\Comments\Store\Query;
use App\Service\Comment\Dto\CommentStoreGuestDto;

interface CommentsStoreGuestServiceContract
{
    public function __construct(Query $query);

    public function handle(CommentStoreGuestDto $dto): void;
}
