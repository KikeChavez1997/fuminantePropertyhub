@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Invitado-Contacto')])

@section('content')
    <style type="text/css">
        .content-input input,
        .content-select select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .content-select select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        /* Eliminamos la fecha que por defecto aparece en el desplegable */
        .content-select select::-ms-expand {
            display: none;
        }

        .content-select {
            max-width: 250px;
            position: relative;
        }

        .content-select select {
            display: inline-block;
            width: 100%;
            cursor: pointer;
            padding: 7px 10px;
            height: 42px;
            outline: 0;
            border: 0;
            border-radius: 0;
            background: #f0f0f0;
            color: #7b7b7b;
            font-size: 1em;
            color: #999;
            font-family:
                'Quicksand', sans-serif;
            border: 2px solid rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            position: relative;
            transition: all 0.25s ease;
        }

        .content-select select:hover {
            background: #fafafa;
        }

        /*
    Creamos la fecha que aparece a la izquierda del select.
    Realmente este elemento es un cuadrado que sólo tienen
    dos bordes con color y que giramos con transform: rotate(-45deg);
    */
        .content-select i {
            position: absolute;
            right: 30px;
            top: calc(70% - 1px);
            width: 16px;
            height: 16px;
            display: block;
            border-left: 4px solid #2a41c1;
            border-bottom: 4px solid #2a41c1;
            transform: rotate(-45deg);
            /* Giramos el cuadrado */
            transition: all 0.25s ease;
        }

        .content-select:hover i {
            margin-top: 3px;
        }
    </style>
    <div class="container" style="height: auto;"><br><br><br>
        <div class="justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-text">
                            <h4 class="card-title" style="font-size:24px; font-weight:bold;">Bienvenido</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('guest.info') }}">
                            @csrf
                            <div class=" container row">
                                <p>
                                    Recuerda que puedes crear una cuenta y realizar tu reservación de manera más facil.
                                </p>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nombre completo</label>
                                    <input type="text" class="form-control" name="inVnombre" value="">
                                    @error('inVnombre')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Teléfono</label>
                                    <input type="text" class="form-control" name="inVtelefono" value="" required>
                                    @error('inVtelefono')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Correo electrónico</label>
                                    <input type="email" class="form-control" name="inVcorreo_electronico" value="">
                                    @error('inVcorreo_electronico')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                                <div class="card-text"> <br> <br>
                                  <h4 class="card-title" style="font-size:24px; font-weight:bold;">Seleccione su tipo de servicio</h4> <br>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                      <label for="inputEmail4">Superficie(En metros cuadrados)</label>
                                      <input type="number" class="form-control" name="inVsuperficie">
                                      @error('inVsuperficie')
                                          <span class="text-alert">{{ $message }}</span>
                                      @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="inputPassword4">Codigo Postal</label>
                                      <input type="number" class="form-control" name="inVcodigo_postal">
                                      @error('inVcodigo_postal')
                                          <span class="text-alert">{{ $message }}</span>
                                      @enderror
                                  </div>
                                </div>
                                <div class="container">
                                    <div class="row align-items-center">                  
                                        <div class="content-select col-md-6 ">
                                            <br>
                                            <label for="inputEmail4">Tipo de domicilio</label>
                                            <select name="inVresidencial" id="exampleFormControlSelect1">
                                                <option value="Para mi hogar">Para mi hogar</option>
                                                <option value="Para mi negocio">Para mi negocio</option>
                                            </select>
                                            <i></i>
                                        </div>
                                        <div class="content-select col-md-6">
                                            <br>
                                            <label for="inputEmail4">Tipo de servicio</label>
                                            <select name="inVservicio" id="exampleFormControlSelect1">
                                                <option value="Control de plagas">Control de plagas</option>
                                                <option value="Desinfeccion">Desinfección</option>
                                                <option value="Ratizacion">Ratizacion</option>
                                            </select>
                                            <i></i>
                                        </div>
                                    </div>
                                </div>
                            
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success">Cotizar servicio</button>
                    </div>
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
