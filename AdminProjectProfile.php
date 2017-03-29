<!-- Admin Project Profile Page -->
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>Project Profile Page</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<?php
    session_start();
    require('dbconn.php');
    $project_id = $_GET['id'];
    $query = "SELECT * FROM projects WHERE project_id = '$project_id'";
    $result = pg_query($dbconn, $query);
    $row = pg_fetch_row($result);
    $title = $row[0];
    $description = $row[1];
    $start_date = $row[2];
    $end_date = $row[3];
    $target_amount = number_format($row[5]);
    $current_amount = number_format($row[6]);
    $category = $row[7];
    $logo_url = $row[8];

    $days_left = ceil(abs(strtotime($end_date) - strtotime($start_date)) / 86400);
    $progress = (((float)((int)$row[6] / (int)$row[5])) * 100);

    $query = "SELECT name, email FROM users WHERE email = ANY (SELECT publisher_email FROM ownership WHERE project_id = '$project_id')";
    $result = pg_query($dbconn, $query);
    $owner_name = pg_fetch_result($result, 0, 0);
    $publisher_email = pg_fetch_result($result, 0, 1);
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

<body>

<?php
  require('NavigationBar.php');
?>

<?php
  
  $limit = 10;  
  if (isset($_GET["page"])) { 
  $page  = $_GET["page"]; 
  } else { 
  $page=1;  
  }
  
  $start_from = ($page-1) * $limit;  
  
    $query="SELECT users.name, investments.transaction_date, investments.investment_amount
    FROM users, investments
    WHERE investments.project_id='$project_id'
    AND investments.investor_email=users.email
    ORDER BY transaction_date ASC LIMIT $limit OFFSET $start_from";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error()); 
  
  $index = ($page - 1) * $limit + 1;

?>

<!-- Project Profile -->

<!-- (1) Project Details -->
<div class="container title-style">

  <div class="row">
    <!-- Project Logo and Creator -->
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
      <?php echo "<img src='$logo_url' class='title-style center-block' id='companylogo1' width='60' height='80'>";
      ?>
      <div class="caption">
        <p class="text-center">By
          <?php echo "<a href='UserProfile.php?email=$publisher_email' class='btn btn-info' role='button btn-xs'>";?>
            <?php echo $owner_name; ?>
          </a>
        </p>
      </div>
    </div>

    <!-- Project Info -->
    <div class="col-lg-9 col-md-9 col-sm-7 col-xs-7">
      <h2 class="text-primary"> <?php echo $title; ?> <a href="#" class="btn btn-info">Funding</a></h2>
      <h2><small> <?php echo $description; ?></small></h2>
      <div class="progress">
        <?php echo "<div class='progress-bar' role='progressbar' aria-valuenow=$progress aria-valuemin='0' aria-valuemax='100' style='width: $progress%'></div>"; ?>
        <span class="progress-value"> <?php echo "$progress% Raised"; ?> </span>
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
          <h3 class="text-info"> <?php echo $current_amount; ?> <small><br> <?php echo "raised of $target_amount goal" ?> </small></h3>
          <h3><?php echo $days_left; ?><small><br>days to go</small></h3>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <a href="investmentpage.php?id=<?php echo $project_id; ?>" class="button-middle btn btn-info btn-lg pull-center">Invest In This Project</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class='container'>
<table class='table table-bordered table-striped table-hover'>
<thead>
<tr>
<th class='text-center'>#</th>
<th class='text-center'>Name</th>
<th class='text-center'>Transaction Date</th>
<th class='text-center'>Amount</th>
</tr>
</thead>

</br>
<!-- Display search results -->

<?php
    while ($row = pg_fetch_row($result)){
    $retrieved_name = $row[0];
    $retrieved_date = $row[1];
    $retrieved_amt = $row[2];  

    echo "<tr><td align='center'>$index</td>
    <td align='center'>$retrieved_name</td>
    <td align='center'>$retrieved_date</td>
    <td align='center'>$retrieved_amt</td></tr>";
  
    $index++;
  }
  echo "</table>"; 
?>

</table>

</div>

<!--Adding Pagination at bottom-->
<div class="container">
<nav>
<div class="text-center">
<ul class="pagination">

<?php
  $rs_result = pg_query($query);    
  $total_records = pg_num_rows($rs_result);  
  $total_pages = ceil($total_records / $limit); 

  if($page != 1){
    $previous_page = $page - 1;
    echo "<li><a href='AdminProjectProfile.php?page=".$previous_page."&pid=".$project_id."'>&laquo;</a></li>";
  }

  for ($i=1; $i<=$total_pages; $i++) {  
    $pageLink .= "<a href='AdminProjectProfile.php?page=".$i."&pid=".$project_id."'>".$i."</a>";        
  }
  
  pg_free_result($result);

  echo '<li>'. $pageLink .'</li>';

  if($page != $total_pages){
    $next_page = $page + 1;
    echo "<li><a href='AdminProjectProfile.php?page=".$next_page."&pid=".$project_id."'>&raquo;</a></li>";
  }
?>

</li>
</ul>
</div>
</nav>
</div><br>  

<?php
pg_close($dbconn);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
