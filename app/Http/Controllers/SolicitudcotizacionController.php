<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitudcotizacion;
use App\Bitacora;
use App\Categoria;
use App\Http\Requests\SolicitudcotizacionRequest;
use App\Formapago;
use App\Proyecto;
use App\Unidad;
use App\Presupuesto;
use App\Presupuestodetalle;
use App\PresupuestoSolicitud;
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
      //dd(Solicitudcotizacion::correlativo());
      //dd(Categoria::categoria_nombre(1));
      $estado = $request->get('estado');
      if($estado=="" || $estado==1){
        $estado=1;
        $solicitudes = PresupuestoSolicitud::with('presupuesto')->where('estado',$estado)->get();
        return view('solicitudcotizaciones.index',compact('solicitudes','estado'));
      }else if($estado==2){
        $solicitudes = PresupuestoSolicitud::with('presupuesto')->where('estado',$estado)->get();
        return view('solicitudcotizaciones.index',compact('solicitudes','estado'));
      }else if($estado==3){
        $solicitudes = PresupuestoSolicitud::with('presupuesto')->where('estado',$estado)->get();
        return view('solicitudcotizaciones.index',compact('solicitudes','estado'));
      }
    }

    public function getPresupuesto($idp)
    {
        $presupuesto = Presupuesto::where('categoria_id',$idp)->with('presupuestodetalle')->first();
        return Presupuestodetalle::where('presupuesto_id',$presupuesto->id)->with('catalogo')->get();
    }

    public function getCategorias($id)
    {
      $proyecto=Proyecto::findorFail($id);
      return $presupuesto=Presupuesto::where('proyecto_id',$proyecto->id)->where('estado',1)->with('categoria')->get();
    }

    public function versolicitudes($id)
    {
      $proyecto=Proyecto::findorFail($id);
      $presupuesto=Presupuesto::where('proyecto_id',$proyecto->id)->get();
        return view('solicitudcotizaciones.porproyecto',compact('proyecto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $proyectos = Proyecto::where('estado',3)->where('pre',true)->get();
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
          $presupuesto = Presupuesto::where('categoria_id',$request->categoria)->first();
          $solicitud=Solicitudcotizacion::create([
              "formapago_id" => $request->formapago,
              "unidad" => $request->unidad,
              "encargado" => $request->encargado,
              "cargo_encargado" => $request->cargo,
              "lugar_entrega" => $request->lugar_entrega,
              "numero_solicitud" => Solicitudcotizacion::correlativo(),
              'fecha_limite' => invertir_fecha($request->fecha_limite),
              'tiempo_entrega' => $request->tiempo_entrega,
          ]);

          $presupuesto->estado=2;
          $presupuesto->save();


          $pre=PresupuestoSolicitud::create([
            'solicitudcotizacion_id' => $solicitud->id,
            'presupuesto_id' => $presupuesto->id,
            'categoria_id' => $request->categoria,
          ]);

          $presuu=Presupuesto::where('estado',1)->count();
          if($presuu==0){
            $proyecto=Proyecto::findorFail($request->proyecto);
            $proyecto->estado=4;
            $proyecto->save();
          }
          DB::commit();
          return redirect('solicitudcotizaciones')->with('mensaje','Solicitud registrada con éxito');
        }catch(\Exception $e){
          dd($e);
          DB::rollback();
          return redirect('solicitudcotizaciones/create')->with('error','Ocurrió un error '.$e->getMessage());
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
      $solicitud=PresupuestoSolicitud::findorFail($id);
      $presupuesto = Presupuesto::where('categoria_id', $solicitud->categoria_id)->firstorFail();
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
