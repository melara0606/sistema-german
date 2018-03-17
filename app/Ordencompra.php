<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordencompra extends Model
{
    protected $guarded = [];

    public function cotizacion()
    {
    	return $this->belongsTo('App\Cotizacion');
    }
}
