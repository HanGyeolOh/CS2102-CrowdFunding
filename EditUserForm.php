<?php
session_start();
if(isset($_POST['submit'])){
  $name = $_POST["name"];
  $newemail = $_POST["newemail"];
  $dob = $_POST["dob"];
  $address = $_POST["address"];

  require('dbconn.php');

  if ($newemail == $email) {
    $query = "UPDATE users SET name = $name, dob = $dob, address = $address WHERE email = $email;";
    $result = pg_query($dbconn, $query);
  } else {
    $query = "UPDATE users SET email = $newemail WHERE email = $email;";
    $query = "UPDATE users SET name = $name, dob = $dob, address = $address WHERE email = $newemail;";
    $result = pg_query($dbconn, $query);
  }

  $_SESSION['username'] = $newemail;
  header('Location: User Profile.php');
}
?>
