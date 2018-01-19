<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detallecotizacion;
use App\Bitacora;
/*use App\Http\Requests\DetallecotizacionRequest;

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Presupuesto;
use App\Presupuestodetalle;*/

class DetallecotizacionController extends Controller
{
    /**
     * Display a listing of  resource.
     *the
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
      //$proyectos = Proyecto::all();
        return view('detallecotizaciones.create');
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

        $detallecotizacion = Detallecotizacion::create([
            'proyecto_id' => $request->proyecto,
            'total' => $request->total,
          ]);
          for($i = 0; $i<$count;$i++){
            Detallecotizacion::create([
              'cotizacion_id' => $detallecotizacion->id,
              'unidad_medida' => $request->materiales[$i],
              'cantidad' => $request->cantidades[$i],
              'precio_unitario' => $request->precios[$i],
            ]); //////////////PENDIENTE DESDE AQUI/////////////////
          }
          \DB::commit();
          return redirect('/proyectos')->with('mensaje','Presupuesto registrado con éxito');
      }catch (\Exception $e){
        \DB::rollback();
        return redirect('/presupuestos/create')->with('error','Presupuesto con error'.$e->getMessage());
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
