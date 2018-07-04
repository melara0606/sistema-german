<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratoProyecto extends Model
{

  protected $guarded = [];
  
    public function proyecto()
    {
      return $this->belongsTo('App\Proyecto');
    }
}
