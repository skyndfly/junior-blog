<?php

namespace App\Contracts\Comments;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Repository\Comments\GetAllByArticle\Query as GetAllByArticleRepository;

interface CommentsGetAllByArticleServiceContract
{
    public function __construct(GetAllByArticleRepository $query);

    public function execute(int $articleId): LengthAwarePaginator;
}
