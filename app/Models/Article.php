<?php

namespace App\Models;

use App\Service\Admin\Article\Store\StoreDto as StoreDto;
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
        int    $categoryId
    ): Article
    {
        $model = new Article();
        $model['title'] = $title;
        $model['slug'] = $slug;
        $model['description'] = $description;
        $model['shortDescription'] = $shortDescription;
        $model['mainImage'] = $mainImage;
        $model['status'] = $status;
        $model['categoryId'] = $categoryId;
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
        int    $categoryId
    ): Article
    {
        $model['title'] = $title;
        $model['slug'] = $slug;
        $model['description'] = $description;
        $model['shortDescription'] = $shortDescription;
        $model['mainImage'] = $mainImage;
        $model['status'] = $status;
        $model['categoryId'] = $categoryId;
        return $model;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
