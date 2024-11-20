<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>TECOPOOL</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" />

    <!-- *************
      ************ CSS Files *************
    ************* -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}" />

    <!-- *************
      ************ Vendor Css Files *************
    ************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/OverlayScrollbars.min.css') }}" />

    
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
            <a href=" ">
              <!--<img src="{{ asset('assets/images/logo.svg') }}" class="logo" alt="Bootstrap Gallery" />-->
              <h1>- Tecopool -</h1>
            </a>
          </div>
          <!-- App brand ends -->

          <!-- Sidebar profile actions starts -->
          <ul class="profile-actions d-lg-flex d-none">
            <li>
              <a href=" " data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip-warning" data-bs-title="Settings">
                <i class="bi bi-gear fs-4"></i>
                <span class="count-label"></span>
              </a>
            </li>
            <li>
              <a href=" " data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip-danger" data-bs-title="Profile">
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
                <a href=" ">
                  <i class="bi bi-pie-chart"></i>
                  <span class="menu-text">Menu</span>
                </a>
              </li>
              <li>
                <a href="analytics.html">
                  <i class="bi bi-bar-chart-line"></i>
                  <span class="menu-text">Piscinas</span>
                </a>
              </li>
              <li>
                <a href="settings.html">
                  <i class="bi bi-gear"></i>
                  <span class="menu-text">Configuracion</span>
                </a>
              </li>
              <li>
                <a href="profile.html">
                  <i class="bi bi-person-square"></i>
                  <span class="menu-text">Perfil</span>
                </a>
              </li>
              <li>
                <a href="tabs.html">
                  <i class="bi bi-slash-square"></i>
                  <span class="menu-text">Tablas</span>
                </a>
              </li>
              <li class="treeview">
                <a href="#!">
                  <i class="bi bi-upc-scan"></i>
                  <span class="menu-text">Sesion</span>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="login.html">Iniciar Sesion</a>
                  </li>
                  <li>
                    <a href="signup.html">Registrar</a>
                  </li>
                  <li>
                    <a href="forgot-password.html">Olvide mi Contraseña</a>
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
              <!--<a href="index.html">
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
                <a href="settings.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                  data-bs-custom-class="custom-tooltip-info" data-bs-title="Settings"
                  class="d-flex p-2 border rounded-2">
                  <i class="bi bi-gear fs-4 lh-1"></i>
                </a>
              </div>
              <div class="dropdown ms-3">
                <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center ps-3 border-start" href="#!"
                  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="d-none d-md-block me-2">Michelle Max</span>
                  <img src="{{ asset('assets/images/user.png') }}" class="rounded-circle img-3x" alt="Bootstrap Gallery" />
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                  <a class="dropdown-item d-flex align-items-center" href="profile.html"><i
                      class="bi bi-person fs-4 me-2"></i>Perfil</a>
                  <a class="dropdown-item d-flex align-items-center" href="settings.html"><i
                      class="bi bi-gear fs-4 me-2"></i>Configurar cuenta</a>
                  <a class="dropdown-item d-flex align-items-center" href="login.html"><i
                      class="bi bi-escape fs-4 me-2"></i>Cerrar Sesion</a>
                </div>
              </div>
            </div>
            <!-- App header actions end -->

          </div>
          <!-- App header ends -->

          <!-- App hero header starts -->
          <div class="app-hero-header d-flex align-items-start">

            <!-- Breadcrumb start -->
            <ol class="breadcrumb d-none d-lg-flex align-items-center">
              <li class="breadcrumb-item">
                <i class="bi bi-house"></i>
                <a href="index.html">Menu</a>
              </li>
            </ol>
            <!-- Breadcrumb end -->
          </div>
          <!-- App Hero header ends -->

          <!-- App body starts -->
          <div class="app-body">

            <!-- Row starts -->
            <div class="row">
              <div class="col-xxl-3 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-body d-flex align-items-center p-0">
                    <div class="p-4">
                      <i class="bi bi-pie-chart fs-1 lh-1 text-primary"></i>
                    </div>
                    <div class="py-4">
                      <h5 class="text-secondary fw-light m-0">Visitors</h5>
                      <h1 class="m-0">675</h1>
                    </div>
                    <span class="badge bg-info position-absolute top-0 end-0 m-3 bg-opacity-50"><i
                        class="bi bi-caret-up-fill"></i>18%</span>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-body d-flex align-items-center p-0">
                    <div class="p-4">
                      <i class="bi bi-sticky fs-1 lh-1 text-primary"></i>
                    </div>
                    <div class="py-4">
                      <h5 class="text-secondary fw-light m-0">Sales</h5>
                      <h1 class="m-0">450</h1>
                    </div>
                    <span class="badge bg-info position-absolute top-0 end-0 m-3 bg-opacity-50"><i
                        class="bi bi-caret-up-fill"></i>15%</span>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-body d-flex align-items-center p-0">
                    <div class="p-4">
                      <i class="bi bi-emoji-smile fs-1 lh-1 text-primary"></i>
                    </div>
                    <div class="py-4">
                      <h5 class="text-secondary fw-light m-0">Income</h5>
                      <h1 class="m-0">75k</h1>
                    </div>
                    <span class="badge bg-info position-absolute top-0 end-0 m-3 bg-opacity-50"><i
                        class="bi bi-caret-up-fill"></i>11%</span>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-body d-flex align-items-center p-0">
                    <div class="p-4">
                      <i class="bi bi-star fs-1 lh-1 text-danger"></i>
                    </div>
                    <div class="py-4">
                      <h5 class="text-secondary fw-light m-0">Reviews</h5>
                      <h1 class="m-0 text-danger">98%</h1>
                    </div>
                    <span class="badge bg-danger position-absolute top-0 end-0 m-3 bg-opacity-50"><i
                        class="bi bi-caret-down-fill"></i>9%</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row ends -->

            <!-- Row starts -->
            <div class="row">
              <div class="col-xxl-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Activity Report</h5>
                  </div>
                  <div class="card-body p-4">
                    <div id="activityReport"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row">
              <div class="col-xxl-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Recent Buyers</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped align-middle">
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Link</th>
                            <th>Customer</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Popularity</th>
                            <th>Views</th>
                            <th>Engagement</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="d-flex flex-row align-items-center">
                                <img src="{{ asset('assets/images/mobiles/mob1.jpg') }}" class="img-5x" alt="Admin" />
                                <div class="d-flex flex-column ms-3">
                                  <p class="m-0">Apple iPhone 12</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <a href="#" class="text-danger">#L10010021</a>
                            </td>
                            <td>Rickey Singleton</td>
                            <td>
                              <span class="badge bg-danger">Mobiles</span>
                            </td>
                            <td>
                              <span class="badge bg-info me-2">$250.00</span>
                            </td>
                            <td>
                              <div class="rate2 rating-stars"></div>
                            </td>
                            <td>
                              <div id="sparkline1"></div>
                            </td>
                            <td>
                              <p class="m-0 text-danger">
                                Higher than last week
                              </p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex flex-row align-items-center">
                                <img src="{{ asset('assets/images/mobiles/mob2.jpg') }}" class="img-5x" alt="User" />
                                <div class="d-flex flex-column ms-3">
                                  <p class="m-0">Apple iPhone 13</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <a href="#" class="text-danger">#L10010065</a>
                            </td>
                            <td>Warren Alvarez</td>
                            <td>
                              <span class="badge bg-danger">Mobiles</span>
                            </td>
                            <td>
                              <span class="badge bg-info me-2">$250.00</span>
                            </td>
                            <td>
                              <div class="rate5 rating-stars"></div>
                            </td>
                            <td>
                              <div id="sparkline2"></div>
                            </td>
                            <td>
                              <p class="m-0 text-danger">
                                Higher than last week
                              </p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex flex-row align-items-center">
                                <img src="{{ asset('assets/images/mobiles/mob3.jpg') }}" class="img-5x" alt="User" />
                                <div class="d-flex flex-column ms-3">
                                  <p class="m-0">Apple iPhone 12</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <a href="#" class="text-danger">#L10010098</a>
                            </td>
                            <td>Christian Franklin</td>
                            <td>
                              <span class="badge bg-danger">Mobiles</span>
                            </td>
                            <td>
                              <span class="badge bg-info me-2">$250.00</span>
                            </td>
                            <td>
                              <div class="rate4 rating-stars"></div>
                            </td>
                            <td>
                              <div id="sparkline3"></div>
                            </td>
                            <td>
                              <p class="m-0 text-danger">
                                Higher than last week
                              </p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->

          </div>
          <!-- App body ends -->

          <!-- App footer start -->
          <div class="app-footer">
            <span>Jassa 2024</span>
          </div>
          <!-- App footer end -->

        </div>
        <!-- App container ends -->

      </div>
      <!-- Main container end -->

    </div>
    <!-- Page wrapper end -->

    <!-- *************
      ************ JavaScript Files *************
    ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- *************
      ************ Vendor Js Files *************
    ************* -->

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
  </body>

</html>