@extends('layouts.app', ['activePage' => 'historial', 'titlePage' => __('Historial-Auth')])


@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" style="font-size:24px; font-weight:bold;">Historial de servicios</h4>
            </div>
            <div class="card-body">
                <table class="table" id="citas">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Hora</th>
                            <th>Fecha</th>
                            <th class="text-right">Monto</th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach ( $datos as $dato )
                        
                        <tr>
                            <th class="text-center">{{$dato->descripcion}}</th>
                            <th class="text-center">{{$dato->hora}}</th>
                            <th class="text-center">{{$dato->fecha}}</th>
                            <th class="text-center">${{$dato->monto - 200}} <p style="color:green;" >Descuento de $200 incluido</p> </th>
                        </tr>

                      @endforeach
                
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  

  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
  <script>
      $(document).ready(function() {
          $('#citas').DataTable({
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

<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    md.initDashboardPageCharts();
  });
</script>
@endpush