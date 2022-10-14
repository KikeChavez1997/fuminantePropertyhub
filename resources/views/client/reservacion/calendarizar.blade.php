@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Fecha-Auth')])

@section('content')
<div class="container" style="height: auto;"><br><br><br>
    <div class="justify-content-center"> 

          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    <div class="card-text">
                      <h4 class="card-title" style="font-size:24px; font-weight:bold;"> Seleccione la fecha que más le convenga para para la alcaldia: <strong style="color:#0060ff;"> {{session('alcaldiaAuth')}}</strong> </h4>
                    </div>
                  </div>
                  <div class="card-body">

                    <form method="post" action="{{ route('client.fecha') }}"> 
                      @csrf

                        @if (session('alcaldiaAuth') == "Alvaro Obregón")

                        <div class="form-row">
                            <div class="col-md-4">
                               
                                <label>Selecciona una de las fechas que tenemos disponibles: </label>

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
                                                    $fecha1 = 0;
                                                    $fecha2 = 0;
                                                    //Recorro las fechas y con la función strotime obtengo los lunes
                                                    for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                        //Sacar el dia de la semana con el modificador N de la funcion date
                                                        $dia = date('N', $i);
                                                        if($dia==1){
                                                            echo "Lunes. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Lunes, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }                              
                                                        }
                                                    }

                                                    echo "<br><br>";
                                                    echo "<input name='fechaRes' type='date'
                                                        min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                        margin: 0 auto;
                                                        width: 45%;
                                                        font-family: arial, sans-serif;
                                                        font-size: 20px;
                                                        font-weight: bold;
                                                        text-transform: uppercase;
                                                        background-color: lighten(#2f2f2f,40%);
                                                        outline: none;
                                                        border: 10;
                                                        border-radius: 3px;
                                                        border-color:#2f2f2f;
                                                        padding: 0 3px;
                                                        color: rgb(14, 13, 13);'>";
                                                    echo "<br><br><br>";

                                                }else {
                                                    $hoy = date("Y-m-j");
                                                    $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                    $fechaInicio=strtotime($hoy);
                                                    $fechaFin=strtotime($quince);
                                                    $fecha1 = 0;
                                                    $fecha2 = 0;
                                                    //Recorro las fechas y con la función strotime obtengo los lunes
                                                    for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                        //Sacar el dia de la semana con el modificador N de la funcion date
                                                        $dia = date('N', $i);
                                                        if($dia==1){
                                                            echo "Lunes. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Lunes, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }  
                                                            
                                                        }
                                                    }

                                                    echo "<br><br>";
                                                    echo "<input name='fechaRes' type='date'
                                                        min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                        margin: 0 auto;
                                                        width: 45%;
                                                        font-family: arial, sans-serif;
                                                        font-size: 20px;
                                                        font-weight: bold;
                                                        text-transform: uppercase;
                                                        background-color: lighten(#2f2f2f,40%);
                                                        outline: none;
                                                        border: 10;
                                                        border-radius: 3px;
                                                        border-color:#2f2f2f;
                                                        padding: 0 3px;
                                                        color: rgb(14, 13, 13);'>";
                                                    echo "<br><br><br>";
                                                    
                                                }
                                            }else{ 

                                                    $hoy = date("Y-m-j");
                                                    $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                    $fechaInicio=strtotime($hoy);
                                                    $fechaFin=strtotime($quince);
                                                    $fecha1 = 0;
                                                    $fecha2 = 0;
                                                    //Recorro las fechas y con la función strotime obtengo los lunes
                                                    for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                        //Sacar el dia de la semana con el modificador N de la funcion date
                                                        $dia = date('N', $i);
                                                        if($dia==1){

                                                            //echo "Lunes. ". date("Y-m-d", $i)."<br>";
                                                            
                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<option value='$date'> ".strftime("%d de %B del %Y", $i)."</option>";
                                                            
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Lunes, "
                                                            //.strftime("%d de %B del %Y", $i)." ";

                                                            //echo $date;

                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }

                                                        }
                                                        
                                                    }

                                                    echo "<br><br>";
                                                    echo "<input name='fechaRes' type='date'
                                                        min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                        margin: 0 auto;
                                                        width: 45%;
                                                        font-family: arial, sans-serif;
                                                        font-size: 20px;
                                                        font-weight: bold;
                                                        text-transform: uppercase;
                                                        background-color: lighten(#2f2f2f,40%);
                                                        outline: none;
                                                        border: 10;
                                                        border-radius: 3px;
                                                        border-color:#2f2f2f;
                                                        padding: 0 3px;
                                                        color: rgb(14, 13, 13);'>";
                                                    echo "<br><br><br>";
                                            }
                                        @endphp
                                         
                            </div>
                        </div>

                        @elseif(session('alcaldiaAuth') == "Benito Juárez")

                          <div class="form-row">
                            <div class="col-md-4">
                                <label for="exampleFormControlSelect1">Selecciona una de las fechas que tenemos disponibles:</label>
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
                                                    $fecha1 = 0;
                                                    $fecha2 = 0;
                                                    //Recorro las fechas y con la función strotime obtengo los lunes
                                                    for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                        //Sacar el dia de la semana con el modificador N de la funcion date
                                                        $dia = date('N', $i);
                                                        if($dia==2){
                                                            //echo "Martes. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Martes, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                        }
                                                    }
                                                    echo "<br><br>";
                                                    echo "<input name='fechaRes' type='date'
                                                        min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                        margin: 0 auto;
                                                        width: 45%;
                                                        font-family: arial, sans-serif;
                                                        font-size: 20px;
                                                        font-weight: bold;
                                                        text-transform: uppercase;
                                                        background-color: lighten(#2f2f2f,40%);
                                                        outline: none;
                                                        border: 10;
                                                        border-radius: 3px;
                                                        border-color:#2f2f2f;
                                                        padding: 0 3px;
                                                        color: rgb(14, 13, 13);'>";
                                                    echo "<br><br><br>";

                                                }else {
                                                    $hoy = date("Y-m-j");
                                                    $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                    $fechaInicio=strtotime($hoy);
                                                    $fechaFin=strtotime($quince);
                                                    $fecha1 = 0;
                                                    $fecha2 = 0;
                                                    //Recorro las fechas y con la función strotime obtengo los lunes
                                                    for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                        //Sacar el dia de la semana con el modificador N de la funcion date
                                                        $dia = date('N', $i);
                                                        if($dia==2){
                                                            //echo "Martes. ". date ("Y-m-d", $i)."<br>";

                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Martes, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                        }
                                                    }
                                                    echo "<br><br>";
                                                    echo "<input name='fechaRes' type='date'
                                                        min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                        margin: 0 auto;
                                                        width: 45%;
                                                        font-family: arial, sans-serif;
                                                        font-size: 20px;
                                                        font-weight: bold;
                                                        text-transform: uppercase;
                                                        background-color: lighten(#2f2f2f,40%);
                                                        outline: none;
                                                        border: 10;
                                                        border-radius: 3px;
                                                        border-color:#2f2f2f;
                                                        padding: 0 3px;
                                                        color: rgb(14, 13, 13);'>";
                                                    echo "<br><br><br>";
                                                    
                                                }
                                            }else{ 

                                                    $hoy = date("Y-m-j");
                                                    $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                    $fechaInicio=strtotime($hoy);
                                                    $fechaFin=strtotime($quince);
                                                    $fecha1 = 0;
                                                    $fecha2 = 0;
                                                    //Recorro las fechas y con la función strotime obtengo los lunes
                                                    for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                        //Sacar el dia de la semana con el modificador N de la funcion date
                                                        $dia = date('N', $i);
                                                        if($dia==2){

                                                            //echo "Martes. ". date("Y-m-d", $i)."<br>";
                                                            
                                                            $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Martes, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                        }
                                                        echo "<br><br>";
                                                        echo "<input name='fechaRes' type='date'
                                                            min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                            margin: 0 auto;
                                                            width: 45%;
                                                            font-family: arial, sans-serif;
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            text-transform: uppercase;
                                                            background-color: lighten(#2f2f2f,40%);
                                                            outline: none;
                                                            border: 10;
                                                            border-radius: 3px;
                                                            border-color:#2f2f2f;
                                                            padding: 0 3px;
                                                            color: rgb(14, 13, 13);'>";
                                                        echo "<br><br><br>";
                                                    }
                                            }

                                        @endphp  
                            </div>
                        </div>

                        @elseif(session('alcaldiaAuth') == "Coyoacan")

                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="exampleFormControlSelect1">Selecciona una de las fechas que tenemos disponibles:</label>
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
                                                  $fecha1 = 0;
                                                  $fecha2 = 0;
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==3){
                                                          //echo "Miercoles. ". date ("Y-m-d", $i)."<br>";

                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Miercoles, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                      }
                                                  }
                                                        echo "<br><br>";
                                                        echo "<input name='fechaRes' type='date'
                                                            min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                            margin: 0 auto;
                                                            width: 45%;
                                                            font-family: arial, sans-serif;
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            text-transform: uppercase;
                                                            background-color: lighten(#2f2f2f,40%);
                                                            outline: none;
                                                            border: 10;
                                                            border-radius: 3px;
                                                            border-color:#2f2f2f;
                                                            padding: 0 3px;
                                                            color: rgb(14, 13, 13);'>";
                                                        echo "<br><br><br>";

                                              }else {
                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  $fecha1 = 0;
                                                  $fecha2 = 0;
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==3){
                                                          //echo "Miercoles. ". date ("Y-m-d", $i)."<br>";

                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Miercoles, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                      }
                                                  }
                                                        echo "<br><br>";
                                                        echo "<input name='fechaRes' type='date'
                                                            min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                            margin: 0 auto;
                                                            width: 45%;
                                                            font-family: arial, sans-serif;
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            text-transform: uppercase;
                                                            background-color: lighten(#2f2f2f,40%);
                                                            outline: none;
                                                            border: 10;
                                                            border-radius: 3px;
                                                            border-color:#2f2f2f;
                                                            padding: 0 3px;
                                                            color: rgb(14, 13, 13);'>";
                                                        echo "<br><br><br>";
                                                  
                                              }
                                          }else{ 

                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  $fecha1 = 0;
                                                  $fecha2 = 0;
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==3){

                                                          //echo "Miercoles. ". date("Y-m-d", $i)."<br>";
                                                          
                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Miercoles, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                      }
                                                  }
                                                  echo "<br><br>";
                                                        echo "<input name='fechaRes' type='date'
                                                            min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                            margin: 0 auto;
                                                            width: 45%;
                                                            font-family: arial, sans-serif;
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            text-transform: uppercase;
                                                            background-color: lighten(#2f2f2f,40%);
                                                            outline: none;
                                                            border: 10;
                                                            border-radius: 3px;
                                                            border-color:#2f2f2f;
                                                            padding: 0 3px;
                                                            color: rgb(14, 13, 13);'>";
                                                        echo "<br><br><br>";
                                          }


                                      @endphp
                          </div>
                      </div>

                        @elseif(session('alcaldiaAuth') == "Miguel Hidalgo")

                        <div class="form-row">
                          <div class="col-md-4">
                              <label for="exampleFormControlSelect1">Selecciona una de las fechas que tenemos disponibles:</label>
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
                                                  $fecha1 = 0;
                                                  $fecha2 = 0;
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==4){
                                                          //echo "Jueves. ". date ("Y-m-d", $i)."<br>";

                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Jueves, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                      }
                                                  }
                                                  echo "<br><br>";
                                                        echo "<input name='fechaRes' type='date'
                                                            min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                            margin: 0 auto;
                                                            width: 45%;
                                                            font-family: arial, sans-serif;
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            text-transform: uppercase;
                                                            background-color: lighten(#2f2f2f,40%);
                                                            outline: none;
                                                            border: 10;
                                                            border-radius: 3px;
                                                            border-color:#2f2f2f;
                                                            padding: 0 3px;
                                                            color: rgb(14, 13, 13);'>";
                                                        echo "<br><br><br>";

                                              }else {
                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  $fecha1 = 0;
                                                  $fecha2 = 0;
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==4){
                                                          //echo "Jueves. ". date ("Y-m-d", $i)."<br>";

                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Jueves, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                      }
                                                  }
                                                  echo "<br><br>";
                                                        echo "<input name='fechaRes' type='date'
                                                            min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                            margin: 0 auto;
                                                            width: 45%;
                                                            font-family: arial, sans-serif;
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            text-transform: uppercase;
                                                            background-color: lighten(#2f2f2f,40%);
                                                            outline: none;
                                                            border: 10;
                                                            border-radius: 3px;
                                                            border-color:#2f2f2f;
                                                            padding: 0 3px;
                                                            color: rgb(14, 13, 13);'>";
                                                        echo "<br><br><br>";
                                                  
                                              }
                                          }else{ 

                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  $fecha1 = 0;
                                                  $fecha2 = 0;
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==4){

                                                          //echo "Jueves. ". date("Y-m-d", $i)."<br>";
                                                          
                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Jueves, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                      }
                                                  }
                                                  echo "<br><br>";
                                                        echo "<input name='fechaRes' type='date'
                                                            min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                            margin: 0 auto;
                                                            width: 45%;
                                                            font-family: arial, sans-serif;
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            text-transform: uppercase;
                                                            background-color: lighten(#2f2f2f,40%);
                                                            outline: none;
                                                            border: 10;
                                                            border-radius: 3px;
                                                            border-color:#2f2f2f;
                                                            padding: 0 3px;
                                                            color: rgb(14, 13, 13);'>";
                                                        echo "<br><br><br>";
                                          }


                                      @endphp
                          </div>
                      </div>

                        @elseif(session('alcaldiaAuth') == "La Magdalena Contreras")

                        <div class="form-row">
                          <div class="col-md-4">
                              <label for="exampleFormControlSelect1">Selecciona una de las fechas que tenemos disponibles:</label>
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
                                                  $fecha1 = 0;
                                                  $fecha2 = 0;
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==5){
                                                          //echo "Viernes. ". date ("Y-m-d", $i)."<br>";

                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Viernes, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                      }
                                                  }
                                                  echo "<br><br>";
                                                        echo "<input name='fechaRes' type='date'
                                                            min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                            margin: 0 auto;
                                                            width: 45%;
                                                            font-family: arial, sans-serif;
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            text-transform: uppercase;
                                                            background-color: lighten(#2f2f2f,40%);
                                                            outline: none;
                                                            border: 10;
                                                            border-radius: 3px;
                                                            border-color:#2f2f2f;
                                                            padding: 0 3px;
                                                            color: rgb(14, 13, 13);'>";
                                                        echo "<br><br><br>";

                                              }else {
                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  $fecha1 = 0;
                                                  $fecha2 = 0;
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==5){
                                                          //echo "Viernes. ". date ("Y-m-d", $i)."<br>";

                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Viernes, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                      }
                                                  }
                                                  echo "<br><br>";
                                                        echo "<input name='fechaRes' type='date'
                                                            min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                            margin: 0 auto;
                                                            width: 45%;
                                                            font-family: arial, sans-serif;
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            text-transform: uppercase;
                                                            background-color: lighten(#2f2f2f,40%);
                                                            outline: none;
                                                            border: 10;
                                                            border-radius: 3px;
                                                            border-color:#2f2f2f;
                                                            padding: 0 3px;
                                                            color: rgb(14, 13, 13);'>";
                                                        echo "<br><br><br>";
                                                  
                                              }
                                          }else{ 

                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  $fecha1 = 0;
                                                  $fecha2 = 0;
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==5){

                                                          //echo "Viernes. ". date("Y-m-d", $i)."<br>";
                                                          
                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Viernes, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                      }
                                                  }
                                                  echo "<br><br>";
                                                        echo "<input name='fechaRes' type='date'
                                                            min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                            margin: 0 auto;
                                                            width: 45%;
                                                            font-family: arial, sans-serif;
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            text-transform: uppercase;
                                                            background-color: lighten(#2f2f2f,40%);
                                                            outline: none;
                                                            border: 10;
                                                            border-radius: 3px;
                                                            border-color:#2f2f2f;
                                                            padding: 0 3px;
                                                            color: rgb(14, 13, 13);'>";
                                                        echo "<br><br><br>";
                                          }


                                      @endphp
                          </div>
                      </div>


                        @elseif(session('alcaldiaAuth') == "Tlalpan")

                        <div class="form-row">
                          <div class="col-md-4">
                              <label for="exampleFormControlSelect1">Selecciona una de las fechas que tenemos disponibles:</label>
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
                                                  $fecha1 = 0;
                                                  $fecha2 = 0;
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==6){
                                                          //echo "Sabado. ". date ("Y-m-d", $i)."<br>";

                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Sabado, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                      }
                                                  }
                                                  echo "<br><br>";
                                                        echo "<input name='fechaRes' type='date'
                                                            min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                            margin: 0 auto;
                                                            width: 45%;
                                                            font-family: arial, sans-serif;
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            text-transform: uppercase;
                                                            background-color: lighten(#2f2f2f,40%);
                                                            outline: none;
                                                            border: 10;
                                                            border-radius: 3px;
                                                            border-color:#2f2f2f;
                                                            padding: 0 3px;
                                                            color: rgb(14, 13, 13);'>";
                                                        echo "<br><br><br>";

                                              }else {
                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  $fecha1 = 0;
                                                  $fecha2 = 0;
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==6){
                                                          //echo "Sabado. ". date ("Y-m-d", $i)."<br>";

                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Sabado, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                      }
                                                  }
                                                  echo "<br><br>";
                                                        echo "<input name='fechaRes' type='date'
                                                            min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                            margin: 0 auto;
                                                            width: 45%;
                                                            font-family: arial, sans-serif;
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            text-transform: uppercase;
                                                            background-color: lighten(#2f2f2f,40%);
                                                            outline: none;
                                                            border: 10;
                                                            border-radius: 3px;
                                                            border-color:#2f2f2f;
                                                            padding: 0 3px;
                                                            color: rgb(14, 13, 13);'>";
                                                        echo "<br><br><br>";
                                                  
                                              }
                                          }else{ 

                                                  $hoy = date("Y-m-j");
                                                  $quince = date("Y-m-j",strtotime($hoy."+ 2 week"));

                                                  $fechaInicio=strtotime($hoy);
                                                  $fechaFin=strtotime($quince);
                                                  $fecha1 = 0;
                                                  $fecha2 = 0;
                                                  //Recorro las fechas y con la función strotime obtengo los lunes
                                                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                      //Sacar el dia de la semana con el modificador N de la funcion date
                                                      $dia = date('N', $i);
                                                      if($dia==6){

                                                          //echo "Sabado. ". date("Y-m-d", $i)."<br>";
                                                          
                                                          $date = date("Y-m-d", $i);
                                                            setlocale(LC_TIME, "spanish");
                                                            //echo "<br><br> <input class='form-check-input' name='fechaRes' type='radio' value='$date'> Sabado, "
                                                            //.strftime("%d de %B del %Y", $i)." ";
                                                            if(empty($fecha1)){
                                                                $fecha1 = $date;
                                                            }else{
                                                                $fecha2 = $date;
                                                            }
                                                      }
                                                  }
                                                  echo "<br><br>";
                                                        echo "<input name='fechaRes' type='date'
                                                            min='$fecha1' max='$fecha2' step='7' style='height: 45px;
                                                            margin: 0 auto;
                                                            width: 45%;
                                                            font-family: arial, sans-serif;
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            text-transform: uppercase;
                                                            background-color: lighten(#2f2f2f,40%);
                                                            outline: none;
                                                            border: 10;
                                                            border-radius: 3px;
                                                            border-color:#2f2f2f;
                                                            padding: 0 3px;
                                                            color: rgb(14, 13, 13);'>";
                                                        echo "<br><br><br>";
                                          }


                                      @endphp
                          </div>
                      </div>
                        
                          
                        @endif
                        
                          <button type="submit" class="btn" style="background:#0060ff;">Quiero esta fecha</button>
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