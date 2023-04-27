@extends('layouts.plantilla')

@section('contenido')

    <h1>Modificación de una región</h1>

    <div class="alert bg-light shadow-sm col-8 mx-auto p-4">
        <form action="/modificarRegion" method="post">
            @csrf
            Región: <br>
            <!--
            <label for="regNombre">Nombre de la región</label>
            -->
            <input type="text" name="regNombre" id="regNombre"
                   value="{{ $region->regNombre }}"
                   class="form-control">
            <br>
            <input type="hidden" name="regID" id="regID"
                   value="{{ $region->regID }}"
                   class="form-control">

            <button class="btn btn-dark">Modificar</button>
            <a href="/adminRegiones" class="btn btn-outline-secondary ml-3">Volver a panel</a>
        </form>
    </div>


@endsection
