<?php require "db.php";
$loggedinuser = $_SESSION['login-username'];
$query = "SELECT photourl From users where name = '$loggedinuser'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $imageURL = $row["photourl"];
    print "<img src='./public/$imageURL' class='avatar rounded-circle' alt='..' />";} else {
    print '<img src="no-image.jpg" class="avatar rounded-circle" alt="..." />';
}