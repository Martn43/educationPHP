@extends('layouts.plantilla')

    @section('contenido')

        <h1>Baja de una categoría</h1>
        <div class="alert bg-light border-danger shadow-sm p-4 mx-auto">
            <form action="/eliminarCategoria" method="post">
                @method('delete')
                @csrf
                Marca: <span class="lead">{{ $categoria->catNombre }}</span>
                <input type="hidden" name="idCategoria"
                       value="{{ $categoria->idCategoria }}">
                <input type="hidden" name="catNombre"
                       value="{{ $categoria->catNombre }}">
                <button class="btn btn-danger btn-block my-2">
                    Confirmar baja
                </button>
                <a href="/adminCategorias" class="btn btn-outline-secondary btn-block my-2">Volver a panel</a>
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
