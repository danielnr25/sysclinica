<h6 class="navbar-heading text-muted">Gestión</h6>
<ul class="navbar-nav">
    <li class="nav-item  active ">
      <a class="nav-link  active " href="{{ url('/home') }}">
        <i class="ni ni-tv-2 text-danger"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/especialidades') }}">
        <i class="ni ni-briefcase-24 text-blue"></i> Especialidades
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="./examples/maps.html">
        <i class="fas fa-stethoscope text-info"></i> Médicos
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="./examples/profile.html">
        <i class="fas fa-bed text-warning"></i> Pacientes
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" onclick="event.preventDefault(); document.getElementBy('formLogout').submit();">
        <i class="fas fa-sign-in-alt text-pink"></i> Cerrar Sessión
      </a>
      <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
        @csrf
      </form>
    </li>
  </ul>
  <!-- Divider -->
  <hr class="my-3">
  <!-- Heading -->
  <h6 class="navbar-heading text-muted">Reportes</h6>
  <!-- Navigation -->
  <ul class="navbar-nav mb-md-3">
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="ni ni-books text-default"></i> Citas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="ni ni-chart-bar-32 text-warning"></i> Desempeño Médico
      </a>
    </li>
  </ul>
