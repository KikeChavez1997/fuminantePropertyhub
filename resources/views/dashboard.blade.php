@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Inicio-Auth')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      

      <div class="row">

        <div class="card text-center">
          
          <div class="card-body">
              <h4 class="card-title" style="color:#13B9CE; font-size:30px; font-weight:bold;" >!Felicidades!</h4>
                  <p style="font-size:19px;">Tu registro se ha realizado con éxito</p>
                  <i class="material-icons" style="color:#13B9CE; font-size:70px;">email</i>
                  <p style="font-size:19px;">Te hemos enviado un correo con tus datos de acceso.</p>

                  <div>
                    <a class="btn btn-info" href="{{ route('filterone')}}">Continuar</a>
                  </div>
          </div>
        </div>
      </div>

      <!--
       <div class="row">

        @foreach ($inmuebles as $inmueble )
          @foreach ($reservaciones as $reservacion) 
        
              <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon card-header-success">
                      <div class="card-icon">
                        <i class="material-icons">shopping_cart</i>
                      </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Reserva rapidamente</h4>
                        @php
                          
                            session(['TipoServicioRapido' => $reservacion->tipoServicio]);
                            session(['CostoRapido' => $reservacion->costo]);
                            
                        @endphp
                          <br>
                            <p>Dirección: {{$inmueble->calle}} </p> 
                            <p>Numero interior: {{$inmueble->interior}} </p>
                            <p>Colonia: {{$inmueble->colonia}} </p>
                            <p>Alcaldia: {{$inmueble->ciudad_alcaldia}} </p>
                            <p>Codigo postal: {{$inmueble->cp}} </p>
                            <p>Tipo de servicio: {{$reservacion->tipoServicio}} </p>
                            <p>Superficie: {{$reservacion->superficie}} </p>
                            <p>Costo: ${{$reservacion->costo}} </p>
                            
                            <form method="post" action="{{ route('client.rapidamente') }}">
                              @csrf
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Selecciona tu forma de pago:</label>
                                <select class="form-control" name="tipoPago">
                                  <option value="mercado_pago">Tarjeta de credito</option>
                                  <option value="transferencia">Transferencia bancaria</option>
                                  <option value="efectivo">Efectivo o con tarjeta de credito en el día del servicio</option>
                                </select>
                              </div>
                              
                              <!-- <button type="submit" class="btn btn-info">Reservar</button> -->
                            </form>
                    </div>
                </div>
              </div>
          @endforeach
        @endforeach
      
        </div>
      -->
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