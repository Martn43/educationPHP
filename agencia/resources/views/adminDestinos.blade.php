@extends('layouts.plantilla')

    @section('contenido')

        <h1>Panel de administración de destinos</h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-striped table-hover table-borderless">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Destino (aeropuerto)</th>
                <th>Precio</th>
                <th>Región</th>
                <th colspan="2">
                    <a href="/agregarDestino" class="btn btn-dark">Agregar</a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($destinos as $destino)
                <tr>
                    <td>{{ $destino->destID }}</td>
                    <td>{{$destino->destNombre}}</td>
                    <td>{{ $destino->destPrecio }}</td>
                    <td>{{ $destino->regNombre }}</td>
                    <td>
                        <a href="/modificarDestino/{{ $destino->destID }}" class="btn btn-outline-secondary">Modificar</a>
                    </td>
                    <td>
                        <a href="/eliminarDestino/{{ $destino->destID }}" class="btn btn-outline-secondary">Eliminar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    @endsection
