<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitudcotizacion extends Model
{
    protected $guarded =[];

    public function presupuesto()
    {
    	return $this->belongsTo('App\Presupuesto');
    }

    public function formapago()
    {
    	return $this->belongsTo('App\Formapago');
    }
}
