<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuestounidad extends Model
{
    protected $guarded =[];

    public function unidad()
    {
    	return $this->belongsTo('App\Unidad');
    }
}
