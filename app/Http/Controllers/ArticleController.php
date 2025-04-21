<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Service\Article\ArticleShowService;
use DomainException;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ArticleController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function show(Category $category, Article $article, ArticleShowService $articleShowService): Application|RedirectResponse|Redirector|View
    {
        try {
            $article = $articleShowService->execute($category, $article);

            if (empty($article->id)) {
                throw new UnknownProperties('Не возможно загрузить похожие статьи. Отсутствует ArticleId');
            }

        } catch (DomainException $e) {
            $uuid = Uuid::uuid4();
            $message = "{$e->getMessage()}. Error code - {$uuid}";
            $logMessage = 'Class: '.__METHOD__.' | Line: '.__LINE__.' | '.$message;
            Log::error($logMessage);

            return redirect(route('index'))->with('error', "Ошибка. Обратитесь к администрации сайта, указав код - {$uuid}");
        }

        //TODO вывести похожие статьи
        return view('article.show', [
            'article' => $article,
            'similarArticles' => null,
        ]);
    }
}
