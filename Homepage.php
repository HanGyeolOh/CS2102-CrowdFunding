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
.carousel-caption-middle{
    top: 50%;
	transform: translateY(-50%);
	bottom: initial;
}
.carousel-big-text {
	font-size: 55px;
   	line-height: 1;
}
.carousel-med-text {
	font-size: 30px;
  line-height: 1;
}
.carousel-small-text {
	font-size: 21px;
  line-height: 1;
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.item{
	-webkit-transform-style: preserve-3d;
	-moz-transform-style: preserve-3d;
	transform-style: preserve-3d;
}
.bs-example{
	margin: 20px;
}
.carousel-inner > .item > img {
  height:750px;
  width:100%;
}
.black-font{
	color: #000000;
}
.project-img{
  height:180px;
  width:100%;
}
.thumbnail{
	height:420px;
	width:350px;
	margin-left: 40px;
}
.my-footer{
	position: absolute;
	width:100%;
	bottom:15;
	height:40px;
}
.text-narrow{
	font-size:12px;
	line-height: 0.5;
}
.text-strong{
	font-weight: bold;
	font-size:12.5px;
	line-height: 0.5;
}
.progress{
	height:10px;
	margin-bottom:4px;
	width:340px;
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
<div id="theCarousel" class="carousel slide" data-ride="carousel" data-interval="9000">

<ol class="carousel-indicators">
<li data-target="#theCarousel" data-slide-to="0" class="active"></li>
<li data-target="#theCarousel" data-slide-to="1"></li>
<li data-target="#theCarousel" data-slide-to="2"></li>
</ol>

<div class="carousel-inner">
	
	<!--1. Create Project in Fund Hunter -->
	<div class="item active">
	<img src="img/nyc-skyline.jpg" alt="First Slide">
	<div class="slide1"></div>
	<div class="carousel-caption carousel-caption-middle">
		<p class="carousel-big-text">Hello Visionaries, Welcome!</p>
		<hr>
		<p class="carousel-small-text">Fund Hunter provides a platform for creative individuals to realise their dreams.</p>
		<p class="carousel-small-text">Make the first step and launch your project today.</p>
		<br>
		<p><a href="project%20creation.php" class="btn btn-primary btn-lg">Get started</a></p>
	</div>
	</div>

	<!--2. Default Project 1 -->
	<div class="item">
	<img src="img/plen-cube2.jpg" alt="Second Slide">
	<div class="slide2"></div>
	<div class="carousel-caption">
		<p class="carousel-big-text">PLEN Cube  -  The Portable Personal Assistant Robot</p><br>
		<p class="carousel-small-text">Your customizable, palm-sized companion featuring a smart camera and automation skills.</p>
		<p class="carousel-small-text">There for you wherever you go.</p>
		<br>
		<p><a href="project%20profile.php?id=kkkht0017" class="btn btn-primary btn-lg">Learn more</a></p>
	</div>
	</div>

	<!--3. Default Project 2 -->
	<div class="item">
	<img src="img/jack2.png" alt="Third Slide">
	<div class="slide3"></div>
	<div class="carousel-caption carousel-caption-middle black-font">
		<p class="carousel-med-text">Make Any Headphones Wireless</p><br>
		<p class="carousel-small-text">This tiny device brings Bluetooth capability to all of your audio devices.</p>
		<br>
		<p><a href="project%20profile.php?id=kkkht0003" class="btn btn-primary btn-lg">Learn more</a></p>
	</div>
	</div>

</div>

	<a class="left carousel-control" href="#theCarousel" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left"></span></a>

	<a class="right carousel-control" href="#theCarousel" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right"></span></a>

</div>
<br>

<div class="container">
	<h3>New projects</h3><hr>
	<div class='row'>
		<div class='thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6'>
			<div>
				<img class= 'img-rounded project-img' src='img/nyc-skyline.jpg' href='Project%20Profile.php?id=$id' role='button'>
			</div>
			<div class='caption'>
				<p class='h4' href='Project%20Profile.php?id=$id' role='button'>$title</p>
				<p class='h5' href='#' role='button'>by $owner_name</p>
				<p class='text-justify text-description'>$description</p>
			</div>
			<div class='my-footer'>
				<div class='progress'>
	        <div class='progress-bar' role='progressbar' aria-valuenow=$progress aria-valuemin='0' aria-valuemax='100' style='width: $progress%'></div>
	      </div>
				<div class='caption'>
					<div class='col-lg-4'>
						<p class='text-strong'>$progress %</p>
						<p class='text-narrow'>funded</p>
					</div>
					<div class='col-lg-4'>
						<p class='text-strong'>$current_amount</p>
						<p class='text-narrow'>invested</p>
					</div>
					<div class='col-lg-4'>
						<p class='text-strong'>36</p>
						<p class='text-narrow'>days to go</p>
					</div>
				</div>
			</div>
		</div>

		<div class='thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6'>
			<div>
				<img class= 'img-rounded project-img' src='img/nyc-skyline.jpg' href='Project%20Profile.php?id=$id' role='button'>
			</div>
			<div class='caption'>
				<p class='h4' href='Project%20Profile.php?id=$id' role='button'>$title</p>
				<p class='h5' href='#' role='button'>by $owner_name</p>
				<p class='text-justify text-description'>$description</p>
			</div>
			<div class='my-footer'>
				<div class='progress'>
	        <div class='progress-bar' role='progressbar' aria-valuenow=$progress aria-valuemin='0' aria-valuemax='100' style='width: $progress%'></div>
	      </div>
				<div class='caption'>
					<div class='col-lg-4'>
						<p class='text-strong'>$progress %</p>
						<p class='text-narrow'>funded</p>
					</div>
					<div class='col-lg-4'>
						<p class='text-strong'>$current_amount</p>
						<p class='text-narrow'>invested</p>
					</div>
					<div class='col-lg-4'>
						<p class='text-strong'>36</p>
						<p class='text-narrow'>days to go</p>
					</div>
				</div>
			</div>
		</div>
		<div class='thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6'>
			<div>
				<img class= 'img-rounded project-img' src='img/nyc-skyline.jpg' href='Project%20Profile.php?id=$id' role='button'>
			</div>
			<div class='caption'>
				<p class='h4' href='Project%20Profile.php?id=$id' role='button'>$title</p>
				<p class='h5' href='#' role='button'>by $owner_name</p>
				<p class='text-justify text-description'>$description</p>
			</div>
			<div class='my-footer'>
				<div class='progress'>
	        <div class='progress-bar' role='progressbar' aria-valuenow=$progress aria-valuemin='0' aria-valuemax='100' style='width: $progress%'></div>
	      </div>
				<div class='caption'>
					<div class='col-lg-4'>
						<p class='text-strong'>$progress %</p>
						<p class='text-narrow'>funded</p>
					</div>
					<div class='col-lg-4'>
						<p class='text-strong'>$current_amount</p>
						<p class='text-narrow'>invested</p>
					</div>
					<div class='col-lg-4'>
						<p class='text-strong'>36</p>
						<p class='text-narrow'>days to go</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
