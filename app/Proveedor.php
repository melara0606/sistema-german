<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{

	protected $dates = ['created_at','updated_at','fechabaja'];
	
    protected $guarded = [];

    public static function Buscar($estado)
    {
        return Proveedor::estado($estado);
    }

    public function scopeEstado($query,$estado)
    {
        return $query->where('estado', $estado);
    }

    public function cotizacion()
    {
        return $this->hasMany('App\Cotizacion');
    }

    public function contratosuministro()
    {
        return $this->hasMany('App\Contratosuministro');
    }
}
