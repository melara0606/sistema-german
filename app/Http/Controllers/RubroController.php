<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rubro;
use App\Bitacora;
use App\Http\Requests\RubroRequest;
use App\Carbon;

class RubroController extends Controller
{
   
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
            $rubros = Rubro::where('estado',$estado)->get();
            return view('rubros.index',compact('rubros','estado'));
        }
        if ($estado == 2) {
            $rubros = Rubro::where('estado',$estado)->get();
            return view('rubros.index',compact('rubros','estado'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rubros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RubroRequest $request)
    {
        Rubro::create($request->All());
        bitacora('Registró un rubro');
        return redirect('/rubros')->with('mensaje','Registro almacenado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rubro = Rubro::findorFail($id);

        return view('rubros.show', compact('rubro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rubro = Rubro::findorFail($id);
        return view('rubros.edit',compact('rubro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(RubroRequest $request, $id)
    {
        $rubro = Rubro::find($id);
        $rubro->fill($request->All());
        $rubro->save();
        bitacora('Modificó un rubro');
        return redirect('/rubros')->with('mensaje','Registro modificado con éxito');
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
        $rubro = Rubro::find($id);
        $rubro->estado=2;
        $rubro->motivo=$motivo;
        $rubro->fechabaja=date('Y-m-d');
        $rubro->save();
        bitacora('Dió de baja a un rubro');
        return redirect('/rubros')->with('mensaje','Rubro dado de baja');
    }

    public function alta($id)
    {

        //$datos = explode("+", $cadena);
        ////$id=$datos[0];
        //$motivo=$datos[1];
        //dd($id);
        $rubro = Rubro::find($id);
        $rubro->estado=1;
        $rubro->motivo=null;
        $rubro->fechabaja=null;
        $rubro->save();
        Bitacora::bitacora('Dió de alta a un rubro');
        return redirect('/rubros')->with('mensaje','Proyecto dado de alta');
    }
}