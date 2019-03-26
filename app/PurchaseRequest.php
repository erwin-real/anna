<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    protected $fillable = [
        'department', 'user_id', 'customer_id', 'supplier_id',
        'warehouse_id', 'received_id', 'pr', 'order_date', 'remarks'
    ];

    public function singlePurchaseRequests() { return $this->hasMany('App\SinglePurchaseRequest'); }
    public function customer() { return $this->belongsTo('App\Customer'); }
    public function supplier() { return $this->belongsTo('App\Supplier'); }
    public function user() { return $this->belongsTo('App\User'); }
    public function warehouse_user() { return $this->belongsTo('App\User', 'warehouse_id'); }
    public function received_user() { return $this->belongsTo('App\User', 'received_id'); }
}
