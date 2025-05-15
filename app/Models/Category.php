<?php

namespace App\Models;

use App\Enums\CategoryStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int|null $parentId
 * @property string $status
 * @property string $created_at
 */
class Category extends Model
{
    use HasFactory;

    public const PAGINATE = 10;

    protected $guarded = [];

    protected $table = 'categories';

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function create(
        string $name,
        string $slug,
        ?int $parentId,
    ): Category {
        $category = new Category;
        $category->name = $name;
        $category->slug = $slug;
        $category->parentId = $parentId;
        $category->status = CategoryStatusEnum::STATUS_ACTIVE->value;

        return $category;
    }

    public function updateCategory(string $name, string $slug, ?int $parentId): self
    {
        $this->name = $name;
        $this->parentId = $parentId;
        $this->slug = $slug;

        return $this;
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parentId');
    }
}
