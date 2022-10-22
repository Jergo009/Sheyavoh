@extends('plantilla.base_plantilla')

@section('contenido')
<section id="contact" class="contact">
      <div class="container"> 
        <div class="section-title">
          <h2>Editar Grado y Sección</h2>
        </div>

        <div class="row" data-aos="fade-in">
 
          <div class="col-lg-12 mt-12  ">
          
            <form method="POST" action="{{url('/grado_seccion/editar/'.$datos->id)}}"   >
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group row"> 
                            <div class="col-md-12">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Nombre del curso') }}</label>
                                <input id="grado_carrera_seccion" type="text" class="form-control @error('grado_carrera_seccion') is-invalid @enderror" name="grado_carrera_seccion" value="{{$datos->grado_carrera_seccion}}" required autocomplete="grado_carrera_seccion" autofocus>
                                @error('grado_carrera_seccion')
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