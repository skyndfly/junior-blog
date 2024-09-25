<?php

namespace App\Service\Article;

use App\Contracts\Articles\ArticleGetSimilarServiceContract;
use App\Repository\Article\GetSimilar\Query as GetSimilarRepository;
use App\Repository\Article\GetSimilar\ViewCollection;
use App\Service\Article\Dto\ArticleGetSimilarDto as ArticleGetSimilarDto;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ArticleGetSimilarService implements ArticleGetSimilarServiceContract
{
    public GetSimilarRepository $getSimilarRepository;

    public function __construct(GetSimilarRepository $getSimilarRepository)
    {
        $this->getSimilarRepository = $getSimilarRepository;
    }

    /**
     * @throws UnknownProperties
     */
    public function execute(ArticleGetSimilarDto $dto): ViewCollection
    {
        return $this->getSimilarRepository->execute($dto->categoryId, $dto->articleId);
    }
}
