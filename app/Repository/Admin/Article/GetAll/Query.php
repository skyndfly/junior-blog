<?php

namespace App\Repository\Admin\Article\GetAll;

use App\Models\Article;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

final class Query
{
    /**
     * @throws UnknownProperties
     */
    public function execute(): Collection
    {
        $data = Article::query()->paginate(Article::ADMIN_PAGINATION);

        $articles = new Collection();
        foreach($data as $article){
            $articles->setItems(new Dto(array_merge($article->toArray(), ['category' =>  $article->category->name])));
        }
        return $articles;
    }

}
