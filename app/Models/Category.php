<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'parent_id', 'slug'];

    public function categoryChildrent()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function categoryProducts()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
