<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainClient extends Model
{
    protected $fillable = [

        'name', 'address', 'phone', 'id_num',

    ];
}
