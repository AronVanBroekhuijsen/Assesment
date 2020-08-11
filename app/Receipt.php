<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public function receipt_product()
    {
        return $this->hasMany('App\ReceiptProducts', 'receipt_id', 'id');
    }
}
