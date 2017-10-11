<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contribuyente extends Model
{
    //protected $dates = ['deleted_at'];
    protected $dates = ['created_at','updated_at','fechabaja'];
	
    protected $guarded = [];
}
