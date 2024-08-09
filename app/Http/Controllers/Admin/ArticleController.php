<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadImageHelper;
use App\Http\Controllers\Controller;
use App\Contracts\Admin\CategoryShowServiceContract as CategoryShowService;
use App\Contracts\Admin\Article\ArticleStoreContract as ArticleStoreService;
use App\Http\Requests\Admin\Article\StoreRequest;
use DomainException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use App\Service\Admin\Article\Store\StoreDto as StoreDto;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ArticleController extends Controller
{
    public function create(CategoryShowService  $categoryShowService): View
    {
        $collection = $categoryShowService->handle();

        return view('admin.article.create',[
            'categories' => $collection
        ]);
    }

    public function store(StoreRequest $request, ArticleStoreService $service): RedirectResponse
    {

        try {
            $imagePath = UploadImageHelper::uploadImage( $request, 'admin/articles', 'mainImage');
            // Создаем DTO с путем к изображению
            $data = new StoreDto(array_merge($request->validated(), ['mainImage' => $imagePath]));

            $service->handle($data);
            $request->session()->flash('success', 'Запись добавлена.');

        }catch (DomainException|UnknownProperties $e){
            $uuid = Uuid::uuid4();
            $message = "{$e->getMessage()}. Error code - {$uuid}";
            $logMessage = "Class: " . __METHOD__ . " | Line: " . __LINE__ . " | " . $message;
            $request->session()->flash('error', "Ошибка. Обратитесь к администрации сайта, указав код - {$uuid}");
            Log::error($logMessage);
        }
        return redirect()->back();
    }
}
