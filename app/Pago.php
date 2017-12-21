<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $guarded = [];

    public function tipopago()
    {
    	return $this->belongsTo('App\Tipopago');
    }

    public function cuenta()
    {
    	return $this->belongsTo('App\Cuenta');
    }
}
