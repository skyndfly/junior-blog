<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comments extends Model
{
    use HasFactory;

    const STATUS_PUBLISHED = 'published';
    const STATUS_UNPUBLISHED = 'unpublished';
    const STATUS_DELETED = 'deleted';

    public static function create(
        string $comment,
        int $userId,
        int $articleId,
        string $status,
        ?int $parentId = null
    ): Comments
    {
        $model = new self();
        $model['comment'] = $comment;
        $model['user_id'] = $userId;
        $model['article_id'] = $articleId;
        $model['status'] = $status;
        $model['parent_id'] = $parentId;
        return $model;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
