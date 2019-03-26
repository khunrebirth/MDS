<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerRoom extends Model
{
    protected $table = 'customer_room_pivot';
    protected $fillable = ['customer_id', 'room_id', 'date_move_in', 'date_move_out'];
}
