@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Tipo-de-pago')])

@php

    use Illuminate\Support\Facades\DB;
    use App\Models\Promocion;

    //Codigo para validadr



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
      $item->title = $check[0]->tipoServicio;
      $item->description = $check[0]->tipoServicio;
      $item->currency = 'MXN';
      $item->quantity = 1;
      $item->unit_price = $check[0]->costo - 200;

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


        <div class="card card-nav-tabs">
          <div class="card-header card-header-info">
            Seleccione su tipo de pago
          </div>
          <div class="card-body">
            <br>
            <h4 class="card-title">Formas de pago disponibles</h4>
            <br>

            <div class="form-row">
              <div class="form-group col-md-6">
                  <div class="form-check">
                          <label class="form-check-label">
                                  <input class="form-check-input" id="res1" name="res1" type="radio" value="9:00">
                                  Tarjeta de credito 
                                  <span class="form-check-sign">
                                      <span class="check"></span>
                                  </span> 
                          </label>
                  </div>
                  <div class="form-check">
                      <label class="form-check-label">
                          <input class="form-check-input" id="res2" name="res1" type="radio" value="9:00">
                          Transferencia bancaria
                          <span class="form-check-sign">
                              <span class="check"></span>
                          </span>
                      </label>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" id="res3" name="res1" type="radio" value="9:00">
                        Efectivo o con tarjeta de credito en el día del servicio
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                  </div>
                </div>
              </div>
          </div>
        </div>

            
            <div class="row" id="obj1">
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-success">
                      <div class="card-icon">
                        <i class="material-icons">shopping_cart</i>
                      </div>
                    </div>
                    <div class="card-body">
                        <h4 style="text-align: center; font-size:20px; font-weight: bold;" class="card-title">Resumen de compra</h4>
                        <br>
                        <p style="font-size:19px;"> <strong>Detalles de compra</strong> </p>
                        <!--
                        <p style="font-size:19px;">Tipo de servicio: {{$check[0]->tipoServicio}}</p>
                        <p style="font-size:19px;">Fecha: 
                          @php
                          setlocale(LC_TIME, "spanish");
                          //$fecha = '2021/11/18';
                          $fecha = str_replace("/", "-", session('fechaResAuth') ); 
                          $newDate = date("d-m-Y", strtotime(session('fechaResAuth') )); 
                          $mesDesc = strftime("%d de %B del %Y", strtotime($newDate));
                          echo $mesDesc;
                          @endphp 
                        </p>
                        <p style="font-size:19px;">Hora: {{session('InvHorarioWhats') }}</p>
                        <p style="font-size:19px;">Superficie: {{$check[0]->superficie}} m2</p>
                        <p style="font-size:19px;">Subtotal a pagar sin descuento: ${{$check[0]->costo}}</p>
                        <p style="font-size:19px;">Descuento de primer reservación: $200</p>
                        <p style="font-size:19px;">Total a pagar con promocion activada: ${{$check[0]->costo  - 200}}</p>
                      -->
                        <div class="table-responsive">
                          <table class="table table-shopping">
                              <thead>
                                  <tr>
                                      <th>Servicio</th>
                                      <th class="th-description">Fecha</th>
                                      <th class="th-description">Hora</th>
                                      <th class="text-right">Costo</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td class="td-name">
                                          <a>{{$check[0]->tipoServicio}}</a>
                                      </td>
                                      <td style="font-size: 18px;">
                                        @php
                                        setlocale(LC_TIME, "spanish");
                                        //$fecha = '2021/11/18';
                                        $fecha = str_replace("/", "-", session('fechaResAuth') ); 
                                        $newDate = date("d-m-Y", strtotime(session('fechaResAuth') )); 
                                        $mesDesc = strftime("%d de %B del %Y", strtotime($newDate));
                                        echo $mesDesc;
                                        @endphp 
                                      </td>
                                      <td style="font-size: 18px;">
                                        {{session('InvHorarioWhats') }}
                                      </td>
                                      <td style="font-size: 18px;" class="td-number">
                                        ${{$check[0]->costo}}
                                      </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td style="color:green; font-size: 18px;">
                                     Descuento
                                    </td>
                                    <td style="color:green; font-size: 18px;" class="td-number">
                                      $200
                                    </td>
                                </tr>
                                <tr>
                                  <td>
                                  </td>
                                  <td>
                                  </td>
                                  <td style="font-size: 18px;">
                                   Pagas
                                  </td>
                                  <td style="font-size: 18px;" class="td-number">
                                    ${{$check[0]->costo  - 200}}
                                  </td>
                              </tr>
                              <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                 
                                </td>
                                <td>
                                  <div class="cho-container">
                                  </div>
                                </td>
                            </tr>
                              </tbody>
                          </table>
                        </div>
                        
                        
                    </div>
                </div>
              </div>
            </div>
          
            <div class="row" id="obj2">
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-success">
                      <div class="card-icon">
                        <i class="material-icons">shopping_cart</i>
                      </div>
                    </div>
                    <div class="card-body">
                        <h4 style="text-align: center; font-size:20px; font-weight: bold;" class="card-title">Detalles de compra</h4>
                        <br>
                        <p style="text-align: center; font-size:18px">
                          Podras realizar el pago de ${{$check[0]->costo  - 200 }} con su descuento incluido, con el concepto de "Servicio fuminante" a la siguiente cuenta,
                          de igual forma te mandararemos los datos por medio de correo electrónico. Gracias por contratar a fuminanate. <br> <br>
                          No olvides guardar tu comprobante de tranferencia para poder presentarlo cuando realicen tu servicio.
                        </p><br>
                        <p style="font-size:18px">
                          FUMINANTE, S.A. De C.V. <br> <br>
                          Cuenta: 4022493134 <br> <br>
                          Clabe : 021180040224931348 <br> <br>
                          Banco:HSBC <br> <br>
                        </p>
                        <a class="btn btn-success"href="{{route('order.transferenciaPay')}}">Reservar</a>
                    </div>
                </div>
              </div>
            </div>
          
            <div class="row" id="obj3">
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-success">
                      <div class="card-icon">
                        <i class="material-icons">shopping_cart</i>
                      </div>
                    </div>
                    <div class="card-body">
                        <h4 style="text-align: center; font-size:20px; font-weight: bold;" class="card-title">Detalles de compra</h4>
                        <br>
                        <p style="text-align: center; font-size:18px">
                          Usted ha elegido realizar el pago de ${{$check[0]->costo  - 200}} con su descuento incluido, en el día del servicio.
                          Le recordamos que esto lo puede hacer en efectivo o con tarjeta de credito. <br>
                          Podrás ver detalles de tu reservacion en la seccion de historial de reservaciones.
                        </p>
                        <br>
                        <a class="btn btn-success"href="{{route('order.efectivoPay')}}">Reservar</a>
                    </div>
                </div>
              </div>
            </div>
        
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
        label: "PAGAR", // Cambia el texto del botón de pago (opcional)
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