<?php
session_start();
if(isset($_POST['submit'])){
  $password = MD5($_POST["password"]);
  $password_check = MD5($_POST["password_check"]);

  require('dbconn.php');
  $query = "UPDATE users SET password = $password WHERE email = $email;";
  $result = pg_query($dbconn, $query);

  $_SESSION['username'] = $email;
  header('Location: User Profile.php');
}
?>
