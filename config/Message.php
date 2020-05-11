<?php
session_start();
require("db.php");
$userid = $_SESSION['user-id'];
$toUser =$_POST['toUser'];
$message = $_POST['message'];
if($_POST['toUser'] && $_POST['message']){
    $query = "INSERT INTO message(from_user_id, to_user_id, message_date, text) VALUES ($userid,(Select id from users where name ='$toUser' ),DEFAULT,'$message');
    ";
    mysqli_query($conn,$query);
}
header("Location: ../Message.php")

?>