<?php

namespace App\Service\Admin\Category\ShowForSelect;

use App\Contracts\Admin\CategoryShowServiceContract;
use App\Repository\Admin\CategoryRepository;
use App\Service\Admin\Category\ShowForSelect\Dto\CollectionDto;
use App\Service\Admin\Category\ShowForSelect\Dto\Dto;
use Illuminate\Support\Collection;

class ShowService implements CategoryShowServiceContract
{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(): CollectionDto
    {
        $categories = $this->repository->getActiveAsCollection();
        foreach ($categories as $category) {
            $category->level = $this->getCategoryLevel($categories, $category);
        }
        $collection = new CollectionDto();
        foreach ($categories as $category) {
            $collection->setItem(new Dto(
                $category->id,
                $category->name,
                $category->parentId,
                $category->level
            ));
        }
        return $collection;
    }

    private function getCategoryLevel($categories, $category): int
    {
        $level = 0;
        while ($category->parentId != null) {
            $category = $categories[$category->parentId];
            $level++;
        }
        return $level;
    }
}
