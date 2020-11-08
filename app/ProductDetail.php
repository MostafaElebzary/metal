<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //

    protected $fillable = [
        'product_id', 'image'
    ];

    public function getProduct()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
