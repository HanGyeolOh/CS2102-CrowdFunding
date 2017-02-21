<!-- User Profile Page -->
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>User Profile Page</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 
<style>
.jumbotron{
    background-color:#2E2D88;
    color:white;
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
</style>
</head>

<body>

<div class="container">

  <div class="page-header">
  <h3>John Smith</h3>
  </div>

  <div class="row">

    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
      <!-- Profile Picture Thumbnail -->
      <img src="img/profilepic1.jpg" id="profilepic1" class="img-thumbnail pull-left" width="200" height="300">
    </div>

    <!-- Profile Info Table -->
    <div class="jumbotron col-lg-9 col-md-9 col-sm-8 col-xs-12">
      <p>
        <span class="glyphicon glyphicon-envelope"></span>
        john_smith@gmail.com</p>
      <p>
        <span class="glyphicon glyphicon-calendar"></span>
        1/1/1989</p>
      <p>
        <span class="glyphicon glyphicon-home"></span>
        12 Success Drive</p>
    </div>

  </div>

  <div class="page-header">
    <h1><small>Projects Created</small></h1>
  </div>

  <div class="row">

    <ul class="list-group">
      <li class="thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <img src="img/companylogo1.jpg" class="img-thumbnail" id="companylogo1" width="100" height="100">
        <div class="caption">
          <h4 class="text-center">Formula XYZ</h4>
          <p class="text-justify">Consulting services for companies looking to integrate IoT with their legacy systems</p>
          <p><a href="crowdfunding-projectprofile.php" class="btn btn-primary" role="button">Find out more</a></p>
        </div>
      </li>
      <li class="thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <img src="img/companylogo1.jpg" class="img-thumbnail" id="companylogo1" width="100" height="100">
        <div class="caption">
          <h4 class="text-center">Formula XYZ</h4>
          <p class="text-justify">Consulting services for companies looking to integrate IoT with their legacy systems</p>
          <p><a href="crowdfunding-projectprofile.php" class="btn btn-primary" role="button">Find out more</a></p>
        </div>
      </li>
    </ul>
  </div>

  <div class="page-header">
    <h1><small>Projects Backed</small></h1>
  </div>

  <div class="row">

    <ul class="list-group">
      <li class="thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <img src="img/companylogo2.jpg" class="img-thumbnail" id="companylogo2" width="100" height="100">
        <div class="caption">
          <h4 class="text-center">The Next BIG Thing</h4>
          <p class="text-justify">We provide BIG solutions to your BIG problems</p>
          <p><a href='#' class="btn btn-primary" role="button">Find out more</a></p>
        </div>
      </li>
      <li class="thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <img src="img/companylogo2.jpg" class="img-thumbnail" id="companylogo2" width="100" height="100">
        <div class="caption">
          <h4 class="text-center">The Next BIG Thing</h4>
          <p class="text-justify">We provide BIG solutions to your BIG problems</p>
          <p><a href='#' class="btn btn-primary" role="button">Find out more</a></p>
        </div>
      </li>
    </ul>
  </div>

</div>

<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=s9349553e")
    or die('Could not connect: ' . pg_last_error());
?>

<?php
pg_close($dbconn);
?> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
