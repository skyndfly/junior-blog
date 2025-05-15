<?php

namespace App\Repository;

use App\Models\Article;
use App\Service\Article\NewsList\dto\NewsListDto;

class ArticleRepository
{
    public function store(Article $model): void
    {
        if (! $model->save()) {
            throw new \DomainException('Ошибка сохранения.');
        }
    }

    /**
     * @return NewsListDto[]
     */
    public function getNewsLatterArticles(): array
    {
        $articles = Article::query()
            ->select([
                'articles.title',
                'articles.shortDescription',
                'articles.slug',
                'categories.slug as categorySlug',
            ])
            ->where(['articles.status' => Article::STATUS_PUBLISHED])
            ->join('categories', 'categories.id', '=', 'articles.categoryId') // Добавляем join с таблицей категорий
            ->with('category') // Жадная загрузка категории (опционально)
            ->orderBy('articles.created_at', 'desc')
            ->skip(1)
            ->limit(30)
            ->get();

        $items = [];
        foreach ($articles as $article) {
            $items[] = new NewsListDto($article->attributesToArray());
        }

        return $items;
    }

    public function getSimilars()
    {
        $articles = Article::where('categoryId', $categoryId)
            ->where('id', '!=', $articleId)
            ->take(4)
            ->get();
    }
}
