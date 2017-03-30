<?php
session_start();
require('dbconn.php');

$email = $_SESSION['username'];
unset($_SESSION["username"]);
unset($_SESSION["password"]);

$query = "DELETE FROM users WHERE email = '$email';";
$result = pg_query($dbconn, $query);

header('Location: Homepage.php');

?>