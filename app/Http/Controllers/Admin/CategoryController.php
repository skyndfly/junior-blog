<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Admin\CategoryServiceContract as CategoryStoreService;
use App\Contracts\Admin\ShowAllForSelectServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest as StoreRequestCategory;
use App\Models\Category;
use App\Service\Admin\Category\Show\CategoryShowDto;
use App\Service\Admin\Category\ShowAll\ShowAllService as CategoryShowAllService;
use App\Service\Admin\Category\Store\Dto\StoreDto as CategoryStoreDto;
use DomainException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CategoryController extends Controller
{
    public function index(CategoryShowAllService $service): View
    {
        return view('admin.category.index', [
            'categories' => $service->handle(),
        ]);
    }

    public function create(ShowAllForSelectServiceContract $service): View
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
            $logMessage = 'Class: '.__METHOD__.' | Line: '.__LINE__.' | '.$message;
            $request->session()->flash('error', "Ошибка. Обратитесь к администрации сайта, указав код - {$uuid}");
            Log::error($logMessage);
        }

        return to_route('admin.category.create');
    }

    public function show(Category $category)
    {
        dd($category);
    }

    public function edit(int $id, ShowAllForSelectServiceContract $allCategoriesService): View|RedirectResponse
    {
        $category = Category::find($id);
        if (! $category) {
            return redirect()->route('admin.category.index')->with('error', 'Категория не найдена!');
        }
        $allCategories = $allCategoriesService->handle();

        return view('admin.category.edit', [
            'category' => new CategoryShowDto($category->toArray()),
            'allCategories' => $allCategories,
        ]);
    }
}
