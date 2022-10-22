<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Curso::all(); 
        return view('cursos.listado',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
        // return response()->json($request);
        $data = request()->validate([   
            'nombre_apellido' => 'required|string|max:255', 
            'fecha_nacimiento' => 'required|string|max:255', 
            'lugar_origen' => 'required|string|max:255', 
            'dpi' => 'required|string|max:255', 
            'genero' => 'required|string|max:255', 
            'estado_civil' => 'required|string|max:255',  
            'direccion' => 'required|string|max:255', 
            'religion' => 'required|string|max:255', 
            'profesion_oficio' => 'required|string|max:255', 
            'lugar_trabajo' => 'required|string|max:255', 
            'estudia' => 'required|string|max:255', 
            'establecimiento' => 'required|string|max:255', 
            'persona_responsable' => 'required|string|max:255', 
            'parentesco' => 'required|string|max:255', 
            'telefono' => 'required|string|max:255', 
            'nombre_madre' => 'required|string|max:255', 
            'dpi_madre' => 'required|string|max:255', 
            'nombre_padre' => 'required|string|max:255', 
            'dpi_padre' => 'required|string|max:255', 
            'hospitalizado' => 'required|string|max:255', 
            'asistencia_psi' => 'required|string|max:255', 
            'tipo_servicio' => 'required|string|max:255', 
            'referido_por' => 'required|string|max:255', 
            'motivo_consulta' => 'required|string|max:255'
          ], [ 
            'nombre_apellido' =>  'Nombre de curso requerido', 
            'fecha_nacimiento' =>  'Nombre de curso requerido', 
            'lugar_origen' =>  'Nombre de curso requerido', 
            'dpi' =>  'Nombre de curso requerido', 
            'genero' =>  'Nombre de curso requerido', 
            'estado_civil' => 'Nombre de curso requerido', 
            'direccion' =>  'Nombre de curso requerido', 
            'religion' =>  'Nombre de curso requerido', 
            'profesion_oficio' =>  'Nombre de curso requerido', 
            'lugar_trabajo' =>  'Nombre de curso requerido', 
            'estudia' =>  'Nombre de curso requerido', 
            'establecimiento' =>  'Nombre de curso requerido', 
            'persona_responsable' =>  'Nombre de curso requerido', 
            'parentesco' =>  'Nombre de curso requerido', 
            'telefono' =>  'Nombre de curso requerido', 
            'nombre_madre' =>  'Nombre de curso requerido', 
            'dpi_madre' =>  'Nombre de curso requerido', 
            'nombre_padre' =>  'Nombre de curso requerido', 
            'dpi_padre' =>  'Nombre de curso requerido', 
            'hospitalizado' =>  'Nombre de curso requerido', 
            'asistencia_psi' =>  'Nombre de curso requerido', 
            'tipo_servicio' =>  'Nombre de curso requerido', 
            'referido_por' =>  'Nombre de curso requerido', 
            'motivo_consulta' =>  'Nombre de curso requerido'
          ]);

          $datosInsertar= request()->except('_token');
          Curso::insert($datosInsertar); 
          return redirect('pacientes')->with('mensaje','Proceso exitoso!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Curso::findOrFail($id);
        return view('cursos.editar',compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos= request()->except('_token','_method');
        Curso::where('id','=',$id)->update($datos);
        return redirect('pacientes')->with('mensaje','Proceso exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Curso::destroy($id);
        return redirect('pacientes')->with('mensaje','Proceso exitoso!');
    }
}
