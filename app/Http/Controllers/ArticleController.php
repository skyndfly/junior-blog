<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Service\Article\ArticleShowService;
use DomainException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ArticleController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function show(Category $category, Article $article, ArticleShowService $articleShowService): RedirectResponse|View
    {
        try {
            $article = $articleShowService->execute($category, $article);
            $similars = Article::query()
                ->where('categoryId', $category->id)
                ->where('id', '!=', $article->id)
                ->latest()
                ->limit(4)
                ->get();
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

        return view('article.show', [
            'article' => $article,
            'similarArticles' => $similars,
        ]);
    }
}
