

@extends('plantilla.base_plantilla')

@section('contenido') 
<section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Listado de pacientes - {{$datosUsuario->name}}</h2>
        </div> 
        @if (session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
        @endif 

        <div class="card border-light mb-3" ><!-- card, table --> 
        <div class="card-body">
        <form method="POST" action="{{url('/asignar_pacientes/usuario/'.$datosUsuario->id.'/guardar')}}"   >
        @csrf
                  <div class="table-responsive">
                      <table id="dataTables" class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                      <tr>
                                      <th>Nombre y Apellido</th> 
                                      <th>DPI</th> 
                                      <th>Tipo Servicio</th> 
                                      <th>Motivo Consulta</th> 
                                      <th>Asignar/Quitar</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                      <th>Nombre y Apellido</th> 
                                      <th>DPI</th> 
                                      <th>Tipo Servicio</th> 
                                      <th>Motivo Consulta</th> 
                                      <th>Asignar/Quitar</th>
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
                                      <input type="checkbox" id="paciente[]" name="paciente[]" value="{{$item->id}}" 
                                      @foreach ($datosUsuarioAsignados as $item2)
                                        @if($item2->id_paciente == $item->id)
                                        checked
                                         @endif
                                      @endforeach
                                     >  
                                     </td> 
                                  </tr>
                                  @endforeach    
                                  </tbody>
                        </table>
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
        </div> <!-- card, table -->
        

      </div>
    </section><!-- End Contact Section -->
@endsection
