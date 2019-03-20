<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingleEncodingOut extends Model
{
    protected $fillable = [
        'material_id', 'encoding_out_id', 'quantity'
    ];

    public function material() { return $this->belongsTo('App\Material'); }
    public function encodingOut() { return $this->belongsTo('App\EncodingOut'); }
}
