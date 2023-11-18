<?php

@include 'config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM users WHERE username = '$username' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $error[] = 'user already exist!';
   } else {

      if ($pass != $cpass) {
         $error[] = 'password not matched!';
      } else {
         $insert = "INSERT INTO users(name,username, email, password, user_type) VALUES('$name','$username ','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:loginform.php');
      }
   }
};
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
   <!-- ======= Header ======= -->
   <header id="header">
      <div class="container">

         <div class="logo float-left">
            <a href="index.php"><img src="assets/img/pcm logo.png" alt="" class="img-fluid"></a>
         </div>
         <div class="mobile">
         <div class="logo float-right">
         <a href="index.php" rel="noopener noreferrer" target="_self" class="btn-get-started"><i class="icofont-login"></i>
              | Back</a></h1>
         </div>
         </div>
         
      </div>
   </header><!-- End Header -->
   <main id="main">
      <div class="form-container">
         <form action="" method="post">
            <h3>register now</h3>
            <?php
            if (isset($error)) {
               foreach ($error as $error) {
                  echo '<span class="error-msg">' . $error . '</span>';
               };
            };
            ?>
            <input type="text" name="name" required placeholder="Enter your Full Name">
            <input type="text" name="username" required placeholder="Enter your Username">
            <input type="email" name="email" required placeholder="Enter your Email">
            <input type="password" name="password" required placeholder="Enter your Password">
            <input type="password" name="cpassword" required placeholder="Confirm your Password">
            <input type="text" name="title" required placeholder="Enter your Title">
            <input type="text" name="affliation" required placeholder="Enter your Affiliation">
            <select name="user_type">
               <option value="author">Author</option>
               <option value="reviewer">Reviewer</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Already have an account? <a href="loginform.php">Login Now</a></p>
         </form>
      </div>
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