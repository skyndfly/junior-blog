<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest as StoreRequestCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use App\Service\Admin\Category\Store\Dto\StoreDto as CategoryStoreDto;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use App\Contracts\Admin\CategoryServiceContract as CategoryStoreService;

class CategoryController extends Controller
{
    public function create(): View
    {
        return view('admin.category.create');
    }

    public function store(StoreRequestCategory $request, CategoryStoreService $service): View
    {
        try {
            $data = new CategoryStoreDto($request->validated());
            $service->handle($data);
            $request->session()->flash('success', 'Запись добавлена.');

        }catch (\DomainException|UnknownProperties $e){
            $uuid = Uuid::uuid4();
            $message = "{$e->getMessage()}. Error code - {$uuid}";
            $logMessage = "Class: " . __METHOD__ . " | Line: " . __LINE__ . " | " . $message;
            $request->session()->flash('error', "Ошибка. Обратитесь к администрации сайта, указав код - {$uuid}");
            Log::error($logMessage);
        }
        return view('admin.category.create');
    }
}
