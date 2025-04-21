<?php

namespace App\Service\Admin\Category\Store;

use App\Contracts\Admin\Category\CategoryStoreServiceContract;
use App\Models\Category;
use App\Repository\CategoryRepository;
use App\Service\Admin\Category\Store\Dto\StoreDto as CategoryStoreDto;

class StoreService implements CategoryStoreServiceContract
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
            $dto->slug,
            $dto->parentId
        );
        $this->repository->store($model);
    }
}
