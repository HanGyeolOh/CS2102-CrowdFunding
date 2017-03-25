<!-- Navigation Bar -->
<html lang="en">
<head>
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
</style>
</head>

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
      <a class="pull-left logo" href="Homepage.php"><img src="img/fundhunter.png" height="40" width="40"></a>
      <a class="pull-left logo title" href="Homepage.php"><img src="img/fundhuntertitle.png" height="40"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="About%20Us.php">About Us</a></li>
        <li><a href="#">Funded Projects</a></li>
        <li><a href="Project%20Creation.php">Create a project</a></li>
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

      <ul class="nav navbar-nav navbar-right">
      	<li><a href="User%20Creation.php">Register</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right" id="searchLogo">
      	<li><a href="#searchBox" data-toggle="collapse"><img src="img/searchlogo.png" height="25"></a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

<div class="container collapse" id="searchBox">
<form class="form-horizontal" role="form" method="post" action="Search Results.php">
	<div class="jumbotron">
	<td class="row">
		<!--The Title Search-->
		<div class="col-lg-3">
		<div class="input-group">
			<span class="input-group-addon">Title</span>
			<input type="text" class="form-control" id="title" name="title" placeholder="Search Keywords">
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

	    <!--Search button-->
		<input id="submit" name="submit" type="submit" value="Search" class="btn btn-default btn-md pull-right">
	</td>
	</div>
</form>
</div>
<!--End Collapsible Navigation Bar-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
