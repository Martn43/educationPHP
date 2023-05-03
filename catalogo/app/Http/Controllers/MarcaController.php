<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::simplePaginate(10);
        return view('adminMarcas', ['marcas'=>$marcas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agregarMarca');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Se capturan los datos del form
        $mkNombre = $request->input('mkNombre');

        // Se validan los datos (obligatorio, con un minimo y maximo de caracteres)
        $request->validate(
            [
             'mkNombre'=>'required|min:2|max:50'
            ]
        );

        // Se guardan en la DB

        $marca = new Marca;

        $marca->mkNombre = $request->mkNombre;

        $marca->save();

        //redireccion + mensaje

        return redirect('adminMarcas')
            ->with('status', 'Marca '.$mkNombre.' agregada correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marca::find($id);

        return view('modificarMarca',['marca'=>$marca]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $marca = Marca::find($request->idMarca);
        $marca->mkNombre = $request->mkNombre;
        $marca->save();

        return redirect('/adminMarcas')
            ->with('status', 'Marca '.$marca->mkNombre.' modificada correctamente.');
    }

    public function confirm($id)
    {
        $marca = Marca::find($id);

        return view('eliminarMarca', ['marca'=>$marca]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Marca::destroy($request->idMarca);

        return redirect('/adminMarcas')
            ->with('status', 'Marca '.$request->mkNombre.' eliminada correctamente.');
    }
}
