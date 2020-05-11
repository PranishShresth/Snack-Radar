<?php
session_start();
include "./config/db.php";

$username = $_SESSION['login-username'];

include "./includes/header.php"?>
<style>
.avatar {
    border: 0.3rem solid rgba(#fff, 0.3);
    margin-top: -6rem;
    margin-bottom: 1rem;
    max-width: 9rem;
}
</style>

<div class="alert alert-success" style="text-align:center" role="alert">
    Here are your matches. Happy bonding!!!
</div>
<div class="container matches-container" style="margin-top: 5em;">
    < <div class="row">

        <?php

$username = $_SESSION['login-username'];
$userid = $_SESSION['user-id'];
$sql = "SELECT users.name,users.profile,GROUP_CONCAT(snack.title) AS interests,Count(snack.title) as nSnacks
        from users join likes on users.id
        = likes.user_id join snack on snack.id = likes.snack_id where not users.name= '$username' and snack.title in
        (Select snack.title from snack join likes on snack.id = likes.snack_id join users on users.id = likes.user_id
        where users.name = '$username') and users.id NOT IN (SELECT to_user_id from Message WHERE from_user_id= $userid
        ) GROUP by users.name order by (nSnacks) DESC";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    print "
        <div class='col-6 col-sm-4 mt-4'>
            <div class='card'>

                <div class='card-body text-center'>
                    <h4 class='card-title'>" . $row['name'] . "</h4>
                    <h6 class='card-subtitle mb-2 text-muted'>" . $row['interests'] . "</h6>
                    <p class='card-text'>" . $row['profile'] . " </p>

                    <a href='Message.php' class='btn btn-outline-info'>Message</a>
                </div>
            </div>

        </div>";

}

?>
</div>
</div>