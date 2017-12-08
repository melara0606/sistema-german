<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requisiciondetalle;

class RequisiciondetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('requisiciones.detalle.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return view('requisiciones.detalle.edit',compact('requisicion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisiciondetalle $requisiciondetalle)
    {
        $requisiciondetalle->fill($request->All());
        $requisiciondetalle->save();
        return redirect('requisiciones')->with('mensaje','Se modifico con exito');
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
        return redirect('requisiciones')->with('mensaje','Se modifico con exito');
    }
}
