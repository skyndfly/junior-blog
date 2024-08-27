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

        return collect($this->sortAndAddLevel($categories))->keyBy('id');
    }

    function sortAndAddLevel(Collection $elements, $parentId = null, $level = 0) {
        $result = collect();

        $children = $elements->where('parentId', $parentId);

        foreach ($children as $child) {
            $child->level = $level;
            $result->push($child);
            $result = $result->merge($this->sortAndAddLevel($elements, $child->id, $level + 1));
        }

        return $result;
    }

    public function getAllPaginate(): LengthAwarePaginator
    {
        return Category::query()->paginate(Category::PAGINATE);
    }

}
