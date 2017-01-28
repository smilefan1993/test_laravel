<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    public static function getSubCategoryList()
    {
        return static::pluck('sub_category_name', 'id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
