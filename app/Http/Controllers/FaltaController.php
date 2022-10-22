<?php

namespace App\Http\Controllers;

use App\Falta;
use Illuminate\Http\Request;

class FaltaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Falta::all(); 
        return view('faltas.listado',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faltas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->validate([
            'falta' => 'required|string|max:50', 
          ], [
            'falta.required' => 'Nombre de curso requerido', 
          ]);

          $datosInsertar= request()->except('_token');
          Falta::insert($datosInsertar);
           
        return redirect('faltas')->with('mensaje','Proceso exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Falta  $falta
     * @return \Illuminate\Http\Response
     */
    public function show(Falta $falta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Falta  $falta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Falta::findOrFail($id);
        return view('faltas.editar',compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Falta  $falta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos= request()->except('_token','_method');
        Falta::where('id','=',$id)->update($datos);
        return redirect('faltas')->with('mensaje','Proceso exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Falta  $falta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Falta::destroy($id);
        return redirect('faltas')->with('mensaje','Proceso exitoso!');
    }
}
