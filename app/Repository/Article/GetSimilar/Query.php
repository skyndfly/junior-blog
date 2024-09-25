<?php

namespace App\Repository\Article\GetSimilar;

use App\Models\Article;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class Query
{
    /**
     * @throws UnknownProperties
     */
    public function execute(int $categoryId, int $articleId): ViewCollection
    {
       $result =  Article::where('categoryId', $categoryId)
            ->where('id', '!=',  $articleId)
            ->take(4)
            ->get();
        $articles = new ViewCollection();
       foreach ($result->toArray() as $article) {
           $articles->setItem(new Dto($article));
       }
       return $articles;
    }
}
