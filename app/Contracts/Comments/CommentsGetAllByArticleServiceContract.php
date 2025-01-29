<?php

namespace App\Contracts\Comments;

use App\Repository\Comments\GetAllByArticle\Query as GetAllByArticleRepository;
use Illuminate\Pagination\LengthAwarePaginator;

interface CommentsGetAllByArticleServiceContract
{
    public function __construct(GetAllByArticleRepository $query);

    public function execute(int $articleId): LengthAwarePaginator;
}
