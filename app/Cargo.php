<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
	protected $guarded = [];
	
    public function contrato()
    {
    	$this->hasMany('App\Contrato');
    }
}