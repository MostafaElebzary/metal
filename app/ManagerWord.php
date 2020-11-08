<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagerWord extends Model
{
    protected $fillable = [
        'name_ar', 'name_en', 'position_ar', 'position_en', 'image', 'desc_ar','desc_en'
    ];
}
