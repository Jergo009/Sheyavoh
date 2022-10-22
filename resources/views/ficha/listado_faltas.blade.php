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
          <h2>Listado de faltas</h2>
        </div> 

        <div class="card border-light mb-3" ><!-- card, table --> 
        <div class="card-body">
           
                  <div class="table-responsive">
                      <table id="dataTables" class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                      <tr>
                                      <th>Código</th>
                                      <th>Nombre</th>  
                                      <th>Falta</th>
                                      <th>Fecha</th>
                                      <th>Curso</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                      <th>Código</th>
                                      <th>Nombre</th>  
                                      <th>Falta</th>
                                      <th>Fecha</th>
                                      <th>Curso</th>
                                      </tr>
                                  </tfoot>
                                  <tbody> 
                                  @foreach ($datos as $item)
                                  <tr> 
                                      <td>{{$item->codigo}}</td>
                                      <td>{{$item->nombre}}</td> 
                                      <td>{{$item->falta}}</td>  
                                      <td>{{$item->fecha}}</td>  
                                      <td>{{$item->curso}}</td>  
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
