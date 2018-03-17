<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $guarded = [];

    public function categoria()
    {
    	return $this->hasMane('App\Categoria');
    }
}
