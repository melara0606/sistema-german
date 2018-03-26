<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PresupuestoRequest;
use App\Proyecto;
use App\Presupuesto;
use App\Presupuestodetalle;
use App\Categoria;
use App\Catalogo;
use Session;
use DB;
use Validator;

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
        $categorias = Categoria::all();
       return view('presupuestos.create',compact('proyectos','categorias'));
    }

    public function guardarCategoria(Request $request)
    {
        if($request->Ajax())
        {
            try{
                Categoria::create($request->All());
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

    public function guardarDescripcion(Request $request)
    {
        if($request->Ajax())
        {
            try{
                Catalogo::create($request->All());
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

    public function getCategorias($item)
    {
        return Categoria::where('item',$item)->get();
    }

    public function getCatalogo($id)
    {
        return Catalogo::where('categoria_id',$id)->with('categoria')->get();
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
                      'cantidad' => $presu['cantidad'],
                      'preciou' => $presu['precio'],
                      'catalogo_id' => $presu['categoria'],
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
        $detalles = Presupuestodetalle::where('presupuesto_id',$presupuesto->id)->with('catalogo')->orderby('id','desc')->get();
        //dd($detalles);
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
