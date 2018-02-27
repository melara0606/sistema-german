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
use App\Cuentaproy;
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

    public function getMontos($id)
    {
      return Fondo::where('proyecto_id',$id)->with('fondocat','proyecto')->get();
    }

    public function deleteMonto($id)
    {
      if(isset($id))
      {
        $fondo = Fondo::findorFail($id);
        $fondo->delete();

        return response()->json([
            'mensaje' => 'exito'
          ]);
      }
        
    }

    public function addMonto(Request $request)
    {
      if($request->Ajax())
      {
        Fondo::create([
          'proyecto_id' => $request->id,
          'fondocat_id' => $request->cat,
          'monto' => $request->monto,
        ]);
        return response()->json([
            'mensaje' => $request->All()
          ]);
      }
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
          $montosorg = $request->montosorg;
          $montos = $request->montos;

          $proyecto = Proyecto::create([
              'nombre' => $request->nombre,
              'monto' => $request->monto,
              'direccion' => $request->direccion,
              'fecha_inicio' => invertir_fecha($request->fecha_inicio),
              'fecha_fin' => invertir_fecha($request->fecha_fin),
              'motivo' => $request->motivo,
              'beneficiarios' => $request->beneficiarios,
          ]);

          if(isset($montos))
          {
            foreach ($montos as $monto) {
              Fondo::create([
                'proyecto_id' => $proyecto->id,
                'fondocat_id' => $monto['categoria'],
                'monto' => $monto['monto'],
              ]);
            }
          }

          Cuentaproy::create([
            'proyecto_id' => $proyecto->id,
            'monto_inicial' => $request->monto,
          ]);
          

/*          if(isset($montosorg))
          {
            foreach($montosorg as $montoorg)
            {
              Fondoorg::create([
                'proyecto_id' => $proyecto->id,
                'organizacion_id' => $montoorg['organizacion'],
                'monto' => $montoorg['montoorg'],
              ]);
            }
          }*/

          //bitacora('Registró un proyecto');
          
          
          DB::commit();
          return response()->json([
            'mensaje' => 'exito'
          ]);
      }catch (\Exception $e){
        DB::rollback();
        return response()->json([
          'mensaje' => $e->getMessage()
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
        //$presupuesto = Presupuesto::where('proyecto_id',$proyecto->id)->get()->first();
        return view('proyectos.show', compact('proyecto'));
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
      //dd($request->All());
        $proyecto = Proyecto::findorFail($id);
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
