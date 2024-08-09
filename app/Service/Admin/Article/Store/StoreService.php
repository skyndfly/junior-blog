<?php

namespace App\Service\Admin\Article\Store;

use App\Models\Article;

class StoreService
{
    public function handle(StoreDto $dto)
    {

      $model = Article::create(
          $dto->title,
          $dto->description,
          $dto->shortDescription,
          $dto->mainImage,
          Article::STATUS_PUBLISHED,
          $dto->categoryId
      );
        $model->save();
    }

}
