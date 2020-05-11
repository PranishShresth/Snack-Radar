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
    <title>Profile</title>
</head>

<body>
    <?php include "./includes/header.php"?>
    <div class="container profile-con">
        <div class="row row-cols-2">
            <div class="col">
                <div class="text-center">
                    <?php require "config/db.php";
                        $loggedinuser = $_SESSION['login-username'];
                        $query = "SELECT photourl From users where name = '$loggedinuser'";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $imageURL = $row["photourl"];
                            print "<img src='./public/$imageURL' class='rounded' alt='..' />";} else {
                            print '<img src="no-image.jpg" class="rounded" alt="..." />';
                        }

                        ?>
                </div>
                <form action="public/Upload.php" method="POST" enctype="multipart/form-data">
                    <div class="row mt-5">
                        <div class="col">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file" id="customFile" />
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-outline-primary" name="upload-button"
                                value="Upload"></input>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">
                <div class="row mt-5">
                    <div class="col">
                        Profile Name
                    </div>
                    <div class="col">
                        <?php
                            $username = $_SESSION['login-username'];
                            print "<p>$username</p>";
                        ?>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        Profile Text
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <?php include "./config/db.php";
                                    $username = $_SESSION['login-username'];
                                    $sql = "SELECT profile FROM users WHERE name = '$username'";
                                    $result = mysqli_query($conn, $sql);
                                    $rows = mysqli_fetch_assoc($result);
                                      print $rows["profile"];
                                    ?>
                            </div>

                            <div class="col">
                                <button class="btn btn-outline-primary" type="button" data-placement="bottom"
                                    data-html="true" data-title="Update" data-toggle="popover">
                                    Update
                                </button>
                                <div id="PopoverContent" class="d-none">
                                    <form method="POST" action="config/sendInterest.php">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Profile"
                                                aria-label="Enter your profile label" name="profile-text">
                                            <div class="input-group-append" id="button-addon1">
                                                <button class="btn btn-outline-primary" type="submit">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        Current Interests are:
                    </div>
                    <div class="col">
                        <?php
                    $query = "SELECT users.name,snack.title,users.profile,GROUP_CONCAT(snack.title) 
                    AS interests from users 
                    join likes on users.id = likes.user_id 
                    join snack on snack.id = likes.snack_id 
                    where users.name = '$username'
                    GROUP by users.name";
                    
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    print $row['interests'];
                    ?>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        Edit Interests
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <form action="config/sendInterest.php" method="POST">
                                <select class="custom-select" name="snacks[]" id="inputGroupSelect04"
                                    multiple="multiple">
                                    <?php
                                        $sql = "SELECT title FROM snack";
                                        $result = mysqli_query($conn, $sql);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            print "<option>" . $rows['title'] . "</option>";
                                        }
                                        ;
                                        ?>
                                </select>

                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary w-100" type="submit">Add</button>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <form action="config/sendInterest.php" method="POST">
                                <select class="custom-select" name="snacksd[]" id="inputGroupSelect04"
                                    multiple="multiple">
                                    <?php
                                    $sql = "SELECT title FROM snack";
                                    $result = mysqli_query($conn, $sql);
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        print "<option>" . $rows['title'] . "</option>";
                                    }
                                    ;
                                    ?>
                                </select>

                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary w-100" type="submit">Delete</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>