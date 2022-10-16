<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    public function menuChildrent()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
}
