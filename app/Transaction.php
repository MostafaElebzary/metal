<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'type',
        'status',
        'desc',
        'number',
        'trans_date',
        'trans_type_id',
        'thirdparty_id',
        'note',
        'user_id'
        ];

        public function  getTransactionType(){

            return $this->hasOne('App\TransactionsType','id','trans_type_id');
            
        }

        public function  getThirdparty(){

            return $this->hasOne('App\ThirdParty','id','thirdparty_id');
            
        }

        
        public function  getUser(){

            return $this->hasOne('App\User','id','user_id');
            
        }
    
    
}
