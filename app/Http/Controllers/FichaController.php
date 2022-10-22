<?php

namespace App\Http\Controllers;

use App\Falta;
use App\Ficha;
use App\GradoSeccion;
use Illuminate\Http\Request;
use DB;
class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('asignacion_cursos')
        ->join('cursos', 'asignacion_cursos.id_curso', '=', 'cursos.id') 
        ->select('cursos.id', 'cursos.nombre_apellido')
        ->where('asignacion_cursos.id_persona', auth()->user()->id)
        ->get();  
        $datos_grado_seccion =  GradoSeccion::all(); 
        return view('ficha.inicial',compact('datos','datos_grado_seccion')); 
    }

    public function f_listado_alumnos(Request $request)
    {

        
        $datos_curso_grado = request()->except('_token');
        if(isset($datos_curso_grado['id_grado_seccion']) && isset($datos_curso_grado['id_curso'])){
            $datos_id_grado = $datos_curso_grado['id_grado_seccion'];
            $datos_id_curso = $datos_curso_grado['id_curso'];
    
            $datos_alumnos = DB::table('alumnos')
            ->select('alumnos.*')
            ->where('id_grado_seccion',$datos_curso_grado['id_grado_seccion'])
            ->get();   
    
            $datos_faltas = Falta::all(); 
            return view('ficha.listado_alumnos',compact('datos_alumnos','datos_id_grado','datos_id_curso','datos_faltas'));
        }else{
            return back()->with('mensaje_error','No puede hacer el proceso de calificación, no cuenta con cursos asignados');
        }

        /*$datos_curso_grado = request()->except('_token');
        $datos_id_grado = $datos_curso_grado['id_grado_seccion']; 
        $datos_alumnos = DB::table('alumnos')
        ->select('alumnos.*')
        ->where('id_grado_seccion',$datos_curso_grado['id_grado_seccion'])
        ->get();   

        $datos_faltas = Falta::all(); 
        return view('ficha.listado_alumnos',compact('datos_alumnos','datos_id_grado','datos_faltas'));  */
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id_alumno, $id_curso)
    {
        $request->request->add(['id_alumno' => $id_alumno]);
        $request->request->add(['id_curso' => $id_curso]);
        $request->request->add(['fecha' => date('Y-m-d H:i:s')]);
        $datosInsertar= request()->except('_token');
        Ficha::insert($datosInsertar);
        return back()->with('mensaje','Proceso exitoso!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      

        $datos = DB::table('fichas')
        ->join('alumnos', 'fichas.id_alumno', '=', 'alumnos.id') 
        ->join('faltas', 'fichas.id_falta', '=', 'faltas.id') 
        ->join('cursos', 'fichas.id_curso', '=', 'cursos.id') 
        ->select('fichas.fecha','alumnos.codigo','alumnos.nombre','faltas.falta','cursos.curso')
        ->where('fichas.id_alumno', $id)
        ->get();   

        return  view('ficha.listado_faltas',compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function edit(Ficha $ficha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ficha $ficha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ficha $ficha)
    {
        //
    }
}
