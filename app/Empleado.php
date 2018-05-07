<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $guarded = [];
    protected $dates = ['fecha_contrato'];

    public static function Buscar($nombre,$estado)
    {
    	return Empleado::nombre($nombre)->estado($estado)->orderBy('id')->paginate(10);
    }

    public function scopeEstado($query,$estado)
    {
    	return $query->where('estado',$estado);
    }

    public function scopeNombre($query,$nombre)
    {
    	if(trim($nombre != ""))
    	{
    		return $query->where('nombre','iLIKE', '%'.$nombre.'%');
    	}
    }

    public function contrato()
    {
        return $this->hasMany('App\Contrato');
    }

    public function prestamo()
    {
      return $this->hasMany('App\Prestamo');
    }

    public function contratoproyecto()
    {
        return $this->hasMany('App\Contratoproyecto');
    }
}
