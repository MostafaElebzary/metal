<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainService extends Model
{
    protected $fillable = [
        'icon', 'name_ar', 'name_en', 'desc_ar', 'desc_en'
    ];
}
