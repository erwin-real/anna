<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'person', 'email', 'address', 'contact', 'tin', 'tax', 'tax_output'
    ];
}
