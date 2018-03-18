<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NegocioRequest;

// Models
use App\Negocio;
use App\Contribuyente;
use App\Rubro;

class NegocioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $negocios = Negocio::all();
        return view('negocios.index', compact("negocios"));
    }

    public function guardarContribuyente(Request $request)
    {
        if($request->ajax())
        {
            Contribuyente::create($request->All());
            return response()->json([
                'mensaje' => 'Registro creado']);
        }
    }

    public function listarContribuyentes()
    {
        return Contribuyente::where('estado',1)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rubros = Rubro::pluck('nombre', 'id');
        $contribuyentes = Contribuyente::pluck('nombre', 'id');
        return view('negocios.create', compact('contribuyentes', 'rubros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NegocioRequest $request)
    {
        $negocios = Negocio::create([
            'contribuyente_id' => $request->contribuyente_id,
            'direccion' => $request->direccion,
            'rubro_id' => $request->rubro_id
        ]);

        //Negocio::create($request->All());
        //bitacora('Registró un negocio');
        return redirect('negocios')->with('mensaje','Registro almacenado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $negocio = Negocio::findorFail($id);
        return view('negocios.show', compact('negocio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Negocio $negocio)
    {
        $rubros = Rubro::pluck('nombre', 'id');
        $contribuyentes = Contribuyente::pluck('nombre', 'id');
        return view('negocios.edit', compact('negocio', 'rubros', 'contribuyentes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(NegocioRequest $request, $id)
    {
        $rubro = Negocio::find($id);
        $rubro->fill($request->All());
        $rubro->save();
        
        bitacora('Modificó un negocio');
        return redirect('negocios')->with('mensaje','Registro modificado con éxito');
    }

    public function viewMapa($id) {
        $negocio = Negocio::findorFail($id);
        return view('negocios.mapa', compact('negocio'));
    }

    public function mapas(Request $request)
    {
        $all = $request->all();
        $negocio = Negocio::findOrFail($all['id']);
        $negocio->lat = $all['lat'];
        $negocio->lng = $all['lng'];
        $negocio->save();
        return $negocio;        
    }

    public function mapa()
    {
        return view('negocios.mapaGlobal');
    }

    public function mapasAll()
    {
        return Negocio::where('lat', '!=', 0)
            ->where('lng', '!=', 0)
            ->with('contribuyente', 'rubro')->get();
    }
}
