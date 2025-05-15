<?php

namespace App\Contracts\Articles;

use App\Models\Article;
use App\Models\Category;
use App\Repository\Article\Show\Dto as ArticleShowDto;

interface ArticleShowServiceContract
{
    public function execute(Category $category, Article $article): ArticleShowDto;
}
