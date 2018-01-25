<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
use App\Tipocontrato;
use App\Empleado;
use App\Cargo;
use App\Bitacora;
use App\Http\Requests\ContratoRequest;

class ContratoController extends Controller
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
            $contratos = Contrato::where('estado',$estado)->get();
            return view('contratos.index',compact('contratos','estado'));
        }
        if ($estado == 2) {
            $contratos = Contrato::where('estado',$estado)->get();
            return view('contratos.index',compact('contratos','estado'));
        }
    }

    public function listarEmpleados()
    {
        return Empleado::where('estado',1)->get();
    }

    public function listarTipos()
    {
        return Tipocontrato::get();
    }

    public function listarCargos()
    {
        return Cargo::get();
    }

    public function guardarTipo(Request $request)
    {
      if($request->ajax())
      {
        Tipocontrato::create($request->All());
        return response()->json([
          'mensaje' => 'Tipo de contrato creado con exito'
        ]);
      }
    }

    public function guardarCargo(Request $request)
    {
      if($request->ajax())
      {
        Cargo::create($request->All());
        return response()->json([
          'mensaje' => 'Tipo de contrato creado con exito'
        ]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tipocontratos = Tipocontrato::all();
      $empleados = Empleado::all();
      $cargos = Cargo::all();
        return view('contratos.create',compact('tipocontratos','empleados','cargos'));

        //return view('contratos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoRequest $request)
    {
        Contrato::create($request->All());
        bitacora('Registró un Contrato');
        return redirect('/contratos')->with('mensaje','Registro almacenado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato = Contrato::findorFail($id);

        return view('contratos.show', compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contrato = Contrato::find($id);
        return view('contratos.edit',compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ContratoRequest $request, $id)
    {
        $contrato = Contrato::find($id);
        $contrato->fill($request->All());
        $contrato->save();
        bitacora('Modificó un Contrato');
        return redirect('/contratos')->with('mensaje','Registro modificado con éxito');
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
        $contrato = Contrato::find($id);
        $contrato->estado=2;
        $contrato->motivo=$motivo;
        $contrato->fechabaja=date('Y-m-d');
        $contrato->save();
        bitacora('Dió de baja a un contrato');
        return redirect('/contratos')->with('mensaje','Contrato dado de baja');
    }

    public function alta($id)
    {

        //$datos = explode("+", $cadena);
        ////$id=$datos[0];
        //$motivo=$datos[1];
        //dd($id);
        $contrato = Contrato::find($id);
        $contrato->estado=1;
        $contrato->motivo=null;
        $contrato->fechabaja=null;
        $contrato->save();
        Bitacora::bitacora('Dió de alta a un contrato');
        return redirect('/contratos')->with('mensaje','Contrato dado de alta');
    }
}
