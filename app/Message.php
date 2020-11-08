<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'inbox_id','message'
    ];

    public function getInbox()
    {
        return $this->hasOne('App\Inbox', 'id', 'inbox_id');
    }
}
