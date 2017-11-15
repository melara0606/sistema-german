<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detallecotizacion;
use App\Bitacora;
use App\Http\Requests\DetallecotizacionRequest;

class DetallecotizacionController extends Controller
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
        $detallecotizacion_id = $request->get('detallecotizacion_id');        
        return view('detallecotizaciones.index',compact('detallecotizaciones','detallecotizacion_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detallecotizaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetallecotizacionRequest $request)
    {
        Detallecotizacion::create($request->All());
        bitacora('Registró detalles de cotización');
        return redirect('/detallecotizaciones')->with('mensaje','Registro almacenado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Detallecotizacion = Detallecotizacion::findorFail($id);

        return view('detallecotizaciones.show', compact('detallecotizacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Detallecotizacion $detallecotizacion)
    {
        return view('detallecotizaciones.edit',compact('detallecotizacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(DetallecotizacionRequest $request, $id)
    {
        $detallecotizacion = Detallecotizacion::find($id);
        $detallecotizacion->fill($request->All());
        $detallecotizacion->save();
        bitacora('Modificó un registro');
        return redirect('/detallecotizaciones')->with('mensaje','Registro modificado con éxito');
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
        $detallecotizacion = Detallecotizacion::find($id);
        //$detallecotizacion->estado=2;
        $detallecotizacion->motivo=$motivo;
        $detallecotizacion->fechabaja=date('Y-m-d');
        $detallecotizacion->save();
        bitacora('Dió de baja a un registro');
        return redirect('/detallecotizaciones')->with('mensaje','Registro dado de baja');
    }

    public function alta($id)
    {
        $detallecotizacion = Detallecotizacion::find($id);
        //$detallecotizacion->estado=1;
        $detallecotizacion->motivo=null;
        $detallecotizacion->fechabaja=null;
        $detallecotizacion->save();
        Bitacora::bitacora('Dió de alta a un registro');
        return redirect('/detallecotizaciones')->with('mensaje','Registro dado de alta');
    }
}