<!DOCTYPE html>
<html lang="en">
<title>Create a Project</title>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link href="css/bootstrap-imgupload.css" rel="stylesheet">

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
      session_start();
      require('dbconn.php');
      require('NavigationBar.php');
  ?>

  <script type="text/javascript">
    function validateType() {
      var file1 = document.getElementById("file1").value;
      var file2 = document.getElementById("file2").value;
      var file3 = document.getElementById("file3").value;
      var logo = document.getElementById("logo").value;
      var logoType = getFileExtension(logo);
      var filetype1 = getFileExtension(file1);
      var filetype2 = getFileExtension(file2);
      var filetype3 = getFileExtension(file3);

      var check1 = false;
      var check2 = false;
      var check3 = false;
      var checklogo = false;

      document.getElementById("SubmitButton").disabled = true;

      if (logo == "") {
        checklogo = false;
      } else if(logoType != "jpeg" && logoType != "jpg" && logoType != "png" && logoType != "gif") {
        document.getElementById("logo_verification").innerHTML = "Invalid File Type";
        document.getElementById("SubmitButton").disabled = true;
      } else {
        document.getElementById("logo_verification").innerHTML="";
        checklogo = true;
      }

      if (file1 == "") {
        check1 = false;
      } else if(filetype1 != "jpeg" && filetype1 != "jpg" && filetype1 != "png" && filetype1 != "gif") {
        document.getElementById("file1_verification").innerHTML = "Invalid File Type";
        document.getElementById("SubmitButton").disabled = true;
      } else {
        document.getElementById("file1_verification").innerHTML="";
        check1 = true;
      }

      if (file2 == "") {
        check2 = true;
      } else if(filetype2 != "jpeg" && filetype2 != "jpg" && filetype2 != "png" && filetype2 != "gif") {
        document.getElementById("file2_verification").innerHTML = "Invalid File Type";
        document.getElementById("SubmitButton").disabled = true;
      } else {
        document.getElementById("file2_verification").innerHTML="";
        check2 = true;
      }

      if (file3 == "") {
        check3 = true;
      } else if(filetype3 != "jpeg" && filetype3 != "jpg" && filetype3 != "png" && filetype3 != "gif") {
        document.getElementById("file3_verification").innerHTML = "Invalid File Type";
        document.getElementById("SubmitButton").disabled = true;
      } else {
        document.getElementById("file3_verification").innerHTML="";
        check3 = true;
      }

      if (check1 && check2 && check3 && checklogo) {
        document.getElementById("SubmitButton").disabled = false;
      }

    }

    function getFileExtension(filename) {
      return filename.substr(filename.lastIndexOf('.')+1).toLowerCase();
    }
  </script>

  <form action="ProjectCreationForm.php" method="post" enctype="multipart/form-data" name="form">
  <div class="container">
    <div class="container">
      <h2 style="padding-left:0px" color="black">Project Creation</h2>
      <h4 style="padding-left:0px">Please input your Project's information below!</h4>
    </div>
    <div class="jumbotron">
      <br>
      <div class="container">
        <div class="form-group row">
          <label for="example-text-input" class="col-2 col-form-label">Project Title</label>
          <div class="col-10">
            <input class="form-control" type="text" id="example-text-input" name="title" maxlength="256" required/>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-email-input" class="col-2 col-form-label">Target Amount</label>
          <div class="col-10">
            <input class="form-control" type="number" onkeypress="return event.charCode >= 48" min="1" id="example-email-input" name="target_amount" required/>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Start Date</label>
          <div class="col-10">
            <input class="form-control" type="date" value="2011-01-01" id="example-date-input" name="start_date" required/>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">End Date</label>
          <div class="col-10">
            <input class="form-control" type="date" value="2011-01-01" id="example-date-input" name="end_date" required/>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-text-input" class="col-2 col-form-label">Brief Description</label>
          <div class="col-10">
            <input class="form-control" type="text" id="example-text-input" name="description" maxlength="256" required/>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-text-input" class="col-2 col-form-label">Category</label>
          <div class="col-10">
            <select class="form-control" type="text" id="example-text-input" name="category" required/>
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

        <div class="container">
          <div class="container">
            <div style="max-width: 650px; margin: auto;">
              <h2 class="page-header">Project Logo Upload</h2>
              <p class="lead">Select a PNG or JPEG image, having maximum size 500KB.</p>
            </div>
            <div class="form-group" align="center">
              <input type="file" name="logo" id="logo" onchange="validateType()" required/>
            </div>
            <div style="text-align: center;">
              <span id="logo_verification" style="color:red;"></span>
            </div>
          </div>
              <div class="container">
                <div style="max-width: 650px; margin: auto;">
                  <h2 class="page-header">Project Image Upload</h2>
                  <p class="lead">Select a PNG or JPEG image, having maximum size 500KB.</p>
                </div>
                <div class="form-group" align="center">
                  <h3>Project Image #1 </h3><input type="file" name="file1" id="file1" onchange="validateType()" required/>
                </div>
                <div style="text-align: center;">
                  <span id="file1_verification" style="color:red;"></span>
                </div>
                <div class="form-group" align="center">
                  <h3>Project Image #2 </h3><input type="file" name="file2" id="file2" onchange="validateType()"/>
                </div>
                <div style="text-align: center;">
                  <span id="file2_verification" style="color:red;"></span>
                </div>
                <div class="form-group" align="center">
                    <h3>Project Image #3 </h3><input type="file" name="file3" id="file3" onchange="validateType()"/>
                </div>
                <div style="text-align: center;">
                  <span id="file3_verification" style="color:red;"></span>
                </div>
              </div>
          </div>

          <input type="submit" name="submit" value="Submit" class="btn btn-default" id="SubmitButton" style="float: right;" disabled/>

      </div>
    </div>
  </div>
</form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.12.2.min.js"></script>
  <script src="js/bootstrap-imgupload.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>
