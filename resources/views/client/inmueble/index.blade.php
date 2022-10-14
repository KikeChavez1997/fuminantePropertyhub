@extends('layouts.app', ['activePage' => 'inmuebles', 'titlePage' => __('Inmuebles-Auth')])

@section('content')



  <div class="content">
    <div class="container-fluid">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" style="font-size:24px; font-weight:bold;">Inmuebles</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="inmuebles">
                    <thead>
                        <tr>
                            <th class="text-center">Descripcion</th>
                            <th class="text-center">Calle</th>
                            <th class="text-center">Colonia</th>
                            <th class="text-center">Codigo postal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $datos as $dato )
                        <tr>
                            <th class="text-center">{{ $dato->descripcion }}</th>
                            <th class="text-center">{{ $dato->calle }}</th>
                            <th class="text-center">{{ $dato->colonia }}</th>
                            <th class="text-center">{{ $dato->cp }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agrega un nuevo inmueble</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card" style="width: 28rem;">
            <div class="card-body">
              <form method="post" action="{{ route('client.inmueble.store')}}">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Descripcion</label>
                    <input type="text" class="form-control" name="descripcion" required placeholder="Nombre para identificar al inmueble">
                    @error('descripcion')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Calle</label>
                    <input type="text" class="form-control" name="calle" required placeholder="Calle">
                    @error('calle')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Numero exterior</label>
                    <input type="text" class="form-control" name="exterior" placeholder="Numero exterior">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Numero interior</label>
                    <input type="text" class="form-control" name="interior" placeholder="Numero interior">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Colonia</label>
                    <input type="text" class="form-control" name="colonia" required placeholder="Colonia">
                    @error('colonia')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Ciudad/Alcaldia</label>
                    <input type="text" class="form-control" name="ciudad_alcaldia" required placeholder="Ciudad/Alcaldia">
                    @error('ciudad_alcaldia')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Estado</label>
                    <input type="text" class="form-control" required name="estado" placeholder="Estado">
                    @error('estado')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Codigo postal</label>
                    <input type="text" class="form-control" required name="cp" placeholder="Codigo postal">
                    @error('cp')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Agregar inmueble</button>
              </form>
              
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


  
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>

  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
  <script>
      $(document).ready(function() {
          $('#inmuebles').DataTable({
              responsive: true,
              autoWidth: false,

              "language": {
                  "lengthMenu": "Mostrar _MENU_ registros por página",
                  "zeroRecords": "Nada encontrado",
                  "info": "Mostrando la página _PAGE_ de _PAGES_",
                  "infoEmpty": "No records available",
                  "infoFiltered": "(filtrado de _MAX_ registros totales)",
                  "search": "Buscar:",
                  "paginate":{
                      "next": "Siguiente",
                      "previous":"Anterior"
                  }
      }
          });
      } );   
  </script>
@endpush