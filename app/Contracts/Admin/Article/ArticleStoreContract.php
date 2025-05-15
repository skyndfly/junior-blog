<?php

namespace App\Contracts\Admin\Article;

use App\Repository\ArticleRepository;
use App\Service\Admin\Article\Store\StoreDto;

interface ArticleStoreContract
{
    public function __construct(ArticleRepository $articleRepository);

    public function handle(StoreDto $dto): void;
}
