<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisicion extends Model
{
    protected $guarded=[];

    public function requisiciondetalle()
    {
      return $this->hasMany('App\Requisiciondetalle');
    }

    public function unidad()
    {
      return $this->belongsTo('App\Unidad');
    }

    public function contratosuministro()
    {
        return $this->hasMany('App\Contratosuministro');
    }
}
