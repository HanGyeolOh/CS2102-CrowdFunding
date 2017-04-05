<?php
session_start();
require('dbconn.php');
if(isset($_POST['submit'])){
  $email = $_POST["email"];
  $query = "SELECT count(*) FROM users WHERE email = '$email';";
  $result = pg_query($dbconn, $query);

  if(pg_fetch_result($result, 0, 0) === 0) {
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $password = MD5($_POST["password"]);
    $password_check = MD5($_POST["password_check"]);

    $new_password = $password;

    if ( isset($_FILES["file"]["type"]) )
    {
      $max_size = 500 * 1024; // 500 KB
      $destination_directory = "image/profile/";
      $validextensions = array("jpeg", "jpg", "png");
      $temporary = explode(".", $_FILES["file"]["name"]);
      $file_extension = end($temporary);
      // We need to check for image format and size again, because client-side code can be altered
      if ( (($_FILES["file"]["type"] == "image/png") ||
      ($_FILES["file"]["type"] == "image/jpg") ||
      ($_FILES["file"]["type"] == "image/jpeg")
      ) && in_array($file_extension, $validextensions))
      {
        if ( $_FILES["file"]["size"] < ($max_size) )
        {
          if ( $_FILES["file"]["error"] > 0 )
          {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Error: <strong>" . $_FILES["file"]["error"] . "</strong></div>";
          }
          else
          {
            if ( file_exists($destination_directory . $_FILES["file"]["name"]) )
            {
              echo "<div class=\"alert alert-danger\" role=\"alert\">Error: File <strong>" . $_FILES["file"]["name"] . "</strong> already exists.</div>";
            }
            else
            {
              $sourcePath = $_FILES["file"]["tmp_name"];
              if ($_FILES["logo"]["type"] == "image/png") {
                $targetPath = "image/profile/$email.png";
              } else if ($_FILES["logo"]["type"] == "image/jpg") {
                $targetPath = "image/profile/$email.jpg";
              } else if ($_FILES["logo"]["type"] == "image/jpeg") {
                $targetPath = "image/profile/$email.jpeg";
              } else if ($_FILES["logo"]["type"] == "image/gif") {
                $targetPath = "image/profile/$email.gif";
              }
              move_uploaded_file($sourcePath, $targetPath);
              echo "<div class=\"alert alert-success\" role=\"alert\">";
              echo "<p>Image uploaded successful</p>";
              echo "<p>File Name: <a href=\"". $targetPath . "\"><strong>" . $targetPath . "</strong></a></p>";
              echo "<p>Type: <strong>" . $_FILES["file"]["type"] . "</strong></p>";
              echo "<p>Size: <strong>" . round($_FILES["file"]["size"]/1024, 2) . " kB</strong></p>";
              echo "<p>Temp file: <strong>" . $_FILES["file"]["tmp_name"] . "</strong></p>";
              echo "</div>";
            }
          }
        }
        else
        {
          echo "<div class=\"alert alert-danger\" role=\"alert\">The size of image you are attempting to upload is " . round($_FILES["file"]["size"]/1024, 2) . " KB, maximum size allowed is " . round($max_size/1024, 2) . " KB</div>";
        }
      }
      else
      {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Unvalid image format. Allowed formats: JPG, JPEG, PNG.</div>";
      }
    }

    $query = "INSERT INTO users VALUES('$name', '$email', '$dob', '$address', '$new_password', '$targetPath')";
    $result = pg_query($dbconn, $query);

    $_SESSION['username'] = $email;
    header('Location: UserProfileAdmin.php');
  }
}
?>

<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Creation User Error Page</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <style>
  .jumbotron{
    background-color:#2C3539;
    color:white;
    min-height: 700px;
    padding: 200px;
  }

  .grey{
    color: #808080;
  }

  .thin-jumbotron{
    padding-top: 10px;
    padding-bottom: 10px;
    height: 120px;
  }
  /* Adds borders for tabs */
  .tab-content {
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    padding: 10px;
  }
  .nav-tabs {
    margin-bottom: 0;
  }
  .thumbnail {
    border:0;
    padding: 10px;
  }
  .title-style {
    padding-top: 20px;
  }
  .col-centered{
    float: none;
    margin: 0 auto;
  }
  .carousel{
    background: #2f4357;
    margin-top: 20px;
    padding-bottom: 20px;
  }
  .carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
  }
  .bs-example{
    margin: 20px;
  }
  .button-middle{
    margin-top: 45px;
  }
  .carousel-inner > .item > img {
    width:640px;
    height:360px;
  }

  .progress {
    text-align:center;
  }
  .progress-value {
    position:absolute;
    right:0;
    left:0;
    color: #BDBDBD;
  }
  </style>
</head>

<body>

  <?php
  require('NavigationBar.php');
  require('dbconn.php');
  ?>

  <div class="jumbotron">
    <div class="container">
      <div class="page-header" align="center">
        <h1 style="margin-top: px">Account Already Exist with Your Email!</h1>
      </div>
      <div class="button-container" align="center">
        <a href="UserCreation.php" class="btn btn-default btn-lg" type="button">Go back</a>
      </div>
    </div>
  </div>

  <!-- Project Summary -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
