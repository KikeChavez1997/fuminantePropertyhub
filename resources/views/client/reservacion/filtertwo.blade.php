@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Datos-Inmueble-Auth')])

@section('content')
  <div class="content">
      
        @if ($aux == 1) 
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="card-text">
                    <h4 class="card-title" style="font-size:24px; font-weight:bold;"> Continua con tu reservación</h4>
                  </div>
                </div>
                <div class="card-body">

                  <form method="post" action="{{ route('client.reservacion.store') }}">
                    @csrf
                    <p style="font-size:20px;"><i class="material-icons" style="color:green;" >check_circle</i> Servicio: {{$request['residencial']}}</p>
                    <p style="font-size:20px;"><i class="material-icons" style="color:green;" >check_circle</i> Tipo de servicio: {{$request['servicio']}}</p>
                    <p style="font-size:20px;"><i class="material-icons" style="color:green;" >check_circle</i> Codigo postal: {{$request['codigo_postal']}}</p>
                    <p style="font-size:20px;"><i class="material-icons" style="color:green;" >check_circle</i> Superficie: 
                    
                      @if ($request['superficie']==500) 
                      Más de 400 m²
                    @elseif ($request['superficie']==400)
                      De 200 m² a 400 m²
                    @elseif ($request['superficie']==200)
                      Menos de 200 m²
                    @endif</p>

                    <span style="color:gray;" >Tu descuento se aplica en la pantalla final</span>

                    <div class="row">
                      <div class="col-md-5 align-center ">
                        <div class="card">
                            <div class="card-header card-header-icon card-header-success">
                              <div class="card-icon">
                                <i class="material-icons">shopping_cart</i>
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
                    
                    
                    <input type="hidden" class="form-control" value="{{$request['residencial']}}" name="servicio">
                    <input type="hidden" class="form-control" value="{{$request['servicio']}}" name="tipoServicio">
                    <input type="hidden" class="form-control" value="{{$request['codigo_postal']}}" name="codigo_postal">
                    <input type="hidden" class="form-control" value="{{$request['superficie']}}" name="superficial">
                    <input type="hidden" class="form-control" value="{{$super}}" name="costo">

                    <div class="card-header">
                      <div class="card-text">
                        <h4 class="card-title" style="font-size:24px; font-weight:bold;"> Completa los datos del inmueble </h4>
                      </div>
                    </div>

                          @if ($request['residencial'] == "Para mi negocio")
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            
                            <input type="text" class="form-control" placeholder="Nombre del negocio"name="nombre_negocio" style="padding: 15px;
                            border: 1px solid #ccc;
                            background: #dfdfdf;
                            border-radius: 3px;
                            margin-bottom: 10px;
                            width: 100%;
                            box-sizing: border-box;
                            color: #2C3E50;
                            font-size: 18px;">
                          </div>
                          <div class="form-group col-md-6">
                            
                            <input type="text" class="form-control" placeholder="RFC" name="rfc" style="padding: 15px;
                            border: 1px solid #ccc;
                            background: #dfdfdf;
                            border-radius: 3px;
                            margin-bottom: 10px;
                            width: 100%;
                            box-sizing: border-box;
                            color: #2C3E50;
                            font-size: 18px;">
                          </div>
                      </div>
                      @else
                        <input type="hidden" class="form-control" value="" name="nombre_negocio">
                        <input type="hidden" class="form-control" value="" name="rfc">
                      @endif

                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <!-- <label for="inputEmail4">Calle</label> -->
                            <input type="text" class="form-control" placeholder="Calle" name="calle" required style="padding: 15px;
                            border: 1px solid #ccc;
                            background: #dfdfdf;
                            border-radius: 3px;
                            margin-bottom: 10px;
                            width: 100%;
                            box-sizing: border-box;
                            color: #2C3E50;
                            font-size: 18px;">
                          </div>
                          <div class="form-group col-md-3">
                            
                            <input type="text" class="form-control" placeholder="Numero exterior"name="numero_exterior" required style="padding: 15px;
                            border: 1px solid #ccc;
                            background: #dfdfdf;
                            border-radius: 3px;
                            margin-bottom: 10px;
                            width: 100%;
                            box-sizing: border-box;
                            color: #2C3E50;
                            font-size: 18px;">
                          </div>
                          <div class="form-group col-md-3">
                            
                            <input type="text" class="form-control" placeholder="Numero interior (Opcional)" name="numero_interior" required style="padding: 15px;
                            border: 1px solid #ccc;
                            background: #dfdfdf;
                            border-radius: 3px;
                            margin-bottom: 10px;
                            width: 100%;
                            box-sizing: border-box;
                            color: #2C3E50;
                            font-size: 18px;">
                          </div>
                          
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12">
                            
                            <input type="text" class="form-control" placeholder="Colonia" name="colonia" required style="padding: 15px;
                            border: 1px solid #ccc;
                            background: #dfdfdf;
                            border-radius: 3px;
                            margin-bottom: 10px;
                            width: 100%;
                            box-sizing: border-box;
                            color: #2C3E50;
                            font-size: 18px;">
                          </div>
                          
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="exampleFormControlSelect1">Periodicidad</label>
                                      <select class="custom-select" name="periodicidad">
                                        <option value="eventual">Eventual</option>
                                        <option value="semanal">Semanal</option>
                                        <option value="quincenal">Quincenal</option>
                                        <option value="mensual">Mensual</option>
                                        <option value="bimestral">Bimestral</option>
                                        <option value="trimestral">Trimestral</option>
                                      </select>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Alcaldia</label>
                                <select class="custom-select" name="alcaldia">
                                  <option value="Alvaro Obregón">Alvaro Obregón</option>
                                  <option value="Benito Juárez">Benito Juárez</option>
                                  <option value="Coyoacan">Coyoacán</option>
                                  <option value="Miguel Hidalgo">Miguel Hidalgo</option>
                                  <option value="La Magdalena Contreras">La Magdalena Contreras</option>
                                  <option value="Tlalpan">Tlalpan</option>
                                </select>
                          </div>
                          
                        </div>
                        <a class="btn btn-success" href="{{url()->previous()}}">Modificar datos</a>
                        <button type="submit" class="btn" style="background:#0060ff;">Continuar con la reservación</button>
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
                  Estimado Sr(a){{auth()->user()->name}}, en Fuminante estamos trabajando para ofrecer un servicio de alta calidad en todas las zonas de la CDMX y área metropolitana, desafortunadamente aun no contamos con servicio en la zona en donde se encuentra su domicilio. Esperamos pronto poder ofrecerle el servicio que busca. En cuanto esto sea posible estaremos en contacto con usted.
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
                  Estimado Sr(a){{auth()->user()->name}}, en breve recibirá una llamada de nuestro equipo para poder entender mejor su proyecto y poder ofrecerle una cotización.
                </div>
            </div>
        </div>
        @endif
        
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