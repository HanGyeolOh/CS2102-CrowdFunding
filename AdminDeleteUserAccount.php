<?php
session_start();
require('dbconn.php');

$email = $_GET['email'];

$query = "SELECT image_url FROM users WHERE email = '$email';";
$result = pg_query($dbconn, $query);
$image_url = pg_fetch_result($result, 0, 0);
unlink($image_url);

$query = "DELETE FROM users WHERE email = '$email';";
$result = pg_query($dbconn, $query);

if($email === 'admin@example.com') {
  header('Location: Homepage.php');
  unset($_SESSION["username"]);
  unset($_SESSION["password"]);
}
else {
  header('Location: AdminPage.php');
}

?>
