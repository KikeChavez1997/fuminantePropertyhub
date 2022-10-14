@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Horario-Invitado')])

@section('content')
<div class="container" style="height: auto;"><br><br><br>
    <div class="justify-content-center"> 

          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    <div class="card-text">
                      <h4 class="card-title" style="font-size:24px; font-weight:bold;"> Los horarios que tenemos disponibles son los siguientes para la alcaldia: {{session('inValcaldia')}} </h4>
                    </div>
                  </div>
                  <div class="card-body">

                    <form method="post" action="{{ route('guest.horario') }}">
                      @csrf

                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-check">
                               
                                    @if ($hora1 == 1)
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="InvHorario" disabled type="radio" value="9:00">
                                            9:00 am - 11:00 am 
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            
                                        </label>
                                        <span>- Horario reservado</span>
                                    @else
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="InvHorario" type="radio" value="9:00">
                                            9:00 am - 11:00 am
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    @endif
                               
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <div class="form-check">
                               
                                    @if ($hora2 == 1)
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="InvHorario" disabled type="radio" value="11:00">
                                            11:00 am - 13:00 pm
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                        <span>- Horario reservado</span>
                                    @else
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="InvHorario" type="radio" value="11:00">
                                            11:00 am - 13:00 pm
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    @endif
                               
                            </div>
                          </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-check">
                               
                                @if ($hora3 == 1)
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="InvHorario" disabled type="radio" value="13:00">
                                        13:00 pm - 15:00 pm
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                    <span>- Horario reservado</span>
                                @else
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="InvHorario" type="radio" value="13:00">
                                        13:00 pm - 15:00 pm
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                @endif
                            
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <div class="form-check">
                                
                                @if ($hora4 == 1)
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="InvHorario" disabled type="radio" value="16:00">
                                        16:00 pm - 18:00 pm
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                    <span>- Horario reservado</span>
                                @else
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="InvHorario" type="radio" value="16:00">
                                        16:00 pm - 18:00 pm
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                @endif
                            
                            </div>
                          </div>
                      </div>
                        
                        <button type="submit" class="btn btn-success">Reservar ahora</button>
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