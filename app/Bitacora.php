<?php

namespace App;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $guarded = [];
    protected $dates = ['registro'];

    public function users()
    {
    	return $this->belongsTo('App\User');
    }

   public static function vernombre($id)
    {
    	$nombre = User::find($id);
    	return $nombre->name;
    }
}
