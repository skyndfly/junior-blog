<?php

namespace App\Http\Controllers;

use App\Contracts\Index\ShowContract as IndexShowService;
use App\Service\Article\NewsList\NewsListService;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(IndexShowService $service, NewsListService $newsListService): View
    {
        $article = $service->handle();

        return view('index', [
            'article' => $article,
            'news' => $newsListService->handle(),
        ]);
    }
}
