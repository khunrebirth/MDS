<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeterEletric extends Model
{
    protected $table = 'meter_electrics';
    protected $fillable = [
        'account_id',
        'room_id',
        'unit',
        'unit_current',
        'total'
    ];
}
