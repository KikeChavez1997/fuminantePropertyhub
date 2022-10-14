@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Datos-Reservacion-Auth')])

@section('content')
  <div class="content">
    <div class="container-fluid">

      @if ( isset($contact->id))
            <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    <div class="card-text">
                      <h4 class="card-title" style="font-size:24px; font-weight:bold;">Realiza una reservación</h4>
                    </div>
                  </div>
                  <div class="card-body">
                      <form method="post" action="{{ route('filtertwo') }}">
                          @csrf
                          <div class="form-group"> 
                              <label for="exampleFormControlSelect1">Propiedad</label>
                              <select name="residencial" class="custom-select">
                                <option value="Para mi hogar">Para mi hogar</option>
                                <option value="Para mi negocio">Para mi negocio</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Tipo de servicio</label>
                              <select class="custom-select" name="servicio">
                                <option value="Control de plagas">Control de plagas</option>
                                <option value="Desinfeccion">Desinfección</option>
                                <option value="Ratizacion">Ratizacion</option>
                              </select>
                            </div>
                            <div class="form-row">
                              
                                  <label for="inputEmail4">Superficie(En metros cuadrados)</label>
                                  <select class="custom-select" name="superficie">
                                    <option value="200">Menos de 200 m²</option>
                                    <option value="400">De 200 a 400 m²</option>
                                    <option value="500">Más de 400 m²</option>
                                  </select>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                  <label for="inputPassword4">Codigo Postal</label>
                                  <input type="number" class="form-control" name="codigo_postal" style="padding: 15px;
                                  border: 1px solid #ccc;
                                  background: #dfdfdf;
                                  border-radius: 3px;
                                  margin-bottom: 10px;
                                  width: 100%;
                                  box-sizing: border-box;
                                  color: #2C3E50;
                                  font-size: 18px;">
                                  @error('codigo_postal')
                                      <span class="text-alert">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn" style="background:#0060ff;">Verificar disponibilidad</button>
                        </form>
                  </div>
              </div>
          </div>
      @else
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="card-text">
                    <h4 class="card-title" style="font-size:24px; font-weight:bold;"> Antes de continuar, completa tu información de contacto</h4> 
                  </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('filterContact') }}">
                        @csrf
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="{{ auth()->user()->name }}">
                                @error('nombre')
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" value="{{ $contact->apellidos ?? '' }}" required>
                                @error('apellidos')
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" value="{{ $contact->telefono ?? ''}}" required>
                                @error('telefono')
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Correo electrónico</label>
                                <input type="email" class="form-control" name="correo_electronico" value="{{ auth()->user()->email }}">
                                @error('correo_electronico')
                                <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                            </div>

                        <button type="submit" class="btn btn-success">Actualizar información</button>
                    </form>
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