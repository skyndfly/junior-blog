<?php

namespace App\Service\Admin\Category\ShowAllForSelect;

use App\Contracts\Admin\ShowAllForSelectServiceContract;
use App\Repository\Admin\CategoryRepository;
use App\Service\Admin\Category\ShowAllForSelect\Dto\CollectionDto;
use App\Service\Admin\Category\ShowAllForSelect\Dto\ShowAllForSelectDto;

class ShowAllForSelectService implements ShowAllForSelectServiceContract
{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(): CollectionDto
    {
        $categories = $this->repository->getActiveAsCollection();

        $collection = new CollectionDto;
        foreach ($categories as $category) {
            $collection->setItem(new ShowAllForSelectDto(
                $category->id,
                $category->name,
                $category->parentId,
                $category->level
            ));
        }

        return $collection;
    }
}
