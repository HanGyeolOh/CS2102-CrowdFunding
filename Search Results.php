<!-- Search Results Page -->
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

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

<?php
    require('NavigationBar.php');
?>

<?php
if(true){
	
	if (isset($_GET["category"])) { 
	$category  = $_GET["category"]; 
	} else { 
	$category = $_POST['cat']; 
	}  
  
	if (isset($_GET["title"])) { 
	$title  = $_GET["title"]; 
	} else { 
	$title = $_POST['title']; 
	}  

	$limit = 5;  
	if (isset($_GET["page"])) { 
	$page  = $_GET["page"]; 
	} else { 
	$page=1; 
	}
	
	$start_from = ($page-1) * $limit;  
	$restrictions = "ORDER BY title ASC LIMIT $limit OFFSET $start_from";	
	
	if(strcmp($title,"")==0){ 
		$query="SELECT title, description, target_amount, current_amount
		FROM projects
		WHERE category='$category'";
		$complete_query = $query . $restrictions;	
		$result = pg_query($complete_query) or die('Query failed: ' . pg_last_error()); 
		
	} else if(strcmp($category, "")==0){
		$limit = 5;  
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
		$start_from = ($page-1) * $limit;  
  
		$query="SELECT title, description, target_amount, current_amount
		FROM projects
		WHERE lower(title) like lower('%".$title."%')
		ORDER BY title ASC LIMIT $limit OFFSET $start_from";
		$result = pg_query($query) or die('Query failed: ' . pg_last_error()); 
		
	} else{
		$limit = 5;  
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
		$start_from = ($page-1) * $limit;  
  
		$query="SELECT title, description, target_amount, current_amount
		FROM projects
		WHERE lower(title) like lower('%".$title."%')
		AND category='$category'
		ORDER BY title ASC LIMIT $limit OFFSET $start_from";
		$result = pg_query($query) or die('Query failed: ' . pg_last_error()); 
	}
	
	$index = ($page - 1) * $limit + 1;

?>


	<div class='container'>
	<table class='table table-bordered table-striped table-hover'>
	<thead>
	<tr>
	<th class='text-center'>#</th>
	<th class='text-center'>Title</th>
	<th class='text-center'>Description</th>
    <th class='text-center'>Funding Sought</th>
    <th class='text-center'>Amount Raised</th>
	<th class='text-center'>Donate!</th>
  </tr>
  </thead>
	
<?php
    while ($row = pg_fetch_row($result)){
		$retrieved_title = $row[0];
		$retrieved_desc = $row[1];
		$retrieved_target = $row[2];
		$retrieved_current = $row[3];

		echo "<tr><td align='center'>$index</td>
		<td align='center'>$retrieved_title</td>
		<td align='center'>$retrieved_desc</td>
		<td align='center'>$retrieved_target</td>
		<td align='center'>$retrieved_current</td>
		<td align='center'><p><a href='#' class='btn btn-primary btn-xs'>Donate!</a></p> </td></tr>";
	
	$index++;
	}
	echo "</table>"; 
}
?>
</table>
</tbody> 
</div>

<!-- Display search results -->

<!--Adding Pagingation at bottom-->
<div class="container">
<nav>
<div class="text-center">
<ul class="pagination">
<li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
<?php

$rs_result = pg_query($query);    
$total_records = pg_num_rows($rs_result);  
$total_pages = ceil($total_records / $limit); 
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<a href='Search%20Results.php?page=".$i."&category=".$category."&title=".$title."'>".$i."</a>"; 
			 
};  
pg_free_result($result);
echo '<li>'. $pagLink .'</li>';

?>
<li>
<a href="#" aria-label="Next">
<span aria-hidden="true">&raquo;</span>
</a>
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
