@extends('plantilla.base_plantilla')

@section('contenido')
<section id="contact" class="contact">
      <div class="container">

            <div class="text-center">
                @if (session('mensaje'))
                <div class="alert alert-success">
                    {{session('mensaje')}}
                </div>
                @endif
            </div>

        <div class="section-title">
          <h2>Agregar nuevo paciente</h2>
        </div>

        <div class="row" data-aos="fade-in">
 
          <div class="col-lg-12 mt-12  ">
          
            <form method="POST" action="{{url('/pacientes/crear_guardar')}}"   >
                        @csrf

                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="nombre_apellido" class=" col-form-label text-md-right">{{ __('Nombre y apellido') }}</label>
                                <input id="nombre_apellido" type="text" class="form-control @error('nombre_apellido') is-invalid @enderror" name="nombre_apellido" value="{{ old('nombre_apellido') }}" required autocomplete="nombre_apellido" autofocus>

                                @error('nombre_apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                            <div class="col-md-6">
                            <label for="fecha_nacimiento" class=" col-form-label text-md-right">{{ __('Fecha Nacimiento') }}</label>
                                <input id="fecha_nacimiento" type="text" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required autocomplete="fecha_nacimiento" autofocus>

                                @error('fecha_nacimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                     
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="lugar_origen" class=" col-form-label text-md-right">{{ __('Lugar de origen') }}</label>
                                <input id="lugar_origen" type="text" class="form-control @error('lugar_origen') is-invalid @enderror" name="lugar_origen" value="{{ old('lugar_origen') }}" required autocomplete="lugar_origen" autofocus>

                                @error('lugar_origen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                            <div class="col-md-6">
                            <label for="dpi" class=" col-form-label text-md-right">{{ __('DPI/CUI') }}</label>
                                <input id="dpi" type="text" class="form-control @error('dpi') is-invalid @enderror" name="dpi" value="{{ old('dpi') }}" required autocomplete="dpi" autofocus>

                                @error('dpi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                     
                        </div>
 
                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="genero" class=" col-form-label text-md-right">{{ __('Género') }}</label>
                                <select name="genero" id="genero"  class="form-control">   
                                    <option value="Masculino">Masculino</option> 
                                    <option value="Femenino">Femenino</option>  
                                </select>   
                            </div>
                            <div class="col-md-6">
                            <label for="Soltero" class=" col-form-label text-md-right">{{ __('Estado Civil') }}</label>
                                <select name="estado_civil" id="estado_civil"  class="form-control">   
                                    <option value="Soltero">Soltero</option> 
                                    <option value="Casado">Casado</option>  
                                </select>
                            
                            </div>                     
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="direccion" class=" col-form-label text-md-right">{{ __('Dirección') }}</label>
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                            <div class="col-md-6">
                            <label for="religion" class=" col-form-label text-md-right">{{ __('Religión') }}</label>
                                <input id="religion" type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion') }}" required autocomplete="fecha_nacimiento" autofocus>

                                @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                     
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="profesion_oficio" class=" col-form-label text-md-right">{{ __('Profesión/Oficio') }}</label>
                                <input id="profesion_oficio" type="text" class="form-control @error('profesion_oficio') is-invalid @enderror" name="profesion_oficio" value="{{ old('profesion_oficio') }}" required autocomplete="profesion_oficio" autofocus>

                                @error('profesion_oficio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                            <div class="col-md-6">
                            <label for="lugar_trabajo" class=" col-form-label text-md-right">{{ __('Lugar de trabajo') }}</label>
                                <input id="lugar_trabajo" type="text" class="form-control @error('lugar_trabajo') is-invalid @enderror" name="lugar_trabajo" value="{{ old('lugar_trabajo') }}" required autocomplete="lugar_trabajo" autofocus>

                                @error('lugar_trabajo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                     
                        </div>
                        <div class="form-group row"> 
                            <div class="col-md-6"> 
                            <label for="estudia" class=" col-form-label text-md-right">{{ __('Estudia Actualmente') }}</label>
                                <select name="estudia" id="estudia"  class="form-control">   
                                    <option value="Si">Si</option> 
                                    <option value="No">No</option>  
                                </select> 
                            </div>      
                            <div class="col-md-6">
                            <label for="grado_actual" class=" col-form-label text-md-right">{{ __('Grado que cursa') }}</label>
                                <input id="grado_actual" type="text" class="form-control @error('grado_actual') is-invalid @enderror" name="grado_actual" value="{{ old('grado_actual') }}" required autocomplete="grado_actual" autofocus>

                                @error('grado_actual')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                      
                        </div>
                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="establecimiento" class=" col-form-label text-md-right">{{ __('Establecimiento') }}</label>
                                <input id="establecimiento" type="text" class="form-control @error('establecimiento') is-invalid @enderror" name="establecimiento" value="{{ old('establecimiento') }}" required autocomplete="establecimiento" autofocus>

                                @error('establecimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>     
                            <div class="col-md-6">
                            <label for="persona_responsable" class=" col-form-label text-md-right">{{ __('Persona responsable') }}</label>
                                <input id="persona_responsable" type="text" class="form-control @error('persona_responsable') is-invalid @enderror" name="persona_responsable" value="{{ old('persona_responsable') }}" required autocomplete="persona_responsable" autofocus>

                                @error('persona_responsable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                      
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="parentesco" class=" col-form-label text-md-right">{{ __('Parentesco') }}</label>
                                <input id="parentesco" type="text" class="form-control @error('parentesco') is-invalid @enderror" name="parentesco" value="{{ old('parentesco') }}" required autocomplete="parentesco" autofocus>

                                @error('parentesco')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>     
                            <div class="col-md-6">
                            <label for="telefono" class=" col-form-label text-md-right">{{ __('Teléfono') }}</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                      
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="nombre_madre" class=" col-form-label text-md-right">{{ __('Nombre de la madre') }}</label>
                                <input id="nombre_madre" type="text" class="form-control @error('nombre_madre') is-invalid @enderror" name="nombre_madre" value="{{ old('nombre_madre') }}" required autocomplete="nombre_madre" autofocus>

                                @error('nombre_madre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>     
                            <div class="col-md-6">
                            <label for="dpi_madre" class=" col-form-label text-md-right">{{ __('DPI Madre') }}</label>
                                <input id="dpi_madre" type="text" class="form-control @error('dpi_madre') is-invalid @enderror" name="dpi_madre" value="{{ old('dpi_madre') }}" required autocomplete="dpi_madre" autofocus>

                                @error('dpi_madre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                      
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="nombre_padre" class=" col-form-label text-md-right">{{ __('Nombre del padre') }}</label>
                                <input id="nombre_padre" type="text" class="form-control @error('nombre_padre') is-invalid @enderror" name="nombre_padre" value="{{ old('nombre_padre') }}" required autocomplete="nombre_padre" autofocus>

                                @error('nombre_padre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>     
                            <div class="col-md-6">
                            <label for="dpi_padre" class=" col-form-label text-md-right">{{ __('DPI Padre') }}</label>
                                <input id="dpi_padre" type="text" class="form-control @error('dpi_padre') is-invalid @enderror" name="dpi_padre" value="{{ old('dpi_padre') }}" required autocomplete="dpi_padre" autofocus>

                                @error('dpi_padre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                      
                        </div>


                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="hospitalizado" class=" col-form-label text-md-right">{{ __('¿Ha estado hospitalizado o ha tenido enfermadad crónica?') }}</label>
                                <select name="hospitalizado" id="hospitalizado"  class="form-control">   
                                    <option value="Si">Si</option> 
                                    <option value="No">No</option>  
                                </select>   
                            </div>
                            <div class="col-md-6">
                            <label for="asistencia_psi" class=" col-form-label text-md-right">{{ __('¿Ha tenido asistencia psicológica o psiquiatrica?') }}</label>
                                <select name="asistencia_psi" id="asistencia_psi"  class="form-control">   
                                    <option value="Si">Si</option> 
                                    <option value="No">No</option>   
                                </select> 
                            </div>                     
                        </div>


                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="tipo_servicio" class=" col-form-label text-md-right">{{ __('Servicio en el que se necesita apoyo') }}</label>
                                <select name="tipo_servicio" id="tipo_servicio"  class="form-control">   
                                    <option value="Psicología">Psicología</option> 
                                    <option value="Terapia de lenguaje">Terapia de lenguaje</option>  
                                    <option value="Trabajo Social">Trabajo Social</option> 
                                    <option value="Reforzamiento Escolar">Reforzamiento Escolar</option> 
                                    <option value="Consejería Espiritual">Consejería Espiritual</option> 
                                    <option value="Escuela para padres">Escuela para padres</option> 
                                </select>   
                            </div>
                            <div class="col-md-6">
                            <label for="referido_por" class=" col-form-label text-md-right">{{ __('Referido por') }}</label>
                                <input id="referido_por" type="text" class="form-control @error('referido_por') is-invalid @enderror" name="referido_por" value="{{ old('referido_por') }}" required autocomplete="referido_por" autofocus>
                                @error('referido_por')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>                     
                        </div>
                        <div class="form-group row">  
                            <div class="col-md-12">
                            <label for="motivo_consulta" class=" col-form-label text-md-right">{{ __('Motivo de consulta') }}</label>
                                <input id="motivo_consulta" type="text" class="form-control @error('motivo_consulta') is-invalid @enderror" name="motivo_consulta" value="{{ old('motivo_consulta') }}" required autocomplete="motivo_consulta" autofocus>
                                @error('motivo_consulta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                    
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    @endsection