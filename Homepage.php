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
      <a class="pull-left" href="Homepage.php"><img src="img/logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="Homepage.php">Home <span class="sr-only">(current)</span></a></li>
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

      <?php
      if(!isset($_SESSION['username'])) {
        echo
        "<ul class='nav navbar-nav navbar-right'>
          <li><a href='login.php'>Login</a></li>
        </ul>";
      }
      else{
        echo
        "<ul class='nav navbar-nav navbar-right'>
          <li><a href='User Profile.php'>My Profile</a></li>
        </ul>
        <ul class='nav navbar-nav navbar-right'>
          <li><a href='logout.php'>Logout</a></li>
        </ul>";
      }
      ?>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

<div class="container">
<h4><a href="#searchBox" data-toggle="collapse">Search</a></h4>
<div class="container" id="searchBox">
<form class="form-horizontal" role="form" method="post" action="Search Results.php">
	<div class="jumbotron">
	<td class="row">
		<!--The Title Search-->
		<div class="col-lg-3">
		<div class="input-group">
			<span class="input-group-addon">Title</span>
			<input type="text" class="form-control" id="title" name="title" placeholder="Search Keywords!">
		</div>
		</div>

		<!--Category Search-->
		<div class="col-lg-3">
		<div class="form-group">
			<select class="form-control" id="cat" name="cat"><option value="">Select Category</option>
			<?php
			$query = 'SELECT DISTINCT category FROM projects';
			$result = pg_query($query) or die('Query failed: ' . pg_last_error());

			while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
				foreach ($line as $col_value) {
					echo "<option value=\"".$col_value."\">".$col_value."</option><br>";
				}
			}
			pg_free_result($result);
			?>
			</select>
		</div>
		</div>

		<!--Start date picker-->
		<div class="col-lg-3">
		<div class="input-group">
			<span class="input-group-addon">Date</span>
			<input type="text" class="form-control" id="date" name="date" placeholder="Start Date">
		</div>
		</div>

	    <!--Submit button-->
		<input id="submit" name="submit" type="submit" value="Submit" class="btn btn-default btn-md pull-right">
	</td>
	</div>
</form>
</div>
</div>

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
