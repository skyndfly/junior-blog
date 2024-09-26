<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_DELETED = 'deleted';
    public const PAGINATE = 10;
    protected $guarded = [];
    protected $table = 'categories';


    public static function create(
        string $name,
        ?int   $parentId,
    ): Category {
        $category = new Category();
        $category['name'] = $name;
        $category['parentId'] = $parentId;
        $category['status'] = self::STATUS_ACTIVE;
        return $category;
    }

    public function getName(): string
    {
        return $this['name'];
    }
    public function getId(): int
    {
        return $this['id'];
    }
    public function getParentId(): string
    {
        return $this['parentId'];
    }
    public function getLevel(): string
    {
        return $this['level'];
    }
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parentId');
    }

}
