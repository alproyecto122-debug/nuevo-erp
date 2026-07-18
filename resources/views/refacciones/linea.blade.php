@extends('layouts.admin')

@section('content')

<style>
    /*
     * Evita que la tabla ensanche toda la página.
     */
    .inventario-equipo-card {
        width: 100%;
        max-width: 100%;
        overflow: hidden;
        border: none;
        border-radius: 14px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
    }

    .inventario-equipo-card .card-header {
        padding: 18px 22px;
        background: #ffffff;
        border-bottom: 1px solid #e5e7eb;
    }

    .inventario-equipo-card .card-title {
        float: none;
        margin: 0;
        color: #1f2937;
        font-size: 20px;
        font-weight: 700;
    }

    .inventario-equipo-card .card-body {
        width: 100%;
        max-width: 100%;
        padding: 20px;
        overflow: hidden;
    }

    /*
     * Solo este contenedor se desplaza horizontalmente.
     */
    .tabla-equipo-wrapper {
        display: block;
        width: 100%;
        max-width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        border: 1px solid #dee2e6;
        border-radius: 10px;
        -webkit-overflow-scrolling: touch;
    }

    .tabla-equipo {
        width: 100%;
        min-width: 780px;
        margin: 0;
    }

    .tabla-equipo thead th {
        padding: 12px 14px;
        color: #374151;
        white-space: nowrap;
        vertical-align: middle;
        background: #f8f9fa;
        border-top: none;
    }

    .tabla-equipo tbody td {
        padding: 11px 14px;
        vertical-align: middle;
    }

    .tabla-equipo .columna-id {
        width: 65px;
        text-align: center;
    }

    .tabla-equipo .columna-codigo {
        min-width: 115px;
        white-space: nowrap;
    }

    .tabla-equipo .columna-nombre {
        min-width: 240px;
        white-space: normal;
        overflow-wrap: anywhere;
    }

    .tabla-equipo .columna-equipo {
        min-width: 160px;
        white-space: normal;
    }

    .tabla-equipo .columna-cantidad {
        min-width: 100px;
        text-align: center;
    }

    .tabla-equipo .columna-estado {
        min-width: 120px;
        white-space: nowrap;
        text-align: center;
    }

    .indicacion-deslizar {
        display: none;
    }

    @media (max-width: 767px) {
        .inventario-equipo-card {
            border-radius: 11px;
        }

        .inventario-equipo-card .card-header {
            padding: 15px;
            text-align: center;
        }

        .inventario-equipo-card .card-title {
            font-size: 18px;
        }

        .inventario-equipo-card .card-body {
            padding: 12px;
        }

        .indicacion-deslizar {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            margin-bottom: 10px;
            padding: 9px 12px;
            color: #4b5563;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 13px;
        }

        .tabla-equipo {
            width: 780px;
            min-width: 780px;
            font-size: 13px;
        }

        .tabla-equipo thead th,
        .tabla-equipo tbody td {
            padding: 9px 10px;
        }

        .tabla-equipo .columna-nombre {
            min-width: 220px;
        }

        .tabla-equipo .columna-equipo {
            min-width: 145px;
        }

        .tabla-equipo .badge {
            padding: 6px 8px;
            font-size: 11px;
        }
    }
</style>

<div class="card inventario-equipo-card">

    <div class="card-header">

        <h3 class="card-title">
            Inventario de {{ $nombreEquipo }}
        </h3>

    </div>

    <div class="card-body">

        <div class="indicacion-deslizar">
            <i class="bi bi-arrow-left-right"></i>
            Desliza la tabla hacia los lados
        </div>

        <div class="tabla-equipo-wrapper">

            <table class="table table-bordered table-striped table-hover tabla-equipo">

                <thead>
                    <tr>
                        <th class="columna-id">ID</th>
                        <th class="columna-codigo">Código</th>
                        <th class="columna-nombre">Nombre</th>
                        <th class="columna-equipo">Equipo</th>
                        <th class="columna-cantidad">Cantidad</th>
                        <th class="columna-estado">Estado</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($refacciones as $refaccion)

                        <tr>
                            <td class="columna-id">
                                {{ $loop->iteration }}
                            </td>

                            <td class="columna-codigo">
                                {{ $refaccion->codigo }}
                            </td>

                            <td class="columna-nombre">
                                {{ $refaccion->nombre }}
                            </td>

                            <td class="columna-equipo">
                                {{ $refaccion->linea }}
                            </td>

                            <td class="columna-cantidad">
                                {{ $refaccion->cantidad }}
                            </td>

                            <td class="columna-estado">

                                @if((int) $refaccion->cantidad <= (int) $refaccion->stock_minimo)

                                    <span class="badge badge-danger">
                                        Stock Bajo
                                    </span>

                                @else

                                    <span class="badge badge-success">
                                        Disponible
                                    </span>

                                @endif

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td
                                colspan="6"
                                class="text-center text-muted py-4"
                            >
                                No hay refacciones registradas para este equipo.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection