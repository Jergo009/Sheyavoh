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
                @if (session('mensaje_error'))
                <div class="alert alert-danger">
                    {{session('mensaje_error')}}
                </div>
                @endif
        </div>

        <div class="section-title">
          <h2>Cargar listado de alumnos</h2>
        </div>
 
        <form action="{{url('/alumnos/subir')}}" method="post" enctype="multipart/form-data">
            
            <div class="form-group row"> 
              <div class="col-md-4">
              <input type="hidden" name="_token" value="{{CSRF_Token()}}">
              <input type="file" name="file" >              
              </div>  
            </div> 
            <div class="form-group row mb-0">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Cargar alumnos') }}
                    </button>
                </div>
            </div>
        <form> 

      </div>
    </section>
@endsection
