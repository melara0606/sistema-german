<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presupuesto;
use App\Presupuestodetalle;
use DB;

class PresupuestoDetalleController extends Controller
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

    public function getCatalogo($id)
    {
      return $categorias = DB::table('catalogos')
                ->whereNotExists(function ($query) use ($id) {
                     $query->from('presupuestodetalles')
                        ->whereRaw('presupuestodetalles.catalogo_id = catalogos.id')
                        ->whereRaw('presupuestodetalles.presupuesto_id ='.$id);
                    })->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $presupuesto=Presupuesto::findorFail($id);
      return view('presupuestos.detalle.create', compact('presupuesto'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax())
        {
          $presupuestos = $request->presupuestos;
          DB::beginTransaction();
          try{
            $presupuesto=Presupuesto::findorFail($request->presupuesto_id);
            $presupuesto->total=$presupuesto->total+$request->total;
            $presupuesto->save();

            foreach($presupuestos as $presu){
              Presupuestodetalle::create([
                'presupuesto_id' => $request->presupuesto_id,
                'cantidad' => $presu['cantidad'],
                'preciou' => $presu['precio'],
                'catalogo_id' => $presu['catalogo'],
              ]);
            }
              DB::commit();
            return response()->json([
              'mensaje' => 'exito',
              'id' => $request->presupuesto_id
            ]);
          }catch(\Exception $e){
              DB::rollback();
            return response()->json([
              'mensaje' => 'error'
            ]);
          }

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
        $detalle=Presupuestodetalle::findorFail($id);
        return view('presupuestos.detalle.edit',compact('detalle'));
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
      DB::beginTransaction();
        try{
          $detalle=Presupuestodetalle::findorFail($id);
          $detalle->fill($request->all());
          $detalle->save();
          $presupuesto=Presupuesto::findorFail($detalle->presupuesto->id);
          $detalles=Presupuestodetalle::where('presupuesto_id',$presupuesto->id)->get();
          $total=0.0;
          foreach($detalles as $de){
            $total=$total+$de->cantidad*$de->preciou;
          }
          $presupuesto->total=$total;
          $presupuesto->save();
          DB::commit();
          return redirect('presupuestos/'.$presupuesto->id)->with('mensaje','Elemento modificado exitosamente');
        }catch(\Exception $e){
          DB::rollback();
          return redirect('presupuestos/'.$presupuesto->id)->with('error','Ocurrió un error, contacte al administrador');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::beginTransaction();
      try{
        $detalle=Presupuestodetalle::findorFail($id);
        $detalle->delete();
        $presupuesto=Presupuesto::findorFail($detalle->presupuesto->id);
        $detalles=Presupuestodetalle::where('presupuesto_id',$presupuesto->id)->get();
        $total=0.0;
        foreach($detalles as $de){
          $total=$total+$de->cantidad*$de->preciou;
        }
        $presupuesto->total=$total;
        $presupuesto->save();
        DB::commit();
        return redirect('presupuestos/'.$presupuesto->id)->with('mensaje','Elemento eliminado exitosamente');
      }catch(\Exception $e){
        DB::rollback();
        return redirect('presupuestos/'.$presupuesto->id)->with('error','Ocurrió un error, contacte al administrador');

      }
    }
}
