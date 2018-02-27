<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuentaproy;
use App\Proyecto;
use App\Http\Requests\CuentaRequest;
use App\Http\Requests\CuentauRequest;

class CuentaController extends Controller
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
    public function index()
    {
        $cuentas = Cuentaproy::all();
        return view('cuentas.index',compact('cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectos=Proyecto::all();
        return view('cuentas.create',compact('proyectos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CuentaRequest $request)
    {
        Cuenta::create($request->All());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cuenta $cuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuentaproy $cuenta)
    {
        $proyectos=Proyecto::all();
        return view('cuentas.edit',compact('cuenta','proyectos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuentaproy $cuenta)
    {
        $cuenta->fill($request->All());
        $cuenta->save();
        return redirect('cuentas')->with('mensaje','Cuenta modificada con éxito');
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
