<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title_en', 'title_ar', 'desc_ar', 'desc_en', 'cat_id'
    ];

    public function getCategory()
    {
        return $this->hasOne('App\Category', 'id', 'cat_id');
    }
}
