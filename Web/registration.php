<!DOCTYPE html>
<html>
   <head>
      <title>Registration</title>
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/Home.css" />
      <nav>
         <ul>
            <li>
               <a href="index.html">Home</a>
            </li>
            <li>
               <a href="login.php">Login</a>
            </li>
         </ul>
      </nav>
   </head>
   <body>
      <?php
         require('db.php');
         if (isset($_REQUEST['username'])){
          if ($_REQUEST['email'] == $_REQUEST['emailconfirm'])
          {
          $username = stripslashes($_REQUEST['username']);
          $username = mysqli_real_escape_string($con,$username); 
          $email = stripslashes($_REQUEST['email']);
          $email = mysqli_real_escape_string($con,$email);
          $password = stripslashes($_REQUEST['password']);
          $password = mysqli_real_escape_string($con,$password);
          $trn_date = date("Y-m-d H:i:s");
                 $query = "INSERT into `Users` (username, password, email, trn_date)
         VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
                 $result = mysqli_query($con,$query);
                 if($result){
                     echo "<div class='insertForm'>
         <h3>You have been registered successfully.</h3>
         <br/>Click here to <a href='login.php'>Login</a></div>";
                 }
             }
             elseif ($_REQUEST['email'] != $_REQUEST['emailconfirm']) 
             {
             echo "<div class='insertForm'>
              <h3>The email address' you entered did not match</h3>
         <br/>Click here to try again <a href='registration.php'>Register</a></div>";
           }
           }
           else{
         ?>
      <div class="insertForm">
         <h1>Registration</h1>
         <form name="registration" action="" method="post">
            <p>Username: <input type="text" name="username" placeholder="Username" required/></p>
            <p>Email Address: <input type="email" name="email" placeholder="Email" required /></p>
            <p>Confirm Email Address: <input type="email" name="emailconfirm" placeholder="Confirm Email" required /></p>
            <p>Password: <input type="password" name="password" placeholder="Password" required /></p>
            <input type="submit" name="submit" value="Register" />
            <p>Already Registered? Login <a href="login.php">here</a></p>
         </form>
      </div>
      <?php } ?>
   </body>
</html>