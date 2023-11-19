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
        <a href="index.php"><img src="assets/img/logo_notext.png" alt="" class="img-fluid"></a>
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
          <li><a href="about.php">About Us</a></li>
          <a href="loginform.php" rel="noopener noreferrer" target="_self" class="btn-get-started"><i class="icofont-login"></i>
            | Login</a>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->


  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="row">


          <div class="col-lg-12">

            <div class="section-title">
              <h2>About Us</h2>
              <p>We are an organization that helps streamline the office hour experience for students using help of AI</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title">Our Misson</h4>
              <p class="description">"To streamline the office hour experience for students, combines the benefits of both live discussions and online educational materials, providing a comprehensive solution for efficient knowledge retrieval."</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <p class="description">"Welcome to Smart Office Hub, your revolutionary go-to resource before attending office hours! At Smart Office Hub, our platform meticulously aggregates content from Piazza, lecture recordings, and office hours sessions to ensure you have 
                access to the most pertinent information at your fingertips."</p>
              <p class="description">"Wondering if your question has already been answered? Our system will comb through Piazza posts and lecture content, pinpointing and returning the exact posts or lecture segments that best address your query. You'll get direct links to 
                relevant Piazza discussions and timestamps for lecture segments, saving you time and effort."</p>
              <p class="description">"But that's not all. If your question has been addressed in a previous office hours session, Smart Office Hub will scan through all recorded sessions, segmented by individual contributors, to find a match. You'll receive a recording of 
                the most relevant question asked, providing you with a personalized learning experience."</p>
              <p class="description">"And in the rare event that your question is still unanswered, SmartEd Search takes an extra step. It searches through queries from other students and groups you with those who have similar questions, fostering a collaborative learning 
                environment. Our goal is to ensure that you're not just finding answers but also connecting with peers on a similar learning journey."</p>
              <p class="description">"At Smart Office Hub, we're committed to enhancing your educational experience by making information more accessible, relevant, and collaborative. Join us in revolutionizing the way students engage with academic resources and discover a 
                smarter way to learn! 🎓🔍✨"</p>
            </div>

          </div>
        </div>
      </div>

      </div>
    </section><!-- End About Us Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
  <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="info-box">
              <a href="" rel="noopener noreferrer" target="_blank"><i class="bx bx-map"></i></a>
              <h3>Our Address</h3>
              <p>2281 Bonisteel Ann Arbor,MI 48109</p>
            </div>
          </div>
          <div class="col-sm-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <a href="mailto:info@conference.com"><i class="bx bx-envelope"></i></a>
              <h3>Email Us</h3>
              <p>info@SmartOfficeHub.com</p>
            </div>
          </div>
          <div class="col-sm-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box ">
              <a href="tel:248-420-6969"><i class="bx bx-phone-call"></i></a>
              <h3>Call Us</h3>
              <p>+1 248-420-6969</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Smart Office Hub</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
        Designed by Meaad Hassan & Liyufei Meng | Template by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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