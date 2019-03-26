<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeterWater extends Model
{
    protected $table = 'meter_waters';
    protected $fillable = [
        'account_id',
        'room_id',
        'unit',
        'unit_current',
        'total'
    ];
}
