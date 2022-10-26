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

        <div class="card border-light mb-3" ><!-- card, table --> 
        <div class="card-body">
           
                  <div class="table-responsive">
                      <table id="dataTables" class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                      <tr>
                                      <!-- <th>Id</th> -->
                                      <th>Nombre y Apellido</th> 
                                      <th>DPI/CUI</th> 
                                      <!-- <th>Tipo Servicio</th>  -->
                                      <th>Motivo Consulta</th> 
                                      <th>Referido por</th> 
                                      <th>Acciones</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                      <!-- <th>Id</th> -->
                                      <th>Nombre y Apellido</th> 
                                      <th>DPI/CUI</th> 
                                      <!-- <th>Tipo Servicio</th>  -->
                                      <th>Motivo Consulta</th> 
                                      <th>Referido por</th> 
                                      <th>Acciones</th>
                                      </tr>
                                  </tfoot>
                                  <tbody> 
                                  @foreach ($datos as $item)
                                  <tr> 
                                      <!-- <td>{{$item->id}}</td> -->
                                      <td>{{$item->nombre_apellido}}</td> 
                                      <td>{{$item->dpi}}</td> 
                                      <!-- <td>{{$item->tipo_servicio}}</td>  -->
                                      <td>{{$item->motivo_consulta}}</td> 
                                      <td>{{$item->referido_por}}</td> 
                                      <td  style="text-align: center;">
                                        <a class="btn btn-warning btn-sm" href="{{url('/pacientes/editar/'.$item->id.'/editar')}}" role="button">Tratamiento</a>
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