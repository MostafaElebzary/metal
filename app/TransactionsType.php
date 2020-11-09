<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionsType extends Model
{
    protected $fillable = [
        'code', 'name', 'status','type'
    ];
 }
