<!-- Project Profile Page -->
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>Project Profile Page</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=s9349553e")
    or die('Could not connect: ' . pg_last_error());
?>
 
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

<!-- Project Profile -->

<!-- (1) Project Details -->
<div class="container title-style">

  <div class="row">
    <!-- Project Logo and Creator -->
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
      <img src="img/companylogo1.jpg" class="title-style center-block" id="companylogo1" width="60" height="80">
      <div class="caption">
        <p class="text-center">By<a href="user%20profile.php" class="btn" role="button btn-xs">John Smith</a></p>
      </div>  
    </div>

    <!-- Project Info -->
    <div class="col-lg-9 col-md-9 col-sm-7 col-xs-7">
      <h2 class="text-primary">Formula XYZ <a href="#" class="btn btn-info">Funding</a></h2>
      <h2><small>Consulting services for companies looking to integrate IoT with their legacy systems</small></h2> 
      <div class="progress">
        <div class="progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
        <p class="text-center">60% Raised</p>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
          <h3 class="text-info">$6,000<small><br>raised of $10,000 goal</small></h3>
          <h3>25<small><br>days to go</small></h3>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <a href="#" class="button-middle btn btn-info btn-lg pull-center">Invest In This Project</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- (2) Project Carousel -->
<div id="theCarousel" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
  <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#theCarousel" data-slide-to="1"></li>
  <li data-target="#theCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">  
    <div class="item active">
    <img src="img/test1.png" alt="First Slide">
    <div class="slide1"></div>
    <div class="carousel-caption">
      <h1>Caption for Project Image 1</h1>
    </div>
    </div>

    <div class="item">
    <img src="img/test2.png" alt="Second Slide">
    <div class="slide2"></div>
    <div class="carousel-caption">
      <h1>Caption for Project Image 2</h1>
    </div>
    </div>

    <div class="item">
    <img src="img/test3.png" alt="Third Slide">
    <div class="slide3"></div>
    <div class="carousel-caption">
      <h1>Caption for Project Image 3</h1>
    </div>
    </div>
  </div>

  <a class="left carousel-control" href="#theCarousel" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left"></span></a>

  <a class="right carousel-control" href="#theCarousel" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right"></span></a>

</div>

<?php
pg_close($dbconn);
?> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
