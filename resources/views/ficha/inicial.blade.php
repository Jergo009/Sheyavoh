@extends('plantilla.base_plantilla')

@section('contenido')
<section id="contact" class="contact">
      <div class="container"> 
      <div class="text-center">
                @if (session('mensaje_error'))
                <div class="alert alert-danger">
                    {{session('mensaje_error')}}
                </div>
                @endif
            </div>
        <div class="section-title">
          <h2>Listado de pacientes asignados</h2>
        </div>

        <div class="row" data-aos="fade-in">
 
          <div class="col-lg-12 mt-12  ">
          
            <form method="GET" action="{{url('/fichas/calificar')}}"   >
                        @csrf

                        <div class="form-group row">  
                            <div class="col-md-6"> 
                            <label for="name" class=" col-form-label text-md-right">{{ __('Paciente') }}</label>
                                <select name="id_curso" id="id_curso"  class="form-control">
                                    @foreach ($datos as $item)   
                                    <option value="{{ $item->id}}">{{ $item->nombre_apellido }}</option> 
                                    @endforeach
                                </select>
                            
                            </div> 
                            <div class="col-md-6"> 
                            <label for="name" class=" col-form-label text-md-right">{{ __('Tipo servicio') }}</label>
                                <select name="id_grado_seccion" id="id_grado_seccion"  class="form-control">
                                    @foreach ($datos_grado_seccion as $item)   
                                    <option value="{{ $item->id}}">{{ $item->grado_carrera_seccion }}</option> 
                                    @endforeach
                                </select>
                            
                            </div>                                
                        </div>
 

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Calificar') }}
                                </button>
                            </div>
                        </div>
                    </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    @endsection