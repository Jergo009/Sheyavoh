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
          <h2>Listado de alumnos</h2>
        </div>

        <div class="d-flex justify-content-left">
        <a href="{{url('alumnos/vaciar')}}" class="btn btn-danger" onclick="return confirm('Este proceso eliminará los registros de las calificaiones.\n¿Está seguro eliminar registros actitudinales?')">Eliminar registros actitudinales</a>
        <a href="{{url('alumnos/descargar')}}" class="btn btn-info">Descargar Notas Actitudinales</a>
        </div>
        <div class="d-flex justify-content-end">
        <a href="{{url('alumnos/crear')}}" class="btn btn-success">+ Nuevo Ingreso (manual)</a>
        <a href="{{url('alumnos/crear/automatico')}}" class="btn btn-warning">+ Nuevos Ingresos (cargar)</a>
        </div>

        <div class="card border-light mb-3" ><!-- card, table --> 
        <div class="card-body">
           
                  <div class="table-responsive">
                      <table id="dataTables" class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                      <tr>
                                      <!-- <th>Id</th> -->
                                      <th>Código</th>
                                      <th>Nombre</th> 
                                      <th>Grado/Sección</th> 
                                      <th>Ver faltas</th>
                                      <th>Acciones</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                      <!-- <th>Id</th> -->
                                      <th>Código</th>
                                      <th>Nombre</th> 
                                      <th>Grado/Sección</th> 
                                      <th>Ver faltas</th>
                                      <th>Acciones</th>
                                      </tr>
                                  </tfoot>
                                  <tbody> 
                                  @foreach ($datos as $item)
                                  <tr> 
                                      <!-- <td>{{$item->id}}</td> -->
                                      <td>{{$item->codigo}}</td> 
                                      <td>{{$item->nombre}}</td> 
                                      <td>{{$item->grado_carrera_seccion}}</td>
                                      <td style="text-align: center;">
                                      <a class="btn btn-info btn-sm" href="{{url('/alumnos/faltas/'.$item->id.'/administrador')}}" role="button">Ver</a>
                                      </td>
                                      <td  style="text-align: center;">
                                        <a class="btn btn-warning btn-sm" href="{{url('/alumnos/editar/'.$item->id.'/editar')}}" role="button">Editar</a>
                                        <form action="{{url('/alumnos/eliminar/'.$item->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" name="button"class="btn btn-danger btn-sm"  onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                        </form> 
                                    </td>
                                  </tr>
                                  @endforeach    
                                  </tbody>
                        </table>
                  </div>
            </div> 
        </div> <!-- card, table -->
        
           <!-- <form action="{{url('/alumnos/subir')}}" method="post" enctype="multipart/form-data">
               <input type="text" name="_token" value="{{CSRF_Token()}}">
               <input type="file" name="file" >
               <input type="submit" value="uploads">
           <form> -->

      </div>
    </section>
@endsection
