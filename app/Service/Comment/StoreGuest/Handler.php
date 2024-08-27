<?php

namespace App\Service\Comment\StoreGuest;

use App\Models\Comments;
use App\Repository\Comments\Store\Query;
use App\Contracts\Comments\CommentsStoreGuestServiceContract;

class Handler implements CommentsStoreGuestServiceContract
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
            $dto->email,
            $dto->id,
            Comments::STATUS_UNPUBLISHED
        );
        $this->query->fetch($model);
    }
}
