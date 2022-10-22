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
          <!-- <h2>Listado de alumnos {{$datos_id_grado." ".$datos_id_curso}}</h2> -->
          <h2>Listado de alumnos</h2>
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
                                      <th>Faltas Actuales</th>
                                      <th>Calificar Falta</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                      <!-- <th>Id</th> -->
                                      <th>Código</th>
                                      <th>Nombre</th>  
                                      <th>Faltas Actuales</th>
                                      <th>Calificar Falta</th>
                                      </tr>
                                  </tfoot>
                                  <tbody> 
                                  @foreach ($datos_alumnos as $item)
                                  <tr> 
                                      <!-- <td>{{$item->id}}</td> -->
                                      <td>{{$item->codigo}}</td> 
                                      <td>{{$item->nombre}}</td> 
                                      <td  style="text-align: center;">
                                      <a class="btn btn-info btn-sm" href="{{url('/fichas/calificar/'.$item->id)}}" role="button">Ver</a>    
                                     </td> 
                                      <td  style="text-align: center;">
                                        <!-- <a class="btn btn-warning btn-sm" href="{{url('/alumnos/editar/'.$item->id.'/editar')}}" role="button">Editar</a> -->
                                        <form action="{{url('/fichas/calificar/'.$item->id.'/'.$datos_id_curso)}}" method="POST">
                                        {{csrf_field()}}  
                                        <select name="id_falta" id="id_falta"  class="form-control">
                                            @foreach ($datos_faltas as $item)   
                                            <option value="{{ $item->id}}">{{ $item->falta }}</option> 
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-warning btn-sm"  onclick="return confirm('¿Calificar?')">Calificar aspecto</button>
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
