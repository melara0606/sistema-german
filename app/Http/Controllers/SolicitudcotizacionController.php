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
use App\Presupuestodetalle;
use DB;

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

    public function index(Request $request)
    {
      $estado = $request->get('estado');
      if($estado=="" || $estado==1){
        $estado=1;
        $solicitudes = Solicitudcotizacion::with('presupuesto','formapago')->where('estado',$estado)->get();
        return view('solicitudcotizaciones.index',compact('solicitudes','estado'));
      }else if($estado==2){
        $solicitudes = Solicitudcotizacion::with('presupuesto','formapago')->where('estado',$estado)->get();
        return view('solicitudcotizaciones.index',compact('solicitudes','estado'));
      }else if($estado==3){
        $solicitudes = Solicitudcotizacion::with('presupuesto','formapago')->where('estado',$estado)->get();
        return view('solicitudcotizaciones.index',compact('solicitudes','estado'));
      }
    }

    public function getPresupuesto($id)
    {
        $presupuesto = Presupuesto::where('proyecto_id',$id)->with('presupuestodetalle')->first();
        return Presupuestodetalle::where('presupuesto_id',$presupuesto->id)->with('catalogo')->get();
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
        DB::beginTransaction();
        try{
          $presupuesto = Presupuesto::where('proyecto_id',$request->proyecto)->first();
          Solicitudcotizacion::create([
              "formapago_id" => $request->formapago,
              "unidad" => $request->unidad,
              "encargado" => $request->encargado,
              "cargo_encargado" => $request->cargo,
              "presupuesto_id" => $presupuesto->id,
              "lugar_entrega" => $request->lugar_entrega,
              "datos_contenido" => $request->datos_contenido,
          ]);

          $proyecto=Proyecto::findorFail($request->proyecto);
          $proyecto->estado=3;
          $proyecto->save();
          DB::commit();
          return redirect('solicitudcotizaciones')->with('mensaje','Solicitud registrada con éxito');
        }catch(\Exception $e){
          DB::rollback();
          return redirect('solicitudcotizaciones/create')->with('error','Solicitud no se pudo registrar');
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
        $solicitud=Solicitudcotizacion::findorFail($id);
        $presupuesto = Presupuesto::where('proyecto_id',$solicitud->presupuesto->proyecto->id)->with('presupuestodetalle')->first();
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
        $solicitud = Solicitudcotizacion::findorFail($id);
        $formapagos = Formapago::all();
        $unidades = Unidad::all();
        $proyectos = Proyecto::where('estado',1)->where('presupuesto',true)->get();
        return view('solicitudcotizaciones.edit',compact('solicitud','formapagos','unidades','proyectos'));
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
