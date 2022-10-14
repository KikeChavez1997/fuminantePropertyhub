@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Horario-Auth')])

@section('content')
<div class="container" style="height: auto;"><br><br><br>
    <div class="justify-content-center"> 

          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    <div class="card-text">
                      <h4 class="card-title" style="font-size:24px; font-weight:bold;"> Le ofrecemos los siguientes horarios para su servicio. </h4>
                    </div>
                  </div>
                  <div class="card-body">

                    <form method="post" action="{{ route('client.horario') }}">
                      @csrf 

                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-check">
                               
                                    @if ($hora1 == 1)
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="InvHorario" disabled type="radio" value="9:00">
                                            9:00 am - 10:30 am 
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            
                                        </label>
                                        <span>- Horario reservado</span>
                                    @else
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="InvHorario" type="radio" value="9:00">
                                            9:00 am - 10:30 am
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
                                            <input class="form-check-input" name="InvHorario" disabled type="radio" value="10:30">
                                            10:30 am - 12:00 pm
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                        <span>- Horario reservado</span>
                                    @else
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="InvHorario" type="radio" value="10:30">
                                            10:30 am - 12:00 pm
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
                                        <input class="form-check-input" name="InvHorario" disabled type="radio" value="12:00">
                                        12:00 pm - 13:30 pm
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                    <span>- Horario reservado</span>
                                @else
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="InvHorario" type="radio" value="12:00">
                                        12:00 pm - 13:30 pm
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
                                        <input class="form-check-input" name="InvHorario" disabled type="radio" value="13:30">
                                        13:30 pm - 15:00 pm
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                    <span>- Horario reservado</span>
                                @else
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="InvHorario" type="radio" value="13:30">
                                        13:30 pm - 15:00 pm
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                @endif
                            
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <div class="form-check">
                                
                                @if ($hora5 == 1)
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="InvHorario" disabled type="radio" value="16:00">
                                        16:00 pm - 17:30 pm
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                    <span>- Horario reservado</span>
                                @else
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="InvHorario" type="radio" value="16:00">
                                        16:00 pm - 17:30 pm
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                @endif
                            
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <div class="form-check">
                                
                                @if ($hora6 == 1)
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="InvHorario" disabled type="radio" value="17:30">
                                        17:30 pm - 19:00 pm
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                    <span>- Horario reservado</span>
                                @else
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="InvHorario" type="radio" value="17:30">
                                        17:30 pm - 19:00 pm
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                @endif
                            
                            </div>
                          </div>
                      </div>
                        
                        <button type="submit" class="btn" style="background:#0060ff;">Reservar ahora</button>
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