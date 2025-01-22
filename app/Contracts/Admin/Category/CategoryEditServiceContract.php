<?php

namespace App\Contracts\Admin\Category;

use App\Service\Admin\Category\Edit\Dto\CategoryEditDto;

interface CategoryEditServiceContract
{
    public function handle(CategoryEditDto $data);
}
