<?php
@include 'config.php';
$statusMsg = '';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:loginform.php');
}

if (isset($_POST["submit"])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $CourseName = mysqli_real_escape_string($conn, $_POST['CourseName']);
    $insert = "INSERT INTO finalsubmission (name,question,coursename) VALUES ('$username', '$question', '$CourseName')";
  if (mysqli_query($conn, $insert)) {
    $statusMsg = "Question uploaded successfully";
    extract($_REQUEST);
    $file=fopen("form-save.txt","a");
    ftruncate($file, 0);
    fwrite($file, $question ."\n");
    fwrite($file, $CourseName ."\n");
    fclose($file);
    header('location:ResultPage.php');
  } else {
    $statusMsg = "Question upload failed, please try again.";
    extract($_REQUEST);
    $file=fopen("form-save.txt","a");
    ftruncate($file, 0);
    fwrite($file, $question ."\n");
    fclose($file);
  }
};
echo $statusMsg;

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
    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container">

            <div class="logo float-left">
                <a href="index.php"><img src="assets/img/logo_notext.png" alt="" class="img-fluid"></a>
            </div>
            <div class="mobile">
                <div class="donate float-right">
                    <h1><a href="logout.php" rel="noopener noreferrer" target="_self" class="btn-get-started"><i class="icofont-logout"></i>
                            | Logout</a></h1>
                </div>
            </div>
            <nav class="nav-menu float-right d-none d-lg-block">
                <ul>
                    <a href="logout.php" rel="noopener noreferrer" target="_self" class="btn-get-started"><i class="icofont-logout"></i>
                        | Logout</a>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->
    <div class="hero-text">
                <h2 class="animate__animated animate__fadeInDown"><span>SMART OFFICE HOUR</span></h2>
                <h6 class="animate__animated animate__fadeInUp">To streamline the office hour experience for students</h6>
            </div>
    <main id="main">
        <div class="user-container">
            <div class="content">
                <h3>Hi, <span><?php echo $_SESSION['user_name'] ?></span></h3>
                <h4>Choose your class and type in your question below</h4>
            </div>

        </div>
        <div class="form-container">

            <form action="" method="post" enctype="multipart/form-data">
                <h3>Office Hour Form</h3>
                <select name="CourseName">
                    <option value="EECS 281 Data Structure and Algorithms">EECS 281 Data Structure and Algorithms</option>
                    <option value="EECS 280 Data Structure">EECS 280 Data Structure</option>
                    <option value="EECS 380 Computer Security">EECS 380 Computer Security</option>

                </select>
                <input type="text" name="username" required placeholder="Enter Name">
                <input type="text" name="question" required placeholder="Enter Question">
                <input type="submit" name="submit" class="form-btn" value="Upload Question"  />
            </form>   
        </div>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>SMART OFFICE HUB</span></strong>. All Rights Reserved
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


</body>
</html>
<?php
  
 ?> 