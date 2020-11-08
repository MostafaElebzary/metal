<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
            'user_id',
            'inbox',
            'deleteinbox',
            'addclient',
            'addinreciept',
            'addoutreciept',
            'recieptsarchieve',
            'clientsArchieve',
            'operationsonclients', 
            'operationsonclientsarchieve',
            'clientaccountstatement',
            'websitepanel',
            'controllpanel',
            'homeinreciept',
            'homeoutreciept',
    ];


    public function getUser()
    {

        return $this->hasOne('App\User', 'id', 'user_id');

    }
}
