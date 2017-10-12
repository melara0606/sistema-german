<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contribuyente extends Model
{
    //protected $dates = ['deleted_at'];
    protected $dates = ['created_at','updated_at','fechabaja'];
	
    protected $guarded = [];

    public function scopeEstado($query,$estado)
    {
        return $query->where('estado', $estado);
    }

    public function scopeNombre($query,$nombre)
    {
    	if(trim($nombre) != "")
    	{
    		return $query->where('nombre','LIKE', '%'.$nombre.'%')->where('estado',1);
    	}else
    	{
    		return $query->where('estado',1);
    	}
        
    }
}
