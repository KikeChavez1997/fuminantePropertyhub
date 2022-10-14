<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div  class="navbar-wrapper">
      <a href="http://fuminante.com/">
        <img width="110" src="{{ asset('material/img/fuminante.png') }}" alt="" style=" border-radius: 10%;">
      </a>
    </div>
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="http://fuminante.com/">Inicio</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <!--
        <li class="nav-item">
          <a href="{{ route('guest') }}" class="nav-link">
            <i class="material-icons">dashboard</i> {{ __('Invitado') }}
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'register' ? ' active' : '' }}">
          <a href="{{ route('register') }}" class="nav-link">
            <i class="material-icons">person_add</i> {{ __('Registro') }}
          </a>
        </li>
      -->
        <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
          <a href="{{ route('login') }}" class="btn btn-info btn-round">
            <i class="material-icons">fingerprint</i> {{ __('Ingresar a mis servicios') }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->