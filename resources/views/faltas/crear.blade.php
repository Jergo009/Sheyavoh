@extends('plantilla.base_plantilla')

@section('contenido')
<section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Agregar Nueva Falta</h2>
        </div>

        <div class="row" data-aos="fade-in">
 
          <div class="col-lg-12 mt-12  ">
          
            <form method="POST" action="{{url('/faltas/crear_guardar')}}"   >
                        @csrf

                        <div class="form-group row"> 
                            <div class="col-md-12">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Nombre de la falta') }}</label>
                                <input id="falta" type="text" class="form-control @error('falta') is-invalid @enderror" name="falta" value="{{ old('falta') }}" required autocomplete="falta" autofocus>
                                @error('name')
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