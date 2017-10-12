<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
	
    protected $guarded = [];

    public function scopeName($query,$name)
    {
    	if(trim($name != "")){
    	$query->where('nombree',$name);	
    	}
    	
    }
}
