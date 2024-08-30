<?php

namespace App\Contracts\Comments;

use App\Repository\Comments\Store\Query;
use App\Service\Comment\StoreAuth\Dto;

interface CommentsStoreAuthServiceContract
{
    public function __construct(Query $query);

    public function handle(Dto $dto): void;
}
