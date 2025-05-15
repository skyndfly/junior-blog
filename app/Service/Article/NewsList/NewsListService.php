<?php

namespace App\Service\Article\NewsList;

use App\Repository\ArticleRepository;
use App\Service\Article\NewsList\dto\NewsListDto;

class NewsListService
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @return NewsListDto[]
     */
    public function handle(): array
    {
        return $this->articleRepository->getNewsLatterArticles();
    }
}
