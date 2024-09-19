<?php

namespace App\Repository\Comments\Store;

use App\Models\Comments;

final class Query
{
    public function fetch(Comments $model): void
    {
        if (!$model->save()) {
            throw new \DomainException('Ошибка сохранения.');
        }
    }

}
