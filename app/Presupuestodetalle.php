<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuestodetalle extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function presupuesto()
    {
      return $this->belongsTo('App\Presupuesto');
    }
}
