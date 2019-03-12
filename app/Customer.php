<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'person', 'email', 'address', 'contact', 'tin', 'type'
    ];
}
