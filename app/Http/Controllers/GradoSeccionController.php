<?php

namespace App\Http\Controllers;

use App\GradoSeccion;
use Illuminate\Http\Request;

class GradoSeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = GradoSeccion::all(); 
        return view('grado_seccion.listado',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grado_seccion.crear');
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
            'grado_carrera_seccion' => 'required|string|max:255', 
        ],[
            'grado_carrera_seccion.required' => 'Nombre del grado y sección requerido', 
        ]); 
        $datosInsertar= request()->except('_token');
        GradoSeccion::insert($datosInsertar);
        return redirect('grado_seccion')->with('mensaje','Proceso exitoso!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GradoSeccion  $gradoSeccion
     * @return \Illuminate\Http\Response
     */
    public function show(GradoSeccion $gradoSeccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GradoSeccion  $gradoSeccion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = GradoSeccion::findOrFail($id);
        return view('grado_seccion.editar',compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GradoSeccion  $gradoSeccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos= request()->except('_token','_method');
        GradoSeccion::where('id','=',$id)->update($datos);
        return redirect('grado_seccion')->with('mensaje','Proceso exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GradoSeccion  $gradoSeccion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GradoSeccion::destroy($id);
        return redirect('grado_seccion')->with('mensaje','Proceso exitoso!');
    }
}
