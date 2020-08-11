<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['barcode', 'name', 'cost', 'vat-class'];

    public function vat_class() {
        return $this->belongsTo('App\VatClass', 'id', 'vat_id');
    }
}
