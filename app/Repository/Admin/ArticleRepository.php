<?php

namespace App\Repository\Admin;

use App\Models\Article;

class ArticleRepository
{
    public function store(Article $model): void
    {
        if (!$model->save()) {
            throw new \DomainException('Ошибка сохранения.');
        }
    }

}
