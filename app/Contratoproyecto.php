<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratoProyecto extends Model
{

  protected $guarded = [];

  protected $dates = ['inicio_contrato','fin_contrato'];

    public function proyecto()
    {
      return $this->belongsTo('App\Proyecto');
    }
}
