<?php
session_start();include "includes/index.php"

?>


<?php require 'config/db.php';
if (isset($_POST['signup-submit'])) {
    if (isset($_POST['sign-up-user'], $_POST['sign-up-pass'], $_POST['sign-up-email'])) {
        // Assigning POST values to variables.
        $signup_username = mysqli_real_escape_string($conn,$_POST['sign-up-user']);
        $signup_password = mysqli_real_escape_string($conn,$_POST['sign-up-pass']);
        $email = $_POST['sign-up-email'];
        if ($signup_username == null || $signup_password = null || $email == null) {
            echo "<script> alert('Please fill the form to proceed')</script>";
        } else {

            $hashed_password = password_hash($signup_password, PASSWORD_DEFAULT);
            $query = "INSERT into users(`name`, `password`, `email`,`profile`,`photourl`)
             Values ('$signup_username','$hashed_password','$email','','')";

            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script> alert('You have successfully created an account. Login to access your account')</script>";}}
    }

    mysqli_close($conn);
}

?>
<?php
if (isset($_POST['login-submit'])) {
    if (isset($_POST['login-username'], $_POST['login-pass'])) {

        // Assigning POST values to variables.
        $loginname = mysqli_real_escape_string($conn, $_POST['login-username']);
        $loginpass = mysqli_real_escape_string($conn, $_POST['login-pass']);

        // CHECK FOR THE RECORD FROM TABLE
        $query = "SELECT * FROM users where name ='$loginname'";

        if ($result = mysqli_query($conn, $query)) {
            // Return the number of rows in result set
            $rowcount = mysqli_num_rows($result);

            if ($rowcount > 0) {
                $row = mysqli_fetch_assoc($result);
                $password_hashed = $row['password'];
                if (password_verify($loginpass, $password_hashed)) {
                    echo "success";
                    $_SESSION['login-username'] = $_POST['login-username'];
                    $_SESSION['user-id'] = $row['id'];

                    $loggedin = true;
                    header("Location: Dashboard.php");
                    exit;

                } else {
                    $_SESSION['validation'] = "<div class='alert alert-danger' role='alert'>
                    Login failed!
                  </div>";
                  
                    header("Location: authetication.php?login=failed");
                }

            }
            // Free result set
            mysqli_free_result($result);

        }

        mysqli_close($conn);
    }
}

?>

<ul class="nav  navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Snackradar</a>
</ul>

<div class="container con">


    <div class="row auth-row" style="width:80%;">
        <div class="col-md-6 img">
            <h3 class="txt-img text-right">Snack Radar</h3>
            <p class="txt-img text-right">Your No. 1 dating platform</p>
        </div>

        <!---Log in Container-->
        <div class="col-md-6 registration-form">
            <ul class="nav nav-tabs">
                <li class="active"><a class="btn-secondary btn" data-toggle="tab" href="#login">Login</a></li>
                <li><a class="btn-secondary btn mx-2" data-toggle="tab" href="#signup">Sign up</a></li>
            </ul>
            <?php 
                if(!empty($_SESSION['validation'])){
           $validation =$_SESSION['validation'];
           echo $validation;
        }
        ?>
            <div class="tab-content">
                <div id="login" class="tab-pane  active">

                    <h2>Log in</h2>
                    <form method="POST" id="login-form" action="authetication.php">
                        <div class="form-group">
                            <label for="Username">
                                Username
                            </label>
                            <input name="login-username" type="text" class="form-control" id="Username" required />
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="login-pass" type="password" class="form-control" id="password" required />
                        </div>

                        <button type="submit" name="login-submit" class="btn auth-btn btn-primary">Log in</button>
                    </form>
                </div>
                <div id="signup" class="tab-pane fade">

                    <h2>Sign up</h2>
                    <form id="sign-up" method="POST" action="authetication.php">
                        <div class="form-group">
                            <label for="Username">
                                Username
                            </label>
                            <input type="text" name="sign-up-user" class="form-control" id="signup-username" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="sign-up-email" type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="sign-up-pass" type="password" class="form-control" id="signup-pass" min="5"
                                max="15" />
                        </div>

                        <button name="signup-submit" type="submit" class="btn auth-btn btn-primary">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>