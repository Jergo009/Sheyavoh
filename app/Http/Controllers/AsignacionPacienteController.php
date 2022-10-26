<?php

namespace App\Http\Controllers;

use App\AsignacionPaciente;
use Illuminate\Http\Request;
use App\User;
use App\Paciente;
use DB;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AsignacionPacienteController extends Controller
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
       
        AsignacionPaciente::where('id_persona', $idUsuario)->delete();
        $datos= request()->except('_token');  
        if(isset($datos['paciente'])){
            for ($i=0; $i < count($datos['paciente']); $i++) { 
                    $datosInsertar= ['id_persona' => $idUsuario,'id_paciente' => $datos['paciente'][$i]]; //,'region_id' => $region_id,'permission_id' => $permission_id];
                    AsignacionPaciente::insert($datosInsertar); 
            }
        }
         return redirect('/asignar_pacientes')->with('mensaje','Proceso exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AsignacionPaciente  $asignacionCurso
     * @return \Illuminate\Http\Response
     */
    public function show($idUsuario)
    {
        //curso es paciente
        $datos = Paciente::where('enable', '=', 'si')->get();

        $datosUsuario = User::findOrFail($idUsuario);
        $datosUsuarioAsignados = DB::table('asignacion_pacientes')
        ->select('id_paciente')
        ->where('id_persona', $idUsuario)
        ->get(); 
        return view('asignar_cursos.asignar',compact('datos','datosUsuario','datosUsuarioAsignados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AsignacionPaciente  $asignacionCurso
     * @return \Illuminate\Http\Response
     */
    public function edit(AsignacionPaciente $asignacionCurso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AsignacionPaciente  $asignacionCurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsignacionPaciente $asignacionCurso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AsignacionPaciente  $asignacionCurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(AsignacionPaciente $asignacionCurso)
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
    
        // return response()->json($request);
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', 
            'type' => 'required|string|max:255',
            'dpi' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'profesion_oficio' => 'required|string|max:255',
            
            'nombre_lugar_labora' => 'required|string|max:255',
           
            'grado' => 'required|string|max:255',
            'nombre_establecimiento' => 'required|string|max:255'
          ], [
            'name.required' => 'Nombre de usuario requerido',
            'email.required' => 'Correo de usuario requerido',
            'type.required' => 'Tipo de usuario requerido',
            'dpi.required' => 'DPI de usuario requerido',
            'direccion.required' => 'Dirección de usuario requerido',
            'telefono.required' => 'Teléfono de usuario requerido',
            'profesion_oficio.required' => 'Profesión de usuario requerido',
            
            'nombre_lugar_labora.required' => 'Nombre requerido',
            
            'grado.required' => 'Grado requerido',
            'nombre_establecimiento.required' => 'Nombre de establecimiento requerido'
          ]);

          $datosInsertar= request()->except('_token');
           
          User::create([
            'name' => $datosInsertar['name'],
            'email' =>$datosInsertar['email'],
            'password' => Hash::make($datosInsertar['password']), 
            'type' =>$datosInsertar['type'],    
            'dpi' =>$datosInsertar['name'], 
            'direccion' =>$datosInsertar['direccion'], 
            'telefono' =>$datosInsertar['telefono'], 
            'profesion_oficio' =>$datosInsertar['profesion_oficio'], 
            'labora' =>$datosInsertar['labora'], 
            'nombre_lugar_labora' =>$datosInsertar['nombre_lugar_labora'], 
            'estudia' =>$datosInsertar['estudia'], 
            'grado' =>$datosInsertar['grado'], 
            'nombre_establecimiento' =>$datosInsertar['nombre_establecimiento']  
        ]);
        return redirect('/usuarios')->with('mensaje','Proceso exitoso!');
    }

    
    public function estado_usuarios($id,$estado){   
        // User::destroy($id);
        // return back()->with('mensaje','Proceso exitoso!');

        // $datos= request()->except('_token','_method');
        $datos = [
            'enable' => $estado, 
        ];
        User::where('id','=',$id)->update($datos);
        return back()->with('mensaje','Proceso exitoso!');
    }
}
