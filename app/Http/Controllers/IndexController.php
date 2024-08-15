<?php

namespace App\Http\Controllers;

use App\Contracts\Index\ShowContract as IndexShowService;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(IndexShowService $service): View
    {
        $article = $service->handle();
        return view('index',[
            'article' => $article
        ]);
    }
}
