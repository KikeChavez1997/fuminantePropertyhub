@extends('layouts.app', ['activePage' => 'DataContact', 'titlePage' => __('Contacto=Auth')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" style="font-size:24px; font-weight:bold;">Actualiza tus datos de contacto</h4>
            </div>
            <div class="card-body">
              <form method="post" action="{{ route('client.contact.update', $user[0]->id) }}">
                @csrf
                {{ method_field('PATCH') }}
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
                    <input type="text" class="form-control" name="apellidos" value="{{ $user[0]->apellidos ?? '' }}">
                    @error('apellidos')
                    <span class="text-danger">{{$message}} </span>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" value="{{ $user[0]->telefono ?? ''}}">
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
              <button class="btn btn-success" type="submit">Actualiza tus datos</button>
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