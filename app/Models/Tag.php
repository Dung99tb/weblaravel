<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function projects()
    {
        return $this->belongsToMany(Product::class, 'product_tags');
    }
}
