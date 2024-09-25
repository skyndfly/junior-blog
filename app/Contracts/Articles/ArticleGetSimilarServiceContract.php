<?php

namespace App\Contracts\Articles;

use App\Repository\Article\GetSimilar\Query as GetSimilarRepository;
use App\Repository\Article\GetSimilar\ViewCollection;
use App\Service\Article\Dto\ArticleGetSimilarDto as ArticleGetSimilarDto;

interface ArticleGetSimilarServiceContract
{
    public function __construct(GetSimilarRepository $getSimilarRepository);

    public function execute(ArticleGetSimilarDto $dto): ViewCollection;
}
