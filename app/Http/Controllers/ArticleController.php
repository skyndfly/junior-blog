<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Service\Admin\Category\Show\Dto as CategoryShowDto;
use App\Service\Article\ArticleShowService;
use DomainException;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use App\Contracts\Articles\ArticleGetSimilarServiceContract as ArticleGetSimilarService;
use  App\Service\Article\Dto\ArticleGetSimilarDto;

class ArticleController extends Controller
{

    /**
     * @throws UnknownProperties
     */
    public function show(Article $article, ArticleGetSimilarService $getSimilarService, ArticleShowService $articleShowService): Application|RedirectResponse|Redirector|View
    {
        try {
            $category = new CategoryShowDto($article->category->toArray());

            $article = $articleShowService->execute($category, $article);

            if (empty($article->id)){
               throw new UnknownProperties('Не возможно загрузить похожие статьи. Отсутствует ArticleId');
            }
            $similarArticles = $getSimilarService->execute(new ArticleGetSimilarDto($category->id, $article->id))->getItems();

        }catch (UnknownProperties $e){
            $uuid = Uuid::uuid4();
            $message = "{$e->getMessage()}. Error code - {$uuid}";
            $logMessage = "Class: " . __METHOD__ . " | Line: " . __LINE__ . " | " . $message;
            Log::error($logMessage);

        }
        catch (DomainException $e){
            $uuid = Uuid::uuid4();
            $message = "{$e->getMessage()}. Error code - {$uuid}";
            $logMessage = "Class: " . __METHOD__ . " | Line: " . __LINE__ . " | " . $message;
            Log::error($logMessage);
            return redirect(route('index'))->with('error', "Ошибка. Обратитесь к администрации сайта, указав код - {$uuid}");
        }
        return view('article.show', [
            'article' => $article,
            'similarArticles' => $similarArticles,
        ]);
    }
}
