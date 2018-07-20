<?php

namespace App\Http\Controllers;

use App\User;
use App\Contribuyente;
use Illuminate\Http\Request;
use App\Http\Requests\ContribuyenteRequest;

class ContribuyenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('contribuyentes.index');
    }
}
