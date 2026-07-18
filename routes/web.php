<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefaccionController;
use App\Http\Controllers\MovimientoController; // Importado correctamente aquí arriba
use App\Models\Refaccion;
use Illuminate\Support\Facades\Route;

// Redirección inicial
Route::redirect('/', '/dashboard');

// Dashboard
Route::get('/dashboard', function () {

    $totalRefacciones = Refaccion::count();

    $totalPiezas = Refaccion::sum('cantidad');

    $stockBajo = Refaccion::whereColumn(
        'cantidad',
        '<=',
        'stock_minimo'
    )->count();

    $totalConStock = Refaccion::whereColumn(
        'cantidad',
        '>',
        'stock_minimo'
    )->count();

    $nivelInventario = $totalRefacciones > 0
        ? round(($totalConStock / $totalRefacciones) * 100)
        : 0;

    $nombresEquipos = [
        'Tratamiento',
        'Placas',
        'Bandas Cargadoras',
        'Bandas Collet',
        'Etiquetadoras',
        'Motor',
        'Reductor',
        'Plataformas',
    ];

    $equipos = [];

    foreach ($nombresEquipos as $nombreEquipo) {

        $totalEquipo = Refaccion::where('linea', $nombreEquipo)->count();

        $disponiblesEquipo = Refaccion::where('linea', $nombreEquipo)
            ->whereColumn('cantidad', '>', 'stock_minimo')
            ->count();

        $stockBajoEquipo = Refaccion::where('linea', $nombreEquipo)
            ->whereColumn('cantidad', '<=', 'stock_minimo')
            ->count();

        $porcentaje = $totalEquipo > 0
            ? round(($disponiblesEquipo / $totalEquipo) * 100)
            : 0;

        $equipos[] = [
            'nombre' => $nombreEquipo,
            'total' => $totalEquipo,
            'disponibles' => $disponiblesEquipo,
            'stock_bajo' => $stockBajoEquipo,
            'porcentaje' => $porcentaje,
        ];
    }

    $refaccionesStockBajo = Refaccion::whereColumn(
        'cantidad',
        '<=',
        'stock_minimo'
    )
        ->orderBy('cantidad', 'asc')
        ->get();

    return view('dashboard', compact(
        'totalRefacciones',
        'totalPiezas',
        'stockBajo',
        'nivelInventario',
        'equipos',
        'refaccionesStockBajo'
    ));

})->middleware(['auth', 'verified'])->name('dashboard');
// Todas las rutas protegidas por autenticación agrupadas correctamente
Route::middleware('auth')->group(function () {
    
    // Perfil de Usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::get('/plataformas', [RefaccionController::class, 'plataformas'])->name('refacciones.plataformas');
    // Catálogo de Refacciones y Búsqueda
    Route::resource('refacciones', RefaccionController::class);
    Route::get('/buscar-refacciones', [RefaccionController::class, 'buscarGlobal'])->name('refacciones.buscar');
    
  // Equipos
Route::get('/lineas/{numero}', [RefaccionController::class, 'linea'])
    ->name('refacciones.linea');

Route::get('/Etiquetadoras', [RefaccionController::class, 'Etiquetadoras'])
    ->name('refacciones.etiquetadoras');
Route::get('/plataformas', [RefaccionController::class, 'plataformas'])
    ->name('refacciones.plataformas');

    // Movimientos de Inventario (Index, Guardar y Eliminar)
    Route::get('/movimientos', [MovimientoController::class, 'index'])->name('movimientos.index');
    Route::post('/movimientos', [MovimientoController::class, 'store'])->name('movimientos.store');
    Route::delete('/movimientos/{id}', [MovimientoController::class, 'destroy'])->name('movimientos.destroy');

});

// Autenticación de Laravel Breeze / Jetstream
require __DIR__.'/auth.php';
