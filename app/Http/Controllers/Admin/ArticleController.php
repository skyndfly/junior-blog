<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\Admin\CategoryShowServiceContract as CategoryShowService;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create(CategoryShowService  $categoryShowService): View
    {
        $collection = $categoryShowService->handle();

        return view('admin.article.create',[
            'categories' => $collection
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
