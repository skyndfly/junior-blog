<?php

namespace App\Contracts\Admin;

use App\Repository\Admin\CategoryRepository;
use App\Service\Admin\Category\ShowForSelect\Dto\CollectionDto;

interface CategoryShowServiceContract
{
    public function __construct(CategoryRepository $repository);
    public function handle(): CollectionDto;
}
