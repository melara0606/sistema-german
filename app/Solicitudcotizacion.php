<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitudcotizacion extends Model
{
    protected $guarded =[];

    public function proyecto()
    {
    	return $this->belongsTo('App\Proyecto');
    }

    public function formapago()
    {
    	return $this->belongsTo('App\Formapago');
    }
}
