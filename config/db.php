<?php

 $servername = "localhost";
 $username = "Pranish";
 $password = "30345392";
 $db = "itech3108_30345392_a1";
 // Create connection


 $conn = new mysqli($servername, $username, $password,$db);
 
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 
 

 

 ?>