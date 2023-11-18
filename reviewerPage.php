<?php

@include 'filelogic.php';
session_start();
$statusMsg = '';

if (!isset($_SESSION['user_name'])) {
    header('location:loginform.php');
}
$sql = "SELECT * FROM `images`";
$all_filename = mysqli_query($conn, $sql);
if (isset($_POST["submit"])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $recommendation = mysqli_real_escape_string($conn, $_POST['recommendation']);
    $file_name = mysqli_real_escape_string($conn, $_POST['file_name']);
    $insert = "INSERT INTO reviewsubmission (username, recommendation,file_name) VALUES ('$username', '$recommendation','$file_name')";
    if (mysqli_query($conn, $insert)) {
        $statusMsg = "Recommedation added successfully";
    } else {
        $statusMsg = "Recommendation upload failed, please try again.";
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
    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container">

            <div class="logo float-left">
                <a href="index.php"><img src="assets/img/logo-pcm.png" alt="" class="img-fluid"></a>
            </div>
            <div class="mobile">
                <div class="donate float-right">
                    <h1><a href="logout.php" rel="noopener noreferrer" target="_self" class="btn-get-started"><i class="icofont-logout"></i>
                            | Logout</a></h1>
                </div>
            </div>
            <nav class="nav-menu float-right d-none d-lg-block">
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#event">Events</a></li>
                    <li><a href="#team">Board Members</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                    <a href="logout.php" rel="noopener noreferrer" target="_self" class="btn-get-started"><i class="icofont-logout"></i>
                        | Logout</a>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->
    <div class="hero-text">
        <h2 class="animate__animated animate__fadeInDown"><span>PERSPECTIVES Proceedings Managment</span></h2>
        <h6 class="animate__animated animate__fadeInUp">A Conference Paper Review Company</h6>
    </div>
    <main id="main">
        <div class="user-container">
            <div class="content">
                <h3>HI, <span>Reviewer</span></h3>
                <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
            </div>
        </div>
        <div class="table">
            <table class="center">
                <thead>
                    <th>Filename</th>
                    <th>Upload Date</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `images`;";
                    // FETCHING DATA FROM DATABASE 
                    $result = $conn->query($query);
                    foreach ($result as $file) : ?>
                        <tr>
                            <td><?php echo $file['file_name']; ?></td>
                            <td><?php echo $file['upload_date']; ?></td>
                            <td><a href="reviewerPage.php?file_id=<?php echo $file['id'] ?>">Download</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="form-container">

            <form action="" method="post">
                <h3>Submission Form</h3>
                <input type="text" name="username" required placeholder="Enter Your Username">
                <select name="recommendation">
                    <option value="accept">Accept</option>
                    <option value="neutral">Neutral</option>
                    <option value="reject">Reject</option>
                </select>
                <select name="file_name">
                    <?php
                    // use a while loop to fetch data 
                    // from the $all_categories variable 
                    // and individually display as an option
                    while ($filename = mysqli_fetch_array(
                        $all_filename,
                        MYSQLI_ASSOC
                    )) :;
                    ?>
                        <option value="<?php echo $filename["file_name"];
                                        // The value we usually set is the primary key
                                        ?>">
                            <?php echo $filename["file_name"];
                            // To show the category name to the user
                            ?>
                        </option>
                    <?php
                    endwhile;
                    // While loop must be terminated
                    ?>
                </select>
                <input type="submit" name="submit" value="Upload Review" class="form-btn">
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