<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    public static function vercargo($id)
    {
    	$cargo=Cargo::find($id);
    	//$cargo=Cargo::where('idcargo','=',$id);
    	return $cargo->cargo;
    }
}
