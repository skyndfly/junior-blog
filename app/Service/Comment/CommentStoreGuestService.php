<?php

namespace App\Service\Comment;

use App\Contracts\Comments\CommentsStoreGuestServiceContract;
use App\Models\Comments;
use App\Repository\Comments\Store\Query;
use App\Service\Comment\Dto\CommentStoreGuestDto;

final class CommentStoreGuestService implements CommentsStoreGuestServiceContract
{
    private Query $query;

    public function __construct(Query $query)
    {
        $this->query = $query;
    }

    public function handle(CommentStoreGuestDto $dto): void
    {
        $model = Comments::create(
            $dto->comment,
            $dto->email,
            $dto->id,
            Comments::STATUS_UNPUBLISHED
        );
        $this->query->fetch($model);
    }
}
