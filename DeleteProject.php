<?php
session_start();
require('dbconn.php');

$project_id = $_GET['id'];

$query = "SELECT logo_url FROM projects WHERE project_id = $project_id;";
$result = pg_query($dbconn, $query);
$image_url = pg_fetch_result($result, 0, 0);
unlink($image_url);

$query = "SELECT picture_url FROM contain WHERE project_id = $project_id;";
$result = pg_query($dbconn, $query);
while ($row = pg_fetch_row($result)) {
  $image_url = $row[0];
  unlink($image_url);
}
rmdir("image/project/$id");

$query = "DELETE FROM projects WHERE project_id = '$project_id';";
$result = pg_query($dbconn, $query);


header('Location: Homepage.php');

?>
