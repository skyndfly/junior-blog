<?php

namespace App\Repository\Admin;

use App\Models\Category;

class CategoryRepository
{
    public function store(Category $model): void
    {
        if (!$model->save()){
            throw new \DomainException('Ошибка сохранения.');
        }
    }

}
