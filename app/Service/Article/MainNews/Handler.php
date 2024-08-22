<?php

namespace App\Service\Article\MainNews;

use App\Contracts\Index\ShowContract;
use App\Repository\Article\ShowMainArticle\Dto as ShowMainArticleDto;
use App\Repository\Article\ShowMainArticle\Query as ShowMainArticleQuery;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class Handler implements ShowContract
{

    private ShowMainArticleQuery $query;
    public function __construct(ShowMainArticleQuery $query)
    {
        $this->query = $query;
    }

    /**
     * @throws UnknownProperties
     */
    public function handle(): ?ShowMainArticleDto
    {
        return $this->query->execute();
    }
}
