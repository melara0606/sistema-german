<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contribuyente extends Model
{
    //protected $dates = ['deleted_at'];
    protected $dates = ['created_at','updated_at','fechabaja'];
	
    protected $guarded = [];
    protected $fillable = ['nombre', 'dui', 'nit', 'nacimiento', 'direccion', 'telefono', 'sexo'];

    /*public function setNacimientoAttribute($value)
    {
        $this->attributes['nacimiento'] = Carbon::createFromFormat('d/m/Y', $value);
        var_dump($this->attributes['nacimiento']);
    }*/

    public static function Buscar($nombre,$estado)
    {
        return Contribuyente::nombre($nombre)->estado($estado)->orderBy('id')->paginate(10);
    }

    public function scopeEstado($query,$estado)
    {
        return $query->where('estado', $estado);
    }

    public function scopeNombre($query,$nombre)
    {
    	if(trim($nombre) != "")
    	{
    		return $query->where('nombre','iLIKE', '%'.$nombre.'%');
    	}
        
    }

    public function inmueble()
    {
        return $this->hasMany('App\Inmueble');
    }

    public function inmuebles()
    {
        return $this->hasMany('App\Inmueble');
    }

    public function construccion()
    {
        return $this->hasMany('App\Construccion');
    }

    public function pago()
    {
        return $this->hasMany('App\Pago');
    }
}
