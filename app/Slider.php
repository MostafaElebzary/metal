<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'image', 'title_ar', 'title_en','sub_title_ar','sub_title_en'
    ];
}
