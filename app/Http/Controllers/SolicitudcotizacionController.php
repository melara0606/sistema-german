<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitudcotizacion;
use App\Bitacora;
use App\Http\Requests\SolicitudcotizacionRequest;
use App\Formapago;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $formapagos = Formapago::all();
        return view('formapagos.create',compact('formapagos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      \DB::beginTransaction();
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
          }*/
          \DB::commit();
          return redirect('/formapagos')->with('mensaje','Solicitud registrada con éxito');
      }catch (\Exception $e){
        \DB::rollback();
        return redirect('/Solicitudcotizaciones/create')->with('error','Solicitud con error'.$e->getMessage());
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
