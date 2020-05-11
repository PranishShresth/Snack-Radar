<title>Message</title>
<?php
session_start();
include "./includes/Header.php"?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Message Box</label>
                <div class="message-area overflow-auto" style="background:#e5e5e5;height:20rem;border-radius:10px">
                    <br>
                    <?php
require "./config/db.php";
$username = $_SESSION['login-username'];

$sql = "SELECT message.text,message.message_date as 'date',f.name as Fromuser ,t.name as Touser
 from message join users t on message.to_user_id = t.id 
 join users f on message.from_user_id = f.id where f.name ='$username' ORDER by message.message_date";

$result = mysqli_query($conn, $sql);
while ($rows = mysqli_fetch_assoc($result)) {
    print "<div class='alert alert-primary mx-2 my-2' role='alert'>" .
        $username . "->" . $rows['Touser'] . ": " . $rows['text'] ." <span class='badge badge-pill badge-success'>
        ".$rows['date']."</span></div>";
}
?>
                </div>
                <form action="config/Message.php" method="POST">
                    <h2 style="color:#fff">Send message to </h2>
                    <select name="toUser">
                        <?php

                            $query = "SELECT name from users WHERE NOT name='$username'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                print "<option>" . $row['name'] . "</option>";
                            }
                            ;
                            mysqli_close();
                            ?>
                    </select>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="message" class="form-control" placeholder="Type your message"
                    aria-label="Type your message" />
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        Send
                    </button>
                </div>
            </div>
            </form>

        </div>
        <div class="col">
            <div class="message-area overflow-auto" style="background:#e5e5e5;height:20rem; margin-top:2rem;">
                <?php
                    $sql = "SELECT message.text,message.message_date as 'date',f.name as Touser ,t.name as Fromuser from message join users t on message.from_user_id = t.id join users f on message.to_user_id = f.id where f.name ='$username' ORDER by message.message_date";
                    $result = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        print "<div class='alert alert-danger mx-2 my-2' role='alert'>" .
                            $rows['Fromuser'] . "->" . $username . ": " . $rows['text']." <span class='badge badge-pill badge-success'>
                            ".$rows['date']."</span></div>";
                    }
                    ?>
            </div>
        </div>
    </div>