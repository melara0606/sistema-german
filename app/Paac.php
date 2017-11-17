<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paac extends Model
{
    protected $guarded = [];
    protected $dates = [];

    public function paacdetalle()
    {
        return $this->hasMany('App\Paacdetalle');
    }
}
