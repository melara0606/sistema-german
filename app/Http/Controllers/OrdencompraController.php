<?php

namespace App\Http\Controllers;

use App\Cotizacion;
use App\Proyecto;
use App\Fondo;
use App\Ordencompra;
use Illuminate\Http\Request;


class OrdencompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

     public function getCotizacion($id)
     {
        return Cotizacion::where('proyecto_id',$id)->where('seleccionado',true)->with('proveedor','detallecotizacion','proyecto')->orderby('id')->get();
     }

     public function getMonto($id)
     {
        return Fondo::where('proyecto_id',$id)->with('fondocat')->get();
     }
     
    public function index()
    {
        $ordenes = Ordencompra::get();
        return view('ordencompras.index',compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectos = Proyecto::where('estado',4)->get();
        return view('ordencompras.create',compact('proyectos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->All());
        Ordencompra::create([
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'cotizacion_id' => $request->cotizacion_id,
            'observaciones' => $request->observaciones,
            'direccion_entrega' => $request->direccion_entrega,
            'adminorden' => $request->adminorden,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
