<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reciept extends Model
{
    protected $fillable = [
        'client_id', 'type', 'date', 'pay_type', 'amount','desc','user_id','taxepercent','total'
    ];

    public function getClient()
    {
        return $this->hasOne('App\Client', 'id', 'client_id');
    }
    public function getUser()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
