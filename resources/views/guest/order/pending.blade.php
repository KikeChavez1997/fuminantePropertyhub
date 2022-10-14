@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Pago-Pendiente-Invitado')])

@section('content')
<div class="container" style="height: auto;"><br><br><br>
    <div class="justify-content-center">

      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-header-text card-header-warning">
                <div class="card-text">
                  <h4 class="card-title">Su pago esta en proceso de aceptación</h4>
                </div>
              </div>
              <div class="card-body">
                  <p>
                    Cuando su pago se acredite, podrá verlo reflejado en su cuenta de mercado pago. Gracias
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