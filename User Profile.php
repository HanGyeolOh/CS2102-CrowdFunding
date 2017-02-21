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
    background-color:#2C3539;
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
.thumbnail {
    border:0;
    padding: 10px;
}
</style>
</head>

<body>

<!-- Collapsible Navigation Bar -->
<div class="container">
 
<!-- .navbar-fixed-top, or .navbar-fixed-bottom can be added to keep the nav bar fixed on the screen -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
 
      <!-- Button that toggles the navbar on and off on small screens -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
 
      <!-- Hides information from screen readers -->
        <span class="sr-only"></span>
 
        <!-- Draws 3 bars in navbar button when in small mode -->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
 
      <!-- You'll have to add padding in your image on the top and right of a few pixels (CSS Styling will break the navbar) -->
      <a class="pull-left" href="#"><img src="img/logo.png"></a>
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="Homepage.php">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Funded Projects</a></li>       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Create <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">User</a></li>
            <li><a href="#">Project</a></li>
          </ul>
        </li>
        <li><a href="#">Contact Us</a></li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

<!-- User Profile -->
<div class="container">

  <div class="row jumbotron">

    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
      <!-- Profile Picture Thumbnail -->
      <img src="img/profilepic1.jpg" id="profilepic1" class="img-thumbnail pull-left" width="200" height="300">
    </div>

    <!-- Profile Info Table -->
    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
      <p><h2 class="text-primary">John Smith</h2></p>
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
        <img src="img/companylogo1.jpg" id="companylogo1" width="100" height="100">
        <div class="caption">
          <h4 class="text-center">Formula XYZ</h4>
          <p class="text-justify">Consulting services for companies looking to integrate IoT with their legacy systems</p>
          <p>
            <a href="#" class="btn btn-success pull-left">Funded</a>
            <a href="Project%20profile.php" class="btn btn-primary pull-right" role="button">Find out more</a>
          </p>
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
        <img src="img/companylogo2.jpg" id="companylogo2" width="100" height="100">
        <div class="caption">
          <h4 class="text-center">The Next BIG Thing</h4>
          <p class="text-justify">We provide BIG solutions to your BIG problems</p>
          <p>
            <a href="#" class="btn btn-info pull-left">Funding</a>
            <a href="Project%20profile.php" class="btn btn-primary pull-right" role="button">Find out more</a>
          </p>
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
