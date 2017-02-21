<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);

   echo 'Logging out...';
   header('Refresh: 1; URL = login.php');
?>
