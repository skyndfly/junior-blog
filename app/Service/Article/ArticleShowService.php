<?php

namespace App\Service\Article;

use App\Contracts\Articles\ArticleShowServiceContract;
use App\Models\Article;
use App\Models\Category;
use App\Repository\Article\Show\Dto as ArticleShowDto;
use DomainException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ArticleShowService implements ArticleShowServiceContract
{
    public function execute(Category $category, Article $article): ArticleShowDto
    {
        try {
            return $this->createArticleShowDto($category->name, $article->toArray());
        } catch (UnknownProperties $e) {
            throw new DomainException('Не возможно показать статью. Сообщение:'.$e->getMessage());
        }
    }

    /**
     * @throws UnknownProperties
     */
    private function createArticleShowDto(string $categoryName, array $article): ArticleShowDto
    {
        return new ArticleShowDto(array_merge($article, ['category' => $categoryName]));
    }
}
