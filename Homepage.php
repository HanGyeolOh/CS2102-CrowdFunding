<!-- Home Page -->
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<?php
  session_start();
?>

<style>
.jumbotron{
    background-color:#2C3539;
    color:white;
    padding-bottom: 80px;
}
/* Adds borders for tabs */
.tab-content {
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    padding: 10px;
}
.logo{
	padding: 5px;
}
.nav-tabs {
    margin-bottom: 0;
}
.col-centered{
    float: none;
    margin: 0 auto;
}
.carousel{
    background: #2f4357;
    margin-top: 20px;
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.bs-example{
	margin: 20px;
}
.carousel-inner > .item > img {
  width:640px;
  height:360px;
}
</style>
</head>

<body>
<?php
    require('dbconn.php');
?>

<?php
    require('NavigationBar.php');
?>

<!--Adding a Carousel-->
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
		<h1>Test Project Title 1</h1>
			<p>This is the text body</p>
			<p><a href="#" class=btn btn-primary btn-sm">Donate!</a></p>
	</div>
	</div>

	<div class="item">
	<img src="img/test2.png" alt="Second Slide">
	<div class="slide2"></div>
	<div class="carousel-caption">
		<h1>Test Project Title 2</h1>
			<p>This is the text body number 2</p>
			<p><a href="#" class=btn btn-primary btn-sm">Donate!</a></p>
	</div>
	</div>

	<div class="item">
	<img src="img/test3.png" alt="Third Slide">
	<div class="slide3"></div>
	<div class="carousel-caption">
		<h1>Test Project Title 3</h1>
			<p>This is the text body number 3</p>
			<p><a href="#" class=btn btn-primary btn-sm">Donate!</a></p>
	</div>
	</div>
</div>

	<a class="left carousel-control" href="#theCarousel" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left"></span></a>

	<a class="right carousel-control" href="#theCarousel" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right"></span></a>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
