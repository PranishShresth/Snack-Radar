<?php
session_start();

if (!isset($_SESSION["login-username"])) {
    die('Only  logged in users can access this page!');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="style.css" />
    <title>Dashboard</title>
</head>
<style>
.avatar {
    border: 0.3rem solid rgba(#fff, 0.3);
    margin-top: -6rem;
    margin-bottom: 1rem;
    max-width: 9rem;
}
</style>

<body>
    <?php include "./includes/header.php";
?>
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mt-5">
                <div class="card">
                    <img class="card-img-top"
                        src="https://images.unsplash.com/photo-1513151233558-d860c5398176?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80"
                        alt="Bologna">
                    <div class="card-body text-center">
                        <?php include "config/profilepic.php";?>
                        <h4 class="card-title"><?php $username = $_SESSION['login-username'];
print $username;?></h4>
                        <h6 class="card-subtitle mb-2 text-muted">Snack Radar User</h6>
                        <p class="card-text"><?php
$username = $_SESSION['login-username'];
$sql = "SELECT profile FROM users WHERE name = '$username'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
print $rows["profile"];
?>. </p>

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>