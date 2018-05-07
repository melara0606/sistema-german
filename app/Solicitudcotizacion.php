<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitudcotizacion extends Model
{
    protected $guarded =[];

    public function presupuesto()
    {
    	return $this->belongsTo('App\Presupuesto');
    }

    public function formapago()
    {
    	return $this->belongsTo('App\Formapago');
    }

    public function presupuestosolicitud()
    {
        return $this->hasMany('App\PresupuestoSolicitud');
    }

    public static function correlativo()
    {
      $numero=Solicitudcotizacion::where('created_at','>=',date('Y'.'-1-1'))->where('created_at','<=',date('Y'.'-12-31'))->count();
      if($numero>0 && $numero<10){
        return "00".($numero+1)."-".date("Y");
      }else{
        if($numero >= 10 && $numero <100){
          return "0".($numero+1)."-".date("Y");
        }else{
          if($numero>=100){
            return ($numero+1)."-".date("Y");
          }else{
            return "001-".date("Y");
          }
        }
      }
    }
}
