<?php

namespace App\Contracts\Comments;

use App\Repository\Comments\Store\Query;
use App\Service\Comment\StoreGuest\Dto;

interface CommentsStoreGuestServiceContract
{
    public function __construct(Query $query);

    public function handle(Dto $dto): void;
}
