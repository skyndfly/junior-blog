<?php

namespace App\Service\Admin\Category\Edit;

use App\Contracts\Admin\Category\CategoryEditServiceContract;
use App\Models\Category;
use App\Repository\Admin\CategoryRepository;
use App\Service\Admin\Category\Edit\Dto\CategoryEditDto;

class CategoryEditService implements CategoryEditServiceContract
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function handle(CategoryEditDto $data)
    {
        /** @var Category $category */
        $category = Category::findOrFail($data->id);
        $newModel = $category->updateCategory($data->name, $data->parentId);
        $this->categoryRepository->store($newModel);
    }
}
