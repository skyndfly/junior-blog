<?php

namespace App\Contracts\Index;

use App\Repository\Article\ShowMainArticle\ArticleMainDto as ShowMainArticleDto;
use App\Repository\Article\ShowMainArticle\Query as ShowMainArticleQuery;

interface ShowContract
{
    public function __construct(ShowMainArticleQuery $query);

    public function handle(): ?ShowMainArticleDto;
}
