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
        <ul>
             
          @if (Route::has('login'))
          <li>
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}"><i class="bx bx-user"></i> <span>Iniciar Sesión</span></a>

                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}"><i class="bx bx-user"></i> <span>Registrarse</span></a>
                        @endif -->
                    @endauth
                    </li>
            @endif


        </ul>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>Sheyavoh  </h1> 
    </div>
  </section><!-- End Hero -->

  <main id="main">
 


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

</body>

</html>