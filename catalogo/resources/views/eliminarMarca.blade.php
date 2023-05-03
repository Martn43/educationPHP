@extends('layouts.plantilla')

    @section('contenido')

        <h1>Baja de una marca</h1>
        <div class="alert bg-light border-danger shadow-sm p-4 mx-auto">
            <form action="/eliminarMarca" method="post">
                @method('delete')
                @csrf
                Marca: <span class="lead">{{ $marca->mkNombre }}</span>
                <input type="hidden" name="idMarca"
                       value="{{ $marca->idMarca }}">
                <input type="hidden" name="mkNombre"
                       value="{{ $marca->mkNombre }}">
                <button class="btn btn-danger btn-block my-2">
                    Confirmar baja
                </button>
                <a href="/adminMarcas" class="btn btn-outline-secondary btn-block my-2">Volver a panel</a>
            </form>
        </div>

        <script>
            Swal.fire(
                'Advertencia',
                'Si pulsa "Confirmar baja" se eliminará la marca',
                'warning'
            )
        </script>
    @endsection
