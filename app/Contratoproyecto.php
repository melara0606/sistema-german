<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratoproyecto extends Model
{
    protected $guarded = [];

    public static function Buscar($nombre,$estado)
    {
    	return Contratoproyecto::nombre($nombre)->estado($estado)->orderBy('id')->paginate(10);
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

    public function empleado()
    {
    	return $this->belongsTo('App\Empleado');
    }

    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }

    public function cargo()
    {
    	return $this->belongsTo('App\Cargo');
    }
}
