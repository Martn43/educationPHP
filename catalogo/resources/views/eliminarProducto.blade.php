@extends('layouts.plantilla')

    @section('contenido')

        <h1>Baja de un un producto</h1>
        <div class="alert bg-light border-danger shadow-sm p-4 mx-auto">
            <form action="/eliminarProducto" method="post">
                @method('delete')
                @csrf
                Producto: <span class="lead">{{ $producto->prdNombre }}</span>
                <input type="hidden" name="idProducto"
                       value="{{ $producto->idProducto }}">
                <input type="hidden" name="prdNombre"
                       value="{{ $producto->prdNombre }}">
                <button class="btn btn-danger btn-block my-2">
                    Confirmar baja
                </button>
                <a href="/adminProductos" class="btn btn-outline-secondary btn-block my-2">Volver a panel</a>
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
