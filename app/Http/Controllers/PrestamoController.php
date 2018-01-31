<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;
use App\Empleado;
use DB;

class PrestamoController extends Controller
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
      if($estado == "" )$estado=1;
      if ($estado == 1) {
          $prestamos = Prestamo::where('estado',$estado)->get();
          return view('prestamos.index',compact('prestamos','estado'));
      }
      if ($estado == 2) {
          $prestamos = Prestamo::where('estado',$estado)->get();
          return view('prestamos.index',compact('prestamos','estado'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //$empleados = Empleado::where('estado',1)->get();
      $empleados=DB::select('SELECT "id" FROM empleados WHERE estado =1 EXCEPT SELECT empleado_id FROM prestamos');
      //dd($empleados);
        return view('prestamos.create',compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Prestamo::create($request->All());
      return redirect('prestamos');
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
