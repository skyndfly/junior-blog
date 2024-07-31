<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    protected $guarded = [];
    protected $table = 'categories';


    public static function create(
        string $name,
        ?int $parentId,
    ): Category
    {
        $category = new Category();
        $category['name'] = $name;
        $category['parentId'] = $parentId;
        $category['status'] = self::STATUS_ACTIVE;
        return $category;
    }
}
