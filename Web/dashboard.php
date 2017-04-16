<?php
   require('db.php');
   include("auth.php");
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Dashboard - Secured Page</title>
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/Home.css" />
      <nav>
         <ul>
            <li>
               <a href="index2.php">Home</a>
            </li>
         </ul>
      </nav>
   </head>
   <body>
      <div class="insertForm">
         <p>Welcome to the Dashboard.</p>
         <p><a href="insert.php">Insert New Record</a></p>
         <p><a href="view.php">View Records</a>
         <p><a href="logout.php">Logout</a></p>
      </div>
   </body>
</html>