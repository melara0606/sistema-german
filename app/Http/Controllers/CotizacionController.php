<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Proveedor;
use App\Cotizacion;
use App\Bitacora;
use App\Http\Requests\CotizacionRequest;

class CotizacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $estado = $request->get('estado');
        if($estado == "" )$estado=1;
        if ($estado == 1) {
            $cotizaciones = Cotizacion::where('estado',$estado)->get();
            return view('cotizaciones.index',compact('cotizaciones','estado'));
        }
        if ($estado == 2) {
            $cotizaciones = Cotizacion::where('estado',$estado)->get();
            return view('cotizaciones.index',compact('cotizaciones','estado'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectos = Proyecto::all();
        $proveedores = Proveedor::all();
        $cotizaciones = Cotizacion::all();
        return view('cotizaciones.create',compact('proyectos','proveedores','cotizaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CotizacionRequest $request)
    {
        Cotizacion::create($request->All());
        bitacora('Registró una cotización');
        return redirect('/cotizaciones')->with('mensaje','Registro almacenado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cotizaciones = Cotizacion::findorFail($id);

        return view('cotizaciones.show', compact('cotizaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cotizaciones = Cotizacion::find($id);
        return view('cotizaciones.edit',compact('cotizaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(CotizacionRequest $request, $id)
    {
        $cotizacion = Cotizacion::find($id);
        $cotizacion->fill($request->All());
        $cotizacion->save();
        bitacora('Modificó una cotización');
        return redirect('/cotizaciones')->with('mensaje','Registro modificado con éxito');
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

    public function baja($cadena)
    {

        $datos = explode("+", $cadena);
        $id=$datos[0];
        $motivo=$datos[1];      
        $cotizacion = Cotizacion::find($id);
        $cotizacion->estado=2;
        $cotizacion->motivo=$motivo;
        $cotizacion->fechabaja=date('Y-m-d');
        $cotizacion->save();
        bitacora('Dió de baja a un cotizacion');
        return redirect('/cotizaciones')->with('mensaje','Cotización dada de baja');
    }

    public function alta($id)
    {
        $cotizacion = Cotizacion::find($id);
        $cotizacion->estado=1;
        $cotizacion->motivo=null;
        $cotizacion->fechabaja=null;
        $cotizacion->save();
        Bitacora::bitacora('Dió de alta a un cotizacion');
        return redirect('/cotizaciones')->with('mensaje','Cotización dada de alta');
    }
}