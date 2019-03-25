<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [ 'name' ];

    public function singleTools() { return $this->hasMany('App\SingleTool'); }
}
