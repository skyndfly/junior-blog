<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    public const STATUS_PUBLISHED = 'published';
    public const STATUS_DRAFT = 'draft';
    public const STATUS_UNPUBLISHED = 'unpublished';
    public const STATUS_DELETED = 'deleted';
    public const ADMIN_PAGINATION = 30;

    protected $guarded = [];
    protected $table = 'articles';

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function create(
        string $title,
        string $slug,
        string $description,
        string $shortDescription,
        string $mainImage,
        string $status,
        int $categoryId,
        int $admin_id,
    ): Article {
        $model = new Article();
        $model['title'] = $title;
        $model['slug'] = $slug;
        $model['description'] = $description;
        $model['shortDescription'] = $shortDescription;
        $model['mainImage'] = $mainImage;
        $model['status'] = $status;
        $model['categoryId'] = $categoryId;
        $model['admin_id'] = $admin_id;
        return $model;
    }

    public static function updateModel(
        Article $model,
        string $title,
        string $slug,
        string $description,
        string $shortDescription,
        string $mainImage,
        string $status,
        int $categoryId,
        int $admin_id,
    ): Article {
        $model['title'] = $title;
        $model['slug'] = $slug;
        $model['description'] = $description;
        $model['shortDescription'] = $shortDescription;
        $model['mainImage'] = $mainImage;
        $model['status'] = $status;
        $model['categoryId'] = $categoryId;
        $model['admin_id'] = $admin_id;
        return $model;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
