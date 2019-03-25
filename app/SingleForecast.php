<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingleForecast extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'forecast_id', 'year', 'quarter', 'demand'
    ];

    public function forecast() { return $this->belongsTo('App\Forecast'); }
}
