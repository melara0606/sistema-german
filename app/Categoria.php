<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $guarded = [];

    public function catalogo()
    {
    	return $this->hasMany('App\Catalogo');
    }
}
