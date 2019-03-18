<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinglePurchaseRequest extends Model
{
    protected $fillable = [
        'material_id', 'purchase_request_id', 'quantity'
    ];

    public function material() { return $this->belongsTo('App\Material'); }
    public function purchaseRequest() { return $this->belongsTo('App\PurchaseRequest'); }
}
