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
.text-description {
  line-height: 2.5ex;
  height: 10ex; /* 2.5ex for each visible line */
  overflow: hidden;
}
.black-font{
	color: #000000;
}
.project-img{
  height:180px;
  max-width:340px;
}
.thumbnail{
	height:400px;
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
.text-title{
	font-size:16px;
	line-height: 1.2;
	font-weight: bold;
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
      session_start();
      require('dbconn.php');

      $email = $_GET['email'];
      $query = "SELECT * FROM users WHERE email = '$email';";
      $result = pg_query($dbconn, $query);
      if(pg_num_rows($result) == 1) {
        $name = pg_fetch_result($result, 0, 0);
        $dob = pg_fetch_result($result, 0, 2);
        $address = pg_fetch_result($result, 0, 3);
      }
  ?>

<?php
  require('NavigationBar.php');
?>

<!-- User Profile -->
<div class="container">

  <div class="row jumbotron">

    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
      <!-- Profile Picture Thumbnail -->
      <img src="img/profilepic1.jpg" id="profilepic1" class="img-thumbnail pull-left" width="200" height="300">
    </div>

    <!-- Profile Info Table -->
    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
      <p>
        <?php echo '<h2 class="text-primary">'.$name.'</h2>'; ?>
      </p>
      <p>
        <span class="glyphicon glyphicon-envelope"></span>
        <?php echo $email; ?>
      </p>
      <p>
        <span class="glyphicon glyphicon-calendar"></span>
        <?php echo $dob; ?>
      </p>
      <p>
        <span class="glyphicon glyphicon-home"></span>
        <?php echo $address; ?>
      </p>
    </div>

  </div>

  <div class="page-header">
    <h1><small>Projects Created</small></h1>
  </div>

  <div class="row">

    <ul class="list-group">
      <?php
        $query = "SELECT title, description, project_id, logo_url, start_date, end_date, target_amount, current_amount FROM projects
                  WHERE project_id IN (SELECT project_id FROM ownership WHERE publisher_email = '$email')";
        $result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());

        while ($row = pg_fetch_row($result)) {
          $title = $row[0];
          $description = $row[1];
          $id = $row[2];
          $logo_url = $row[3];
          $start_date = $row[4];
          $end_date = $row[5];
          $target_amount = number_format($row[6]);
    	    $current_amount = number_format($row[7]);

    	    $current_date = date("Y/m/d");

          $days_left = ceil(abs(strtotime($end_date) - strtotime($current_date)) / 86400);
    	    $progress = round ( (((float)((int)$row[7] / (int)$row[6])) * 100), 0);
           echo "
           <div class='thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6'>
				<div>
					<img class= 'img-rounded project-img btn center-block' src='$logo_url' href='ProjectProfile.php?id=$id'>
				</div>
				<div class='caption'>
					<p><a class='text-title black-font' href='ProjectProfile.php?id=$id'>$title</a></p>
					<p class='text-justify'>$description</p>
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
							<p class='text-strong'>$$current_amount</p>
							<p class='text-narrow'>invested</p>
						</div>
						<div class='col-lg-4'>
							<p class='text-strong'>$days_left</p>
							<p class='text-narrow'>days to go</p>
						</div>
					</div>
				</div>
			</div>";
        }
      ?>
    </ul>
  </div>

  <div class="page-header">
    <h1><small>Projects Backed</small></h1>
  </div>

  <div class="row">

    <ul class="list-group">
      <?php
        $query = "SELECT title, description, project_id, logo_url, start_date, end_date, target_amount, current_amount FROM projects
                  WHERE project_id IN (SELECT project_id FROM investments WHERE investor_email = '$email')";
        $result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());

 		while ($row = pg_fetch_row($result)) {
          $title = $row[0];
          $description = $row[1];
          $id = $row[2];
          $logo_url = $row[3];
          $start_date = $row[4];
          $end_date = $row[5];
          $target_amount = number_format($row[6]);
    	  $current_amount = number_format($row[7]);

    	  $days_left = ceil(abs(strtotime($end_date) - strtotime($start_date)) / 86400);
    	  $progress = round ( (((float)((int)$row[7] / (int)$row[6])) * 100), 0);
           echo "
           <div class='thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6'>
				<div>
					<img class= 'img-rounded project-img btn center-block' src='$logo_url' href='ProjectProfile.php?id=$id'>
				</div>
				<div class='caption'>
					<p><a class='text-title black-font' href='ProjectProfile.php?id=$id'>$title</a></p>
					<p class='text-justify'>$description</p>
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
							<p class='text-strong'>$$current_amount</p>
							<p class='text-narrow'>invested</p>
						</div>
						<div class='col-lg-4'>
							<p class='text-strong'>$days_left</p>
							<p class='text-narrow'>days to go</p>
						</div>
					</div>
				</div>
			</div>";
        }
      ?>
    </ul>
  </div>

</div>


<?php
  pg_close($dbconn);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
