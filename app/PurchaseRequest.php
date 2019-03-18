<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    protected $fillable = [
        'department', 'customer_id', 'supplier_id',
        'assistant', 'pr', 'order_date', 'remarks'
    ];

    public function singlePurchaseRequests() { return $this->hasMany('App\SinglePurchaseRequest'); }
    public function customer() { return $this->belongsTo('App\Customer'); }
    public function supplier() { return $this->belongsTo('App\Supplier'); }
}
