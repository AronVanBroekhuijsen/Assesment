<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VatClass extends Model
{
    protected $table = 'vat_classes';
    protected $fillable = ['amount'];

    public function product() {
        return $this->hasMany('App\Product', 'id', 'vat_id');
    }
}
