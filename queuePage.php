<?php

@include 'config.php';
$statusMsg = '';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:loginform.php');
}

$filename3 = 'queue.txt';  // Replace with the path to your file
if (file_exists($filename3)) {
    // File exists, read its content
    $fileContent = file_get_contents($filename3);
}
if (isset($_POST["Merge"])) {
    $primaryKeyColumn = 'id';
    $sqlLastRow = "SELECT MAX($primaryKeyColumn) AS lastID FROM finalsubmission";
   
    $sql2 = "SELECT name FROM finalsubmission ORDER BY id DESC LIMIT 1";
    $result1 = $conn->query($sql2);
    $resultLastRow = $conn->query($sqlLastRow);
    if ($result1->num_rows > 0) {
        // Fetch the data and assign it to a variable
        $row = $result1->fetch_assoc();
        $lastRowData = $row['name'];
    
        // Use $lastRowData as needed
       
    } else {
        echo "No results found";
    }
    
    $rowId = 2; // Replace with the actual ID of the row you want to update
    $columnName = 'name'; // Replace with the actual column name


    // SQL query to update a specific row and column in your_table
    $sql = "SELECT  $columnName FROM finalsubmission WHERE id = $fileContent";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the data and assign it to a variable
        $row = $result->fetch_assoc();
        $columnData = $row['name'];
        echo "Data from the column: " . $columnData;
        $dww = "UPDATE finalsubmission SET   $columnName =  '$columnData,$lastRowData' WHERE $primaryKeyColumn= $fileContent";
        if ($conn->query($dww) === TRUE) {
        } else {
        }
        if ($resultLastRow->num_rows > 0) {
            $rowLast = $resultLastRow->fetch_assoc();
            $lastID = $rowLast['lastID'];
            $sqlDeleteLastRow = "DELETE FROM finalsubmission WHERE $primaryKeyColumn = $lastID";

            if ($conn->query($sqlDeleteLastRow) === TRUE) {
                echo "Last row deleted successfully.";
                header('location:queuePage.php');
                file_put_contents($filename3, '');
            } else {
                echo "Error deleting last row: " . $conn->error;
            }
        } else {
            echo "No rows found in the table.";
        }
    }
}

echo $statusMsg;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SMART OFFICE HUB</title>
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
                <h3>HI, <span><?php echo $_SESSION['user_name'] ?></span></h3>
                <h3>Welcome to Data Structure and Algorithms Office Hours</h3>
                <?php
                $fileSize = filesize($filename3);

                // Check if the file size is greater than 0 (i.e., the file has content)
                if ($fileSize > 0) { ?>
                    <div class="form-container">
                        <form action="" method="post" enctype="multipart/form-data">
                            <h4>Would You like to Merge with another Student with similar question?</h4>
                            <input type="submit" name="Merge" class="form-btn" value="Merge Position" />
                            <input type="submit" name="Stay" class="form-btn" value="Stay Position" />
                        </form>
                    </div> <?php

                        } else {
                        }
                        if (isset($_POST["Stay"])) {
                            file_put_contents($filename3, '');
                        }
                            ?>

                <div class="table">
                    <table class="center">
                        <thead>
                            <th>Position</th>
                            <th>Name</th>
                            <th>Question</th>
                            <th>Course</th>


                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM `finalsubmission`;";
                            // FETCHING DATA FROM DATABASE 
                            $result = $conn->query($query);
                            foreach ($result as $file) : ?>
                                <tr>
                                    <td><?php if ($file['coursename'] == 'EECS 281 Data Structure and Algorithms') echo $file['id']; ?></td>
                                    <td><?php if ($file['coursename'] == 'EECS 281 Data Structure and Algorithms') echo $file['name']; ?></td>
                                    <td><?php if ($file['coursename'] == 'EECS 281 Data Structure and Algorithms') echo $file['question']; ?></td>
                                    <td><?php if ($file['coursename'] == 'EECS 281 Data Structure and Algorithms') {
                                            echo $file['coursename'];
                                        } ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

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