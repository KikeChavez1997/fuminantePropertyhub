<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <img width="240" src="{{ asset('material/img/fuminante.png') }}" alt="">
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Reserva rapidamente') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'historial' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('client.historial.index')}}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Historial de reservaciones') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'inmuebles' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('client.inmueble.index')}}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Mis inmuebles') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'DataContact' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('client.contact.index')}}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Datos de contacto') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'settings' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Configuracion') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'logout' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="material-icons">login</i>
            <p>{{ __('Cerrar sesión') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
