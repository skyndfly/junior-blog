<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Service\Admin\Article\Show\Dto as ArticleShowDto;
use App\Service\Admin\Category\Show\Dto as CategoryShowDto;
use Illuminate\Contracts\View\View;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ArticleController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function show(Article $article): View
    {
        $category = new CategoryShowDto($article->category->toArray());
        $categoryName = $category->name ?? '';
        $data = new ArticleShowDto(
            array_merge(
                $article->toArray(),
                [
                    'category' => $categoryName,
                    'admin' => $article->admin,
                ]
            )
        );
        return view('article.show', [
            'article' => $data,
            'category' => $category
        ]);
    }
}
