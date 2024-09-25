<?php

namespace App\Contracts\Articles;

use App\Models\Article;
use App\Repository\Article\Show\Dto as ArticleShowDto;
use App\Service\Admin\Category\Show\Dto as CategoryShowDto;

interface ArticleShowServiceContract
{
    public function execute(CategoryShowDto $categoryShowDto, Article $article): ArticleShowDto;

    public function createArticleShowDto(string $categoryName, array $article): ArticleShowDto;
}
