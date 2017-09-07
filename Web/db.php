<?php
   // Enter your Host, username, password, database below.
   $con = mysqli_connect("localhost","id2842415_dowen","Danyboy14","id2842415_concussionlog");
   // Check if error in connection
   if (mysqli_connect_errno())
   {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
?>
