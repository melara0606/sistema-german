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

    public function catalogo()
    {
    	return $this->belongsTo('App\Catalogo')->orderby('categoria_id','asc');
    }
}
