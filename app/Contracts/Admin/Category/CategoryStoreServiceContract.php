<?php

namespace App\Contracts\Admin\Category;

use App\Service\Admin\Category\Store\Dto\StoreDto as CategoryStoreDto;

interface CategoryStoreServiceContract
{
    public function handle(CategoryStoreDto $data): void;
}
