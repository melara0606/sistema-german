<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DatesTranslator;

class Ordencompra extends Model
{
  use DatesTranslator;
    protected $guarded = [];
    protected $dates = ['fecha_inicio', 'fecha_fin'];

    public function cotizacion()
    {
    	return $this->belongsTo('App\Cotizacion');
    }

    public static function correlativo()
    {
      $numero=Ordencompra::where('created_at','>=',date('Y'.'-1-1'))->where('created_at','<=',date('Y'.'-12-31'))->count();
      if($numero>0){
        return intval(($numero+1).date('Y'));
      }else{
        return intval("1".date("Y"));
      }
    }
}
