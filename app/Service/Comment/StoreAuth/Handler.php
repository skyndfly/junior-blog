<?php

namespace App\Service\Comment\StoreAuth;

use App\Contracts\Comments\CommentsStoreAuthServiceContract;
use App\Models\Comments;
use App\Repository\Comments\Store\Query;

final class Handler implements CommentsStoreAuthServiceContract
{
    private Query $query;

    public function __construct(Query $query)
    {
        $this->query = $query;
    }

    public function handle(Dto $dto): void
    {
        $model = Comments::create(
            $dto->comment,
            $dto->name,
            $dto->id,
            Comments::STATUS_PUBLISHED
        );
        $this->query->fetch($model);
    }
}
