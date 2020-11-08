<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    protected $fillable = [
        'icon','question_ar','question_en','answer_ar','answer_en'
    ];
}
