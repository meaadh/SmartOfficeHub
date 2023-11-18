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

  <title>Conference Paper Review System</title>
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
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact.admin@MoistureConference.com</a>
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
          <li><a href="#event">Events</a></li>
          <li><a href="#team">Board Members</a></li>
          <li><a href="#contact">Contact Us</a></li>
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
              <h2 class="animate__animated animate__fadeInDown"><span>PERSPECTIVES Proceedings Managment</span></h2>
              <h6 class="animate__animated animate__fadeInUp">A Conference Paper Review Company</h6>
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
              <p>We are an organization that helps streamline peer review process for conferences around the world</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title">Our Misson</h4>
              <p class="description">"To streamline the peer-review process, enhance collaboration among researchers, and ensure the rigorous evaluation of scholarly contributions."</p>
            </div>

          </div>
        </div>
      </div>

      </div>
    </section><!-- End About Us Section -->
    <!-- ======= Our Event Section ======= -->
    <section id="event" class="event section-bg">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
          <h2>Events</h2>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="event-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-Upcoming">Upcoming</li>
              <li data-filter=".filter-Past">Past</li>
            </ul>
          </div>
        </div>
        <div class="row event-container">

          <div class="col-lg-4 col-md-6 event-item filter-Upcoming">
            <div class="card">
              <img src="assets/img/Event-background.png" class="img-fluid" />
              <div class="card-text">
                <h2>Tech Conference</h2>
                <h3>August 4, 2024</h3>
                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 event-item filter-Upcoming">
            <div class="card">
              <img src="assets/img/Event-background.png" class="img-fluid" />
              <div class="card-text">
                <h2>Candy Conference</h2>
                <h3>March 24, 2024</h3>
                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 event-item filter-Upcoming">
            <div class="card">
              <img src="assets/img/Event-background.png" class="img-fluid" />
              <div class="card-text">
                <h2>Google Conference</h2>
                <h3>December 14, 2023</h3>
                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 event-item filter-Upcoming">
            <div class="card">
              <img src="assets/img/Event-background2.png" class="img-fluid" />
              <div class="card-text">
                <h2>Conference Dinner</h2>
                <h3>July 19, 2024</h3>
                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 event-item filter-Past">
            <div class="card">
              <img src="assets/img/Event-background.png" class="img-fluid" />
              <div class="card-text">
                <h2>Tech Conference</h2>
                <h3>July 4, 2023</h3>
                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 event-item filter-Past">
            <div class="card">
              <img src="assets/img/Event-background2.png" class="img-fluid" />
              <div class="card-text">
                <h2>Conference Dinner</h2>
                <h3>September 19, 2023</h3>
                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 event-item filter-Past">
            <div class="card">
              <img src="assets/img/Event-background2.png" class="img-fluid" />
              <div class="card-text">
                <h2>Conference Dinner</h2>
                <h3>May 15, 2023</h3>
                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 event-item filter-upcomming">
            <div class="card">
              <img src="assets/img/Event-background.png" class="img-fluid" />
              <div class="card-text">
                <h2>Food Conference</h2>
                <h3>May 4, 2023</h3>
                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 event-item filter-upcomming">
            <div class="card">
              <img src="assets/img/Event-background2.png" class="img-fluid" />
              <div class="card-text">
                <h2>Conference Dinner</h2>
                <h3>December 25, 2023</h3>
                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Our Event Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Board Members</h2>
        </div>

        <div class="row">

          <div class="col-12 col-sm-6 col-md-4 col-lg-4">
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

          <div class="col-12 col-sm-6 col-md-4 col-lg-4">
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

          <div class="col-12 col-sm-6 col-md-4 col-lg-4">
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

          <div class="col-12 col-sm-6 col-md-4 col-lg-4">
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

          <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="our-team">
              <div class="picture">
                <img class="img-fluid" src="assets/img/team/team-1.jpg">
              </div>
              <div class="team-content">
                <h3 class="name">David Reef</h3>
                <h4 class="title">IT</h4>
              </div>
              <ul class="social">
              </ul>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="our-team">
              <div class="picture">
                <img class="img-fluid" src="assets/img/team/team-2.jpg">
              </div>
              <div class="team-content">
                <h3 class="name">Catherne Holy</h3>
                <h4 class="title">Marketing</h4>
              </div>
              <ul class="social">
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="info-box">
              <a href="https://maps.app.goo.gl/ghhN9Yndd9h77gUU9" rel="noopener noreferrer" target="_blank"><i class="bx bx-map"></i></a>
              <h3>Our Address</h3>
              <p>4901 Evergreen Rd Dearborn,MI 48128</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <a href="mailto:info@conference.com"><i class="bx bx-envelope"></i></a>
              <h3>Email Us</h3>
              <p>info@conference.com</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box ">
              <a href="tel:248-420-6969"><i class="bx bx-phone-call"></i></a>
              <h3>Call Us</h3>
              <p>+1 248-420-6969</p>
            </div>
          </div>

          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
            <form action="" method="post" class="php-email-form">
              <div class="row">
                <div class="col-lg-6 d-flex align-items-stretch">
                  <input type="text" class="form-control" name="name" required placeholder="Your Name">
                </div>
                <div class="col-lg-6 d-flex align-items-stretch">
                  <input type="email" class="form-control" name="email" required placeholder="Your Email">
                </div>
                <div class="col-lg-12">
                  <input type="text" class="form-control" name="subjects" required placeholder="Subject">
                </div>
                <div class="col-lg-12">
                  <textarea name="messages" class="form-control" rows="5" cols="40" required placeholder="Message"></textarea>
                </div>
              </div>
              <div class="text-center"><input type="submit" name="submit" value="send message" class="form-btn"></div>

            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>PERSPECTIVES PROCEEDINGS MANAGEMENT</span></strong>. All Rights Reserved
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