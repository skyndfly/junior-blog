<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\Admin\CategoryShowServiceContract as CategoryShowService;

class ArticleController extends Controller
{
    public function create(CategoryShowService  $categoryShowService)
    {
        $collection = $categoryShowService->handle();

        return view('admin.article.create',[
            'categories' => $collection
        ]);
    }
}
