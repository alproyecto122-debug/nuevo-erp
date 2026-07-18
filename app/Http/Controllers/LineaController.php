<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use Illuminate\Http\Request;

class LineaController extends Controller
{
    public function index()
    {
        $lineas = Linea::all(); // Trae todas las líneas de la base de datos
        return view('lineas.index', compact('lineas'));
    }
}
