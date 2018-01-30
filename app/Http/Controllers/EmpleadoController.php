<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Tipocontrato;
use App\Bitacora;
use App\Http\Requests\EmpleadoRequest;

class EmpleadoController extends Controller
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
            $empleados = Empleado::where('estado',$estado)->get();
            return view('empleados.index',compact('empleados','estado'));
        }
        if($estado == 2)
        {
            $empleados = Empleado::where('estado',$estado)->get();
            return view('empleados.index',compact('empleados','estado'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipocontratos = Tipocontrato::where('estado',1);
        return view('empleados.create',compact('tipocontratos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {
        Empleado::create($request->All());
        return redirect('/empleados')->with('mensaje', 'Empleado registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::findorFail($id);
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findorFail($id);
        return view('empleados.edit',compact('empleado'));
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
        $empleado = Empleado::find($id);
        $empleado->fill($request->All());
        $empleado->save();
        bitacora('Modificó un registro');
        return redirect('/empleados')->with('mensaje','Registro modificado con éxito');
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
