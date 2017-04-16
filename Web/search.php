<?php
   require('db.php');
   include("auth.php");
   mysql_connect("mysql11.000webhost.com","a3574765_Dan21","Danyboy14","a3574765_logins") or die("Error connecting to database: ".mysql_error());
   mysql_select_db("a3574765_logins") or die(mysql_error());
   ?>
<!DOCTYPE html>
<html>
   <head>

      <title>View Records</title>
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
      <div class="form">
      <p><a href="dashboard.php">Dashboard</a> 
         <a href="insert.php">Insert New Record</a>
         <a href="view.php">View Records</a>
         <a href="logout.php">Logout</a>
      </p>
      <h2>Search Results</h2>
      <form action="search.php" method="GET">
         <input type="text" name="query" placeholder="Enter query" required />
         <input type="submit" value="Search" />
      </form>
      <p> </p>
      <?php
         $query = $_GET['query']; 
         // takes value from search form in view.php
          
         $min_length = 1;
          
         if(strlen($query) >= $min_length){ // if query length is more or equal to minimum length then
              
             $result = mysql_query("SELECT * FROM new_record
                 WHERE (`id` LIKE '%".$query."%') OR (`name` LIKE '%".$query."%') OR (`age` LIKE '%".$query."%') OR (`position` LIKE '%".$query."%') OR (`club` LIKE '%".$query."%') OR (`dateofconcussion` LIKE '%".$query."%') OR (`refereename` LIKE '%".$query."%') OR (`submittedby` LIKE '%".$query."%') ORDER BY id desc") or die(mysql_error());
               // querying each row to see if it matches user search query   
            
             if(mysql_num_rows($result) > 0)
             { // if one or more rows are returned, show table
         ?>
      <table class='styledtable' width=100%; border=1; style='border-collapse:collapse;'>
         <thead>
            <tr>
               <th><strong>S.No</strong></th>
               <th><strong>Name</strong></th>
               <th><strong>Age</strong></th>
               <th><strong>Position</strong></th>
               <th><strong>Club</strong></th>
               <th><strong>Date of Concussion</strong></th>
               <th><strong>Referee's Name</strong></th>
               <th><strong>Eligible to Play</strong></th>
               <th><strong>Submitted By</strong></th>
               <th><strong>Edit</strong></th>
               <th><strong>Delete</strong></th>
            </tr>
         </thead>
         <tbody>
            <?php
               $count=1;
               $epoch = time();
               $now = gmdate('d-m-Y', $epoch);
               echo $now;
               while($row = mysql_fetch_assoc($result)){ ?>
            <tr>
               <td align="center"><?php echo $row["id"]; ?></td>
               <td align="center"><?php echo $row["name"]; ?></td>
               <td align="center"><?php echo $row["age"]; ?></td>
               <td align="center"><?php echo $row["position"]; ?></td>
               <td align="center"><?php echo $row["club"]; ?></td>
               <td align="center"><?php echo $row["dateofconcussion"]; ?></td>
               <td align="center"><?php echo $row["refereename"]; ?></td>
               <?php
                  $now_date = strtotime($now);
                  $concussion_date = strtotime($row["dateofconcussion"]);
                  $date_diff = $now_date - $concussion_date; 
                  $days = abs($date_diff / (60*60*24));
                  if($row["age"] <= 20 AND $days <= 23): ?>
               <td align="center"> Not Eligible </td>
               <?php elseif ($row["age"] > 20 AND $days <= 21): ?>
               <td align="center"> Not Eligible </td>
               <?php elseif($row["age"] <= 20 AND $days > 23): ?>
               <td align="center"> Eligible </td>
               <?php elseif($row["age"] > 20 AND $days > 21): ?>
               <td align="center"> Eligible </td>
               <?php endif; ?>
               <td align="center"><?php echo $row["submittedby"]; ?></td>
               <?php if($_SESSION["username"] == $row["submittedby"]): ?>
               <td align="center">
                  <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
               </td>
               <td align="center">
                  <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
               </td>
               <?php  else: ?>
               <td align="center">
                  <p>-</p>
               </td>
               <td align="center">
                  <p>-</p>
               </td>
               <?php endif; ?>
            </tr>
            <?php $count++; } ?>
         </tbody>
      </table>
      <?php 
         }
         else{ // if there is no matching rows do following
         echo "No results";
         }     
         }
         ?>
   </body>
</html>