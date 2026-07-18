@extends('layouts.admin')

@section('content')

<style>
    /* =========================================================
       ENCABEZADO
    ========================================================= */

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 24px;
    }

    .dashboard-title {
        margin: 0 0 4px;
        color: #1f2937;
        font-size: 28px;
        font-weight: 700;
    }

    .dashboard-subtitle {
        margin: 0;
        color: #6b7280;
    }

    .system-status {
        flex-shrink: 0;
        padding: 12px 18px;
        text-align: right;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
    }

    .system-status strong {
        color: #198754;
    }


    /* =========================================================
       TARJETAS KPI
    ========================================================= */

    .kpi-card {
        position: relative;
        min-height: 145px;
        margin-bottom: 14px;
        padding: 20px;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #edf0f3;
        border-radius: 14px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }

    .kpi-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.09);
    }

    .kpi-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        margin-bottom: 14px;
        font-size: 24px;
        border-radius: 12px;
    }

    .kpi-number {
        margin-bottom: 8px;
        color: #1f2937;
        font-size: 30px;
        font-weight: 700;
        line-height: 1;
    }

    .kpi-label {
        margin: 0;
        color: #6b7280;
        font-size: 15px;
    }

    .icon-blue {
        color: #0d6efd;
        background: #e8f1ff;
    }

    .icon-green {
        color: #198754;
        background: #e9f8ef;
    }

    .icon-red {
        color: #dc3545;
        background: #fdecec;
    }

    .icon-purple {
        color: #6f42c1;
        background: #f1eafe;
    }


    /* =========================================================
       SECCIONES
    ========================================================= */

    .section-card {
        margin-bottom: 24px;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #edf0f3;
        border-radius: 14px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
    }

    .section-card-header {
        padding: 18px 22px;
        border-bottom: 1px solid #edf0f3;
    }

    .section-card-header h3 {
        margin: 0;
        color: #1f2937;
        font-size: 18px;
        font-weight: 700;
        line-height: 1.4;
    }

    .section-card-body {
        padding: 20px;
    }


    /* =========================================================
       MEDIDORES EN COMPUTADORA
    ========================================================= */

    .gauge-container {
        margin-right: -7.5px;
        margin-left: -7.5px;
    }

    .gauge-column {
        padding-right: 7.5px;
        padding-left: 7.5px;
    }

    .gauge-card {
        display: flex;
        flex-direction: column;
        height: calc(100% - 20px);
        margin-bottom: 20px;
        padding: 12px;
        background: #ffffff;
        border: 1px solid #e7ebef;
        border-radius: 12px;
        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }

    .gauge-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .gauge-title {
        order: 2;
        min-height: 24px;
        margin: 4px 0 2px;
        color: #374151;
        font-weight: 600;
        text-align: center;
        overflow-wrap: anywhere;
    }

    .gauge-chart {
        order: 1;
        width: 100%;
        height: 210px;
    }

    .gauge-availability {
        order: 3;
        text-align: center;
    }

    .gauge-mobile-info,
    .gauge-pagination {
        display: none;
    }


    /* =========================================================
       TABLA
    ========================================================= */

    .table-responsive {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .alert-table {
        min-width: 650px;
    }

    .alert-table th {
        color: #4b5563;
        white-space: nowrap;
        background: #f8f9fa;
        border-top: none;
    }

    .alert-table td {
        vertical-align: middle;
    }


    /* =========================================================
       TABLETAS
    ========================================================= */

    @media (max-width: 991px) {
        .dashboard-title {
            font-size: 25px;
        }

        .gauge-chart {
            height: 195px;
        }
    }


    /* =========================================================
       TELÉFONOS
    ========================================================= */

    @media (max-width: 767px) {
        .dashboard-header {
            display: block;
        }

        .dashboard-title {
            font-size: 23px;
        }

        .dashboard-subtitle {
            font-size: 14px;
        }

        .system-status {
            width: 100%;
            margin-top: 15px;
            text-align: left;
        }

        .kpi-card {
            min-height: 130px;
            margin-bottom: 16px;
            padding: 16px;
        }

        .kpi-icon {
            width: 42px;
            height: 42px;
            margin-bottom: 12px;
            font-size: 21px;
        }

        .kpi-number {
            font-size: 25px;
        }

        .kpi-label {
            font-size: 14px;
        }

        .section-card-header {
            padding: 15px;
        }

        .section-card-header h3 {
            font-size: 17px;
        }

        .section-card-body {
            padding: 15px;
        }

        .gauge-mobile-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 12px;
            padding: 10px 14px;
            color: #4b5563;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            font-size: 13px;
        }

        .gauge-mobile-counter {
            color: #1f2937;
            font-weight: 700;
        }

        .gauge-mobile-swipe {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /*
         * Carrusel activo solo en teléfono.
         */
        .gauge-container {
            display: flex;
            flex-wrap: nowrap;
            gap: 14px;
            margin: 0;
            padding: 3px 4px 12px;
            overflow-x: auto;
            overflow-y: hidden;
            scroll-behavior: smooth;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
            -webkit-overflow-scrolling: touch;
        }

        .gauge-container::-webkit-scrollbar {
            display: none;
        }

        .gauge-column {
            flex: 0 0 91%;
            width: 91%;
            max-width: 91%;
            padding: 0;
            scroll-snap-align: center;
            scroll-snap-stop: always;
        }

        .gauge-card {
            height: auto;
            min-height: 405px;
            margin-bottom: 0;
            padding: 18px 14px;
        }

        /*
         * En móvil el nombre se muestra arriba.
         */
        .gauge-title {
            order: 1;
            min-height: auto;
            margin: 2px 0 5px;
            color: #1f2937;
            font-size: 20px;
            font-weight: 700;
        }

        .gauge-chart {
            order: 2;
            height: 285px;
        }

        .gauge-availability {
            order: 3;
            margin-top: 2px;
        }

        .availability-label {
            display: block;
            margin-bottom: 3px;
            color: #6b7280;
            font-size: 13px;
        }

        .availability-value {
            display: block;
            color: #1f2937;
            font-size: 18px;
            font-weight: 700;
        }

        .gauge-pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 18px;
            margin-top: 12px;
        }

        .gauge-dot {
            width: 8px;
            height: 8px;
            padding: 0;
            background: #d1d5db;
            border: none;
            border-radius: 50%;
            transition:
                width 0.25s ease,
                background 0.25s ease;
        }

        .gauge-dot.active {
            width: 22px;
            background: #0d6efd;
            border-radius: 20px;
        }

        .alert-table {
            font-size: 13px;
        }
    }


    /* =========================================================
       TELÉFONOS PEQUEÑOS
    ========================================================= */

    @media (max-width: 575px) {
        .dashboard-header {
            margin-bottom: 18px;
            text-align: center;
        }

        .dashboard-title {
            font-size: 22px;
        }

        .system-status {
            padding: 11px 14px;
            text-align: center;
        }

        .kpi-card {
            min-height: auto;
            padding: 15px;
        }

        .kpi-icon {
            margin-right: auto;
            margin-left: auto;
        }

        .kpi-number,
        .kpi-label {
            text-align: center;
        }

        .section-card {
            margin-bottom: 18px;
            border-radius: 12px;
        }

        .section-card-header {
            padding: 14px 12px;
            text-align: center;
        }

        .section-card-header h3 {
            font-size: 16px;
        }

        .section-card-body {
            padding: 12px;
        }

        .gauge-mobile-info {
            padding: 9px 11px;
        }

        /*
         * Se ve una pequeña parte de la tarjeta siguiente.
         */
        .gauge-column {
            flex-basis: 92%;
            width: 92%;
            max-width: 92%;
        }

        .gauge-card {
            min-height: 395px;
            padding: 16px 12px;
        }

        .gauge-title {
            font-size: 19px;
        }

        .gauge-chart {
            height: 275px;
        }
    }


    /* =========================================================
       TELÉFONOS MUY PEQUEÑOS
    ========================================================= */

    @media (max-width: 380px) {
        .gauge-card {
            min-height: 370px;
        }

        .gauge-chart {
            height: 250px;
        }

        .gauge-title {
            font-size: 18px;
        }

        .gauge-mobile-swipe span {
            display: none;
        }
    }
