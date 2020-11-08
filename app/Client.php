<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'projecttype_id', 'name', 'address', 'phone', 'id_num', 'check_num',
        'check_date',
        'amount',
        'part_number',
        'scheme_number',
        'taxepercent',
        'total'
    ];

    public function getProjectType()
    {
        return $this->hasOne('App\ProjectType', 'id', 'projecttype_id');
    }
}
