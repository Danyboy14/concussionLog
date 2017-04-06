<?php
   session_start();
   // Close All Sessions
   if(session_destroy())
   {
   // Redirect To Home Page
   header("Location: index.php");
   }
?>