<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::with('relMarca','relCategoria')
                                ->simplePaginate(10);

        return view('adminProductos',['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();

        return view('agregarProducto',
            [
                'marcas'=>$marcas,
                'categorias'=>$categorias
            ]
        );
    }


    private function validar(Request $request) {

        $request->validate(
            [
                'prdNombre'=>'required|min:3|max:70',
                'prdPrecio'=>'required|numeric|min:0',
                'prdPresentacion'=>'required|min:3|max:150',
                'prdStock'=>'required|integer|min:1',
                'prdImagen'=>'mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
            ],
            [
                'prdNombre.required'=>'Complete el campo Nombre',
                'prdNombre.min'=>'Complete el campo Nombre con al menos 3 caractéres',
                'prdNombre.max'=>'Complete el campo Nombre con 70 caractéres como máxino',
                'prdPrecio.required'=>'Complete el campo Precio',
                'prdPrecio.numeric'=>'Complete el campo Precio con un número',
                'prdPrecio.min'=>'Complete el campo Precio con un número positivo',
                'prdPresentacion.required'=>'Complete el campo Presentación',
                'prdPresentacion.min'=>'Complete el campo Presentación con al menos 3 caractéres',
                'prdPresentacion.max'=>'Complete el campo Presentación con 150 caractérescomo máxino',
                'prdStock.required'=>'Complete el campo Stock',
                'prdStock.integer'=>'Complete el campo Stock con un número entero',
                'prdStock.min'=>'Complete el campo Stock con un número positivo',
                'prdImagen.mimes'=>'Debe ser una imagen',
                'prdImagen.max'=>'Debe ser una imagen de 2MB como máximo'
            ]
        );

    }

    private function subirImagen(Request $request)
    {
        // si no enviaron imagen en agregar
        $prdImagen = 'noDisponible.jpg';

        // si no enviaron imagen en modificar
        if( $request->has('prdImagenOriginal') ) {
            $prdImagen = $request->prdImagenOriginal;
        }

        //subir la imagen si fue enviada
        if ( $request->file('prdImagen') ) {

            //renombrar: time() + extension
            $prdImagen =  time().'.'.$request->file('prdImagen')->clientExtension();

            //subir
            $request->file('prdImagen')->move(public_path('productos/'), $prdImagen);

        }

        return $prdImagen;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validacion

        $this->validar($request);

        //subir imagen

        $prdImagen = $this->subirImagen($request);

        //instaciar, asignar, guardar

        $producto = new Producto;
        $producto->prdNombre = $request->prdNombre;
        $producto->prdPrecio = $request->prdPrecio;
        $producto->idMarca = $request->idMarca;
        $producto->idCategoria = $request->idCategoria;
        $producto->prdPresentacion = $request->prdPresentacion;
        $producto->prdStock = $request->prdStock;
        $producto->prdImagen = $prdImagen;

        $producto->save();

        //return
        return redirect('/adminProductos')
            ->with('status', 'Producto: '.$producto->prdNombre.' se agregó correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();

        $producto = Producto::find($id);

        return view('modificarProducto',
            [
                'producto'=>$producto,
                'marcas'=>$marcas,
                'categorias'=>$categorias
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validar($request);


        $producto = Producto::find($request->idProducto);

        $prdImagen = $this->subirImagen($request);


        $producto->prdNombre = $request->prdNombre;
        $producto->prdPrecio = $request->prdPrecio;
        $producto->idMarca = $request->idMarca;
        $producto->idCategoria = $request->idCategoria;
        $producto->prdPresentacion = $request->prdPresentacion;
        $producto->prdStock = $request->prdStock;
        $producto->prdImagen = $prdImagen;

        $producto->save();

        return redirect('/adminProductos')
            ->with('status', 'Producto: '.$producto->prdNombre.' se modificó correctamente.');

    }


    public function confirm($id)
    {
        $producto = Producto::find($id);

        return view('eliminarProducto', ['producto'=>$producto]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Producto::destroy($request->idProducto);

        return redirect('/adminProductos')
            ->with('status', 'Producto '.$request->prdNombre.' eliminado correctamente.');
    }
}
