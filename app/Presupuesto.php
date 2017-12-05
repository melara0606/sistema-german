<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $guarded =[];

    public function proyecto()
    {
      return $this->belongsTo('App\Proyecto');
    }

    public function presupuestodetalle()
    {
      return $this->hasMany('App\Presupuestodetalle');
    }
}
