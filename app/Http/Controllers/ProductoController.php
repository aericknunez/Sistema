<?php

namespace App\Http\Controllers;


class ProductoController extends Controller
{
    /**
     * Muestra todos los productos agregados
     */
    public function index()
    {

        return view('producto.index');
    }

    /**
     * Vista para crear un nuevo producto
     */
    public function create()
    {

        // return view('admin.posts.create', compact('categories', 'tags'));
        return view('producto.create');
        
    }

    
}
