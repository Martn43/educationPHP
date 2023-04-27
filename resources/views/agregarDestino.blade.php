@extends('layouts.plantilla')

    @section('contenido')

        <h1>Alta de un nuevo destino</h1>

        <div class="bg-light border border-secondary round p-4">
            <form action="/agregarDestino" method="post">
                @csrf
                Nombre: <br>
                <input type="text" name="destNombre" id="destNombre" class="form-control" required>

                Región: <br>
                <select name="regID" id="regID" class="form-control" required>
                    <option value="" selected disabled >Seleccione una región</option>
                    @foreach ($regiones as $region)
                        <option value="{{ $region->regID }}">{{ $region->regNombre }}</option>
                    @endforeach
                </select>
                <br>

                Precio: <br>
                <input type="number" name="destPrecio" id="destPrecio"
                       class="form-control" required>

                Asientos Totales: <br>
                <input type="number" name="destAsientos" id="destAsientos"
                       class="form-control" required>

                Asientos Disponibles: <br>
                <input type="number" name="destDisponibles" id="destDisponibles"
                       class="form-control" required>
                <br>

                <button class="btn btn-dark">Agregar destino</button>
                <a href="/adminDestinos" class="btn btn-outline-secondary ml-3">
                    Volver a panel
                </a>

            </form>
        </div>


    @endsection
