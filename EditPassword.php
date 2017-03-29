<!-- Investment Page -->
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Investment Page</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <?php
  session_start();
  require('dbconn.php');
  if(isset($_POST['passwordsubmit'])){
    $current_password = $_POST["currentpassword"];
    $password = MD5($_POST["password"]);
    $email = $_SESSION['username'];

    $query = "SELECT password FROM users WHERE email = '$email';";
    $result = pg_query($dbconn, $query);
    $current_password_check = pg_fetch_row($result)[0];
    if($current_password === $current_password_check){
      $query = "UPDATE users SET password = '$password' WHERE email = '$email';";
      $result = pg_query($dbconn, $query);
      header("Location: UserProfileAdmin.php");
    }
  }
  ?>

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
  require('dbconn.php');
  require('NavigationBar.php');
  ?>

  <div class="jumbotron">
  <div class="container">
  	<div class="page-header" align="center">
      <h1 style="margin-top: px">Invalid Current Password Input!</h1>
  	</div>
    <div class="button-container" align="center">
  	<a href="UserProfileAdmin.php" class="btn btn-default btn-lg" type="button">Go back to User Profile</a>
  </div>
  </div>
  </div>

  <!-- Project Summary -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
