<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Traits\DatesTranslator;



class Proyecto extends Model
{
  use DatesTranslator;
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
      return $this->hasOne('App\Presupuesto');
    }

    public function fondo()
    {
        return $this->hasMany('App\Fondo');
    }

    public function cuentaproy()
    {
        return $this->hasOne('App\Cuentaproy');
    }

    public function organizacion()
    {
        return $this->belongsTo('App\Organizacion');
    }

    public function cuenta()
    {
      return $this->hasOne('App\Cuenta');
    }
}
