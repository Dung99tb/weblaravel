<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];
    public function imageSales() {
        return $this->hasMany(ProductImageSales::class, 'sale_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'product_tag_sales', 'sale_id', "tag_id")->withTimestamps();
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function saleTag() {
        return $this->hasMany(ProductTagSales::class, 'sale_id');
    }
}
