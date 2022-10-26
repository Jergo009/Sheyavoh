<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset ('bootstrapplugins/img/favicon.png')}}" rel="icon">
  <link href="{{asset ('bootstrapplugins/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset ('bootstrapplugins/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset ('bootstrapplugins/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset ('bootstrapplugins/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset ('bootstrapplugins/vendor/venobox/venobox.css')}}"rel="stylesheet">
  <link href="{{asset ('bootstrapplugins/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset ('bootstrapplugins/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset ('bootstrapplugins/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v1.4.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="{{asset ('bootstrapplugins/img/profile-img.jpeg')}}" alt="" class="img-fluid rounded-circle">
        
      <nav class="nav-menu">
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}"><i class="bx bx-user"></i> <span>Iniciar Sesión</span></a>
               
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('/') }}"><i class="bx bx-home"></i><span>Inicio</span></a>
              </li>
          @endif
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Salir') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
          
          <li>
                    <a href="{{ url('/home') }}"><i class="bx bx-home"></i>Inicio</a>
          </li>
          @if(Auth::user()->type =="Administrador" )
          <li>
                    <a href="{{ url('/usuarios') }}"><i class="bx bx-user"></i>Administrar Usuarios</a>
          </li>
          <li>
                    <a href="{{ url('/pacientes') }}"><i class="bx bxs-pencil"></i>Administrar Pacientes</a>
          </li>
          <li>
                    <a href="{{ url('/asignar_pacientes') }}"><i class="bx bx-badge-check"></i>Asignar Paciente</a>
          </li>
          <!-- <li>
                    <a href="{{ url('/faltas') }}"><i class="bx bxs-tag-x"></i>Administrar Faltas</a>
          </li>
          <li>
                    <a href="{{ url('/grado_seccion') }}"><i class="bx bxs-school"></i>Grado/Sección</a>
          </li>
          <li>
                    <a href="{{ url('/alumnos') }}"><i class="bx bx-user-circle"></i>Administrar Alumnos</a>
          </li> -->
          
          @elseif(Auth::user()->type =="Voluntarios" )
          <li>
                    <a href="{{ url('/seguimiento_pacientes') }}"><i class="bx bx-list-ol"></i>Listado de pacientes</a>
          </li>
          @endif
          
          
      @endguest
     
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
 
  <!-- ======= Hero Section ======= -->
   

  <main id="main"> 
  <!-- <div class="hero-container" data-aos="fade-in"> -->
    @yield('contenido') 
    <!-- </div> -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>SFA</span></strong>
      </div>
     
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset ('bootstrapplugins/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset ('bootstrapplugins/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset ('bootstrapplugins/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset ('bootstrapplugins/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset ('bootstrapplugins/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset ('bootstrapplugins/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset ('bootstrapplugins/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset ('bootstrapplugins/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset ('bootstrapplugins/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset ('bootstrapplugins/vendor/typed.js/typed.min.js')}}"></script>
  <script src="{{asset ('bootstrapplugins/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset ('bootstrapplugins/js/main.js')}}"></script>

  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script>
$(document).ready(function() {
  $('#dataTables').DataTable({
    "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
              }
  });
} );
</script>
</body>

</html>