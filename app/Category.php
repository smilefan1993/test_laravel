<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public static function getCategoryList()
    {
        return static::pluck('category_name', 'id');
    }

    public function sub_category()
    {
        return $this->belongsToMany(Sub_category::class);
    }
}
