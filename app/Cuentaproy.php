<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuentaproy extends Model
{
    protected $guarded = [];
    protected $dates =['fecha_de_apertura'];

    public function proyecto()
    {
    	return $this->belongsTo('App\Proyecto');
    }

    public function pago()
    {
    	return $this->hasOne('App\Pago');
    }
}
