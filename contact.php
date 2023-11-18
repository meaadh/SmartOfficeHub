<?php
$statusMsg = '';
@include 'config.php';

if (isset($_POST["submit"])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $insert = "INSERT INTO form (name, email,subject,message) VALUES ('$name', '$email','$subject','$message')";
    if (mysqli_query($conn, $insert)) {
      $statusMsg = "Final Recommedation added successfully";
    } else {
      $statusMsg = "Final Recommendation upload failed, please try again.";
    }
  }
?>