<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        session(['idSearch' => $request->search]);
        return view('search.index');
    }
}