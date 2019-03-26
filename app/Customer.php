<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'first_name',
        'last_name',
        'nickname',
        'idcard',
        'phone',
        'email',
    ];

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }
}
