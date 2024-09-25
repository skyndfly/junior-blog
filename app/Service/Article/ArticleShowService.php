<?php

namespace App\Service\Article;

use App\Contracts\Articles\ArticleShowServiceContract;
use App\Models\Article;
use App\Repository\Article\Show\Dto as ArticleShowDto;
use App\Service\Admin\Category\Show\Dto as CategoryShowDto;
use DomainException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ArticleShowService implements ArticleShowServiceContract
{
    public function execute(CategoryShowDto $categoryShowDto, Article $article): ArticleShowDto
    {
        $categoryName = !empty($categoryShowDto->name) ? $categoryShowDto->name : '';
        try {
            return $this->createArticleShowDto($categoryName, $article->toArray());
        } catch (UnknownProperties $e) {
            throw new DomainException('Не возможно показать статью. Сообщение:' . $e->getMessage());
        }
    }

    /**
     * @throws UnknownProperties
     */
    public function createArticleShowDto(string $categoryName, array $article): ArticleShowDto
    {
        return new ArticleShowDto(array_merge($article, ['category' => $categoryName]));
    }
}
