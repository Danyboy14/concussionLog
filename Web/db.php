<?php
   // Enter your Host, username, password, database below.
   $con = mysqli_connect("mysql11.000webhost.com","a3574765_Dan21","Danyboy14","a3574765_logins");
   // Check if error in connection
   if (mysqli_connect_errno())
   {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
?>