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
a.current{background: #f00; color:#fff; border: 1px solid #000}
</style>
</head>

<body>

<?php
    require('dbconn.php');
    require('NavigationBar.php');
?>

<?php
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
	
	if (isset($_GET["date"])) { 
	$date  = $_GET["date"]; 
	} else { 
	$date = $_POST['date']; 
	}  
	
	$limit = 5;  
	if (isset($_GET["page"])) { 
	$page  = $_GET["page"]; 
	} else { 
	$page=1; 
	}
	
	$start_from = ($page-1) * $limit;  
	$restrictions = "ORDER BY title ASC LIMIT $limit OFFSET $start_from";	
	
	
	if (strcmp($title,"")==0 && strcmp($date,"")==0 && strcmp($category,"")==0){ //empty search
		$query="SELECT title, description, target_amount, current_amount, start_date, project_id
		FROM projects ";
	
	} else if (strcmp($title,"")==0 && strcmp($date,"")==0) { // search by category only
		$query="SELECT title, description, target_amount, current_amount, start_date, project_id
		FROM projects
		WHERE category='$category'";
		
	} else if(strcmp($category,"")==0 && strcmp($date,"")==0){ // search by title only 
		$query="SELECT title, description, target_amount, current_amount, start_date, project_id
		FROM projects
		WHERE lower(title) like lower('%".$title."%')";
	
	} else if(strcmp($category,"")==0 && strcmp($title,"")==0){ // search by year only 
		$query="SELECT title, description, target_amount, current_amount, start_date, project_id
		FROM projects
		WHERE EXTRACT(YEAR FROM start_date) = '$date'";

	} else if(strcmp($category,"")==0){ // search by year and title only 
		$query="SELECT title, description, target_amount, current_amount, start_date, project_id
		FROM projects
		WHERE EXTRACT(YEAR FROM start_date) = '$date'
		AND lower(title) like lower('%".$title."%')";
		
	} else if(strcmp($date,"")==0){ // search by category & title
		$query="SELECT title, description, target_amount, current_amount, start_date, project_id
		FROM projects
		WHERE lower(title) like lower('%".$title."%')
		AND category='$category'";
	
	} else if(strcmp($title,"")==0){ // search by category and date
		$query="SELECT title, description, target_amount, current_amount, start_date, project_id
		FROM projects
		WHERE EXTRACT(YEAR FROM start_date) = '$date'
		AND category='$category'";
	
	} else { // search by category, title, date
		$query="SELECT title, description, target_amount, current_amount, start_date, project_id
		FROM projects
		WHERE EXTRACT(YEAR FROM start_date) = '$date'
		AND category='$category'
		AND lower(title) like lower('%".$title."%')";
	}
	
	$complete_query = $query . $restrictions;	
	$result = pg_query($complete_query) or die('Query failed: ' . pg_last_error()); 
	
	$index = ($page - 1) * $limit + 1;

?>


<div class='container'>
<table class='table table-bordered table-striped table-hover'>
<thead>
<tr>
<th class='text-center'>#</th>
<th class='text-center'>Title</th>
<th class='text-center'>Description</th>
<th class='text-center'>Start Date</th>
<th class='text-center'>Funding Sought</th>
<th class='text-center'>Amount Raised</th>
<th class='text-center'>Invest!</th>
</tr>
</thead>

<!-- Display search results -->

<?php
    while ($row = pg_fetch_row($result)){
		$retrieved_title = $row[0];
		$retrieved_desc = $row[1];
		$retrieved_target = $row[2];	
		$retrieved_current = $row[3];
		$retrieved_date = $row[4];
		$project_id = $row[5];

		echo "<tr><td align='center'>$index</td>
		<td align='center'>$retrieved_title</td>
		<td align='center'>$retrieved_desc</td>
		<td align='center'>$retrieved_date</td>
		<td align='center'>$retrieved_target</td>
		<td align='center'>$retrieved_current</td>
		<td align='center'><p><a href='ProjectProfile.php?id=".$project_id."' class='btn btn-primary btn-xs'>Invest!</a></p> </td></tr>";
	
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
		echo "<li><a href='SearchResults.php?page=".$previous_page."&category=".$category."&title=".$title."&date=".$date."'>&laquo;</a></li>";
	}

	for ($i=1; $i<=$total_pages; $i++) {  
		$pageLink .= "<a href='SearchResults.php?page=".$i."&category=".$category."&title=".$title."&date=".$date."'>".$i."</a>"; 			 
	}
  
	pg_free_result($result);
	
	echo '<li>'. $pageLink .'</li>';

	if($page != $total_pages){
		$next_page = $page + 1;
		echo "<li><a href='SearchResults.php?page=".$next_page."&category=".$category."&title=".$title."&date=".$date."'>&raquo;</a></li>";
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
