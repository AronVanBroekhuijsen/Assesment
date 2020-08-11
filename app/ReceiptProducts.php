<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptProducts extends Model
{
    public function receipt()
    {
        return $this->belongsTo('App\Receipt', 'receipt_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'id', 'product_id');
    }
}
