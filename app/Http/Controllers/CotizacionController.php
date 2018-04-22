<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Proveedor;
use App\Cotizacion;
use App\Detallecotizacion;
use App\Bitacora;
use App\Presupuesto;
use App\Presupuestodetalle;
use App\PresupuestoSolicitud;
use DB;
use App\Http\Requests\CotizacionRequest;

class CotizacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $estado = $request->get('estado');
        if($estado == "" ){
          $cotizaciones = Cotizacion::get();
          return view ('cotizaciones.index',compact('cotizaciones','estado'));
        }
        if ($estado == 1) {
            $cotizaciones = Cotizacion::where('estado',$estado)->get();
            return view('cotizaciones.index',compact('cotizaciones','estado'));
        }
        if ($estado == 2) {
            $cotizaciones = Cotizacion::where('estado',$estado)->get();
            return view('cotizaciones.index',compact('cotizaciones','estado'));
        }
        if ($estado == 3) {
            $cotizaciones = Cotizacion::where('estado',$estado)->get();
            return view('cotizaciones.index',compact('cotizaciones','estado'));
        }
    }

    public function seleccionar(Request $request)
    {
        if($request->Ajax())
        {
          try{
            $cotizacion=Cotizacion::findorFail($request->idcot);
            $cotizacion->seleccionado=true;
            $cotizacion->estado=2;
            $cotizacion->save();

            $proyecto=Proyecto::findorFail($request->idproy);
            $proyecto->estado=4;
            $proyecto->save();

            return response()->json([
              'mensaje' => 'exito'
            ]);
          }catch(\Exception $e){

            return response()->json([
              'mensaje' => $e->getMessage()
            ]);
          }

        }
    }

    public function cuadros()
    {
        $proyectos = Proyecto::where('estado',3)->where('presupuesto',true)->get();
        return view('cotizaciones.cuadros',compact('proyectos'));
    }

    public function realizarCotizacion($id)
    {
        $proveedores = Proveedor::where('estado',1)->get();
        $solicitud=PresupuestoSolicitud::findorFail($id);
        $presu=Presupuesto::where('categoria_id',$solicitud->categoria_id)->firstorFail();
        $presupuestos = Presupuestodetalle::where('presupuesto_id',$presu->id)->get();
        //dd($presupuestos);
      return view('cotizaciones.create',compact('proveedores','presupuestos','solicitud'));
    }

    public function cotizar($id)
    {
        //return $cotizaciones = Cotizacion::where('proyecto_id',$id)->with('proveedor')->get();
        $proyecto = Proyecto::where('estado',3)->where('presupuesto',true)->findorFail($id);
        $presupuesto=Presupuesto::where('proyecto_id',$proyecto->id)->first();
        $solicitud = PresupuestoSolicitud::where('presupuesto_id',$presupuesto->id)->first();
        $detalles = Presupuestodetalle::where('presupuesto_id',$presupuesto->id)->where('categoria_id',$solicitud->categoria_id)->get();
        $cotizaciones = Cotizacion::where('presupuestosolicitud_id',$solicitud->id)->with('detallecotizacion')->get();
        return view('cotizaciones.cotizar',compact('presupuesto','cotizaciones','detalles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectos = Proyecto::where('estado',3)->where('presupuesto',true)->get();
        $proveedores = Proveedor::where('estado',1)->get();
        $cotizaciones = Cotizacion::all();
        return view('cotizaciones.create',compact('proyectos','proveedores','cotizaciones'));
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
        try
        {
            $presupuesto = Presupuesto::where('proyecto_id',$request->proyecto_id)->first();
            $count = count($request->precios);
            $cotizacion = Cotizacion::create([
                'proveedor_id' => $request->proveedor,
                'presupuestosolicitud_id' => $request->id,
                'descripcion' => $request->descripcion,
            ]);
            for($i=0;$i<$count;$i++)
            {
                Detallecotizacion::create([
                    'cotizacion_id' => $cotizacion->id,
                    'descripcion' => $request->descripciones[$i],
                    'marca' => $request->marcas[$i],
                    'unidad_medida' => $request->unidades[$i],
                    'cantidad' => $request->cantidades[$i],
                    'precio_unitario' => $request->precios[$i],
                ]);
            }
            DB::commit();
            bitacora('Registró una cotización');
            return redirect('cotizaciones')->with('mensaje','Registro almacenado con éxito');
        }catch (\Exception $e){
            DB::rollback();
            return redirect('cotizaciones/create')->with('error',$e->getMessage());
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
        $cotizacion = Cotizacion::where('estado',1)->findorFail($id);

        return view('cotizaciones.show', compact('cotizacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cotizacion = Cotizacion::findorFail($id);
        return view('cotizaciones.edit',compact('cotizacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(CotizacionRequest $request, $id)
    {
      try{
        $cotizacion = Cotizacion::findorFail($id);
        $cotizacion->fill($request->All());
        $cotizacion->save();
        bitacora('Modificó una cotización');
        return redirect('/cotizaciones')->with('mensaje','Registro modificado con éxito');
      }catch(\Exception $e){
        return redirect('/cotizaciones/create')->with('error','Ocurrió un error, contacte al administrador');
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
        //
    }

    public function baja($cadena)
    {
      try{
        $datos = explode("+", $cadena);
        $id=$datos[0];
        $motivo=$datos[1];
        $cotizacion = Cotizacion::find($id);
        $cotizacion->estado=2;
        $cotizacion->motivo=$motivo;
        $cotizacion->fechabaja=date('Y-m-d');
        $cotizacion->save();
        bitacora('Dió de baja a un cotizacion');
        return redirect('/cotizaciones')->with('mensaje','Cotización dada de baja');
      }catch(\Exception $e){
        return redirect('/cotizaciones/create')->with('error','Ocurrió un error, contacte al administrador');
      }

    }

    public function alta($id)
    {
      try{
        $cotizacion = Cotizacion::find($id);
        $cotizacion->estado=1;
        $cotizacion->motivo=null;
        $cotizacion->fechabaja=null;
        $cotizacion->save();
        Bitacora::bitacora('Dió de alta a un cotizacion');
        return redirect('/cotizaciones')->with('mensaje','Cotización dada de alta');
      }catch(\Exception $e){
        return redirect('/cotizaciones/create')->with('error','Ocurrió un error, contacte al administrador');
      }
    }
}
