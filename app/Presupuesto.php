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

    public function presupuestosolicitud()
    {
        return $this->hasMany('App\PresupuestoSolicitud');
    }

    public function categoria()
    {
      return $this->belongsTo('App\Categoria');
    }


}