</style>


{{-- =========================================================
     ENCABEZADO
========================================================= --}}

<div class="dashboard-header">

    <div>
        <h1 class="dashboard-title">
            Dashboard ERP
        </h1>

        <p class="dashboard-subtitle">
            Monitoreo del inventario de refacciones
        </p>
    </div>

    <div class="system-status">
        <div>
            <strong>
                <i class="bi bi-circle-fill mr-1"></i>
                Sistema operativo
            </strong>
        </div>

        <small class="text-muted">
            {{ now()->format('d/m/Y H:i') }}
        </small>
    </div>

</div>


{{-- =========================================================
     TARJETAS KPI
========================================================= --}}

<div class="row">

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">

            <div class="kpi-icon icon-blue">
                <i class="bi bi-tools"></i>
            </div>

            <div class="kpi-number">
                {{ $totalRefacciones }}
            </div>

            <p class="kpi-label">
                Refacciones registradas
            </p>

        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">

            <div class="kpi-icon icon-green">
                <i class="bi bi-box-seam"></i>
            </div>

            <div class="kpi-number">
                {{ $totalPiezas }}
            </div>

            <p class="kpi-label">
                Piezas en inventario
            </p>

        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">

            <div class="kpi-icon icon-red">
                <i class="bi bi-exclamation-triangle"></i>
            </div>

            <div class="kpi-number">
                {{ $stockBajo }}
            </div>

            <p class="kpi-label">
                Refacciones con stock bajo
            </p>

        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="kpi-card">

            <div class="kpi-icon icon-purple">
                <i class="bi bi-speedometer2"></i>
            </div>

            <div class="kpi-number">
                {{ $nivelInventario }}%
            </div>

            <p class="kpi-label">
                Nivel general del inventario
            </p>

        </div>
    </div>

