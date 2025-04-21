<?php

namespace App\Repository\Article\ShowMainArticle;

final class ArticleMainDto
{
    public function __construct(
        public string $title,
        public string $slug,
        public string $shortDescription,
        public string $mainImage,
        public string $created_at,
        public string $category,
        public string $categorySlug,
        public int $categoryId,
    ) {}
}
