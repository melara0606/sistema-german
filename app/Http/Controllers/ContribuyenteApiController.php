<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribuyente;
use App\Inmueble;

class ContribuyenteApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contribuyente::select('id', 'nombre', 'telefono', 'dui', 'nit', 'estado')
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "['Todo Correcto']";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Contribuyente::where('id', $id)
                ->with(['inmuebles'])
                ->take(1)
                ->first();
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
    public function destroy(Request $request, $id)
    {
        $contribuyente = Contribuyente::find($id)->update([
            "estado" => $request->get('estado')
        ]);

        return "{ 'message' : 'Todo esta correcto' }";
    }

    public function onUpdateContribuyenteInmueble(Request $request){
        $parameters = $request->all();
        $result =  Inmueble::where('id', $parameters['id'])->update([
            'latitude'      => $parameters['lat'] ,
            'longitude'     => $parameters['lng']
        ]);

        if($result){
            return array(
                "data"      => Inmueble::find($parameters['id']),
                "message"   => 'Hemos actualizado con exito la ubicacion',
                "response"  => true
            );
        }else{
            return array(
                "message"   => 'Tenemos problema con el servidor por le momento. intenta mas tarde',
                "response"  => false
            );
        }
    }

    public function onUpdateContribuyente(Request $request){
      $parameters = $request->all()['people'];
      //$parameters = $parameters['people'];
      
      $result = Contribuyente::find($parameters['id'])->update([
        "nombre"      => $parameters['nombre'],
        "dui"         => $parameters['dui'],
        "nit"         => $parameters['nit'],
        "telefono"    => $parameters['telefono'],
        "nacimiento"  => $parameters['fechabaja'],
        "direccion"   => $parameters['direccion']
      ]);
      
      if($result){
        return array(
          "data"      => Contribuyente::find($parameters['id']),
          "message"   => 'Hemos actualizado al contribuyente con exito',
          "response"  => true
        );
      }else{
        return array(
          "message"   => 'Tenemos problema con el servidor por le momento. intenta mas tarde',
          "response"  => false
        );
      }
        
    }

    public function darBajaContribuyente(Request $request) {
        $parameters = $request->all();
        
        $result = Contribuyente::where('id', $parameters['id'])->update([
            "fechabaja" => date('Y-m-d'),
            "motivo"    => $parameters['motivo'],
            "estado"    => $parameters['estado']
        ]);

        if($result){
            return array(
                "data"      => Contribuyente::find($parameters['id']),
                "message"   => 'Hemos actualizado con exito la ubicacion',
                "response"  => true
            );
        }else{
            return array(
                "message"   => 'Tenemos problema con el servidor por le momento. intenta mas tarde',
                "response"  => false
            );
        }
    }
}
