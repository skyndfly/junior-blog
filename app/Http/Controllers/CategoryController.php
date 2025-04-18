<?php

namespace App\Http\Controllers;

use App\Models\Article;

class CategoryController extends Controller
{
    public function show(int $id)
    {
        return view('category.show', [
            'articles' => Article::where('categoryId', $id)->paginate(10),
        ]);
    }
}
