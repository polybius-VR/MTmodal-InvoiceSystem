<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivableInvoice extends Model
{
    //
    protected $primaryKey = "number_id"; // or null
    public $incrementing = false;

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
