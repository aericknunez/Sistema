<?php

namespace App\Http\Controllers;

use App\Models\Opciones;

class OpcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opciones = Opciones::all();
        return view('opcion.index', compact('opciones'));
    }

}
