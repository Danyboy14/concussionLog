<?php
   require('db.php');
   include("auth.php");
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
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
            | <a href="insert.php">Insert New Record</a> 
            | <a href="logout.php">Logout</a>
         </p>
         <h2>View Records</h2>
          <form action="search.php" method="GET">
        <input type="text" name="query" placeholder="Enter query" required />
        <input type="submit" value="Search" />
        </form>
        <p> </p>
         <table class='table styledtable' width=100%; border=1; style='border-collapse:collapse;'>
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
                  $sel_query="Select * from new_record ORDER BY id desc;";
                  $result = mysqli_query($con,$sel_query);
                  while($row = mysqli_fetch_assoc($result)) { ?>
               <tr>
                  <td align="center"><?php echo $count; ?></td>
                  <td align="center"><?php echo $row["name"]; ?></td>
                  <td align="center"><?php echo $row["age"]; ?></td>
                  <td align="center"><?php echo $row["position"]; ?></td>
                  <td align="center"><?php echo $row["club"]; ?></td>
                  <td align="center"><?php echo $row["dateofconcussion"]; ?></td>
                  <td align="center"><?php echo $row["refereename"]; ?></td>
                  <td align="center">Eligible</td>
                  <td align="center"><?php echo $row["submittedby"]; ?></td>
                  <?php if($_SESSION["username"] == $row["submittedby"]): ?>
                     <td align="center">
                        <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
                     </td>
                     <td align="center">
                        <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
                     </td>
                  <?php  else: ?>
                     <td align="center"><p>-</p></td>
                     <td align="center"><p>-</p></td>
                  <?php endif; ?>
               </tr>
               <?php $count++; } ?>
            </tbody>
         </table>
         <p id="demo"></p>
         <script>
         var d = new Date();
         document.getElementById("demo").innerHTML = d;
         </script>
      </div>
   </body>
</html>