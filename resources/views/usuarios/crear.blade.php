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
          <h2>Agregar Nuevo Usuario</h2>
        </div>

        <div class="row" data-aos="fade-in">
 
          <div class="col-lg-12 mt-12  ">
          
            <form method="POST" action="{{url('/usuarios/crear_guardar')}}"   >
                        @csrf
                        <div class="row">
                            <div class="col"><hr></div>
                            <div class="col-auto">Información personal</div>
                            <div class="col"><hr></div>
                        </div>
                <div class="card">
                <div class="card-body">
                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Nombre') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           

                            <div class="col-md-6">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="dpi" class=" col-form-label text-md-right">{{ __('DPI') }}</label>
                                <input id="dpi" type="text" class="form-control @error('dpi') is-invalid @enderror" name="dpi" value="{{ old('dpi') }}" required autocomplete="dpi" autofocus>

                                @error('dpi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           

                            <div class="col-md-6">
                            <label for="direccion" class="col-form-label text-md-right">{{ __('Dirección') }}</label>
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion">

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="telefono" class=" col-form-label text-md-right">{{ __('Teléfono') }}</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           

                            <div class="col-md-6">
                            <label for="profesion_oficio" class="col-form-label text-md-right">{{ __('Profesión/Oficio') }}</label>
                                <input id="profesion_oficio" type="text" class="form-control @error('profesion_oficio') is-invalid @enderror" name="profesion_oficio" value="{{ old('profesion_oficio') }}" required autocomplete="profesion_oficio">

                                @error('profesion_oficio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="labora" class=" col-form-label text-md-right">{{ __('¿Labora actualmente?') }}</label>
                                <select name="labora" id="labora"  class="form-control">   
                                    <option value="Si">Si</option> 
                                    <option value="No">No</option>  
                                </select>
                            
                            </div> 
                           

                            <div class="col-md-6">
                            <label for="nombre_lugar_labora" class="col-form-label text-md-right">{{ __('Nombre del lugar donde labora') }}</label>
                                <input id="nombre_lugar_labora" type="text" class="form-control @error('nombre_lugar_labora') is-invalid @enderror" name="nombre_lugar_labora" value="{{ old('nombre_lugar_labora') }}" required autocomplete="nombre_lugar_labora">
                                @error('nombre_lugar_labora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="estudia" class=" col-form-label text-md-right">{{ __('¿Estudia actualmente?') }}</label>
                                <select name="estudia" id="estudia"  class="form-control">   
                                    <option value="Si">Si</option> 
                                    <option value="No">No</option>  
                                </select>
                            
                            </div> 
                           

                            <div class="col-md-6">
                            <label for="grado" class="col-form-label text-md-right">{{ __('Grado que cursa') }}</label>
                                <input id="grado" type="text" class="form-control @error('grado') is-invalid @enderror" name="grado" value="{{ old('grado') }}" required autocomplete="grado">
                                @error('grado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-6">
                            <label for="nombre_establecimiento" class="col-form-label text-md-right">{{ __('Nombre establecimiento') }}</label>
                                <input id="nombre_establecimiento" type="text" class="form-control @error('nombre_establecimiento') is-invalid @enderror" name="nombre_establecimiento" value="{{ old('nombre_establecimiento') }}" required autocomplete="nombre_establecimiento">
                                @error('nombre_establecimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                </div>
                </div>

                        <div class="row">
                            <div class="col"><hr></div>
                            <div class="col-auto">Información de las credenciales</div>
                            <div class="col"><hr></div>
                        </div>

                        <div class="card">
                        <div class="card-body">
                                <div class="form-group row">
                           

                                    <div class="col-md-4">
                                        <label for="password" class=" col-form-label text-md-right">{{ __('Contraseña') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> 
                                        @enderror
                                    </div>
                         

                                    <div class="col-md-4">
                                        <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>

                           
                                    <div class="col-md-4">
                                        <label for="password" class=" col-form-label text-md-right">{{ __('Tipo usuario') }}</label>
                                        <select class="form-control" id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" autofocus>
                                            <option value="Voluntarios">Voluntarios</option> 
                                            <option value="Administrador">Administrador</option> 
                                        </select>
                                    </div>
                           
                                </div>
                            </div>
                        </div>

                       
 

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    @endsection