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

    public function cuentaproy()
    {
    	return $this->belongsTo('App\Cuentaproy', 'cuenta_id');
    }

    public function contribuyente()
    {
    	return $this->belongsTo('App\Contribuyente');
    }
}
