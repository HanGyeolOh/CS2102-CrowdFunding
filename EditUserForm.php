<?php
session_start();
if(isset($_POST['usersubmit'])){
  $name = $_POST["name"];
  $dob = $_POST["dob"];
  $address = $_POST["address"];
  $email = $_SESSION['username'];

  require('dbconn.php');

  $query = "UPDATE users SET name = '$name', dob = '$dob', address = '$address' WHERE email = '$email';";
  $result = pg_query($dbconn, $query);

  header('Location: UserProfileAdmin.php');
}
?>
