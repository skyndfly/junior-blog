<?php

namespace App\Service\Admin\Article\ShowAll;

use App\Repository\Admin\Article\GetAll\Collection;
use App\Repository\Admin\Article\GetAll\Query as GetAllQuery;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class Handler
{
    private GetAllQuery $getAllQuery;

    public function __construct(GetAllQuery $getAllQuery)
    {
        $this->getAllQuery = $getAllQuery;
    }


    /**
     * @throws UnknownProperties
     */
    public function handle(): Collection
    {
        return $this->getAllQuery->execute();
    }
}
