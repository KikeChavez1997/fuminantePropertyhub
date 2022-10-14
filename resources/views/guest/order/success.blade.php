@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Pago-Satisfactorio-Invitado')])

@section('content')
<div class="container" style="height: auto;"><br><br><br>
  <div class="justify-content-center">

      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-header-text card-header-success">
                <div class="card-text">
                  <h4 class="card-title">Su pago fue acreditado</h4>
                </div>
              </div>
              <div class="card-body">
                  Su pago fue acreditado exitosamente. En breve recibirá un correo con la información. <br> <br>
                  Informatión de la operación: <br><br>
                  Servicio: {{ session('inVservicio') }} <br>
                  Cantidad: ${{ session('inVpago') }} <br>
                  Metodo de pago: Tarjeta de credito (Mercado pago) <br>
                  Numero de la operación: {{$request->collection_id}} <br> <br>
                  <a class="btn btn-info"href="{{ route('inicio')}}">Regresar al incio</a>
              </div>
          </div>
      </div>
      </div>
        
    </div>
  </div>
@endsection

@push('js')
<script> gtag('event', 'conversion', {'send_to': 'AW-10842625755/_rbOCJ_e2tMDENutlbIo'}); </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
  
@endpush