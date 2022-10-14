@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Fechas-Invitado')])

@section('content')
<div class="container" style="height: auto;"><br><br><br>
    <div class="justify-content-center"> 

          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    <div class="card-text">
                      <h4 class="card-title" style="font-size:24px; font-weight:bold;"> Las fechas que tenemos disponibles son las siguientes para la alcaldia: {{session('inValcaldia')}} </h4>
                    </div>
                  </div>
                  <div class="card-body">

                    <form method="post" action="{{ route('guest.fecha') }}">
                      @csrf

                        @if (session('inValcaldia') == "Alvaro Obregón")

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Fechas disponibles</label>
                                    <select name="fechaRes" class="form-control" >

                                        @php
                            
                                            date_default_timezone_set('America/Mexico_City');
                                            $guia = date('w');
                                            //$guia = 2;
                                            $indicador = 1;

                                            if($guia <= $indicador){
                                                if($guia == $indicador){
                                                    $hoy = date("Y-m-j");
                                                    $dia1 = date("Y-m-j",strtotime($hoy."+ 1 days"));
                                                    $quince = date("Y-m-j",strtotime($dia1."+ 2 week"));

                                                    $fechaInicio=strtotime($dia1);
                                                    $fechaFin=strtotime($quince);
                                                    //Recorro las fechas y con la función strotime obtengo los lunes
                                                    for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                        //Sacar el dia de la semana con el modificador N de la funcion date
                                                        $dia = date('N', $i);
                                                        if($dia==1){
                                                            echo "Lunes. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                        }
                                                    }

                                                }else {
                                                    $hoy = date("Y-m-j");
                                                    $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                    $fechaInicio=strtotime($hoy);
                                                    $fechaFin=strtotime($quince);
                                                    //Recorro las fechas y con la función strotime obtengo los lunes
                                                    for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                        //Sacar el dia de la semana con el modificador N de la funcion date
                                                        $dia = date('N', $i);
                                                        if($dia==1){
                                                            echo "Lunes. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                        }
                                                    }
                                                    
                                                }
                                            }else{ 

                                                    $hoy = date("Y-m-j");
                                                    $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                    $fechaInicio=strtotime($hoy);
                                                    $fechaFin=strtotime($quince);
                                                    //Recorro las fechas y con la función strotime obtengo los lunes
                                                    for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                        //Sacar el dia de la semana con el modificador N de la funcion date
                                                        $dia = date('N', $i);
                                                        if($dia==1){

                                                            echo "Lunes. ". date("Y-m-d", $i)."<br>";
                                                            
                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                        }
                                                    }
                                            }
                                        @endphp         
                                    </select>
                            </div>
                        </div>

                        @elseif(session('inValcaldia') == "Benito Juárez")

                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Fechas disponibles</label>
                                    <select name="fechaRes" class="form-control" >

                                        @php
                            
                                            date_default_timezone_set('America/Mexico_City');
                                            $guia = date('w');
                                            //$guia = 2;
                                            $indicador = 2;

                                            if($guia <= $indicador){
                                                if($guia == $indicador){
                                                    $hoy = date("Y-m-j");
                                                    $dia1 = date("Y-m-j",strtotime($hoy."+ 1 days"));
                                                    $quince = date("Y-m-j",strtotime($dia1."+ 2 week"));

                                                    $fechaInicio=strtotime($dia1);
                                                    $fechaFin=strtotime($quince);
                                                    //Recorro las fechas y con la función strotime obtengo los lunes
                                                    for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                        //Sacar el dia de la semana con el modificador N de la funcion date
                                                        $dia = date('N', $i);
                                                        if($dia==2){
                                                            echo "Martes. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                        }
                                                    }

                                                }else {
                                                    $hoy = date("Y-m-j");
                                                    $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                    $fechaInicio=strtotime($hoy);
                                                    $fechaFin=strtotime($quince);
                                                    //Recorro las fechas y con la función strotime obtengo los lunes
                                                    for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                        //Sacar el dia de la semana con el modificador N de la funcion date
                                                        $dia = date('N', $i);
                                                        if($dia==2){
                                                            echo "Martes. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                        }
                                                    }
                                                    
                                                }
                                            }else{ 

                                                    $hoy = date("Y-m-j");
                                                    $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                    $fechaInicio=strtotime($hoy);
                                                    $fechaFin=strtotime($quince);
                                                    //Recorro las fechas y con la función strotime obtengo los lunes
                                                    for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                        //Sacar el dia de la semana con el modificador N de la funcion date
                                                        $dia = date('N', $i);
                                                        if($dia==2){

                                                            echo "Martes. ". date("Y-m-d", $i)."<br>";
                                                            
                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                        }
                                                    }
                                            }

                                        @endphp  
                                    </select>
                            </div>
                        </div>

                        @elseif(session('inValcaldia') == "Coyoacan")

                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="exampleFormControlSelect1">Fechas disponibles</label>
                                  <select name="fechaRes" class="form-control" >

                                      @php
                          
                                          date_default_timezone_set('America/Mexico_City');
                                          $guia = date('w');
                                          //$guia = 2;
                                          $indicador = 3;

                                          if($guia <= $indicador){
                                              if($guia == $indicador){
                                                  $hoy = date("Y-m-j");
                                                  $dia1 = date("Y-m-j",strtotime($hoy."+ 1 days"));
                                                  $quince = date("Y-m-j",strtotime($dia1."+ 2 week"));

                                                  $fechaInicio=strtotime($dia1);
                                                  $fechaFin=strtotime($quince);
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==3){
                                                          echo "Miercoles. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                      }
                                                  }

                                              }else {
                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==3){
                                                          echo "Miercoles. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                      }
                                                  }
                                                  
                                              }
                                          }else{ 

                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==3){

                                                          echo "Miercoles. ". date("Y-m-d", $i)."<br>";
                                                          
                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                      }
                                                  }
                                          }


                                      @endphp
                                      
                                  </select>
                          </div>
                      </div>

                        @elseif(session('inValcaldia') == "Miguel Hidalgo")

                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="exampleFormControlSelect1">Fechas disponibles</label>
                                  <select name="fechaRes" class="form-control" >

                                      @php
                          
                                          date_default_timezone_set('America/Mexico_City');
                                          $guia = date('w');
                                          //$guia = 2;
                                          $indicador = 4;

                                          if($guia <= $indicador){
                                              if($guia == $indicador){
                                                  $hoy = date("Y-m-j");
                                                  $dia1 = date("Y-m-j",strtotime($hoy."+ 1 days"));
                                                  $quince = date("Y-m-j",strtotime($dia1."+ 2 week"));

                                                  $fechaInicio=strtotime($dia1);
                                                  $fechaFin=strtotime($quince);
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==4){
                                                          echo "Jueves. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                      }
                                                  }

                                              }else {
                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==4){
                                                          echo "Jueves. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                      }
                                                  }
                                                  
                                              }
                                          }else{ 

                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==4){

                                                          echo "Jueves. ". date("Y-m-d", $i)."<br>";
                                                          
                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                      }
                                                  }
                                          }


                                      @endphp
                                      
                                  </select>
                          </div>
                      </div>

                        @elseif(session('inValcaldia') == "La Magdalena Contreras")

                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="exampleFormControlSelect1">Fechas disponibles</label>
                                  <select name="fechaRes" class="form-control" >

                                      @php
                          
                                          date_default_timezone_set('America/Mexico_City');
                                          $guia = date('w');
                                          //$guia = 2;
                                          $indicador = 5;

                                          if($guia <= $indicador){
                                              if($guia == $indicador){
                                                  $hoy = date("Y-m-j");
                                                  $dia1 = date("Y-m-j",strtotime($hoy."+ 1 days"));
                                                  $quince = date("Y-m-j",strtotime($dia1."+ 2 week"));

                                                  $fechaInicio=strtotime($dia1);
                                                  $fechaFin=strtotime($quince);
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==5){
                                                          echo "Viernes. ". date ("Y-m-d", $i)."<br>";

                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                      }
                                                  }

                                              }else {
                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==5){
                                                          echo "Viernes. ". date ("Y-m-d", $i)."<br>";

                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                      }
                                                  }
                                                  
                                              }
                                          }else{ 

                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==5){

                                                          echo "Viernes. ". date("Y-m-d", $i)."<br>";
                                                          
                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                      }
                                                  }
                                          }


                                      @endphp
                                      
                                  </select>
                          </div>
                      </div>


                        @elseif(session('inValcaldia') == "Tlalpan")

                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="exampleFormControlSelect1">Fechas disponibles</label>
                                  <select name="fechaRes" class="form-control" >

                                      @php
                          
                                          date_default_timezone_set('America/Mexico_City');
                                          $guia = date('w');
                                          //$guia = 2;
                                          $indicador = 6;

                                          if($guia <= $indicador){
                                              if($guia == $indicador){
                                                  $hoy = date("Y-m-j");
                                                  $dia1 = date("Y-m-j",strtotime($hoy."+ 1 days"));
                                                  $quince = date("Y-m-j",strtotime($dia1."+ 2 week"));

                                                  $fechaInicio=strtotime($dia1);
                                                  $fechaFin=strtotime($quince);
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==6){
                                                          echo "Sabado. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                      }
                                                  }

                                              }else {
                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==6){
                                                          echo "Sabado. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                      }
                                                  }
                                                  
                                              }
                                          }else{ 

                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==6){

                                                          echo "Sabado. ". date("Y-m-d", $i)."<br>";
                                                          
                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                      }
                                                  }
                                          }


                                      @endphp
                                      
                                  </select>
                          </div>
                      </div>
                        
                          
                        @endif
                        
                          <button type="submit" class="btn btn-success">Continuar con la reservación</button>
                        </form>
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