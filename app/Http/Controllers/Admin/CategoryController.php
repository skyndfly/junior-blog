<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest as StoreRequestCategory;
use DomainException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use App\Service\Admin\Category\Store\Dto\StoreDto as CategoryStoreDto;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use App\Contracts\Admin\CategoryServiceContract as CategoryStoreService;
use App\Contracts\Admin\CategoryShowServiceContract as CategoryShowService;

class CategoryController extends Controller
{
    public function create(CategoryShowService $service): View
    {
        $categories = $service->handle();
        return view('admin.category.create', [
            'categories' => $categories,
        ]);
    }

    public function store(StoreRequestCategory $request, CategoryStoreService $service): RedirectResponse
    {
        try {
            $data = new CategoryStoreDto($request->validated());
            $service->handle($data);
            $request->session()->flash('success', 'Запись добавлена.');

        } catch (DomainException|UnknownProperties $e) {
            $uuid = Uuid::uuid4();
            $message = "{$e->getMessage()}. Error code - {$uuid}";
            $logMessage = "Class: " . __METHOD__ . " | Line: " . __LINE__ . " | " . $message;
            $request->session()->flash('error', "Ошибка. Обратитесь к администрации сайта, указав код - {$uuid}");
            Log::error($logMessage);
        }
        return to_route('admin.category.create');
    }

}
