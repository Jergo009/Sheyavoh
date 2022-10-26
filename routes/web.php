<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

// Auth::routes(['register' => false]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//--------MANTENIMIENTO DE CREDENCIALES
Route::get('/usuarios','AsignacionPacienteController@listado_usuarios')->middleware('auth');
Route::get('/usuarios/crear','AsignacionPacienteController@crear_usuarios')->middleware('auth');
Route::post('/usuarios/crear_guardar','AsignacionPacienteController@crear_usuarios_guardar')->middleware('auth');
Route::put('/usuarios/estado/{id}/{estado}','AsignacionPacienteController@estado_usuarios')->middleware('auth');

//--------MANTENIMIENTO DE PACIENTES
Route::get('/pacientes','PacienteController@index')->middleware('auth');
Route::get('/pacientes/crear','PacienteController@create')->middleware('auth');
Route::post('/pacientes/crear_guardar','PacienteController@store')->middleware('auth');
Route::get('/pacientes/editar/{id}/editar','PacienteController@edit')->middleware('auth');
Route::put('/pacientes/editar/{id}','PacienteController@update')->middleware('auth');
Route::put('/pacientes/estado/{id}/{estado}','PacienteController@destroy')->middleware('auth');

//--------MANTENIMIENTO DE FALTAS
Route::get('/faltas','FaltaController@index')->middleware('auth');
Route::get('/faltas/crear','FaltaController@create')->middleware('auth');
Route::post('/faltas/crear_guardar','FaltaController@store')->middleware('auth');
Route::get('/faltas/editar/{id}/editar','FaltaController@edit')->middleware('auth');
Route::put('/faltas/editar/{id}','FaltaController@update')->middleware('auth');
Route::delete('/faltas/eliminar/{id}','FaltaController@destroy')->middleware('auth');

//--------MANTENIMIENTO DE GRADO_SECCION
Route::get('/grado_seccion','GradoSeccionController@index')->middleware('auth');
Route::get('/grado_seccion/crear','GradoSeccionController@create')->middleware('auth');
Route::post('/grado_seccion/crear_guardar','GradoSeccionController@store')->middleware('auth');
Route::get('/grado_seccion/editar/{id}/editar','GradoSeccionController@edit')->middleware('auth');
Route::put('/grado_seccion/editar/{id}','GradoSeccionController@update')->middleware('auth');
Route::delete('/grado_seccion/eliminar/{id}','GradoSeccionController@destroy')->middleware('auth');

//--------ASIGNACION DE CURSOS
Route::get('/asignar_pacientes','AsignacionPacienteController@index')->middleware('auth');
Route::get('/asignar_pacientes/usuario/{id}','AsignacionPacienteController@show')->middleware('auth');
Route::post('/asignar_pacientes/usuario/{id}/guardar','AsignacionPacienteController@store')->middleware('auth');

//--------MANTENIMIENTO SUBIDA DE ALUMNOS
Route::get('/alumnos','AlumnoController@index')->middleware('auth');
Route::get('/alumnos/crear','AlumnoController@create')->middleware('auth');
Route::post('/alumnos/crear_guardar','AlumnoController@store')->middleware('auth');
Route::get('/alumnos/editar/{id}/editar','AlumnoController@edit')->middleware('auth');
Route::put('/alumnos/editar/{id}','AlumnoController@update')->middleware('auth');
Route::delete('/alumnos/eliminar/{id}','AlumnoController@destroy')->middleware('auth');
Route::get('alumnos/vaciar','AlumnoController@vaciar')->middleware('auth');

Route::post('/alumnos/subir','AlumnoController@upload')->middleware('auth');
Route::get('/alumnos/descargar','AlumnoController@download')->middleware('auth');
Route::get('/alumnos/crear/automatico','AlumnoController@showform')->middleware('auth'); 

Route::get('/alumnos/faltas/{id}/administrador','AlumnoController@verfaltas')->middleware('auth');
Route::delete('/alumnos/administrador/eliminar/faltas/{id}','AlumnoController@eliminarfalta')->middleware('auth');

//--------MANTENIMIENTO DE FICHAS
Route::get('/seguimiento_pacientes','FichaController@index')->middleware('auth');
Route::get('/seguimiento_pacientes/calificar','FichaController@f_listado_alumnos')->middleware('auth');
Route::post('/seguimiento_pacientes/calificar/{alumno}/{curso}','FichaController@store')->middleware('auth');
Route::get('/seguimiento_pacientes/calificar/{alumno}','FichaController@show')->middleware('auth');