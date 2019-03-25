<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingleTool extends Model
{
    protected $fillable = [ 'tool_id', 'name', 'number', 'period' ];

    public function tool() { return $this->belongsTo('App\Tool'); }
}
