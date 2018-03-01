<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitudcotizacion;
use App\Bitacora;
use App\Http\Requests\SolicitudcotizacionRequest;
use App\Formapago;
use App\Proyecto;
use App\Unidad;
use App\Presupuesto;

class SolicitudcotizacionController extends Controller
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
        $solicitudes = Solicitudcotizacion::with('proyecto','formapago')->get();
        return view('solicitudcotizaciones.index',compact('solicitudes'));
    }

    public function getPresupuesto($id)
    {
        return Presupuesto::where('proyecto_id',$id)->with('Presupuestodetalle')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $proyectos = Proyecto::where('estado',1)->where('presupuesto',true)->get();
      $formapagos = Formapago::all();
      $unidades = Unidad::all();
        return view('solicitudcotizaciones.create',compact('formapagos','proyectos','unidades'));
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
        Solicitudcotizacion::create([
            "formapago_id" => $request->formapago,
            "unidad" => $request->unidad,
            "encargado" => $request->encargado,
            "cargo_encargado" => $request->cargo,
            "proyecto_id" => $request->proyecto,
            "lugar_entrega" => $request->lugar_entrega,
            "datos_contenido" => $request->datos_contenido,
        ]);

        $proyecto=Proyecto::findorFail($request->proyecto);
        $proyecto->estado=3;
        $proyecto->save();
      /*\DB::beginTransaction();
      try{
        $count = $request->contador;

        $Solicitudcotizacion = Solicitudcotizacion::create([
            'formapago_id' => $request->formapago,
            'total' => $request->total,
          ]);
          /*for($i = 0; $i<$count;$i++){
            Presupuestodetalle::create([
              'presupuesto_id' => $presupuesto->id,
              'material' => $request->materiales[$i],
              'cantidad' => $request->cantidades[$i],
              'preciou' => $request->precios[$i],
            ]);
          }
          \DB::commit();
          return redirect('/formapagos')->with('mensaje','Solicitud registrada con éxito');
      }catch (\Exception $e){
        \DB::rollback();
        return redirect('/Solicitudcotizaciones/create')->with('error','Solicitud con error'.$e->getMessage());
      }
*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitud=Solicitudcotizacion::findorFail($id);
        $presupuesto = Presupuesto::where('proyecto_id',$solicitud->proyecto_id)->with('presupuestodetalle')->first();
        //dd($presupuesto);
        return view('solicitudcotizaciones.show',compact('solicitud','presupuesto'));
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
