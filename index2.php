<?php
   include("auth.php");
   ?>
<html>
   <head>
      <title>concussion log</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/Home.css">
   </head>
   <body>
   <img src='Images\concussionwhip.png'>
      <header>
         <nav>
            <ul>
               <li>
                  <a href="index2.php">Home</a>
               </li>
               <li>
                  <a href="dashboard.php">Dashboard</a>
               </li>
               <li>
                  <a href="logout.php">Logout</a>
               </li>
            </ul>
         </nav>
         <div class="clear"></div>
      </header>
      <div id="container">
         <h2><u>Some helpful links</u></h2>
         <p> </p>
         <li>The IRFU's GRTP (Graduated Return to Play) protocol which gives information<br>
            on the precautions every player should take in the case of a concussion or any<br>
            head injury. It is a great PDF for parents of underage players as well as for<br>
            senior players and coaches.<br>
            <div id="grtplink">
            	<a href="http://www.irishrugby.ie/downloads/IRFU-Guide-to-Concussion.pdf">IRFU Concussion Protocol</a>
            </div>
         </li>
         <p> </p>
         <li>The form to be filled out by referees after every occurence of a serious injury<br>
            concussion during a match.<br>
            <div id="grtplink">
               <a href="http://www.irishrugby.ie/downloads/IRFUSeriousInjuryForm2016.pdf">Serious Injury and Concussion Report Form</a>
            </div>
         </li>
         <p> </p>
         <li>A link to the Concussion Management page of World Rugby's website.<br>
            The page is full of helpful tips and guidelines.<br>
            <div id="grtplink">
               <a href="http://playerwelfare.worldrugby.org/concussion">World Rugby's Concussion Managament Page</a>
            </div>
         </li>
      </div>
      <footer>
         Concussion Log 2017
      </footer>
   </body>
</html>