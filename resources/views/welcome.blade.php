@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Invitado-Contacto')])

@section('content')

<div class="container" style="height: auto;"><br><br><br>
  <div class="row justify-content-center">

        <div class="card card-nav-tabs text-center" style="background-color: #2fc350;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <br><br>

                        <div class="d-block d-sm-block d-md-none">
                            <p style="color:white; font-size:30px; line-height: normal; ">Obtén un <br> descuento de<br></p>
                            <p style="color:white; font-size:35px; font-weight: bold; line-height: normal; ">$200</p>
                            <p style="color:white; font-size:20px; line-height: normal; ">en tu primer servicio</p>
                        </div>
                        <div class="d-none d-sm-none d-md-block">
                            <p style="color:white; font-size:60px; line-height: normal; ">Obtén un <br> descuento de<br></p>
                            <p style="color:white; font-size:70px; font-weight: bold; line-height: normal; ">$200</p>
                            <p style="color:white; font-size:40px; line-height: normal; ">en tu primer servicio</p>
                        </div>
                            
                    </div>
                    <div class="col-md-6">
                            <div class="card card-nav-tabs text-center" style="border-radius: 10%;>
                                <div class="card-body">
                                    <br>
                                    <h4 class="card-title" style="color:blue; font-weight:bold; ">Registrate y agenda</h4> <br>
                                    <form method="post" action="{{ route('user.info')}}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-12"> 
                                                <input type="text" class="" style="padding: 10px 10px;
                                                font-size: 1rem;" name="NombreCompleto" placeholder="Nombre completo"> <br><br>
                                                @error('NombreCompleto')
                                                <span class="text-alert" style="color:red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12"> 
                                                <input type="email" class="" style="padding: 10px 10px;
                                                font-size: 1rem;" name="email" placeholder="Correo electrónico"> <br><br>
                                                @error('email')
                                                <span class="text-alert" style="color:red;">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <input type="number" class="" style="padding: 10px 10px;
                                                font-size: 1rem;" name="TeléfonoCelular" placeholder="Teléfono celular"><br><br>
                                                @error('TeléfonoCelular')
                                                <span class="text-alert" style="color:red;">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <input class="form-check-input" name="terminos" type="checkbox" required>
                                                <label class=""> <a href="https://fuminante.com/terminos-y-condiciones/" target="_blank" >Acepto los términos condiciones</a> y <a href="https://fuminante.com/politica-privacidad/" target="_blank" >avisos de privacidad</a> </label>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-info">Obtener</button>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-white text-center" style="font-weight: bold;" >VIVIR SIN PLAGAS ES VIVIR EN UN <br> AMBIENTE LIMPIO Y SEGURO</h2>
                </div>
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    <br>
                    <p style="color:white; font-size:30px;  line-height: normal; font-weight: bold; ">Fuminante te da la garantía:</p>
                    <p style="font-size:18px;"><i class="material-icons" style=" color:#2fc350;  border: 1px solid #2fc350; background: white; border-radius: 200%; font-size:25px;">check_circle</i> <strong>De ahuyentar las molestas plagas</strong> </p>
                    <p style="font-size:18px;"><i class="material-icons" style="color:#2fc350;  border: 1px solid #2fc350; background: white; border-radius: 200%; font-size:25px;">check_circle</i> <strong>De usar quimicos amigables con el medio ambiente</strong> </p>
                    <p style="font-size:18px;"><i class="material-icons" style="color:#2fc350;  border: 1px solid #2fc350; background: white; border-radius: 200%; font-size:25px;">check_circle</i> <strong>De puntualidad y eficacia en cada servicio</strong> </p>
                </div>
            </div>

    

    <div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card">
        <div class="card-body ">
                <h6 class="card-category text-danger">
                    <i class="material-icons">trending_up</i>Testimoniales
                </h6>
                <h4 class="card-title">
                    <a href="#pablo">Llevo años contratandolos y mi casa siempre ha estado libre de bichos...</a>
                </h4>
            </div>
            <div class="card-footer ">
                    <div class="author">
                        <a href="#pablo">
                        <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=334&q=80&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D" alt="..." class="avatar img-raised">
                        <span>Arturo Rafael</span>
                        </a>
                    </div>
                <div class="stats ml-auto">
                        <i class="material-icons">favorite</i> 342 &#xB7;
                    </div>
                </div>
            </div>
    </div>
    <div class="col-md-3">
        <div class="card">
        <div class="card-body ">
                <h6 class="card-category text-danger">
                    <i class="material-icons">trending_up</i>Testimoniales
                </h6>
                <h4 class="card-title">
                    <a href="#pablo">Buen y efectivo servicio de fumigación</a>
                </h4>
            </div>
            <div class="card-footer ">
                    <div class="author">
                        <a href="#pablo">
                        <img src="https://www.cdc.gov/preconception/spanish/images/man-with-arms-crossed.jpg" alt="..." class="avatar img-raised">
                        <span>Higuatzi H.</span>
                        </a>
                    </div>
                <div class="stats ml-auto">
                        <i class="material-icons">favorite</i> 342 &#xB7;
                    </div>
                </div>
            </div>
    </div>
    <div class="col-md-3">
        <div class="card">
        <div class="card-body ">
                <h6 class="card-category text-danger">
                    <i class="material-icons">trending_up</i>Testimoniales
                </h6>
                <h4 class="card-title">
                    <a href="#pablo">Excelente servicio</a>
                </h4>
        
            </div>
            <div class="card-footer ">
                    <div class="author">
                        <a href="#pablo">
                        <img src="https://images.ecestaticos.com/B0SIIaKs9lPhh09ebpdgoQKwzkE=/119x87:4983x3534/557x418/filters:fill(white):format(jpg)/f.elconfidencial.com%2Foriginal%2F542%2F18c%2F2b9%2F54218c2b95445ae1fea91aca9e37b53e.jpg" alt="..." class="avatar img-raised">
                        <span>Miguel Ponce</span>
                        </a>
                    </div>
                <div class="stats ml-auto">
                        <i class="material-icons">favorite</i> 342 &#xB7;
                    </div>
                </div>
            </div>
    </div>
    </div>
</div>
</div>

@endsection
