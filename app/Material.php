<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'plu', 'main_desc', 'brand',
        'supplier', 'category',
        'unit_measurement', 'type', 'stocks'
    ];

    public function tracks() { return $this->hasMany('App\Track'); }
}
