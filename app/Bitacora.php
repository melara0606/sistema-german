<?php

namespace App;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $guarded = [];
    protected $dates = ['registro'];

    public static function bitacora($accion)
    {
        $bitacora = new Bitacora;
        $bitacora->registro = date('Y-m-d');
        $bitacora->hora = date('H:i:s');
        $bitacora->accion = $accion;
        $bitacora->user_id = Auth()->user()->id;
        $bitacora->save();
    }

   public static function vernombre($id)
    {
    	$nombre = User::find($id);
    	return $nombre->name;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
