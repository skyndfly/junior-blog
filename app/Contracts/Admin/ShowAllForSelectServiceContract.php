<?php

namespace App\Contracts\Admin;

use App\Service\Admin\Category\ShowAllForSelect\Dto\CollectionDto;

interface ShowAllForSelectServiceContract
{
    public function handle(): CollectionDto;
}
