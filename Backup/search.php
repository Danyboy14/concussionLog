<!DOCTYPE html>
<head>
    <title>Search results</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="Home.css"/>
</head>
<?php
  mysql_connect("mysql11.000webhost.com","a3574765_Dan21","Danyboy14","a3574765_logins") or die("Error connecting to database: ".mysql_error());
    /*
        mysql11.000webhost.com - it's location of the mysql server
        a3574765_Dan21 - your username
        Danyboy14 - your password
        a3574765_logins - database name
         
        if connection fails it will stop loading the page and display an error
    */
     
    mysql_select_db("a3574765_logins") or die(mysql_error());
    /* a3574765_logins is the name of database I've created */
?>
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
        <input type="text" name="query" />
        <input type="submit" value="Search" />
        </form>
        <p> </p>
<?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 1;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $raw_results = mysql_query("SELECT * FROM new_record
            WHERE (`id` LIKE '%".$query."%') OR (`name` LIKE '%".$query."%') OR (`age` LIKE '%".$query."%') OR (`position` LIKE '%".$query."%') OR (`club` LIKE '%".$query."%') OR (`dateofconcussion` LIKE '%".$query."%') OR (`refereename` LIKE '%".$query."%') OR (`submittedby` LIKE '%".$query."%')") or die(mysql_error());
             
       
        if(mysql_num_rows($raw_results) > 0)
        { // if one or more rows are returned do following
?>
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
                  while($results = mysql_fetch_array($raw_results)){ ?>
            
                    <tr>
                  <td align="center"><?php echo $count; ?></td>
                  <td align="center"><?php echo $results["name"]; ?></td>
                  <td align="center"><?php echo $results["age"]; ?></td>
                  <td align="center"><?php echo $results["position"]; ?></td>
                  <td align="center"><?php echo $results["club"]; ?></td>
                  <td align="center"><?php echo $results["dateofconcussion"]; ?></td>
                  <td align="center"><?php echo $results["refereename"]; ?></td>
                  <td align="center">Eligible</td>
                  <td align="center"><?php echo $results["submittedby"]; ?></td>
                  <?php if($_SESSION["username"] == $results["submittedby"]): ?>
                     <td align="center">
                        <a href="edit.php?id=<?php echo $results["id"]; ?>">Edit</a>
                     </td>
                     <td align="center">
                        <a href="delete.php?id=<?php echo $results["id"]; ?>">Delete</a>
                     </td>
                  <?php  else: ?>
                     <td align="center"><p>-</p></td>
                     <td align="center"><p>-</p></td>
                  <?php endif; ?>
               </tr>
               <?php $count++; } ?>
            </tbody>
            </table>
            <?php 
             
                /*echo "<p>".$results['name']."".$results['club']."".$results['dateofconcussion']."</p>";*/
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
            else{ // if there is no matching rows do following
            echo "No results";
            }
             
        }
         
    //else{ // if query length is less than minimum
        //echo "Minimum length is ".$min_length;
   // }
?>
</body>
</html>