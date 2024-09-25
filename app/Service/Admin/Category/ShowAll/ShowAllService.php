<?php

namespace App\Service\Admin\Category\ShowAll;

use App\Repository\Admin\CategoryRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ShowAllService
{
    private CategoryRepository $repository;


    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(): LengthAwarePaginator
    {
        return $this->repository->getAllPaginate();
    }
}
