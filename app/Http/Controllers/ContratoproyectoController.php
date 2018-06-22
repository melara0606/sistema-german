<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContratoProyecto;
use App\Empleado;
use App\Proyecto;
use App\Cargo;
use App\Http\Requests\ContratoRequest;
use App\Http\Requests\EmpleadoRequest;
use App\Http\Requests\ContratoproyectoRequest;
use App\Http\Requests\CargoRequest;
use DB;

class ContratoproyectoController extends Controller
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
        if($estado == "" )$estado = 1;
        if($estado == 1)
        {
            $contratoproyectos = Contratoproyecto::where('estado',$estado)->get();
            return view('contratoproyectos.index',compact('contratoproyectos','estado'));
        }
        if($estado == 2)
        {
            $contratoproyectos = Contratoproyecto::where('estado',$estado)->get();
            return view('contratoproyectos.index',compact('contratoproyectos','estado'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectos = DB::table('proyectos')
                  ->whereNotExists(function ($query) {
                       $query->from('contrato_proyectos')
                          ->whereRaw('contrato_proyectos.proyecto_id = proyectos.id');
                      })->get();

        return view('contratoproyectos.create',compact('proyectos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoproyectoRequest $request)
    {
        ContratoProyecto::create([
            'proyecto_id' => $request->proyecto,
            'salario' => $request->salario,
            'motivo_contratacion' => $request->motivo_contratacion,
            'inicio_contrato' => invertir_fecha($request->inicio_contrato),
            'fin_contrato' => invertir_fecha($request->fin_contrato),
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => $request->hora_salida,
        ]);
        return redirect('contratoproyectos')->with('mensaje','Contrato registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contratoproyecto = ContratoProyecto::findorFail($id);
        return redirect('contratoproyectos.show',compact('contratoproyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contratoproyecto = Contratoproyecto::findorFail($id);
        return redirect('contratoproyectos.edit',compact('contratoproyecto'));
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
        $contratoproyecto = Contratoproyecto::find($id);
        $contratoproyecto->fill($request->All());
        $contratoproyecto->save();
        bitacora('Se modificó el contrato');
        return redirect('/contratoproyectos')->with('mensaje','Registro modificado con éxito');
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
