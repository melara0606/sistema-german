<?php

namespace App;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $guarded = [];
    protected $dates = ['registro'];

    public static function vernombre($id)
    {
    	$nombre = User::find($id);
    	return $nombre->name;
    }
}
