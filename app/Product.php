<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['vat_id', 'barcode', 'name', 'cost'];

    public function vat_class() {
        return $this->belongsTo('App\VatClass', 'vat_id', 'id');
    }
}
