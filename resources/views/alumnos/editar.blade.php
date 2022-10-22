@extends('plantilla.base_plantilla')

@section('contenido')
<section id="contact" class="contact">
      <div class="container"> 
        <div class="section-title">
          <h2>Editar Alumno</h2>
        </div>

        <div class="row" data-aos="fade-in">
 
          <div class="col-lg-12 mt-12  ">
          
            <form method="POST" action="{{url('/alumnos/editar/'.$datos->id)}}"   >
                        @csrf
                        {{method_field('PUT')}} 

                        <div class="form-group row"> 
                            <div class="col-md-4">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Código del alumno') }}</label>
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{$datos->codigo}}" required autocomplete="codigo" autofocus>

                                @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>   
                            <div class="col-md-4">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Nombre del alumno') }}</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $datos->nombre }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-md-4">
 

                            <label for="name" class=" col-form-label text-md-right">{{ __('Grado/Sección') }}</label>
                                <select name="id_grado_seccion" id="id_grado_seccion"  class="form-control">
                                    @foreach ($datosGradoSeccion as $item)   
                                    <option value="{{ $item->id}}">{{ $item->grado_carrera_seccion }}</option> 
                                    @endforeach
                                </select>
                            
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