<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionsAttachment extends Model
{

    protected $fillable = [
        'file', 'transaction_id','name'
  ];

    public function  getTransactionType(){

        return $this->hasOne('App\Transaction','id','transaction_id');
        
    }
}
