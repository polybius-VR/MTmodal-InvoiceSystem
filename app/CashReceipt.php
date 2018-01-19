<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashReceipt extends Model
{
    //
    protected $primaryKey = "number_id"; // or null
    public $incrementing = false;
}
