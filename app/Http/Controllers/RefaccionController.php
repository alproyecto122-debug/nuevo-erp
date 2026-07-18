<?php

namespace App\Http\Controllers;

use App\Models\Refaccion;
use Illuminate\Http\Request;

class RefaccionController extends Controller
{
public function index(Request $request)
{
    $query = Refaccion::query();

    /*
     * Filtro por equipo
     */
    if ($request->filled('equipo')) {
        $query->where('linea', $request->equipo);
    }

    /*
     * Filtro por estado
     */
    if ($request->estado === 'stock_bajo') {
        $query->whereColumn('cantidad', '<=', 'stock_minimo');
    }

    if ($request->estado === 'disponible') {
        $query->whereColumn('cantidad', '>', 'stock_minimo');
    }

    $refacciones = $query
        ->orderBy('codigo')
        ->get();

    return view('refacciones.index', compact('refacciones'));
}
public function store(Request $request)
{
    
    $refaccion = new Refaccion();

    $refaccion->codigo = $request->codigo;
    $refaccion->nombre = $request->nombre;
    $refaccion->cantidad = $request->cantidad;
    $refaccion->linea = $request->linea;
    $refaccion->stock_minimo = 5;
    $refaccion->save();


    return redirect()->route('refacciones.index');
}

    public function show(string $id)
    {
        //
    }

public function linea($numero)
{
    $equipos = [
        11 => 'Tratamiento',
        12 => 'Placas',
        13 => 'Bandas Cargadoras',
        14 => 'Bandas Collet',
        15 => 'Motor',
        16 => 'Reductor',
    ];

    if (!isset($equipos[$numero])) {
        abort(404);
    }

    $nombreEquipo = $equipos[$numero];

    $refacciones = Refaccion::where('linea', $nombreEquipo)
        ->orderBy('codigo')
        ->get();

    return view('refacciones.linea', compact(
        'refacciones',
        'numero',
        'nombreEquipo'
    ));
}
public function Etiquetadoras()
{
    $refacciones = Refaccion::where('linea', 'Etiquetadoras')
                             ->orderBy('codigo', 'asc') // Orden agregada
                             ->get();

    return view('refacciones.Etiquetadoras', compact(
        'refacciones'
    ));
}
   public function edit(string $id)
{
    $refaccion = Refaccion::findOrFail($id);

    return view('refacciones.edit', compact('refaccion'));
}

    public function update(Request $request, string $id)
{
    $refaccion = Refaccion::findOrFail($id);
    $refacciones = Refaccion::orderBy('codigo', 'asc')->get();

    $refaccion->update([
        'codigo' => $request->codigo,
        'nombre' => $request->nombre,
        'cantidad' => $request->cantidad,
        'linea' => $request->linea,
    ]);

    return redirect()->route('refacciones.index');
}

    public function destroy(string $id)
{
    Refaccion::findOrFail($id)->delete();

    return redirect()->route('refacciones.index');
}

public function buscarGlobal(Request $request)
{
    $termino = trim($request->query('query', ''));

    $resultados = Refaccion::where(function ($consulta) use ($termino) {
        $consulta->where('codigo', 'LIKE', "%{$termino}%")
                 ->orWhere('nombre', 'LIKE', "%{$termino}%")
                 ->orWhere('linea', 'LIKE', "%{$termino}%");
    })
    ->orderBy('linea')
    ->orderBy('codigo')
    ->paginate(15);

    return view('refacciones.resultados', compact(
        'resultados',
        'termino'
    ));
}

    public function plataformas()
{
    $nombreEquipo = 'Plataformas';
    $refacciones = Refaccion::where('linea', $nombreEquipo)
        ->orderBy('codigo', 'asc')
        ->get();

    return view('refacciones.linea', compact(
        'refacciones',
        'nombreEquipo'
    ));
}
}
