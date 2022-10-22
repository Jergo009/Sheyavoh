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
          <h2>Listado de pacientes</h2>
        </div>

           
        <div class="d-flex justify-content-end">
        <a href="{{url('pacientes/crear')}}" class="btn btn-success">+ Nuevo Paciente</a>
        </div>

        <div class="card border-light mb-3" ><!-- card, table --> 
        <div class="card-body">
           
                  <div class="table-responsive">
                      <table id="dataTables" class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                      <tr>
                                      <!-- <th>Id</th> -->
                                      <th>Nombre y Apellido</th> 
                                      <th>DPI</th> 
                                      <th>Tipo Servicio</th> 
                                      <th>Motivo Consulta</th> 
                                      <th>Acciones</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                      <!-- <th>Id</th> -->
                                      <th>Nombre y Apellido</th> 
                                      <th>DPI</th> 
                                      <th>Tipo Servicio</th> 
                                      <th>Motivo Consulta</th> 
                                      <th>Acciones</th>
                                      </tr>
                                  </tfoot>
                                  <tbody> 
                                  @foreach ($datos as $item)
                                  <tr> 
                                      <!-- <td>{{$item->id}}</td> -->
                                      <td>{{$item->nombre_apellido}}</td> 
                                      <td>{{$item->dpi}}</td> 
                                      <td>{{$item->tipo_servicio}}</td> 
                                      <td>{{$item->motivo_consulta}}</td> 
                                      <td  style="text-align: center;">
                                        <a class="btn btn-warning btn-sm" href="{{url('/pacientes/editar/'.$item->id.'/editar')}}" role="button">Editar</a>
                                        <form action="{{url('/pacientes/eliminar/'.$item->id)}}" method="POST">
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
        

      </div>
    </section><!-- End Contact Section -->
@endsection
