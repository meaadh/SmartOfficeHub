<?php

@include 'config.php';

$select = "SELECT * FROM images";
$result = mysqli_query($conn, $select);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);


if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM images WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'Uploads/' . $file['file_name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('Uploads/' . $file['file_name']));
        readfile('Uploads/' . $file['file_name']);
        // Now update downloads count
        $newCount = $file['status'] + 1;
        $updateQuery = "UPDATE images SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
