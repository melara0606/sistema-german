<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Inmueble extends Model
{
    protected $guarded = [];

    public function contribuyente()
    {
    	return $this->belongsTo('App\Contribuyente');
    }
}
