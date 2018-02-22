<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{
    protected $guarded = [];

    public function proyecto()
    {
    	return $this->belongsTo('App\Proyecto');
    }

    public function fondocat()
    {
    	return $this->belongsTo('App\Fondocat');
    }
}
