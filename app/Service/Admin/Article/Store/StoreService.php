<?php

namespace App\Service\Admin\Article\Store;

use App\Contracts\Admin\Article\ArticleStoreContract;
use App\Models\Article;
use App\Repository\Admin\ArticleRepository;

class StoreService implements ArticleStoreContract
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function handle(StoreDto $dto): void
    {

        $model = Article::create(
            $dto->title,
            $dto->slug,
            $dto->description,
            $dto->shortDescription,
            $dto->mainImage,
            Article::STATUS_PUBLISHED,
            $dto->categoryId
        );
        $this->articleRepository->store($model);
    }

}
