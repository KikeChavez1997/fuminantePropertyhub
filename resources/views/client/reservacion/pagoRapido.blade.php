@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Pago-Auth')])

@php
    // SDK de Mercado Pago
    require base_path('vendor/autoload.php');
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

    // Crea un objeto de preferencia
      $preference = new MercadoPago\Preference();

      $preference->payment_methods = array(
      "excluded_payment_types" => array(
        array('id' => 'atm'),
              array('id' => 'ticket')
      ),
      "installments" => 1
    );

      // Crea un ítem en la preferencia
      $item = new MercadoPago\Item();
      $item->title =  session('TipoServicioRapido');
      $item->description = session('TipoServicioRapido');
      $item->currency = 'MXN';
      $item->quantity = 1;
      $item->unit_price = session('CostoRapido');

      $preference->back_urls = array(
      "success" => route('order.success'),
      "failure" => route('order.failure'),
      "pending" => route('order.pending'),
      );
      $preference->auto_return = "approved";

      $preference->items = array($item);
      $preference->save();

@endphp

@section('content')
  <div class="content">
    <div class="container-fluid">

        

          @if (session('TipoPagoRapido') == 'mercado_pago') 
            
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-success">
                      <div class="card-icon">
                        <i class="material-icons">shopping_cart</i>
                      </div>
                    </div>
                    <div class="card-body">
                        <h4 style="text-align: center; font-size:20px; font-weight: bold;" class="card-title">Pagar por medio de tarjeta de credito</h4>
                        <br>
                        <p style="font-size:19px;">Tipo de servicio: {{session('TipoServicioRapido')}}</p>
                        <p style="font-size:19px;">Fecha: 
                          @php
                          setlocale(LC_TIME, "spanish");
                          $fecha = '2021/11/18';
                          $fecha = str_replace("/", "-", session('fechaResAuth') ); 
                          $newDate = date("d-m-Y", strtotime(session('fechaResAuth') )); 
                          $mesDesc = strftime("%d de %B del %Y", strtotime($newDate));
                          echo $mesDesc;
                          @endphp 
                        </p>
                        <p style="font-size:19px;">Hora: {{session('InvHorarioWhats') }}</p>
                        <p style="font-size:19px;">Superficie: {{$check[0]->superficie}} m2</p>
                        <p style="font-size:19px;">Total a pagar: ${{$check[0]->costo}}</p>
                        <div class="cho-container">
                        </div>
                    </div>
                </div>
              </div>
            </div>
          @elseif (session('TipoPagoRapido') == 'transferencia')
            <div class="row" >
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-success">
                      <div class="card-icon">
                        <i class="material-icons">shopping_cart</i>
                      </div>
                    </div>
                    <div class="card-body">
                        <h4 style="text-align: center; font-size:20px; font-weight: bold;" class="card-title">Pagar por medio de tranferencia bancaria</h4>
                        <br>
                        <p>
                          Podras realizar el pago de ${{ session('costo') }} con el concepto de "Servicio fuminante" a la siguiente cuenta,
                          de igual forma te mandararemos los datos por medio de correo electrónico. Gracias por contratar a fuminanate. <br> <br>
                          No olvides guardar tu comprobante de tranferencia para poder presentarlo cuando realicen tu servicio.
                        </p><br>
                        <p>
                          FUMINANTE, S.A. De C.V. <br> <br>
                          Cuenta: 4022493134 <br> <br>
                          Clabe : 021180040224931348 <br> <br>
                          Banco:HSBC <br> <br>
                        </p>
                        <a class="btn btn-success"href="{{route('home')}}">Ir a inicio</a>
                    </div>
                </div>
              </div>
            </div>
          @elseif (session('TipoPagoRapido') == 'efectivo')
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-success">
                      <div class="card-icon">
                        <i class="material-icons">shopping_cart</i>
                      </div>
                    </div>
                    <div class="card-body">
                        <h4 style="text-align: center; font-size:20px; font-weight: bold;" class="card-title">Pago en sitio</h4>
                        <br>
                        <p>
                          Usted ha elegido realizar el pago de ${{session('costo')}} en el día del servicio.
                          Le recordamos que esto lo puede hacer en efectivo o con tarjeta de credito. <br>
                          Podrás ver detalles de tu reservacion en la seccion de historial de reservaciones.
                        </p>
                        <br>
                        <a class="btn btn-success"href="{{route('home')}}">Ir a inicio</a>
                    </div>
                </div>
              </div>
            </div>
          @endif
        
    </div>
  </div>
@endsection

@push('js')

// SDK MercadoPago.js V2
  <script src="https://sdk.mercadopago.com/js/v2"></script>
  <script>
    // Agrega credenciales de SDK
    const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
      locale: "es-MX",
    });
  
    // Inicializa el checkout
    mp.checkout({
      preference: {
        id: "{{$preference->id}}",
      },
      render: {
        container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
        label: "Pagar", // Cambia el texto del botón de pago (opcional)
      },
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>

<script>
  // Accedemos al botón
  document.getElementById('obj1').style.display = 'none';
  document.getElementById('obj2').style.display = 'none';
  document.getElementById('obj3').style.display = 'none';

      // evento para el input radio del "si"
      document.getElementById('res1').addEventListener('click', function(e) {
      console.log('Vamos a habilitar el input text');
      //nameCony.disabled = false;
      document.getElementById('obj1').style.display = 'block';
      document.getElementById('obj2').style.display = 'none';
      document.getElementById('obj3').style.display = 'none';

      });

      // evento para el input radio del "no"
      document.getElementById('res2').addEventListener('click', function(e) {
      console.log('Vamos a deshabilitar el input text');
      //nameCony.disabled = true;
      document.getElementById('obj1').style.display = 'none';
      document.getElementById('obj2').style.display = 'block';
      document.getElementById('obj3').style.display = 'none';
      });

      document.getElementById('res3').addEventListener('click', function(e) {
      console.log('Vamos a deshabilitar el input text');
      //nameCony.disabled = true;
      document.getElementById('obj1').style.display = 'none';
      document.getElementById('obj2').style.display = 'none';
      document.getElementById('obj3').style.display = 'block';
      });

      /*function ocultar(){
      document.getElementById('obj1').style.display = 'none';
      }

      function mostrar(){
      document.getElementById('obj1').style.display = 'block';
      }*/
</script>
  
@endpush