<?php
$statusMsg = '';
@include 'config.php';
$name = $email = $subject = $message = "";
if (isset($_POST["submit"])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $subject = mysqli_real_escape_string($conn, $_POST['subjects']);
  $message = mysqli_real_escape_string($conn, $_POST['messages']);
  $insert = "INSERT INTO form (name, email,subjects,messages) VALUES ('$name', '$email','$subject','$message')";
  if (mysqli_query($conn, $insert)) {
    $statusMsg = "Final Recommedation added successfully";
  } else {
    $statusMsg = "Final Recommendation upload failed, please try again.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Smart Office Hub</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon_io/favicon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mamba - v2.3.0
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact.admin@SmartOfficeHub.com</a>
        <i class="icofont-phone"></i><a href="tel:586-489-9689"> +1 248-420-6969</a>
      </div>
      <div class="social-links float-right">
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <a href="index.php"><img src="assets/img/logo-pcm.png" alt="" class="img-fluid"></a>
      </div>
      <div class="mobile">
        <div class="donate float-right">
          <h1><a href="loginform.php" rel="noopener noreferrer" target="_self" class="btn-get-started"><i class="icofont-login"></i>
              | Login</a></h1>
        </div>
      </div>
      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#team">Board Members</a></li>
          <a href="loginform.php" rel="noopener noreferrer" target="_self" class="btn-get-started"><i class="icofont-login"></i>
            | Login</a>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <div class="carousel-item active" style="background-image: url('assets/img/slide/slide-1.jpg');">
          <div class="carousel-container">
            <div class="carousel-content container">
              <h2 class="animate__animated animate__fadeInDown"><span>Smart Office Hub</span></h2>
              <h6 class="animate__animated animate__fadeInUp">Empowering Learning, Connecting Minds: SmartOfficeHub, Where Office Hours Become Intelligent and Collaborative</h6>
              <a href="loginform.php" rel="noopener noreferrer" target="_self" class="btn-get-started animate__animated animate__fadeInUp scrollto"><i class="icofont-login"></i> | Login</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="row">

          <div class="col-lg-6">
            <div class="image">
              <img src="assets/img/about-pic.jpg" class="img-fluid" />
            </div>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>About Us</h2>
              <p>We are an organization that helps streamline the office hour experience for students using help of AI</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title">Our Misson</h4>
              <p class="description">"To streamline the office hour experience for students, combines the benefits of both online and in-person interactions, providing a comprehensive solution for efficient knowledge retrieval."</p>
            </div>

          </div>
        </div>
      </div>

      </div>
    </section><!-- End About Us Section -->
        <!-- ======= Our Team Section ======= -->
        <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Board Members</h2>
        </div>

        <div class="row">

          <div class="col-12 col-sm-6 col-md-6 col-lg-6">
            <div class="our-team">
              <div class="picture">
                <img class="img-fluid" src="assets/img/team/team-7.jpg">
              </div>
              <div class="team-content">
                <h3 class="name">Meaad Hassan</h3>
                <h4 class="title">CEO</h4>
              </div>
              <ul class="social">
              </ul>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-6 col-lg-6">
            <div class="our-team">
              <div class="picture">
                <img class="img-fluid" src="assets/img/team/team-5.jpg">
              </div>
              <div class="team-content">
                <h3 class="name">Joel Ahmed</h3>
                <h4 class="title">Administrator</h4>
              </div>
              <ul class="social">
              </ul>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-6 col-lg-6">
            <div class="our-team">
              <div class="picture">
                <img class="img-fluid" src="assets/img/team/team-4.jpg">
              </div>
              <div class="team-content">
                <h3 class="name">Yogal Chen</h3>
                <h4 class="title">CFO</h4>
              </div>
              <ul class="social">
              </ul>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-6 col-lg-6">
            <div class="our-team">
              <div class="picture">
                <img class="img-fluid" src="assets/img/team/team-3.jpg">
              </div>
              <div class="team-content">
                <h3 class="name">John Applet</h3>
                <h4 class="title">COO</h4>
              </div>
              <ul class="social">
              </ul>
            </div>
          </div>

      </div>
    </section><!-- End Our Team Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Smart Office Hub</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
        Designed by Meaad Hassan | Template by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>