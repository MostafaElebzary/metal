<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // 
    protected $fillable = [
        'number', 'amount', 'name', 'payment_date', 'client_id'
    ];

    public function getClient()
    {
        return $this->hasOne('App\Client', 'id', 'client_id');
    }
}
