<?php

namespace App\Contracts\Admin\Article;

use App\Repository\Admin\CategoryRepository;

interface ShowServiceContract
{
    public function __construct(CategoryRepository $repository);
    public function handle();
}
