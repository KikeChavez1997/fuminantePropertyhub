@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Pago-satisfactorio-Auth')])

@section('content')
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-header-text card-header-success">
                <div class="card-text">
                  <h4 class="card-title">Su servicio se agendo exitosamente </h4>
                </div>
              </div>
              <div class="card-body">
                  Su servicio fue agendado exitosamente. En breve recibirá un correo con la información. <br> <br>
                  Informatión de la operación: <br><br>
                  Servicio: {{ session('servicio') }} <br>
                  Monto: ${{ session('costo') }} <br>
                  Descuento: $200 <br>
                  Cantidad a pagar: ${{ session('costo') - 200 }} <br>
                  Metodo de pago: @if (session('successMP') == 'Efectivo')
                    Efectivo o con tarjeta de credito en el día del servicio
                    @elseif (session('successMP') == 'Transferencia')
                    Transferencia bancaria
                    @elseif (session('successMP') == 'Mercado')
                    Tarjeta de credito mercado pago
                    @endif  <br>

                    @if (session('successMP') == 'Efectivo')
                    
                    @elseif (session('successMP') == 'Transferencia')
                    
                    @elseif (session('successMP') == 'Mercado')
                    Numero de la operación: {{$request->collection_id}} <br> <br>
                    @endif
                  <a class="btn btn-info"href="{{ route('home')}}">Regresar al incio</a>
              </div>
          </div>
      </div>
      </div>
        
    </div>
  </div>
@endsection

@push('js')
  <!-- Event snippet for Website traffic conversion page --> 
  <script> gtag('event', 'conversion', {'send_to': 'AW-10842625755/_rbOCJ_e2tMDENutlbIo'}); </script>
  
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
  
@endpush