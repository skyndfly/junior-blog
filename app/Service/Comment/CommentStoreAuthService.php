<?php

namespace App\Service\Comment;

use App\Contracts\Comments\CommentsStoreAuthServiceContract;
use App\Models\Comments;
use App\Repository\Comments\Store\Query;
use App\Service\Comment\Dto\CommentStoreAuthServiceDto;

final class CommentStoreAuthService implements CommentsStoreAuthServiceContract
{
    private Query $query;

    public function __construct(Query $query)
    {
        $this->query = $query;
    }

    public function handle(CommentStoreAuthServiceDto $dto): void
    {
        $model = Comments::create(
            $dto->comment,
            $dto->userId,
            $dto->id,
            Comments::STATUS_PUBLISHED
        );
        $this->query->fetch($model);
    }
}
