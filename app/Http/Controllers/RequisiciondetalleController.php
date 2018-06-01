<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requisiciondetalle;
use App\UnidadMedida;
use App\Http\Requests\RequisiciondetalleRequest;

class RequisiciondetalleController extends Controller
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

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $medidas=UnidadMedida::all();
        return view('requisiciones.detalle.create',compact('id','medidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequisiciondetalleRequest $request)
    {
      try{
        Requisiciondetalle::create($request->All());
        return redirect('requisiciones/'.$request->requisicion_id);
      }catch (\Exception $e){
        return redirect('requisiciones')->with('error',$e->getMessage());
      }

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
        $requisicion=Requisiciondetalle::findorFail($id);

        $medidas=UnidadMedida::all();
        return view('requisiciones.detalle.edit',compact('requisicion','medidas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequisiciondetalleRequest $request,$id)
    {
        $requisiciondetalle=Requisiciondetalle::findorFail($id);
        $requisiciondetalle->fill($request->All());
        $requisiciondetalle->save();
        return redirect('requisiciones/'.$request->requisicion_id)->with('mensaje','Se modifico con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisiciondetalle $requisiciondetalle)
    {
        $requisiciondetalle->delete();
        return redirect('requisiciones')->with('mensaje','Se eliminó con exito');
    }
}
