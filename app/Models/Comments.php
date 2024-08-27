<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    const STATUS_PUBLISHED = 'published';
    const STATUS_UNPUBLISHED = 'unpublished';
    const STATUS_DELETED = 'deleted';

    public static function create(
        string $comment,
        string $name,
        int $articleId,
        string $status,
        ?int $parentId = null
    ): Comments
    {
        $model = new self();
        $model['comment'] = $comment;
        $model['name'] = $name;
        $model['articleId'] = $articleId;
        $model['status'] = $status;
        $model['parentId'] = $parentId;
        return $model;
    }
}
