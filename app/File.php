<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{  
protected $fillable = [
    'number', 'name', 'file', 'client_id'
];

public function getClient()
{
    return $this->hasOne('App\Client', 'id', 'client_id');
}
}
