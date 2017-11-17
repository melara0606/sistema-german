<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paacdetalle extends Model
{
  protected $guarded = [];
  public $timestamps = false;
  
    public function paac()
    {
        return $this->belongsTo('App\Paac');
    }
}
