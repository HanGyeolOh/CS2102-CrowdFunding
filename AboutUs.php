<!-- About Us Page -->
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
.title{
	padding-top: 9px;
}
.nav-tabs {
    margin-bottom: 0;
}
.col-centered{
    float: none;
    margin: 0 auto;
}
.portrait-thumnail{
	padding: 3px;
	vertical-align: middle;
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

<!-- Fund Hunter Details -->
<div class="jumbotron">
<div class="container">
	<div class="page-header">
	<h1>Welcome to Fund Hunter!</h1>
	</div>
	<p><h4>At Fund Hunter, we are committed to help turn the dreams of aspiring and budding entrepeuneurs into reality. To date, hundreds of creative projects have been funded in the Fund Hunter community.</h4></p>
	<br>
	<p><h4>As an entrepeuneur, Fund Hunter offers a platform to put forth your proposal and an opprotunity to realise your dreams. With the support of fellow fund hunters, you can charter the growth and development of your project and see it come to fruition.</h4></p>
	<br>
	<p><h4>As an investor in the Fund Hunter community, you may browse through thousands of projects according to your interests. More importantly, you can lend support to any interesting project you come across and play a part in realising the project.</h4></p>
	<br>
	<button href="ProjectCreation.php" class="btn btn-success btn-lg" type="button">Create Project</button>
	<button href="#" class="btn btn-info btn-lg" type="button">Browse Projects</button>
</div>
</div>

<!-- Photos of Team -->
<div class="container">
<h2 class="text-center">Our Team</h2>
<br>
<div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-4 col-xs-4">
	<img src="img/heisenberg.jpg" class="img-circle center-block" width="80" height="80">
	<div class="caption">
	<h4 class="text-center">Han</h4>
	</div>
</div>
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
	<img src="img/heisenberg.jpg" class="img-circle center-block" width="80" height="80">
	<div class="caption">
	<h4 class="text-center">Ken</h4>
	</div>
</div>
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
	<img src="img/kianming.jpg" class="img-circle center-block" width="80" height="80">
	<div class="caption">
	<h4 class="text-center">Kian Ming</h4>
	</div>
</div>
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
	<img src="img/heisenberg.jpg" class="img-circle center-block" width="80" height="80">
	<div class="caption">
	<h4 class="text-center">Kristen</h4>
	</div>
</div>
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
	<img src="img/heisenberg.jpg" class="img-circle center-block" width="80" height="80">
	<div class="caption">
	<h4 class="text-center">Tian Kai</h4>
	</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
