<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainData extends Model
{
    //
    protected $fillable = [
        'name_ar', 'name_en', 'logo', 'whatsapp', 'email', 'instagram',
        'twitter', 'facebook', 'snapchat', 'finishedproject', 'inprogressproject',
        'coveredcities', 'winningaward', 'dayopenfrom', 'dayopento', 'houropenfrom', 
        'houropento', 'daysclosed','address_ar','address_en','contact_number',
    ];
}
