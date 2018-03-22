<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $guarded =[];
    protected $dates = ['created_at'];

    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }

    public function presupuestodetalle()
    {
        return $this->hasMany('App\Presupuestodetalle');
    }

    public function solicitudcotizacion()
    {
        return $this->hasOne('App\Solicitudcotizacion');
    }

    public function cotizacion()
    {
        return $this->hasOne('App\Cotizacion');
    }
}
