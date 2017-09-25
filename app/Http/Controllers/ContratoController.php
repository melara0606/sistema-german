<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
use App\Http\Request\ContratoRequest;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::paginate(10);
        return view('contratos.index', compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contratos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoRequest $request)
    {
        Contrato::create($request->All());
        return redirect('/contratos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato = Contrato::findorFail($id);

        return view('contratos.show', compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contrato = Contrato::find($id);
        return view('contratos.edit',compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContratoRequest $request, $id)
    {
        $contrato = Contrato::find($id);
        $contrato->fill($request->All());
        $contrato->save();

        return redirect('/contratos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato=Contrato::find($id);
        $contrato->delete();

        return redirect('/contratos');
    }

    public function eliminados()
    {
        $contratos = Contrato::onlyTrashed()->paginate(10);
        return view('contratos.eliminados',compact('contratos'));
    }

    public function restore($id)
    {
        $contrato=Contrato::withTrashed()->where('id', '=', $id)->first();
        $contrato->restore();

        return redirect('/contratos');
    }
}
