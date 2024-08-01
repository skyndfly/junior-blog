<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_DELETED = 'deleted';
    const PAGINATE = 10;
    protected $guarded = [];
    protected $table = 'categories';


    public static function create(
        string $name,
        ?int   $parentId,
    ): Category
    {
        $category = new Category();
        $category['name'] = $name;
        $category['parentId'] = $parentId;
        $category['status'] = self::STATUS_ACTIVE;
        return $category;
    }
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parentId');
    }

}
