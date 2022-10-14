@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Datos-Inmueble-Invitado')])

@section('content')
<div class="container" style="height: auto;"><br><br><br>
    <div class="justify-content-center"> 

      @if ($aux == 1) 
          <div class="col-md-12">
              <div class="card">

                  <div class="card-header">
                    <div class="card-text">
                      <h4 class="card-title" style="font-size:24px; font-weight:bold;">Resumen de tu reservación</h4>
                    </div>
                  </div>

                  <div class="card-body">

                    <form method="post" action="{{ route('guest.pago') }}">
                      @csrf
                      <p style="font-size:20px;"><i class="material-icons" style="color:green;" >done</i> Servicio: {{$request['inVresidencial']}}</p>
                      <p style="font-size:20px;"><i class="material-icons" style="color:green;" >done</i> Tipo de servicio: {{$request['inVservicio']}}</p>
                      <p style="font-size:20px;"><i class="material-icons" style="color:green;" >done</i> Codigo postal: {{$request['inVcodigo_postal']}}</p>
                      <p style="font-size:20px;"><i class="material-icons" style="color:green;" >done</i> Superficie: {{$request['inVsuperficie']}} m2 </p>
                      
                      <div class="row">
                        <div class="col-md-5 align-center ">
                          <div class="card">
                              <div class="card-header card-header-icon card-header-success">
                                <div class="card-icon">
                                  <i class="material-icons">language</i>
                                </div>
                              </div>
                              <div class="text-center" style="width: 20rem;">
                                <div class="card-body">
                                  <h4 class="card-title">Costo por servicio</h4>
                                  <p style="font-size:20px; font-weight:bold;"> ${{$super}} MXN </p>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="card-header col-md-6">
                        <div class="card-text">
                          <h4 class="card-title" style="font-size:24px; font-weight:bold;"> Completa los datos del inmueble </h4>
                        </div>
                      </div>
                      
                        @if ($request['inVresidencial'] == "Para mi negocio")
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nombre del negocio</label>
                                <input type="text" class="form-control" name="inVnombre_negocio">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputPassword4">RFC</label>
                                <input type="text" class="form-control" name="inVrfc">
                              </div>
                          </div>
                        @else
                          <input type="hidden" class="form-control" value="" name="inVnombre_negocio">
                          <input type="hidden" class="form-control" value="" name="inVrfc">
                        @endif

                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="inputEmail4">Calle</label>
                              <input type="text" class="form-control" name="inVcalle" required>
                            </div>
                            <div class="form-group col-md-3">
                              <label for="inputPassword4">Numero interior</label>
                              <input type="text" class="form-control" name="inVnumero_interior" required>
                            </div>
                            <div class="form-group col-md-3">
                              <label for="inputPassword4">Numero exterior</label>
                              <input type="text" class="form-control" name="inVnumero_exterior">
                            </div>
                        </div>
                        <div class="form-row"> 
                          <div class="form-group col-md-6"> <br>
                              <label for="inputEmail4">Colonia</label>
                              <input type="text" class="form-control" name="inVcolonia" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleFormControlSelect1">Alcaldia</label>
                                <select class="form-control" name="inValcaldia">
                                  <option value="Alvaro Obregón">Alvaro Obregón</option>
                                  <option value="Benito Juárez">Benito Juárez</option>
                                  <option value="Coyoacan">Coyoacan</option>
                                  <option value="Miguel Hidalgo">Miguel Hidalgo</option>
                                  <option value="La Magdalena Contreras">La Magdalena Contreras</option>
                                  <option value="Tlalpan">Tlalpan</option>
                                </select>
                            </div> 
                        </div>
                        <div class="form-row"> 
                            <div class="form-group col-md-6">
                              <label for="exampleFormControlSelect1">Tipo de pago</label>
                                <select class="form-control" name="inVtipoPago">
                                  <option value="mercado_pago">Tarjeta de credito</option>
                                  <option value="transferencia">Transferencia bancaria</option>
                                  <option value="efectivo">Efectivo o con tarjeta de credito en el día del servicio</option>
                                </select>
                            </div> 
                        </div>
                        
                          <a class="btn btn-warning" href="{{url()->previous()}}">Modificar datos</a>
                          <button type="submit" class="btn btn-success">Continuar con la reservación</button>
                        </form>
                  </div>
              </div>
          </div>

    @elseif ($aux == 0)
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text card-header-info">
                  <div class="card-text">
                    <h4 class="card-title"> Cobertura </h4>
                  </div>
                </div>
                <div class="card-body">
                  Estimado Sr(a){{session('inVnombre')}}, en Fuminante estamos trabajando para ofrecer un servicio de alta calidad en todas las zonas de la CDMX y área metropolitana, desafortunadamente aun no contamos con servicio en la zona en donde se encuentra su domicilio. Esperamos pronto poder ofrecerle el servicio que busca. En cuanto esto sea posible estaremos en contacto con usted.
                  Le agradecemos nos haya contactado.
                  
                </div>
            </div>
        </div>

    @elseif ($aux == 3)
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text card-header-info">
                  <div class="card-text">
                    <h4 class="card-title"> Superficie </h4>
                  </div>
                </div>
                <div class="card-body">
                  Estimado Sr(a){{ session('inVnombre') }}, en breve recibirá una llamada de nuestro equipo para poder entender mejor su proyecto y poder ofrecerle una cotización.
                </div>
            </div>
        </div>
    @endif
        
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