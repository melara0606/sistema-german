<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PresupuestoRequest;
use App\Proyecto;
use App\Presupuesto;
use App\Presupuestodetalle;
use Session;
use DB;

class PresupuestoController extends Controller
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
        $presupuestos = Presupuesto::all();
        return view('presupuestos.index',compact('presupuestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //$query = 'select proyectos."id",proyectos.nombre from proyectos inner join presupuestos on proyectos."id"=presupuestos."id"';
      //$proyectos = \DB::select(\DB::raw($query));

      //$proyectos=DB::select('SELECT "id" FROM proyectos WHERE estado =1 EXCEPT SELECT proyecto_id FROM presupuestos');
        $proyectos = Proyecto::where('estado',1)->where('presupuesto',false)->get();
       return view('presupuestos.create',compact('proyectos'));
    }

    public function crear($id)
    {
      $proyecto = Proyecto::findorFail($id);
      return view('presupuestos.create',compact('proyecto'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PresupuestoRequest $request)
    {
        if ($request->ajax()) {
            DB::beginTransaction();
            try{
                $presupuestos = $request->presupuestos;

                $presupuesto = Presupuesto::create([
                    'proyecto_id' => $request->proyecto_id,
                    'total' => $request->total,
                ]);

                  foreach($presupuestos as $presu){
                    Presupuestodetalle::create([
                      'presupuesto_id' => $presupuesto->id,
                      'material' => $presu['descripcion'],
                      'cantidad' => $presu['cantidad'],
                      'preciou' => $presu['precio'],
                      'unidad' => $presu['unidad'],
                      'item' => $presu['item'],
                      'categoria' => $presu['categoria'],
                    ]);
                  }
                  $proyecto = Proyecto::findorFail($request->proyecto_id);
                  $proyecto->presupuesto=true;
                  $proyecto->save();
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presupuesto = Presupuesto::findorFail($id);
        $detalles = Presupuestodetalle::where('presupuesto_id',$presupuesto->id)->orderby('item','ASC')->get();
        return view('presupuestos.show',compact('presupuesto','detalles'));
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
