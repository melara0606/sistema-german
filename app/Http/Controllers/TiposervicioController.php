<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipocontratoRequest;
use Illuminate\Http\Request;
use App\Tiposervicio;
use App\Http\Requests\TiposervicioRequest;

class TipoServicioController extends Controller
{
    public function index()
    {
        return TipoServicio::select('id', 'nombre', 'costo', 'estado', 'isObligatorio')->get();
    }
    public function show(TipoServicio $tipoServicio)
    {
        return $tipoServicio;
    }
}

