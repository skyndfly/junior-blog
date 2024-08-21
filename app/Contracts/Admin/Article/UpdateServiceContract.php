<?php

namespace App\Contracts\Admin\Article;

use App\Http\Requests\Admin\Article\UpdateRequest as ArticleUpdateRequest;
use App\Models\Article;
use App\Repository\Admin\ArticleRepository;

interface UpdateServiceContract
{
    public function __construct(ArticleRepository $repository);
    public function handle(Article $article, ArticleUpdateRequest $request);
}
