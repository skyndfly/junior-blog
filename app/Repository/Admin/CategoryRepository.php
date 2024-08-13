<?php

namespace App\Repository\Admin;

use App\Models\Category;
use DomainException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function store(Category $model): void
    {
        if (!$model->save()) {
            throw new DomainException('Ошибка сохранения.');
        }
    }

    public function getActiveAsCollection(): Collection
    {
        $categories = DB::table('categories')
            ->select('id', 'name', 'parentId')
            ->where(['status' => Category::STATUS_ACTIVE])
            ->get();

        return collect($categories)->keyBy('id');
    }

    public function getAllPaginate(): LengthAwarePaginator
    {
        return Category::query()->paginate(Category::PAGINATE);
    }

}
