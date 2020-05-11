<?php
session_start();
require("db.php");
$userid = $_SESSION['user-id'];
if($_POST['snacks']){
    foreach ($_POST['snacks'] as $snack){
        $query="INSERT INTO likes(user_id, snack_id) SELECT $userid,s.id FROM (SELECT DISTINCT snack.id from snack where snack.title ='$snack') as s";
        $result = mysqli_query($conn,$query);
    }
}
if($_POST['snacksd']){
    foreach ($_POST['snacksd'] as $snack){
        $query="DELETE FROM likes WHERE snack_id = (SELECT DISTINCT snack.id from snack  where snack.title ='$snack') AND user_id = $userid";
        $result = mysqli_query($conn,$query);
    }
};
if($_POST['profile-text']){
    $profile =$_POST['profile-text'];
    $query="UPDATE users SET profile = '$profile' Where id = $userid";
     mysqli_query($conn,$query);
}

header("Location: ../Profile.php");

?>