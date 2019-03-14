<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'plu', 'main_desc', 'brand',
        'supplier', 'category', 'tax',
        'primary_unit', 'unit_measurement', 'type'
    ];
}
