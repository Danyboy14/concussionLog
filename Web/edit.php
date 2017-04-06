<?php
   require('db.php');
   include("auth.php");
   $id=$_REQUEST['id'];
   $query = "SELECT * from new_record where id='".$id."'"; 
   $result = mysqli_query($con, $query) or die ( mysqli_error());
   $row = mysqli_fetch_assoc($result);
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Update Record</title>
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
   </head>
   <body>
      <div class="insertForm">
         <p><a href="dashboard.php">Dashboard</a> 
            | <a href="insert.php">Insert New Record</a> 
            | <a href="logout.php">Logout</a>
         </p>
         <h1>Update Record</h1>
         <?php
            $status = "";
            if(isset($_POST['new']) && $_POST['new']==1)
            {
            $id=$_REQUEST['id'];
            $trn_date = date("Y-m-d H:i:s");
            $name =$_REQUEST['name'];
            $age =$_REQUEST['age'];
            $position =$_REQUEST['position'];
            $club =$_REQUEST['club'];
            $dateofconcussion =$_REQUEST['dateofconcussion'];
            $refereename =$_REQUEST['refereename'];
            $submittedby = $_SESSION["username"];
            $update="update new_record set trn_date='".$trn_date."',
            name='".$name."', age='".$age."', position='".$position."',
            club='".$club."', dateofconcussion='".$dateofconcussion."', 
            refereename='".$refereename."', 
            submittedby='".$submittedby."' where id='".$id."'";
            mysqli_query($con, $update) or die(mysqli_error($con));
            $status = "Record Updated Successfully. </br></br>
            <a href='view.php'>View Updated Record</a>";
            echo '<p style="color:black;">'.$status.'</p>';
            }else {
            ?>
         <div>
            <form name="insertForm" method="post" action="">
               <input type="hidden" name="new" value="1" />
               <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
               <p>Name: <input type="text" name="name" placeholder="Enter Name" 
                  required value="<?php echo $row['name'];?>" /></p>
               <p>Age: <input type="text" name="age" placeholder="Enter Age" 
                  required value="<?php echo $row['age'];?>" /></p>
               <p>Position: <select name="position" placeholder="Position">
                <option value="<?php echo $row['position'];?>"><?php echo $row['position'];?></option>
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
                  required value="<?php echo $row['position'];?>" </select></p>
               <p>Club: <input type="text" name="club" placeholder="Enter Club" 
                  required value="<?php echo $row['club'];?>" /></p>
               <p>Date: <input type="text" name="dateofconcussion" id='datepicker' placeholder="Enter Date of Concussion" 
                  required value="<?php echo $row['dateofconcussion'];?>" /></p>
               <p>Referee: <input type="text" name="refereename" placeholder="Enter Name of Referee" 
                  required value="<?php echo $row['refereename'];?>" /></p>
               <p><input name="submit" type="submit" value="Update" /></p>
            </form>
            <?php } ?>
         </div>
      </div>
   </body>
</html>