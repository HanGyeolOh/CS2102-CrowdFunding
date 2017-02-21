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

  <?php
      session_start();
      $dbconn = pg_connect("host=localhost port=5432 dbname=crowd_funding user=postgres password=ok950209")
        or die('Could not connect: ' . pg_last_error());

      $email = $_SESSION['username'];
      $query = "SELECT * FROM users WHERE email = '$email';";
      $result = pg_query($dbconn, $query);
      if(pg_num_rows($result) == 1) {
        $name = pg_fetch_result($result, 0, 0);
        $dob = pg_fetch_result($result, 0, 2);
        $address = pg_fetch_result($result, 0, 3);
      }
      else {
        die('Error fetching the user profile data. username: '.$_SESSION['username']);
      }
  ?>

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
        <a class="pull-left" href="#"><img src="logo.png"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
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

        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php">Logout</a></li>
        </ul>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="page-header">
    <?php echo '<h3>'.$name.'</h3>'; ?>
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
      $query = "SELECT title, description FROM projects
                WHERE project_id IN (SELECT project_id FROM ownership WHERE owner_email = 'john_smith@gmail.com')";
      $result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());

      while ($row = pg_fetch_row($result)) {
        $title = $row[0];
        $description = $row[1];
         echo "<li class='thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6'>
            <img src='img/companylogo1.jpg' class='img-thumbnail' id='companylogo1' width='100' height='100'>
            <div class='caption'>
              <h4 class='text-center'>$title</h4>
              <p class='text-justify'>$description</p>
              <p><a href='crowdfunding-projectprofile.php' class='btn btn-primary' role='button'>Find out more</a></p>
            </div>
        </li>";
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
        $query = "SELECT title, description FROM projects
                  WHERE project_id IN (SELECT project_id FROM investments WHERE investor_email = 'john_smith@gmail.com')";
        $result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());

        while ($row = pg_fetch_row($result)) {
          $title = $row[0];
          $description = $row[1];
           echo "<li class='thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6'>
              <img src='img/companylogo2.jpg' class='img-thumbnail' id='companylogo1' width='100' height='100'>
              <div class='caption'>
                <h4 class='text-center'>$title</h4>
                <p class='text-justify'>$description</p>
                <p><a href='crowdfunding-projectprofile.php' class='btn btn-primary' role='button'>Find out more</a></p>
              </div>
          </li>";
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