<!-- Investment Page -->
<html>
<title>Make an investment</title>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Investment Page</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <?php
    session_start();
    require('dbconn.php');
    $project_id = $_GET['id'];
    $query = "SELECT * FROM projects WHERE project_id = $project_id";
    $result = pg_query($dbconn, $query);
    $row = pg_fetch_row($result);
    $title = $row[0];
    $description = $row[1];
    $start_date = $row[2];
    $end_date = $row[3];
    $target_amount = number_format($row[5]);
    $current_amount = number_format($row[6]);
    $category = $row[7];

    $days_left = ceil(abs(strtotime($end_date) - strtotime($start_date)) / 86400);
    $progress = (((float)((int)$row[6] / (int)$row[5])) * 100);

    $query = "SELECT name FROM users WHERE email = ANY (SELECT publisher_email FROM ownership WHERE project_id = $project_id)";
    $result = pg_query($dbconn, $query);
    $owner_name = pg_fetch_result($result, 0, 0);

  ?>

  <style>
    .jumbotron{
      background-color:#2C3539;
      color:white;
    }

    .grey{
      color: #808080;
    }

    .thin-jumbotron{
      padding-top: 10px;
      padding-bottom: 10px;
      height: 120px;
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

    .progress {
      text-align:center;
    }
    .progress-value {
      position:absolute;
      right:0;
      left:0;
      color: #BDBDBD;
    }
  </style>
</head>
<script>
  function displayAmount() {
    var amount = document.getElementById('donation_amount').value;
    document.getElementById('amount').innerHTML = amount + " will go a long way to supporting our project!";
  }
</script>

<body>

  <?php
  require('NavigationBar.php');
  ?>

  <?php
	$query="SELECT * FROM thumbnail_info WHERE project_id='$project_id'";
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	$row = pg_fetch_row($result);
	$owner_email = $row[9];
   ?>

  <!-- Project Summary -->
  <div class="row jumbotron thin-jumbotron">
    <h3 class="text-center strong">
        <a href="ProjectProfile.php?id=<?php echo $project_id; ?>" role="button"><?php echo $title; ?> - <?php echo $description; ?></a>
    </h3>
      <h5 class="text-center strong">     by
        <?php echo "<a href='UserProfile.php?email=$owner_email' role='button'>$owner_name</a>";?>
      </h5>
    </p>
  </div>

  <!-- Investment Option Form -->
  <div class="container">
    <div class="panel-group" id="accordion">
      <!-- Default investment option -->
      <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a href="#defaultinvestmentoption" data-toggle="collapse" data-parent="accordion">Make an investment without a reward!</a>
          </h4>
        </div>
        <div id="defaultinvestmentoption" class="panel-collapse collapse">
          <div class="panel-body">
            <h4>Thanks!</h4>
            <br>
            <p class="grey">You did it! You were able to hit the button and give a dollar to this project. Pat yourself on the back kind Sir, Madam, or Non-Gendered Person. You will be added to an ever-growing list of supporters on the webpage.</p>
            <div class="row">
              <form action="InvestmentResult.php?id=<?php echo $project_id;?>" method="post">
              <div class="col-lg-4">
                <div class="input-group has-success">
                  <span class="input-group-addon">SGD $</span>
                  <input type="text" class="form-control" placeholder="Investment Amount Here" name="amount" id="donation_amount"/>
                </div>
              </div>
              <div class="col-lg-2">
                <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#modal-1" onclick="displayAmount()">Continue</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div><br>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
