<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContratoProyecto;
use App\ContratacionProyecto;
use App\EPFuncione;
use DB;

class EPContratacionController extends Controller
{
    /*obtener el listado de empleados que no esten trabajando en otro proyecto de la alcaldía

    */
    public function listadeempleados($id)
    {
      return $empleados = DB::table('empleados')
                ->whereNotExists(function ($query) use ($id) {
                     $query->from('contratacion_proyectos')
                        ->whereRaw('contratacion_proyectos.empleado_id = empleados.id')
                        ->whereRaw('contratacion_proyectos.contratoproyecto_id = '.$id);
                    })->get();


    }

    /*

    */
    public function todosloscontratos()
    {
      return ContratacionProyecto::with('empleado','contratoproyecto')->get();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $proyectos = ContratoProyecto::where('estado',1)->get();
      //dd($proyectos);
        return view('contratacionproyectos.create',compact('proyectos'));
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
          DB::beginTransaction();
          try{
            $contrato = ContratacionProyecto::create([
              'contratoproyecto_id' => $request->proyecto,
              'empleado_id' => $request->empleado,
              'fecha_revision' => $request->fecharevision,
              'fecha_contratacion' => date('Y-m-d'),
            ]);

            foreach($request->funciones as $funcion){
              EPFuncione::create([
                'funcion' => $funcion['funcion'],
                'contratacionproyecto_id' => $contrato->id,
              ]);
            }
            DB::commit();
            return response()->json([
              'mensaje' => 'exito'
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
