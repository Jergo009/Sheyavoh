<?php

namespace App\Http\Controllers;

use App\Ficha;
use App\Alumno;
use App\GradoSeccion;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use DB;
// use Excel;
class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $datos = DB::table('alumnos')
        ->join('grado_seccions', 'alumnos.id_grado_seccion', '=', 'grado_seccions.id') 
        ->select('alumnos.*', 'grado_seccions.grado_carrera_seccion')
        ->get();  
        return view('alumnos.listado',compact('datos'));
    }

    public function showform(){
        return view('alumnos.formulario');
    }
    public function upload(Request $request){

        if($request->file==null){
            return back()->with('mensaje_error','No ha seleccionado un archivo!'); 
        }else{
            try{     
                $path = $request->file->getrealPath();
                //$collection = (new FastExcel)->import($path);
                //return $collection;
                $users = (new FastExcel)->import($path, function ($line) {
                    return Alumno::create([
                        'codigo' => $line['codigo'],
                        'nombre' => $line['nombre'],
                        'id_grado_seccion' => $line['id_grado_seccion'],
                    ]);
                });
                return redirect('alumnos')->with('mensaje','Proceso exitoso!'); 
            }catch(\Exception $e) {
                return redirect('alumnos')->with('mensaje_error','El archivo contiene errores, algunos datos no fueron insertados. Revise claves de cursos !'); 
            }
        }

        // 
        // return Excel::import($path)->get();
    }
    public function download(){
        // $list = collect([
        //     [ 'id' => 1, 'name' => 'Jane' ],
        //     [ 'id' => 2, 'name' => 'John' ],
        // ]);
        
        // (new FastExcel($list))->export('file.xlsx');
        //$datos = Ficha::all();
        //$datos  = DB::select('SELECT  alumnos.codigo as "Código", alumnos.nombre as "Nombre", grado_seccions.grado_carrera_seccion as "Grado/Seccion", (25-count(fichas.id_alumno)) as "Punteo Total"  from sfa.alumnos, sfa.grado_seccions, sfa.fichas       where alumnos.id_grado_seccion = grado_seccions.id and fichas.id_alumno = alumnos.id        GROUP BY  grado_seccions.id,grado_seccions.grado_carrera_seccion, fichas.id_alumno, alumnos.codigo, alumnos.nombre');
          $datos  = DB::select('SELECT  a.codigo as "Código", a.nombre as "Nombre", gs.grado_carrera_seccion as "Grado/Seccion",  (25-count(f.id_alumno)) as "Punteo Total" FROM alumnos a JOIN grado_seccions gs on a.id_grado_seccion= gs.id LEFT JOIN fichas f ON a.id = f.id_alumno GROUP BY  gs.grado_carrera_seccion, a.nombre, a.codigo');
        return (new FastExcel($datos))->download('file.xlsx');
        return response($datos); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosGradoSeccion=GradoSeccion::all();
        return view('alumnos.crear', compact('datosGradoSeccion'));
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
            'codigo' => 'required|string|max:255', 
            'nombre' => 'required|string|max:255', 
          ], [
            'codigo.required' => 'Código del estudiante es requerido', 
            'nombre.required' => 'Nombre del estudiante es requerido',
          ]);

          $datosInsertar= request()->except('_token');
          Alumno::insert($datosInsertar);
           
        return redirect('alumnos')->with('mensaje','Proceso exitoso!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datosGradoSeccion=GradoSeccion::all();
        $datos = Alumno::findOrFail($id);
        return view('alumnos.editar',compact('datos','datosGradoSeccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    { 
        $datos= request()->except('_token','_method');
        Alumno::where('id','=',$id)->update($datos);
        return redirect('alumnos')->with('mensaje','Proceso exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alumno::destroy($id);
        return redirect('alumnos')->with('mensaje','Proceso exitoso!');
    }

    public function vaciar(){
        DB::table('fichas')->truncate();
        return redirect('alumnos')->with('mensaje','Proceso de eliminacion de notas finalizado con éxito!');
    }

    public function verfaltas($id){ 
        $datos = DB::table('fichas')
        ->join('alumnos', 'fichas.id_alumno', '=', 'alumnos.id') 
        ->join('faltas', 'fichas.id_falta', '=', 'faltas.id') 
        ->join('cursos', 'fichas.id_curso', '=', 'cursos.id') 
        ->select('fichas.id','fichas.fecha','alumnos.codigo','alumnos.nombre','faltas.falta','cursos.curso')
        ->where('fichas.id_alumno', $id)
        ->get();   

        //return  view('ficha.listado_faltas',compact('datos'));
        return view('alumnos.faltas_alumno',compact('datos'));
    }

    public function eliminarfalta($id){ 
        Ficha::destroy($id);
        return back()->with('mensaje','Proceso exitoso, falta eliminada!');
    }
}
