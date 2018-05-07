<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contratoproyecto;
use App\Empleado;
use App\Proyecto;
use App\Cargo;
use App\Http\Requests\ContratoRequest;
use App\Http\Requests\EmpleadoRequest;
use App\Http\Requests\ProyectoRequest;
use App\Http\Requests\ContratoproyectoRequest;
use App\Http\Requests\CargoRequest;


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
        $empleados = Empleado::all();
        //dd($empleados);
        $proyectos = Proyecto::all();
        $cargos = Cargo::all();
        $contratoproyectos = Contratoproyecto::all();
        return view('contratoproyectos.create',compact('empleados','proyectos','cargos','contratoproyectos'));
    }

    public function listarEmpleados()
    {
        return Empleado::where('estado',1)->get();
    }

    public function listarCargos()
    {
        return Cargo::get();
    }

    public function guargarCargo(Request $request)
    {
        if($request->ajax())
        {
            Cargo::create($request->All());
            return response()->json([
                'mensaje' => 'Cargo creado'
            ]);
        }
    }

    public function guardarEmpleado(Request $request)
    {
        if($request->ajax())
        {
            Empleado::create($request->All());
            return response()->json([
                'mensaje' => 'Empleado agregado'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoproyectoRequest $request)
    {
        Contratoproyecto::create([
            'empleado_id' => $request->empleado_id,
            'cargo_id' => $request->cargo_id,
            'salario' => $request->salario,
            'motivo' => $request->motivo,
        ]);
        return redirect('/contratoproyectos')->with('mensaje','Contrato registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contratoproyecto = Contratoproyecto::findorFail($id);
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
