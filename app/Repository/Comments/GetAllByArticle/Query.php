<?php

namespace App\Repository\Comments\GetAllByArticle;

use App\Models\Comments;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class Query
{
    public function fetch(int $articleId): LengthAwarePaginator
    {
        return Comments::with('user:id,name')
            ->orderBy('created_at', 'desc')
            ->where(['article_id' => $articleId])
            ->paginate(Comments::PER_PAGE);
    }
}
