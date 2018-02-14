<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Organizacion;
use App\Bitacora;
use App\Presupuesto;
use App\Presupuestodetalle;
use App\Fondocat;
use App\Fondo;
use App\Fondoorg;
use App\Http\Requests\ProyectoRequest;
use App\Http\Requests\FondocatRequest;
use DB;

class ProyectoController extends Controller
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
        if($estado == "" )$estado=1;
        if ($estado == 1) {
            $proyectos = Proyecto::where('estado',$estado)->get();
            return view('proyectos.index',compact('proyectos','estado'));
        }
        if ($estado == 2) {
            $proyectos = Proyecto::where('estado',$estado)->get();
            return view('proyectos.index',compact('proyectos','estado'));
        }
    }

    public function guardarOrganizacion(Request $request)
    {
      if($request->ajax())
      {
        Organizacion::create($request->All());
        return response()->json([
          'mensaje' => 'Organización creada exitosamente'
        ]);
      }
    }

    public function guardarCategoria(FondocatRequest $request)
    {
      if($request->ajax())
      {
        Fondocat::create($request->All());
        return response()->json([
          'mensaje' => 'Organización creada exitosamente'
        ]);
      }
    }

    public function listarOrganizaciones()
    {
        return Organizacion::get();
    }

    public function listarFondos()
    {
        return Fondocat::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizaciones = Organizacion::all();
        return view('proyectos.create',compact('organizaciones'));

        //return view('proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProyectoRequest $request)
    {
      if($request->ajax())
      {
        DB::beginTransaction();
        try{
        //invertir las fechas
        $inicio = $request->fecha_inicio; //dd-mm-yy
        $invert = explode("-",$inicio);
        $inicio_invert = $invert[2]."-".$invert[1]."-".$invert[0];
        $fin = $request->fecha_fin; //dd-mm-yy
        $invertf = explode("-",$fin);
        $fin_invert = $invertf[2]."-".$invertf[1]."-".$invertf[0];

        $montosorg = $request->montosorg;
        $count = count($montosorg);


        $proyecto = Proyecto::create([
            'nombre' => $request->nombre,
            'monto' => $request->monto,
            'direccion' => $request->direccion,
            'fecha_inicio' => $inicio_invert,
            'fecha_fin' => $fin_invert,
            'organizacion_id' => $request->organizacion_id,
            'motivo' => $request->motivo,
            'beneficiarios' => $request->beneficiarios,
        ]);

          foreach ($montos as $monto) {
            Fondo::create([
              'proyecto_id' => $proyecto->id,
              'fondocat_id' => $monto['categoria'],
              'monto' => $monto['monto'],
            ]);
          }

          if($count > 0)
          {
            foreach($montosorg as $montoorg)
            {
              Fondoorg::create([
                'proyecto_id' => $proyecto->id,
                'organizacion_id' => $montoorg['organizacion'],
                'monto' => $montoorg['montoorg'],
              ]);
            }
          }

          bitacora('Registró un proyecto');
          DB::commit();
          return response()->json([
            'mensaje' => 'exito'
          ]);
      }catch (\Exception $e){
        DB::rollback();
        return response()->json([
          'mensaje' => 'error'
        ]);
        }




      }
        //dd($request->all());
        /*Proyecto::create([
            'nombre' => $request->nombre,
            'monto' => $request->monto,
            'direccion' => $request->direccion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'organizacion_id' => $request->organizacion_id,
            'motivo' => $request->motivo
        ]);

        $presupuesto = Presupuesto::create([
          'proyecto_id' => $proyecto->id,
          'total' => 0,
        ]);
        bitacora('Registró un proyecto');
        return redirect('proyectos')->with('mensaje','Registro almacenado con éxito');
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
        $proyecto = Proyecto::findorFail($id);
        $presupuesto = Presupuesto::where('proyecto_id',$proyecto->id)->firstorFail();
        $detalles = Presupuestodetalle::where('presupuesto_id',$presupuesto->id)->get();
        return view('proyectos.show', compact('proyecto','presupuesto','detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        $organizaciones = Organizacion::all();
        return view('proyectos.edit',compact('proyecto','organizaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ProyectoRequest $request, $id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->fill($request->All());
        $proyecto->save();
        bitacora('Modificó un Proyecto');
        return redirect('/proyectos')->with('mensaje','Registro modificado con éxito');
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

        $datos = explode("+", $cadena);
        $id=$datos[0];
        $motivo=$datos[1];
        //dd($id);
        $proyecto = Proyecto::find($id);
        $proyecto->estado=2;
        $proyecto->motivo=$motivo;
        $proyecto->fechabaja=date('Y-m-d');
        $proyecto->save();
        bitacora('Dió de baja a un proyecto');
        return redirect('/proyectos')->with('mensaje','Proyecto dado de baja');
    }

    public function alta($id)
    {

        //$datos = explode("+", $cadena);
        ////$id=$datos[0];
        //$motivo=$datos[1];
        //dd($id);
        $proyecto = Proyecto::find($id);
        $proyecto->estado=1;
        $proyecto->motivo=null;
        $proyecto->fechabaja=null;
        $proyecto->save();
        Bitacora::bitacora('Dió de alta a un proyecto');
        return redirect('/proyectos')->with('mensaje','Proyecto dado de alta');
    }
}
