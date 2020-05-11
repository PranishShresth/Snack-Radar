<?php
session_start();

require '../config/db.php';
$username = $_SESSION['login-username'];

if (isset($_POST['upload-button'])) {

    $name = $_FILES['file']['name'];
    $target_dir = getcwd() . "/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        $query = "UPDATE users Set photourl = '$name' where name = '$username'";
        mysqli_query($conn, $query);

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);

    }

}
header("Location: ../Profile.php");