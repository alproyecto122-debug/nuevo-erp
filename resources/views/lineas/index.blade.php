@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-4">Mis Líneas de Refacciones</h1>
        
        @if($lineas->isEmpty())
            <p class="text-gray-500">No hay líneas registradas aún.</p>
        @else
            <ul class="space-y-3">
                @foreach ($lineas as $linea)
                    <li class="p-4 bg-gray-50 rounded-md border border-gray-200 hover:bg-gray-100 transition">
                        {{ $linea->nombre }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection