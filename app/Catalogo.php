<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $guarded = [];

    public function categoria()
    {
    	return $this->belongsTo('App\Categoria')->orderby('id','asc');
    }

    public function presupuestodetalle()
    {
    	return $this->hasMany('App\Presupuestodetalle');
    }
}
