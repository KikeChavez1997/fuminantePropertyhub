@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('')])

@section('content')
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-header-text card-header-danger">
                <div class="card-text">
                  <h4 class="card-title">Su pago no fue aceptado</h4>
                </div>
              </div>
              <div class="card-body">
                  <p>
                   Su pago no fue exitoso, por favor intente reservar nuevamente con otro metodo de pago.
                  </p>
                  <a class="btn btn-info"href="{{ route('home')}}">Regresar al incio</a>
              </div>
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
  
@endpush