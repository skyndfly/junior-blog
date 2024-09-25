<?php

namespace App\Service\Article\Dto;


class ArticleGetSimilarDto
{
    public int $categoryId;
    public int $articleId;

    /**
     * @param int $categoryId
     * @param int $articleId
     */
    public function __construct(int $categoryId, int $articleId)
    {
        $this->categoryId = $categoryId;
        $this->articleId = $articleId;
    }


}
