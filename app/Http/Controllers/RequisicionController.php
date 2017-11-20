<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requisicion;
use App\Requisiciondetalle;

class RequisicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisiciones = Requisicion::where('estado',1)->get();
        return view('requisiciones.index',compact('requisiciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requisiciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->All());
        \DB::beginTransaction();
      try{
        $count = $request->contador;

        $requisicion = Requisicion::create([
            'unidad_admin' => $request->unidad_admin,
            'linea_trabajo' => $request->linea_trabajo,
            'fuente_financiamiento' => $request->fuente_financiamiento,
            'justificacion' => $request->justificacion,
            ]);
          for($i = 0; $i<$count;$i++){
            Requisiciondetalle::create([
              'requisicion_id' => $requisicion->id,
              'codigo' => $request->codigos[$i],
              'cantidad' => $request->cantidades[$i],
              'unidad_medida' => $request->unidades[$i],
              'descripcion' => $request->descripciones[$i],
            ]);
          }
          \DB::commit();
          return redirect('/requisiciones')->with('mensaje','Requisición registrada con éxito');
      }catch (\Exception $e){
        \DB::rollback();
        return redirect('/requisiciones/create')->with('error','Requisición con error'.$e->getMessage());
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
        $requisicion = Requisicion::findorFail($id);
        $detalles = Requisiciondetalle::where('requisicion_id',$requisicion->id)->get();
        //dd($requisicion);
        return view('requisiciones.show',compact('requisicion','detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
