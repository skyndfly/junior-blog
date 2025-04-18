<?php

namespace App\Models;

use App\Enums\CategoryStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
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

    public static function create(
        string $name,
        ?int $parentId,
    ): Category {
        $category = new Category;
        $category['name'] = $name;
        $category['parentId'] = $parentId;
        $category['status'] = CategoryStatusEnum::STATUS_ACTIVE->value;

        return $category;
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function setParentId(?int $parentId): void
    {
        $this->attributes['parentId'] = $parentId;
    }

    public function updateCategory(string $name, ?int $parentId): self
    {
        $this->setName($name);
        $this->setParentId($parentId);

        return $this;
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parentId');
    }
}
