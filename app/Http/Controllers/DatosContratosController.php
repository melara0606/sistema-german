<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Bitacora;
use App\Http\Requests\ProyectoRequest;

class DatosContratosController extends Controller
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
            $datosContrato = DatosContrato::where('estado',$estado)->get();
            return view('datosContratos.index',compact('datosContratos','estado'));
        }
        if ($estado == 2) {
            $datosContratos = DatosContrato::where('estado',$estado)->get();
            return view('datosContratos.index',compact('datosContratos','estado'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datosContratos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DatosContratoRequest $request)
    {
        DatosContrato::create($request->All());
        bitacora('Registró datos');
        return redirect('/datosContratos')->with('mensaje','Registro almacenado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datosContrato = DatosContrato::findorFail($id);

        return view('datosContratos.show', compact('datosContrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datosContrato = DatosContrato::find($id);
        return view('datosContratos.edit',compact('datosContrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(DatosContratoRequest $request, $id)
    {
        $datosContrato = DatosContrato::find($id);
        $datosContrato->fill($request->All());
        $datosContrato->save();
        bitacora('Modificó un datos');
        return redirect('/datosContratos')->with('mensaje','Registro modificado con éxito');
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
        //dd($id);
        $datosContrato = DatosContrato::find($id);
        $datosContrato->estado=2;
        $datosContrato->motivo=$motivo;
        $datosContrato->fechabaja=date('Y-m-d');
        $datosContrato->save();
        bitacora('Dió de baja a un registro');
        return redirect('/datosContratos')->with('mensaje','Registro dado de baja');
    }

    public function alta($id)
    {

        //$datos = explode("+", $cadena);
        ////$id=$datos[0];
        //$motivo=$datos[1];
        //dd($id);
        $datosContrato = DatosContrato::find($id);
        $datosContrato->estado=1;
        $datosContrato->motivo=null;
        $datosContrato->fechabaja=null;
        $datosContrato->save();
        Bitacora::bitacora('Dió de alta un registro');
        return redirect('/datosContratos')->with('mensaje','Registro dado de alta');
    }
}