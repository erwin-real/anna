<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncodingOut extends Model
{
    protected $fillable = [
        'department', 'customer_id', 'supplier_id',
        'assistant', 'mir', 'pr', 'order_date', 'date_delivered', 'remarks'
    ];

    public function singleEncodingOuts() { return $this->hasMany('App\SingleEncodingOut'); }
    public function customer() { return $this->belongsTo('App\Customer'); }
    public function supplier() { return $this->belongsTo('App\Supplier'); }
}
