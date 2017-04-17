<?php
   require('db.php');
   include("auth.php");
   $status = "";
   if(isset($_POST['new']) && $_POST['new']==1){
      if ($_REQUEST['age'] <=20): ?>
                  <script>confirm("Please make sure the player's coach has notified one of \ntheir parent's of this injury.");</script>
                <?php endif;
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
      <title>Insert New Record</title>
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/Home.css" />
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
         $( function() {
         $( "#datepicker" ).datepicker({maxDate: "0", dateFormat: "dd-mm-yy"});
         } );
      </script>
      <nav>
         <ul>
            <li>
              <a>Logged in as <?php echo $_SESSION["username"]?> </a>
            </li>
            <li>
               <a href="index2.php">Home</a>
            </li>
         </ul>
      </nav>
   </head>
   <body>
      <div class="insertForm">
         <p><a href="dashboard.php">Dashboard</a> 
            <a href="view.php">View Records</a> 
            <a href="logout.php">Logout</a>
         </p>
         <div>
            <h1>Insert New Record</h1>
            <form name="insertForm" method="post" action="">
               <input type="hidden" name="new" value="1" />
               <p>Name: <input type="text" name="name" placeholder="Enter Name" required /></p>
               <p>Age: <input type="text" name="age" placeholder="Enter Age" required /></p>
               <p>
                  Position:
                  <select name="position">
                     <option value="Prop">Prop</option>
                     <option value="Hooker">Hooker</option>
                     <option value="Lock">Lock</option>
                     <option value="Flanker">Flanker</option>
                     <option value="Number 8">Number 8</option>
                     <option value="Scrumhalf">Scrumhalf</option>
                     <option value="Outhalf">Outhalf</option>
                     <option value="Winger">Winger</option>
                     <option value="Centre">Centre</option>
                     <option value="Fullback">Fullback</option>
                  </select>
               </p>
               <p>Club: <input type="text" name="club" placeholder="Enter Club" required /></p>
               <p>Date: <input type="text" name="dateofconcussion" id="datepicker" placeholder="Concussion Date: DD-MM-YY" required /></p>
               <p>Referee: <input type="text" name="refereename" placeholder="Enter name of referee" required /></p>
               <p><input name="submit" type="submit" value="Submit" /></p>
            </form>
            <p style="color:black;"><?php echo $status; ?></p>
         </div>
      </div>
   </body>
</html>