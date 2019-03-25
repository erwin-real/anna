<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $fillable = [ 'year', 'item' ];

    public function singleForecasts() { return $this->hasMany('App\SingleForecast'); }
}
