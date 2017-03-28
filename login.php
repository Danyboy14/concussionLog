<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/Home.css" />
      <nav>
         <ul>
            <li>
               <a href="index.php">Home</a>
            </li>
            <li>
               <a href="registration.php">Register</a>
            </li>
         </ul>
      </nav>
   </head>
   <body>
      <?php
         require('db.php');
         session_start();
         // If form submitted, insert values into the database.
         if (isset($_POST['username'])){
         	$username = stripslashes($_REQUEST['username']);
                 //escapes special characters in a string
         	$username = mysqli_real_escape_string($con,$username);
         	$password = stripslashes($_REQUEST['password']);
         	$password = mysqli_real_escape_string($con,$password);
         	//Checking to see if the user exists in the database or not
                 $query = "SELECT * FROM `Users` WHERE username='$username'
         and password='".md5($password)."'";
         	$result = mysqli_query($con,$query) or die(mysql_error());
         	$rows = mysqli_num_rows($result);
               if($rows==1)
               {
         	    $_SESSION['username'] = $username;
                     // Redirect user to index2.php
         	    header("Location: index2.php");
               }
               else
               {
         	      echo "<div class='insertForm'>
                  <h3>Username/password is incorrect.</h3>
                  <br/>Click here to <a href='login.php'>Login</a></div>";
         	   }
            }
            else
            {
               ?>
               <div class="insertForm">
               <h1>Log In</h1>
               <form action="" method="post" name="login">
               <p>Username: <input type="text" name="username" placeholder="Username" required /></p>
               <p>Password: <input type="password" name="password" placeholder="Password" required /></p>
               <input name="submit" type="submit" value="Login" />
               </form>
               <p>Not registered yet? <a href='registration.php'>Register Here</a></p>
               </div>
            <?php } ?>
   </body>
</html>