<?php
@include 'config.php';
$statusMsg = '';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:loginform.php');
}
$filename2 = 'video.txt';  // Replace with the path to your file

if (isset($_POST["submit"])) {
    header('location:queuePage.php');         
}
$filename = 'piazza.txt';  // Replace with the path to your file

$delaySeconds = 1;

// Maximum number of attempts before giving up
$maxAttempts = 10;

$attempts = 0;

while ($attempts < $maxAttempts) {
    // Check if the file exists
    if (file_exists($filename2)) {
        // File exists, read its content
        $fileContent = file_get_contents($filename2);
        // Check if the content is present (modify this condition based on your requirements)
        if (!empty($fileContent)) {
            break; // Exit the loop if content is found
        }
    }

    // Wait for the specified delay before the next attempt
    sleep($delaySeconds);

    $attempts++;
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
                <h4>We've found the following Piazza post and video for you!</h4>
                <h3><span>This is your piazza post:</span></h3>

            </div>

        </div>
        <div class="user-container">
            <h5 id="piazzaText">Loading content...</h5>
        </div>
        <div id="text-container"></div>
<!--         <script>
            // Function to check files content
            function checkFilesContent() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'ResultPage.php', true);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = xhr.responseText.split('|'); // Split the response into an array

                        // Check if the content of either file has changed
                        if (response[0] == currentFileContent1 || response[1] == currentFileContent2) {
                        
                            clearInterval(checkFilesInterval);

                            // Stop further checks by clearing the interval

                        } else if (response[0] == currentFileContent1) {
                            location.reload();
                        }
                        else if (response[1] == currentFileContent2) {
                            location.reload();
                        }
                    }
                };

                xhr.send();
            }

            // Initial file contents
            var currentFileContent1 = '<?php echo $fileContent1; ?>';
            var currentFileContent2 = '<?php echo $fileContent2; ?>';

            // Check files content every 5 seconds
            var checkFilesInterval = setInterval(checkFilesContent, 5000);
        </script> -->
       <script>
            fetch('piazza.txt')
                .then(response => response.text())
                .then(text => {
                    document.getElementById('piazzaText').innerText = text;
                })
                .catch(error => console.error('Error fetching piazza.txt:', error));
        </script>
        <div class="user-container">
            <div class="content">
                <h3><span>This is your Video</span></h3>

            </div>

        </div>
        <div class="user-container">
            <iframe width="640" height="360" src="" frameborder="0" allowfullscreen id="youtubePlayer"></iframe>
        </div>
        <script>
            fetch('video.txt')
                .then(response => response.text())
                .then(youtubeLink => {
                    const videoId = getYouTubeVideoId(youtubeLink);
                    const youtubePlayer = document.getElementById('youtubePlayer');
                    youtubePlayer.src = `https://www.youtube.com/embed/${videoId}`;
                })
                .catch(error => console.error('Error fetching video.txt:', error));

            function getYouTubeVideoId(url) {
                const regex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
                const match = url.match(regex);
                return match ? match[1] : null;
            }
        </script>
        <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="submit" name="submit" class="form-btn" value="Queue to Office Hour"  />
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
                &copy; Copyright <strong><span>Smart Office HUB</span></strong>. All Rights Reserved
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