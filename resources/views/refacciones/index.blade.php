@extends('layouts.admin')

@section('content')

<style>
    .refacciones-card {
        width: 100%;
        max-width: 100%;
        overflow: hidden;
        border: none;
        border-radius: 14px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
    }

    .refacciones-card .card-header {
        padding: 18px 22px;
        background: #ffffff;
        border-bottom: 1px solid #e5e7eb;
    }

    .refacciones-card .card-title {
        float: none;
        margin: 0;
        color: #1f2937;
        font-size: 20px;
        font-weight: 700;
    }

    .refacciones-card .card-body {
        width: 100%;
        max-width: 100%;
        padding: 22px;
    }

    /* Formulario de registro */
    .registro-refacciones label,
    .filtros-refacciones label {
        margin-bottom: 6px;
        color: #374151;
        font-weight: 600;
    }

    .registro-refacciones .form-group,
    .filtros-refacciones .form-group {
        margin-bottom: 15px;
    }

    .registro-refacciones .form-control,
    .filtros-refacciones .form-control {
        min-height: 42px;
        border-radius: 8px;
    }

    .registro-refacciones .btn,
    .filtros-refacciones .btn {
        min-height: 42px;
        border-radius: 8px;
    }

    .separador-refacciones {
        margin: 12px 0 22px;
        border-color: #e5e7eb;
    }

    /* Filtros */
    .filtros-refacciones {
        margin-bottom: 22px;
        padding: 18px;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
    }

    .filtros-titulo {
        margin: 0 0 15px;
        color: #1f2937;
        font-size: 17px;
        font-weight: 700;
    }

    .contador-resultados {
        margin-bottom: 12px;
        color: #6b7280;
        font-size: 14px;
    }

    /* Tabla */
    .tabla-refacciones-wrapper {
        display: block;
        width: 100%;
        max-width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        border: 1px solid #dee2e6;
        border-radius: 10px;
        -webkit-overflow-scrolling: touch;
    }

    .tabla-refacciones {
        width: 100%;
        min-width: 900px;
        margin-bottom: 0;
    }

    .tabla-refacciones thead th {
        padding: 12px 14px;
        color: #374151;
        white-space: nowrap;
        vertical-align: middle;
        background: #f8f9fa;
        border-top: none;
    }

    .tabla-refacciones tbody td {
        padding: 11px 14px;
        vertical-align: middle;
    }

    .tabla-refacciones .columna-id {
        width: 65px;
        text-align: center;
    }

    .tabla-refacciones .columna-codigo {
        min-width: 110px;
        white-space: nowrap;
    }

    .tabla-refacciones .columna-nombre {
        min-width: 230px;
        white-space: normal;
        overflow-wrap: anywhere;
    }

    .tabla-refacciones .columna-equipo {
        min-width: 165px;
        white-space: normal;
    }

    .tabla-refacciones .columna-cantidad {
        min-width: 100px;
        text-align: center;
    }

    .tabla-refacciones .columna-estado {
        min-width: 120px;
        text-align: center;
        white-space: nowrap;
    }

    .tabla-refacciones .columna-acciones {
        min-width: 170px;
    }

    .acciones-refaccion {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .acciones-refaccion form {
        display: inline-flex;
        margin: 0;
    }

    .acciones-refaccion .btn {
        white-space: nowrap;
        border-radius: 6px;
    }

    .indicacion-deslizar {
        display: none;
    }

    /* Solo teléfonos */
    @media (max-width: 767px) {
        .refacciones-card {
            border-radius: 11px;
        }

        .refacciones-card .card-header {
            padding: 15px;
            text-align: center;
        }

        .refacciones-card .card-title {
            font-size: 18px;
        }

        .refacciones-card .card-body {
            padding: 14px;
        }

        .registro-refacciones .form-group,
        .filtros-refacciones .form-group {
            margin-bottom: 12px;
        }

        .filtros-refacciones {
            margin-bottom: 18px;
            padding: 14px;
        }

        .filtros-titulo {
            text-align: center;
            font-size: 16px;
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

        .tabla-refacciones {
            width: 850px;
            min-width: 850px;
            font-size: 13px;
        }

        .tabla-refacciones thead th,
        .tabla-refacciones tbody td {
            padding: 9px 10px;
        }

        .tabla-refacciones .columna-nombre {
            min-width: 210px;
        }

        .acciones-refaccion .btn {
            padding: 5px 8px;
            font-size: 12px;
        }

        .tabla-refacciones .badge {
            padding: 6px 8px;
            font-size: 11px;
        }
    }
</style>


<div class="card refacciones-card">

    <div class="card-header">
        <h3 class="card-title">
            Registro de refacciones
        </h3>
    </div>

    <div class="card-body">

        {{-- Formulario para registrar refacciones --}}
        <form
            action="{{ route('refacciones.store') }}"
            method="POST"
            class="registro-refacciones"
        >

            @csrf

            <div class="row">

                <div class="col-12 col-md-4">
                    <div class="form-group">

                        <label for="codigo">
                            Código
                        </label>

                        <input
                            type="text"
                            id="codigo"
                            name="codigo"
                            class="form-control"
                            value="{{ old('codigo') }}"
                            required
                        >

                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group">

                        <label for="nombre">
                            Nombre
                        </label>

                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            class="form-control"
                            value="{{ old('nombre') }}"
                            required
                        >

                    </div>
                </div>

                <div class="col-6 col-md-2">
                    <div class="form-group">

                        <label for="cantidad">
                            Cantidad
                        </label>

                        <input
                            type="number"
                            id="cantidad"
                            name="cantidad"
                            class="form-control"
                            value="{{ old('cantidad') }}"
                            min="0"
                            required
                        >

                    </div>
                </div>

                <div class="col-6 col-md-2">
                    <div class="form-group">

                        <label for="linea">
                            Equipo
                        </label>

                        <select
                            id="linea"
                            name="linea"
                            class="form-control"
                            required
                        >
                            <option value="">
                                Seleccionar
                            </option>

                            <option value="Tratamiento"
                                {{ old('linea') === 'Tratamiento' ? 'selected' : '' }}>
                                Tratamiento
                            </option>

                            <option value="Placas"
                                {{ old('linea') === 'Placas' ? 'selected' : '' }}>
                                Placas
                            </option>

                            <option value="Bandas Cargadoras"
                                {{ old('linea') === 'Bandas Cargadoras' ? 'selected' : '' }}>
                                Bandas Cargadoras
                            </option>

                            <option value="Bandas Collet"
                                {{ old('linea') === 'Bandas Collet' ? 'selected' : '' }}>
                                Bandas Collet
                            </option>

                            <option value="Etiquetadoras"
                                {{ old('linea') === 'Etiquetadoras' ? 'selected' : '' }}>
                                Etiquetadoras
                            </option>

                            <option value="Motor"
                                {{ old('linea') === 'Motor' ? 'selected' : '' }}>
                                Motor
                            </option>

                            <option value="Reductor"
                                {{ old('linea') === 'Reductor' ? 'selected' : '' }}>
                                Reductor
                            </option>

                            <option value="Plataformas"
                                {{ old('linea') === 'Plataformas' ? 'selected' : '' }}>
                                Plataformas
                            </option>
                        </select>

                    </div>
                </div>

                <div class="col-12 col-md-2">
                    <div class="form-group">

                        <label class="d-none d-md-block">
                            &nbsp;
                        </label>

                        <button
                            type="submit"
                            class="btn btn-primary btn-block"
                        >
                            <i class="bi bi-save mr-1"></i>
                            Guardar
                        </button>

                    </div>
                </div>

            </div>

        </form>


        <hr class="separador-refacciones">


        {{-- Filtros --}}
        <div class="filtros-refacciones">

            <h4 class="filtros-titulo">
                <i class="bi bi-funnel mr-1"></i>
                Filtros de inventario
            </h4>

            <form
                action="{{ route('refacciones.index') }}"
                method="GET"
            >

                <div class="row align-items-end">

                    <div class="col-12 col-md-4">
                        <div class="form-group">

                            <label for="filtro_equipo">
                                Equipo
                            </label>

                            <select
                                id="filtro_equipo"
                                name="equipo"
                                class="form-control"
                            >
                                <option value="">
                                    Todos los equipos
                                </option>

                                <option value="Tratamiento"
                                    {{ request('equipo') === 'Tratamiento' ? 'selected' : '' }}>
                                    Tratamiento
                                </option>

                                <option value="Placas"
                                    {{ request('equipo') === 'Placas' ? 'selected' : '' }}>
                                    Placas
                                </option>

                                <option value="Bandas Cargadoras"
                                    {{ request('equipo') === 'Bandas Cargadoras' ? 'selected' : '' }}>
                                    Bandas Cargadoras
                                </option>

                                <option value="Bandas Collet"
                                    {{ request('equipo') === 'Bandas Collet' ? 'selected' : '' }}>
                                    Bandas Collet
                                </option>

                                <option value="Etiquetadoras"
                                    {{ request('equipo') === 'Etiquetadoras' ? 'selected' : '' }}>
                                    Etiquetadoras
                                </option>

                                <option value="Motor"
                                    {{ request('equipo') === 'Motor' ? 'selected' : '' }}>
                                    Motor
                                </option>

                                <option value="Reductor"
                                    {{ request('equipo') === 'Reductor' ? 'selected' : '' }}>
                                    Reductor
                                </option>

                                <option value="Plataformas"
                                    {{ request('equipo') === 'Plataformas' ? 'selected' : '' }}>
                                    Plataformas
                                </option>
                            </select>

                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">

                            <label for="filtro_estado">
                                Estado
                            </label>

                            <select
                                id="filtro_estado"
                                name="estado"
                                class="form-control"
                            >
                                <option value="">
                                    Todos los estados
                                </option>

                                <option value="disponible"
                                    {{ request('estado') === 'disponible' ? 'selected' : '' }}>
                                    Disponible
                                </option>

                                <option value="stock_bajo"
                                    {{ request('estado') === 'stock_bajo' ? 'selected' : '' }}>
                                    Stock Bajo
                                </option>
                            </select>

                        </div>
                    </div>

                    <div class="col-6 col-md-2">
                        <div class="form-group">

                            <button
                                type="submit"
                                class="btn btn-primary btn-block"
                            >
                                <i class="bi bi-funnel"></i>
                                Filtrar
                            </button>

                        </div>
                    </div>

                    <div class="col-6 col-md-2">
                        <div class="form-group">

                            <a
                                href="{{ route('refacciones.index') }}"
                                class="btn btn-secondary btn-block"
                            >
                                <i class="bi bi-arrow-clockwise"></i>
                                Limpiar
                            </a>

                        </div>
                    </div>

                </div>

            </form>

        </div>


        <div class="contador-resultados">
            Resultados encontrados:
            <strong>{{ $refacciones->count() }}</strong>
        </div>


        <div class="indicacion-deslizar">
            <i class="bi bi-arrow-left-right"></i>
            Desliza la tabla hacia los lados
        </div>


        {{-- Tabla --}}
        <div class="tabla-refacciones-wrapper">

            <table class="table table-bordered table-striped table-hover tabla-refacciones">

                <thead>
                    <tr>
                        <th class="columna-id">ID</th>
                        <th class="columna-codigo">Código</th>
                        <th class="columna-nombre">Nombre</th>
                        <th class="columna-equipo">Equipo</th>
                        <th class="columna-cantidad">Cantidad</th>
                        <th class="columna-estado">Estado</th>
                        <th class="columna-acciones">Acciones</th>
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

                            <td class="columna-acciones">

                                <div class="acciones-refaccion">

                                    <a
                                        href="{{ route('refacciones.edit', $refaccion->id) }}"
                                        class="btn btn-warning btn-sm"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('refacciones.destroy', $refaccion->id) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Deseas eliminar esta refacción?')"
                                        >
                                            <i class="bi bi-trash"></i>
                                            Eliminar
                                        </button>

                                    </form>

                                </div>

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td
                                colspan="7"
                                class="text-center text-muted py-4"
                            >
                                No se encontraron refacciones con los filtros seleccionados.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection