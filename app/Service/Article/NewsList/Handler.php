<?php

namespace App\Service\Article\NewsList;

use App\Models\Article;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class Handler
{

    /**
     * @throws UnknownProperties
     */
    public static function handle(): Collection
    {
        $articles = Article::query()
            ->select('title', 'shortDescription')
            ->where(['status' => Article::STATUS_PUBLISHED])
            ->orderBy('created_at', 'desc')
            ->skip(1)
            ->limit(30)
            ->get();

        $items = new Collection();
        foreach ($articles as $article) {
            $items->setItem(new Dto($article->attributesToArray()));
        }
        return $items;
    }
}