</div>


{{-- =========================================================
     MEDIDORES
========================================================= --}}

<div class="section-card">

    <div class="section-card-header">
        <h3>
            <i class="bi bi-speedometer mr-2"></i>
            Estado del inventario por equipo
        </h3>
    </div>

    <div class="section-card-body">

        @if(count($equipos) > 0)

            <div class="gauge-mobile-info">

                <div class="gauge-mobile-counter">
                    Equipo
                    <span id="equipoActual">1</span>
                    de
                    <span id="totalEquipos">{{ count($equipos) }}</span>
                </div>

                <div class="gauge-mobile-swipe">
                    <i class="bi bi-hand-index-thumb"></i>
                    <span>Desliza</span>
                    <i class="bi bi-arrow-right"></i>
                </div>

            </div>

        @endif

        <div
            id="gaugeSlider"
            class="row gauge-container"
        >

            @forelse($equipos as $indice => $equipo)

                <div
                    class="col-xl-3 col-lg-4 col-md-6 gauge-column"
                    data-slide-index="{{ $indice }}"
                >

                    <div class="gauge-card">

                        <div class="gauge-title">
                            {{ $equipo['nombre'] }}
                        </div>

                        <div
                            id="gaugeEquipo{{ $indice }}"
                            class="gauge-chart"
                            data-valor="{{ $equipo['porcentaje'] }}"
                        ></div>

                        <div class="gauge-availability">

                            <span class="availability-label">
                                Disponibles
                            </span>

                            <span class="availability-value">
                                {{ $equipo['disponibles'] }}
                                /
                                {{ $equipo['total'] }}
                            </span>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">
                    <div class="text-center text-muted py-4">
                        No hay equipos registrados.
                    </div>
                </div>

            @endforelse

        </div>

        @if(count($equipos) > 1)

            <div
                id="gaugePagination"
                class="gauge-pagination"
            >

                @foreach($equipos as $indice => $equipo)

                    <button
                        type="button"
                        class="gauge-dot {{ $indice === 0 ? 'active' : '' }}"
                        data-target-index="{{ $indice }}"
                        aria-label="Mostrar equipo {{ $indice + 1 }}"
                    ></button>

                @endforeach

            </div>

        @endif

    </div>

</div>


{{-- =========================================================
     TABLA DE STOCK BAJO
========================================================= --}}

<div class="section-card">

    <div class="section-card-header">
        <h3>
            <i class="bi bi-exclamation-triangle mr-2"></i>
            Refacciones con stock bajo
        </h3>
    </div>

    <div class="section-card-body">

        <div class="table-responsive">

            <table class="table table-hover alert-table mb-0">

                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Refacción</th>
                        <th>Equipo</th>
                        <th>Cantidad</th>
                        <th>Estado</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($refaccionesStockBajo as $refaccion)

                        <tr>
                            <td>
                                {{ $refaccion->codigo }}
                            </td>

                            <td>
                                {{ $refaccion->nombre }}
                            </td>

                            <td>
                                {{ $refaccion->linea }}
                            </td>

                            <td>
                                {{ $refaccion->cantidad }}
                            </td>

                            <td>
                                <span class="badge badge-danger">
                                    Stock Bajo
                                </span>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td
                                colspan="5"
                                class="text-center text-muted py-4"
                            >
                                No hay refacciones con stock bajo.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection


