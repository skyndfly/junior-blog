<?php

namespace App\Repository\Article\ShowMainArticle;

use App\Models\Article;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

final class Query
{
    /**
     * @throws UnknownProperties
     */
    public function execute(): Dto
    {
       $data = Article::query()
           ->where(['status' => Article::STATUS_PUBLISHED])
           ->orderBy('created_at', 'desc')
           ->first();
       return new Dto($data->toArray());
    }
}
