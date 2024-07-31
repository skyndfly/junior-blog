<?php

namespace App\Service\Admin\Category\Store;

use App\Contracts\Admin\CategoryServiceContract;
use App\Models\Category;
use App\Repository\Admin\CategoryRepository;
use App\Service\Admin\Category\Store\Dto\StoreDto as CategoryStoreDto;

class StoreService implements CategoryServiceContract
{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }


    public function handle(CategoryStoreDto $dto): void
    {
        $model = Category::create(
            $dto->name,
            $dto->parentId
        );
        $this->repository->store($model);
    }
}
