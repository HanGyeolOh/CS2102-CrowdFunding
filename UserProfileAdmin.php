<!-- User Profile Admin Page -->
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>User Profile Admin Page</title>
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
</style>
</head>

<body>

  <?php
      session_start();
      require('dbconn.php');

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
        $query = "SELECT title, description, project_id FROM projects
                  WHERE project_id IN (SELECT project_id FROM ownership WHERE publisher_email = '$email')";
        $result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());

        while ($row = pg_fetch_row($result)) {
          $title = $row[0];
          $description = $row[1];
          $id = $row[2];
           echo "<li class='thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6'>
             <img src='img/companylogo1.jpg' id='companylogo1' width='100' height='100'>
             <div class='caption'>
               <h4 class='text-center'>$title</h4>
               <p class='text-justify text-description'>$description</p>
               <p>
                 <a href='#' class='btn btn-success pull-left'>Funded</a>
                 <a href='ProjectProfile.php?id=$id' class='btn btn-primary pull-right' role='button'>Find out more</a>
               </p>
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
        $query = "SELECT title, description, project_id FROM projects
                  WHERE project_id IN (SELECT project_id FROM investments WHERE investor_email = '$email')";
        $result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());

        while ($row = pg_fetch_row($result)) {
          $title = $row[0];
          $description = $row[1];
          $id = $row[2];
           echo "<li class='thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6'>
             <img src='img/companylogo2.jpg' id='companylogo2' width='100' height='100'>
             <div class='caption'>
               <h4 class='text-center'>$title</h4>
               <p class='text-justify text-description'>$description</p>
               <p>
                 <a href='#' class='btn btn-info pull-left'>Funding</a>
                 <a href='ProjectProfile.php?id=$id' class='btn btn-primary pull-right' role='button'>Find out more</a>
               </p>
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
