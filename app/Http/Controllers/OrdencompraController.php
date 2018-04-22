<?php

namespace App\Http\Controllers;

use App\Cotizacion;
use App\Proyecto;
use App\Fondo;
use App\Ordencompra;
use App\Presupuesto;
use App\PresupuestoSolicitud;
use Illuminate\Http\Request;
use DB;


class OrdencompraController extends Controller
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

     public function getCotizacion($id)
     {
        $proyecto=Proyecto::findorFail($id);
        $presupuesto=Presupuesto::where('proyecto_id',$proyecto->id)->first();
        $soli=PresupuestoSolicitud::where('presupuesto_id',$presupuesto->id)->first();
        return Cotizacion::where('presupuestosolicitud_id',$soli->id)->where('seleccionado',true)->with('proveedor','detallecotizacion')->orderby('id','asc')->get();
     }

     public function getMonto($id)
     {
        return Fondo::where('proyecto_id',$id)->with('fondocat')->get();
     }

    public function index(Request $request)
    {
      //dd(Ordencompra::correlativo());
      $estado = $request->get('estado');
      if($estado == "")
      {
        $ordenes = Ordencompra::get();
        return view('ordencompras.index',compact('ordenes','estado'));
      }
      if($estado == 1)
      {
        $ordenes = Ordencompra::where('estado',$estado)->get();
        return view('ordencompras.index',compact('ordenes','estado'));
      }
      if($estado == 2 )
      {
        $ordenes = Ordencompra::where('estado',$estado)->get();
        return view('ordencompras.index',compact('ordenes','estado'));
      }
      if($estado == 3)
      {
        $ordenes = Ordencompra::where('estado',$estado)->get();
        return view('ordencompras.index',compact('ordenes','estado'));
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectos = Proyecto::where('estado',4)->get();
        return view('ordencompras.create',compact('proyectos'));
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
        DB::beginTransaction();
        try{
          Ordencompra::create([
              'numero_orden' => Ordencompra::correlativo(),
              'fecha_inicio' => invertir_fecha($request->fecha_inicio),
              'fecha_fin' => invertir_fecha($request->fecha_fin),
              'cotizacion_id' => $request->cotizacion_id,
              'observaciones' => $request->observaciones,
              'direccion_entrega' => $request->direccion_entrega,
              'adminorden' => $request->adminorden,
          ]);
          $cotizacion = Cotizacion::findorFail($request->cotizacion_id);
          $cotizacion->estado=3;
          $cotizacion->save();
          $proyecto=Proyecto::findorFail($cotizacion->presupuestosolicitud->presupuesto->proyecto->id);
          $proyecto->estado=6;
          $proyecto->save();
          DB::commit();
          return redirect('ordencompras')->with('mensaje','Orden de compra registrada con éxito');
        }catch(\Excention $e){
          DB::rollback();
          return redirect('ordencompras/create')->with('error','ocurrió un error al guardar la orden de compras');
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
        $orden = Ordencompra::findorFail($id);
        return view('ordencompras.show',compact('orden'));
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
