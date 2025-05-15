<?php

namespace App\Repository\Article\ShowMainArticle;

use App\Models\Article;
use App\Models\Category;

final class Query
{
    public function execute(): ?ArticleMainDto
    {
        $data = Article::query()
            ->where(['status' => Article::STATUS_PUBLISHED])
            ->orderBy('created_at', 'desc')
            ->first();
        if ($data === null) {
            return null;
        }
        /** @var Category $category */
        $category = $data->category;

        return new ArticleMainDto(
            $data->title,
            $data->slug,
            $data->shortDescription,
            $data->mainImage,
            $data->created_at,
            $category->name,
            $category->slug,
            $category->id
        );
    }
}
