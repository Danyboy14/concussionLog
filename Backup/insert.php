<?php
   require('db.php');
   include("auth.php");
   $status = "";
   if(isset($_POST['new']) && $_POST['new']==1){
       $trn_date = date("Y-m-d H:i:s");
       $name =$_REQUEST['name'];
       $age = $_REQUEST['age'];
       $position = $_REQUEST['position'];
       $club = $_REQUEST['club'];
       $dateofconcussion = $_REQUEST['dateofconcussion'];
       $refereename = $_REQUEST['refereename'];
       $submittedby = $_SESSION["username"];
       $ins_query="insert into new_record
       (`trn_date`,`name`,`age`, `position`,`club`,`dateofconcussion`,`refereename`,`submittedby`)values
       ('$trn_date','$name','$age','$position','$club','$dateofconcussion','$refereename','$submittedby')";
       mysqli_query($con,$ins_query)
       or die(mysql_error());
       $status = "New Record Inserted Successfully.
       </br></br><a href='view.php'>View Inserted Record</a>";
   }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Insert New Record</title>
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/Home.css" />
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <nav>
         <ul>
            <li>
               <a href="index2.php">Home</a>
            </li>
         </ul>
      </nav>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
      $( function() {
      $( "#datepicker" ).datepicker({maxDate: "0", dateFormat: "dd/mm/yy"});
      } );
      </script>
   </head>
   <body>
      <div class="form">
         <p><a href="dashboard.php">Dashboard</a> 
            | <a href="view.php">View Records</a> 
            | <a href="logout.php">Logout</a>
         </p>
         <div>
            <h1>Insert New Record</h1>
            <form name="form" method="post" action="">
               <input type="hidden" name="new" value="1" />
               <p>Name: <input type="text" name="name" placeholder="Enter Name" required /></p>
               <p>Age: <input type="text" name="age" placeholder="Enter Age" required /></p>
               <p>Position: <input type="text" name="position" placeholder="Enter Position" required /></p>
               <p>Club: <input type="text" name="club" placeholder="Enter Club" required /></p>
               <p>Date: <input type="text" name="dateofconcussion" id="datepicker" placeholder="Concussion Date: DD/MM/YY" required /></p>
               <p>Referee: <input type="text" name="refereename" placeholder="Enter name of referee" required /></p>
               <p><input name="submit" type="submit" value="Submit" /></p>
            </form>
            <p style="color:black;"><?php echo $status; ?></p>
         </div>
      </div>
   </body>
</html>