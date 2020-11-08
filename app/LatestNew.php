<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LatestNew extends Model
{
    protected $fillable = [
        'image', 'title_en', 'title_ar','desc_en','desc_ar'
    ];
}
