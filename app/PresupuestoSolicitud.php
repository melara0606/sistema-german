<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PresupuestoSolicitud extends Model
{
    protected $guarded = [];

    public function solicitudcotizacion()
    {
      return $this->belongsTo('App\Solicitudcotizacion');
    }

    public function presupuesto()
    {
      return $this->belongsTo('App\Presupuesto');
    }

    public function cotizacion()
    {
        return $this->hasMany('App\Cotizacion');
    }
}
