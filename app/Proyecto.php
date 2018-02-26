<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Proyecto extends Model
{
    protected $guarded = [];
    protected $dates = ['fecha_inicio','fecha_fin'];

    public static function Buscar($nombre,$estado)
    {
        return Proyecto::nombre($nombre)->estado($estado)->orderBy('id')->paginate(10);
    }

    public function scopeEstado($query,$estado)
    {
        return $query->where('estado',$estado);
    }
    public function scopeNombre($query,$nombre)
    {
    	if(trim($nombre != "")){
            return $query->where('nombre','iLIKE', '%'.$nombre.'%');
    	}

    }

    public function presupuesto()
    {
      return $this->hasMany('App\Presupuesto');
    }

    public function organizacion()
    {
        return $this->belongsTo('App\Organizacion');
    }

    public function cuenta()
    {
      return $this->hasOne('App\Cuenta');
    }

    public function cotizacion()
    {
        return $this->hasMany('App\Cotizacion');
    }

    public function fondo()
    {
        return $this->hasMany('App\Fondo');
    }

    public function cuentaproy()
    {
        return $this->hasMany('App\Cuentaproy');
    }
}
