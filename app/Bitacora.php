<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $guarded = [];

    public static function vernombre($id)
    {
    	$nombre = User::find($id);
    	return $nombre->name;
    }
}
