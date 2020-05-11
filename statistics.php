<?php 
session_start();

if( ! isset($_SESSION["login-username"]) ){ 
  die('Only  logged in users can access this page!');
}
 
?>
<?php include("./includes/Header.php")?>
<?php require("./config/db.php")?>
<div class="container mt-5">
    <div class="alert alert-primary" role="alert">
        <h4> Total number of messages sent of site: <span class="badge badge-success">
                <?php
          $query = "SELECT Count(*) as Totalmessages FROM `message`
          ";
          $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($result)){
                print $row["Totalmessages"];
            };

          ?>
            </span></h4>
    </div>
    <div class="alert alert-primary" role="alert">
        Top 3 most-liked ordered in descending order by number of likes
        <div class="mt-3"></div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Snacks</th>
                    <th scope="col">No of likes</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT count(*) as 'Top most liked',snack.title
                from likes,snack,users 
                where likes.snack_id = snack.id
                and users.id = likes.user_id 
                GROUP BY snack.title 
                ORDER by count(*)
                DESC LIMIT 3";
                $result = mysqli_query($conn,$query);
                  while($row = mysqli_fetch_assoc($result)){
                      print "<tr>
                      <td>".$row['title']."</td>
                      <td>".$row["Top most liked"]."
                    </tr>";
                  };
                ?>
            </tbody>
        </table>
    </div>



    <div class="alert alert-primary" role="alert">
        The day in which most messages are sent:

        <div class="mt-3"></div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Name of the day</th>
                    <th scope="col">Total number of messages sent</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                      
                      $query = "SELECT DAYNAME(message_date) as Dayname, Count(*) as sentMessage From message 
                      GROUP BY DAYNAME(message_date) ORDER by count(*) DESC LIMIT 1";

                      
                      $result = mysqli_query($conn,$query);
                        while($row = mysqli_fetch_assoc($result)){
                            print "<tr>
                            <td>".$row['Dayname']."</td>
                            <td>".$row["sentMessage"]."
                          </tr>";
                        };

                      ?>
            </tbody>
        </table>
    </div>


</div>