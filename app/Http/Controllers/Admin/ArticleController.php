<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Admin\Article\ArticleStoreContract as ArticleStoreService;
use App\Contracts\Admin\Article\UpdateServiceContract as UpdateService;
use App\Contracts\Admin\CategoryShowServiceContract as CategoryShowService;
use App\Helpers\UploadImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\StoreRequest;
use App\Http\Requests\Admin\Article\UpdateRequest;
use App\Models\Article;
use App\Repository\Article\Show\Dto as ArticleShowDto;
use App\Service\Admin\Article\ShowAll\Handler as ArticleShowAllHandler;
use App\Service\Admin\Article\Store\StoreDto as StoreDto;
use App\Service\Admin\Category\Show\Dto as CategoryShowDto;
use DomainException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ArticleController extends Controller
{
    public function create(CategoryShowService $categoryShowService): View
    {
        $collection = $categoryShowService->handle();

        return view('admin.article.create', [
            'categories' => $collection
        ]);
    }

    public function store(StoreRequest $request, ArticleStoreService $service): RedirectResponse
    {

        try {
            $imagePath = UploadImageHelper::uploadImage($request, 'articles', 'mainImage');
            // Создаем DTO с путем к изображению
            $data = new StoreDto(array_merge($request->validated(), ['mainImage' => $imagePath]));

            $service->handle($data);
            $request->session()->flash('success', 'Запись добавлена.');

        } catch (DomainException|UnknownProperties $e) {
            $uuid = Uuid::uuid4();
            $message = "{$e->getMessage()}. Error code - {$uuid}";
            $logMessage = "Class: " . __METHOD__ . " | Line: " . __LINE__ . " | " . $message;
            $request->session()->flash('error', "Ошибка. Обратитесь к администрации сайта, указав код - {$uuid}");
            Log::error($logMessage);
        }
        return redirect()->back();
    }

    /**
     * @throws UnknownProperties
     */
    public function show(Article $article): View
    {
        $category = new CategoryShowDto($article->category->toArray());
        $categoryName = '';
        if (!empty($category->name)) {
            $categoryName = $category->name;
        }
        $data = new ArticleShowDto(array_merge($article->toArray(), ['category' => $categoryName]));
        return view('admin.article.show', [
            'article' => $data,
            'category' => $category
        ]);
    }

    public function index(ArticleShowAllHandler $handler): View
    {
        return view('admin.article.index', [
            'articles' => $handler->handle()->getItems(),
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public function edit(Article $article, CategoryShowService $categoryShowService): View
    {
        $category = new CategoryShowDto($article->category->toArray());
        $categoryName = '';
        if (!empty($category->name)) {
            $categoryName = $category->name;
        }
        $data = new ArticleShowDto(array_merge($article->toArray(), ['category' => $categoryName]));
        $collection = $categoryShowService->handle();
        return view('admin.article.edit', [
            'article' => $data,
            'category' => $category,
            'categories' => $collection
        ]);
    }


    public function update(Article $article, UpdateRequest $request, UpdateService $service): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $service->handle($article, $request);
            $request->session()->flash('success', 'Запись сохранена.');
            DB::commit();
        } catch (DomainException $e) {
            DB::rollBack();
            $uuid = Uuid::uuid4();
            $message = "{$e->getMessage()}. Error code - {$uuid}";
            $logMessage = "Class: " . __METHOD__ . " | Line: " . __LINE__ . " | " . $message;
            $request->session()->flash('error', "Ошибка. Обратитесь к администрации сайта, указав код - {$uuid}");
            Log::error($logMessage);
        }
        return to_route('admin.article.show', $article->slug);
    }
}
