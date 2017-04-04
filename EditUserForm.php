<?php
session_start();
if(isset($_POST['usersubmit'])){
  $name = $_POST["name"];
  $dob = $_POST["dob"];
  $address = $_POST["address"];
  if($_SESSION['username'] === 'admin@example.com') {
    $email = $_GET['email'];
  }
  else {
    $email = $_SESSION['username'];
  }

  require('dbconn.php');

  $query = "UPDATE users SET name = '$name', dob = '$dob', address = '$address' WHERE email = '$email';";
  $result = pg_query($dbconn, $query);

  if($_SESSION['username'] === 'admin@example.com') {
    header('Location: AdminPage.php');
  }
  else {
    header('Location: UserProfileAdmin.php');
  }
}
?>
