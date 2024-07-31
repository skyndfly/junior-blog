<?php

namespace App\Contracts\Admin;

use App\Repository\Admin\CategoryRepository;
use App\Service\Admin\Category\Store\Dto\StoreDto as CategoryStoreDto;

interface CategoryServiceContract
{
    public function __construct(CategoryRepository $repository);
    public function handle(CategoryStoreDto $data): void;
}
