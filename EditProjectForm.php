<?php
session_start();
if(isset($_POST['submit'])){
  $project_id = $_GET['id'];
  $title = $_POST["title"];
  $target_amount = $_POST["target_amount"];
  $end_date = $_POST["end_date"];
  $description = $_POST['description'];
  $category = $_POST['cat'];

  require('dbconn.php');

  $query = "UPDATE projects SET title = '$title', description = '$description', end_date = '$end_date', target_amount = $target_amount, category = '$category' WHERE project_id = '$project_id';";
  $result = pg_query($dbconn, $query);

  header("Location: ProjectProfileAdmin.php?id=$project_id");
}
?>
