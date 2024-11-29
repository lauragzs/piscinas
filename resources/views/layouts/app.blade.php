<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>TECOPOOL</title>
    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="icon" href="{{ asset('assets/tecopoolicon.png') }}" />

    <!-- ************* CSS Files ************* -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}" />
    <!-- ************* Vendor Css Files  ************ -->
    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/OverlayScrollbars.min.css') }}" />
    @yield('css')
    <style>
      /* Ola fija con base pegada */
      .wave {
          position: absolute;
          bottom: 0;
          left: 0;
          width: 200%; /* Más ancho que el contenedor */
          height: 120px; /* Altura base de la ola */
          background: linear-gradient(to top, #007bff, #80d4ff); /* Gradiente para simular agua */
          border-radius: 50% 50% 0 0; /* Curva superior */
          transform-origin: bottom; /* Mantiene la base fija */
          animation: waveStretch 3s ease-in-out infinite; /* Movimiento de ondulación */
      }

      /* Animación de estiramiento */
      @keyframes waveStretch {
          0% {
              transform: scaleY(1); /* Altura normal */
          }
          50% {
              transform: scaleY(1.3); /* Se estira hacia arriba */
          }
          100% {
              transform: scaleY(1); /* Vuelve a la altura normal */
          }
      }
    </style>
  </head>
  <body>
    <!-- Page wrapper start -->
    <div class="page-wrapper">
      <!-- Main container start -->
      <div class="main-container">
        <!-- Sidebar wrapper start -->
        <nav id="sidebar" class="sidebar-wrapper">
          <!-- App brand starts -->
          <div class="app-brand p-4" style="text-align: center;">
            <a href="{{route('dashboard')}} ">
              <!--<img src="{{ asset('assets/tecopoolicon.png') }}" class="logo" alt="Bootstrap Gallery" />-->
              <img src="{{ asset('assets/tecopoolicon.png') }}" width="70%" alt="TecoPool" />
              <!--<h1>- Tecopool -</h1> -->
            </a>
          </div>
          <!-- App brand ends -->
          <!-- Sidebar profile actions starts -->
          <ul class="profile-actions d-lg-flex d-none">
            <li>
              <a href=" " data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip-warning" data-bs-title="Configuracion">
                <i class="bi bi-gear fs-4"></i>
                <span class="count-label"></span>
              </a>
            </li>
            <li>
              <a href="{{route('profile.edit')}}" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip-danger" data-bs-title="Perfil">
                <i class="bi bi-person-square fs-4"></i>
              </a>
            </li>
            <li>
              <a href=" " data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip-success" data-bs-title="Twitter">
                <i class="bi bi-twitter fs-4"></i>
              </a>
            </li>
            <li>
              <a href=" " data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip-info" data-bs-title="Skype">
                <i class="bi bi-skype fs-4"></i>
              </a>
            </li>
          </ul>
          <!-- Sidebar profile actions ends -->
          <!-- Sidebar menu starts -->
          <div class="sidebarMenuScroll">
            <ul class="sidebar-menu">
              <li class="active current-page">
                <a href="{{route('dashboard')}}">
                  <i class="bi bi-pie-chart"></i>
                  <span class="menu-text">Menu</span>
                </a>
              </li>
              <li>
                <a href="{{route('piscina.index')}}">
                  <i class="bi bi-bar-chart-line"></i>
                  <span class="menu-text">Piscinas</span>
                </a>
              </li>
              <li>
                <a href=" ">
                  <i class="bi bi-gear"></i>
                  <span class="menu-text">Configuracion</span>
                </a>
              </li>
              <li>
                <a href="{{route('profile.edit')}}">
                  <i class="bi bi-person-square"></i>
                  <span class="menu-text">Perfil</span>
                </a>
              </li>
              <li>
                <a href=" ">
                  <i class="bi bi-slash-square"></i>
                  <span class="menu-text">Tablas</span>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="bi bi-upc-scan"></i>
                  <span class="menu-text">Sesion</span>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href=" ">Iniciar Sesion</a>
                  </li>
                  <li>
                    <a href=" ">Registrar</a>
                  </li>
                  <li>
                    <a href="{{ route('password.request') }}">Olvide mi Contraseña</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- Sidebar menu ends -->
        </nav>
        <!-- Sidebar wrapper end -->
        <!-- App container starts -->
        <div class="app-container">
          <!-- App header starts -->
          <div class="app-header d-flex align-items-center">
            <!-- Toggle buttons start -->
            <div class="d-flex">
              <button class="btn btn-outline-primary me-2 toggle-sidebar" id="toggle-sidebar">
                <i class="bi bi-text-indent-left fs-5"></i>
              </button>
              <button class="btn btn-outline-primary me-2 pin-sidebar" id="pin-sidebar">
                <i class="bi bi-text-indent-left fs-5"></i>
              </button>
            </div>
            <!-- Toggle buttons end -->
            <!-- App brand sm start -->
            <div class="app-brand-sm d-md-none d-sm-block">
              <!--<a href="{{route('dashboard')}}">
                <img src="{{ asset('assets/images/logo-sm.svg') }}" class="logo" alt="Bootstrap Gallery">
              </a>-->
            </div>
            <!-- App brand sm end -->
            <!-- App header actions start -->
            <div class="header-actions">
              <div class="search-container d-lg-block d-none me-2">
                <!-- Search container start -->
                <input type="text" class="form-control" placeholder="Buscar" />
                <i class="bi bi-search"></i>
                <!-- Search container end -->
              </div>
              <div class="dropdown ms-2">
                <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom"
                  data-bs-custom-class="custom-tooltip-info" data-bs-title="Settings"
                  class="d-flex p-2 border rounded-2">
                  <i class="bi bi-gear fs-4 lh-1"></i>
                </a>
              </div>
              <div class="dropdown ms-3">
                <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center ps-3 border-start" href="#"
                  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="d-none d-md-block me-2">{{ Auth::user()->name }}</span>
                  <img src="{{ asset('assets/images/user.png') }}" class="rounded-circle img-3x" alt="Bootstrap Gallery" />
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                  <a class="dropdown-item d-flex align-items-center" href="{{route('profile.edit')}}"><i
                      class="bi bi-person fs-4 me-2"></i>Perfil</a>
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a class="dropdown-item d-flex align-items-center" href="route('logout')" 
                      onclick="event.preventDefault(); this.closest('form').submit();"><i
                      class="bi bi-escape fs-4 me-2"></i>Cerrar Sesion</a>
                    </form>
                </div>
              </div>
            </div>
            <!-- App header actions end -->

          </div>
          <!-- App header ends -->

          <!-- App hero header starts -->
          <div class="app-hero-header d-flex align-items-start contenedorr position-relative overflow-hidden">
    <!-- Contenedor de la ola -->
    <div class="wave"></div>
    <!-- Breadcrumb start -->
    <ol class="breadcrumb d-none d-lg-flex align-items-center position-relative">
        <li class="breadcrumb-item">
            @yield('name')
        </li>
    </ol>
    <!-- Breadcrumb end -->
</div>
          <!-- App Hero header ends -->
          <!-- App body starts -->
          <div class="app-body">
            @yield('content')
          </div>
          <!-- App body ends -->
          <!-- App footer start -->
          <div class="app-footer">
            <span>Tecopool 2024</span>
          </div>
          <!-- App footer end -->
        </div>
        <!-- App container ends -->
      </div>
      <!-- Main container end -->
    </div>
    <!-- Page wrapper end -->
    <!-- ************* JavaScript Files  ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ************* Vendor Js Files ************* -->
    <!-- Overlay Scroll JS -->
    <script src="{{ asset('assets/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-scrollbar.js') }}"></script>
    <!-- Apex Charts -->
    <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/activity-report.js') }}"></script>
    <script src="{{ asset('assets/js/deals.js') }}"></script>
    <script src="{{ asset('assets/js/sparkline.js') }}"></script>
    <script src="{{ asset('assets/js/sparkline2.js') }}"></script>
    <!-- Rating -->
    <script src="{{ asset('assets/js/raty.js') }}"></script>
    <script src="{{ asset('assets/js/raty-custom.js') }}"></script>
    <!-- Custom JS files -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @yield('js')
  </body>
</html>