@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const elementosMedidor = document.querySelectorAll('.gauge-chart');
    const medidores = [];

    elementosMedidor.forEach(function (elemento) {

        const valorOriginal = Number(elemento.dataset.valor);

        const valor = Number.isFinite(valorOriginal)
            ? Math.min(Math.max(valorOriginal, 0), 100)
            : 0;

        const medidor = echarts.init(elemento);

        const opciones = {
            animationDuration: 1200,

            series: [
                {
                    type: 'gauge',

                    startAngle: 210,
                    endAngle: -30,

                    min: 0,
                    max: 100,

                    splitNumber: 10,

                    radius: '94%',
                    center: ['50%', '52%'],

                    progress: {
                        show: false
                    },

                    axisLine: {
                        lineStyle: {
                            width: 16,

                            color: [
                                [0.49, '#dc3545'],
                                [0.79, '#ffc107'],
                                [1, '#28a745']
                            ]
                        }
                    },

                    pointer: {
                        show: true,
                        length: '60%',
                        width: 6,

                        itemStyle: {
                            color: '#374151'
                        }
                    },

                    anchor: {
                        show: true,
                        size: 11,

                        itemStyle: {
                            color: '#374151'
                        }
                    },

                    axisTick: {
                        distance: -20,
                        length: 6,

                        lineStyle: {
                            color: '#ffffff',
                            width: 1
                        }
                    },

                    splitLine: {
                        distance: -20,
                        length: 12,

                        lineStyle: {
                            color: '#ffffff',
                            width: 2
                        }
                    },

                    axisLabel: {
                        distance: 22,
                        color: '#6b7280',
                        fontSize: 10
                    },

                    title: {
                        show: false
                    },

                    detail: {
                        valueAnimation: true,
                        formatter: '{value}%',
                        offsetCenter: [0, '72%'],
                        fontSize: 28,
                        fontWeight: 'bold',
                        color: '#1f2937'
                    },

                    data: [
                        {
                            value: valor
                        }
                    ]
                }
            ]
        };

        medidor.setOption(opciones);
        medidores.push(medidor);

    });


    /* =========================================================
       AJUSTAR MEDIDORES
    ========================================================= */

    let temporizadorResize;

    function ajustarMedidores() {

        clearTimeout(temporizadorResize);

        temporizadorResize = setTimeout(function () {

            medidores.forEach(function (medidor) {
                medidor.resize();
            });

        }, 150);
    }

    window.addEventListener('resize', ajustarMedidores);
    window.addEventListener('orientationchange', ajustarMedidores);

    document.addEventListener(
        'shown.lte.pushmenu',
        ajustarMedidores
    );

    document.addEventListener(
        'collapsed.lte.pushmenu',
        ajustarMedidores
    );


    /* =========================================================
       CARRUSEL MÓVIL
    ========================================================= */

    const slider = document.getElementById('gaugeSlider');
    const slides = slider
        ? Array.from(slider.querySelectorAll('.gauge-column'))
        : [];

    const puntos = Array.from(
        document.querySelectorAll('.gauge-dot')
    );

    const equipoActual = document.getElementById('equipoActual');

    let indiceActivo = 0;
    let temporizadorScroll;


    function esVistaMovil() {
        return window.matchMedia('(max-width: 767px)').matches;
    }


    function actualizarCarrusel(indice) {

        if (slides.length === 0) {
            return;
        }

        indiceActivo = Math.max(
            0,
            Math.min(indice, slides.length - 1)
        );

        if (equipoActual) {
            equipoActual.textContent = indiceActivo + 1;
        }

        puntos.forEach(function (punto, indicePunto) {
            punto.classList.toggle(
                'active',
                indicePunto === indiceActivo
            );
        });

        /*
         * ECharts vuelve a calcular correctamente el tamaño
         * después de cambiar de tarjeta.
         */
        setTimeout(function () {

            if (medidores[indiceActivo]) {
                medidores[indiceActivo].resize();
            }

        }, 100);
    }


    function detectarSlideVisible() {

        if (!slider || !esVistaMovil() || slides.length === 0) {
            return;
        }

        const centroSlider =
            slider.scrollLeft + (slider.clientWidth / 2);

        let indiceMasCercano = 0;
        let distanciaMenor = Infinity;

        slides.forEach(function (slide, indice) {

            const centroSlide =
                slide.offsetLeft + (slide.offsetWidth / 2);

            const distancia = Math.abs(
                centroSlider - centroSlide
            );

            if (distancia < distanciaMenor) {
                distanciaMenor = distancia;
                indiceMasCercano = indice;
            }

        });

        actualizarCarrusel(indiceMasCercano);
    }


    if (slider && slides.length > 0) {

        slider.addEventListener('scroll', function () {

            clearTimeout(temporizadorScroll);

            temporizadorScroll = setTimeout(function () {
                detectarSlideVisible();
            }, 80);

        }, {
            passive: true
        });

    }


    puntos.forEach(function (punto) {

        punto.addEventListener('click', function () {

            const indiceDestino = Number(
                punto.dataset.targetIndex
            );

            const slideDestino = slides[indiceDestino];

            if (!slideDestino) {
                return;
            }

            slideDestino.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest',
                inline: 'center'
            });

            actualizarCarrusel(indiceDestino);

        });

    });


    window.addEventListener('resize', function () {

        if (!esVistaMovil()) {
            indiceActivo = 0;
            actualizarCarrusel(0);
        } else {
            detectarSlideVisible();
        }

    });


    actualizarCarrusel(0);

});
</script>

@endpush