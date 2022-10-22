<?php

namespace App\Http\Controllers;

use App\AsignacionCurso;
use Illuminate\Http\Request;
use App\User;
use App\Curso;
use DB;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AsignacionCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = User::all();
        return view('asignar_cursos.listado',compact('datos'));
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
    public function store(Request $request,$idUsuario)
    {
       
        AsignacionCurso::where('id_persona', $idUsuario)->delete();
        $datos= request()->except('_token');  
        if(isset($datos['curso'])){
            for ($i=0; $i < count($datos['curso']); $i++) { 
                    $datosInsertar= ['id_persona' => $idUsuario,'id_curso' => $datos['curso'][$i]]; //,'region_id' => $region_id,'permission_id' => $permission_id];
                    AsignacionCurso::insert($datosInsertar); 
            }
        }
         return redirect('/asignar_pacientes')->with('mensaje','Proceso exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AsignacionCurso  $asignacionCurso
     * @return \Illuminate\Http\Response
     */
    public function show($idUsuario)
    {
        $datos = Curso::all();
        $datosUsuario = User::findOrFail($idUsuario);
        $datosUsuarioAsignados = DB::table('asignacion_cursos')
        ->select('id_curso')
        ->where('id_persona', $idUsuario)
        ->get(); 
        return view('asignar_cursos.asignar',compact('datos','datosUsuario','datosUsuarioAsignados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AsignacionCurso  $asignacionCurso
     * @return \Illuminate\Http\Response
     */
    public function edit(AsignacionCurso $asignacionCurso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AsignacionCurso  $asignacionCurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsignacionCurso $asignacionCurso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AsignacionCurso  $asignacionCurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(AsignacionCurso $asignacionCurso)
    {
        //
    }

    public function listado_usuarios(){
        $datos = User::all();
        return view('usuarios.listado',compact('datos'));
    }

    
    public function crear_usuarios(){ 
        return view('usuarios.crear');
    }

    

    public function crear_usuarios_guardar(Request $request){ 
    
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', 
          ], [
            'name.required' => 'Nombre de usuario requerido',
            'email.required' => 'Correo de usuario requerido'
          ]);

          $datosInsertar= request()->except('_token');
           
          User::create([
            'name' => $datosInsertar['name'],
            'email' =>$datosInsertar['email'],
            'password' => Hash::make($datosInsertar['password']), 
            'type' =>$datosInsertar['type'],
        ]);
        return redirect('/usuarios')->with('mensaje','Proceso exitoso!');
    }

    
    public function eliminar_usuarios($id){  
        User::destroy($id);
        return back()->with('mensaje','Proceso exitoso!');
    }
}
