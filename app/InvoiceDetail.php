<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $table = 'invoice_details';
    protected $fillable = [
        'customer_id',
        'room_id',
        'total',
        'date',
        'status',
    ];

    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
