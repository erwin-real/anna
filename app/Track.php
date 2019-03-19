<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'material_id', 'previous', 'updated', 'user_id', 'date_modified'
    ];

    public $timestamps = false;

    public function material() { return $this->belongsTo('App\Material'); }
    public function user() { return $this->belongsTo('App\User'); }
}
