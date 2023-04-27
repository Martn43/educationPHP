@extends('layouts.plantilla')

@section('contenido')

    <h1>Modificación de un destino</h1>

    <div class="alert bg-light shadow-sm col-8 mx-auto p-4">
        <form action="/modificarDestino" method="post">
            @csrf
            Destino: <br>
            <!--
            <label for="regNombre">Nombre de la región</label>
            -->
            <input type="text" name="destNombre" id="destNombre"
                   value="{{ $destino->destNombre }}"
                   class="form-control">
            <br>

            <input type="hidden" name="destID" id="destID"
                   value="{{ $destino->destID }}"
                   class="form-control">

            <select name="regID" id="regID" class="form-control" required>
                @foreach($regiones as $region)
                    {{--
                    @if ($destino->regID == $region->regID)
                        <option value="{{ $region->regID }}" selected >{{ $region->regNombre }}</option>
                    @else
                        <option value="{{ $region->regID }}">{{ $region->regNombre }}</option>
                    @endif
                    --}}
                    {{-- Forma de hacerlo con operador ternario --}}
                    <option value="{{ $region->regID }}" {{ ($region->regID == $destino->regID) ? 'selected' : ''}} >
                        {{ $region->regNombre }}
                    </option>
                @endforeach
            </select>
            <br>

            <input type="number" name="destPrecio" id="destPrecio"
                   value="{{ $destino->destPrecio }}"
                   class="form-control">
            <br>

            <input type="number" name="destAsientos" id="destAsientos"
                   value="{{ $destino->destAsientos }}"
                   class="form-control">
            <br>

            <input type="number" name="destDisponibles" id="destDisponibles"
                   value="{{ $destino->destDisponibles }}"
                   class="form-control">
            <br>

            @if ($destino->destActivo)
                <label class="form-check-label">
                    <input type="radio" name="destActivo" id="destActivo"
                           value="1" class="form-check-input" checked>Activo
                </label>
                <br>
                <label class="form-check-label">
                <input type="radio" name="destActivo" id="destActivo"
                       value="0" class="form-check-input">Inactivo
                </label>
                <br><br>
            @else
                <label class="form-check-label">
                    <input type="radio" name="destActivo" id="destActivo"
                           value="1" class="form-check-input">Activo
                </label>
                <br>
                <label class="form-check-label">
                    <input type="radio" name="destActivo" id="destActivo"
                           value="0" class="form-check-input" checked>Inactivo
                </label>
                <br><br>
            @endif
            <button class="btn btn-dark">Modificar</button>
            <a href="/adminDestinos" class="btn btn-outline-secondary ml-3">Volver a panel</a>
        </form>
    </div>


@endsection
