

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
          <h2>Listado de voluntarios</h2>
        </div>
 

        <div class="card border-light mb-3" ><!-- card, table --> 
        <div class="card-body">
           
                  <div class="table-responsive">
                      <table id="dataTables" class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                      <tr>
                                      <!-- <th>Id</th> -->
                                      <th>Voluntarios</th> 
                                      <th>Acciones</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                      <!-- <th>Id</th> -->
                                      <th>Voluntarios</th> 
                                      <th>Acciones</th>
                                      </tr>
                                  </tfoot>
                                  <tbody> 
                                  @foreach ($datos as $item)
                                  <tr>  
                                      <!-- <td>{{$item->id}}</td> -->
                                      <td>{{$item->name}}</td> 
                                      <td  style="text-align: center;">
                                      <a class="btn btn-info btn-sm" href="{{url('/asignar_pacientes/usuario/'.$item->id)}}" role="button">Administrar</a>    
                                     </td> 
                                  </tr>
                                  @endforeach    
                                  </tbody>
                        </table>
                  </div>
            </div> 
        </div> <!-- card, table -->
        

      </div>
    </section><!-- End Contact Section -->
@endsection
