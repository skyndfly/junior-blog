<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public const STATUS_PUBLISHED = 'published';
    public const STATUS_DRAFT = 'draft';
    public const STATUS_UNPUBLISHED = 'unpublished';
    public const STATUS_DELETED = 'deleted';
    protected $guarded = [];
    protected $table = 'articles';

    public static function create(
        string $title,
        string $description,
        string $shortDescription,
        string $mainImage,
        string $status,
        int    $categoryId
    ): Article
    {
        $model = new Article();
        $model['title'] = $title;
        $model['description'] = $description;
        $model['shortDescription'] = $shortDescription;
        $model['mainImage'] = $mainImage;
        $model['status'] = $status;
        $model['categoryId'] = $categoryId;
        return $model;
    }
}
