<!-- Project Creation Page -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link href="css/bootstrap-imgupload.css" rel="stylesheet">

  <?php
    session_start();
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


<h4 style="padding-left:100px">Please input your information below!</h4>

<div class="jumbotron">
  <div class="container">
   <div class="row">
    <!--The Title Search-->
    <div class="col-lg-6">
      <div class="input-group">
       <span class="input-group-addon">Title</span>
       <input type="text" class="form-control" placeholder="Input Title Here">
     </div>
   </div>
   <!--Target Amount-->
   <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-addon">Target Amount</span>
      <input type="text" class="form-control" placeholder="Input Target Here">
    </div>
  </div>
</div>
<br>
<div class="row">
  <!--Start date picker-->
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-addon">Start Date</span>
      <input type="text" class="form-control" placeholder="Input Start Date">
    </div>
  </div>
  <!--End date picker-->
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-addon">End Date</span>
      <input type="text" class="form-control" placeholder="Input End Date">
    </div>
  </div>
</div>
<br>

<div class="row">
  <!--Description-->
  <div class="col-lg-12">
    <div class="input-group">
      <span class="input-group-addon">Description</span>
      <input type="text" class="form-control" placeholder="Input Description Here">
    </div>
  </div>
</div>
<br>

<div class="row">
  <!--Category Search-->
  <div class="col-lg-6">
    <div class="form-group">
      <!--<span class="input-group-addon">Category</span>-->
      <select class="form-control" id="sel1">
        <option>Technology</option>
        <option>Music</option>
        <option>Lifestyle</option>
        <option>Photography</option>
      </select> 
    </div>
  </div>
  <!--Submit button-->
  <a href="#" class="btn btn-default btn-md pull-right" role="button">Submit</a>
</div>
</div>
</div>

<div class="container">

  <div style="max-width: 650px; margin: auto;">
    <h1 class="page-header">Bootstrap Image Upload Form</h1>
    <p class="lead">Select a PNG or JPEG image, having maximum size <span id="max-size"></span> KB.</p>

    <form id="upload-image-form" action="" method="post" enctype="multipart/form-data">
      <div id="image-preview-div" style="display: none">
        <label for="exampleInputFile">Selected image:</label>
        <br>
        <img id="preview-img" src="noimage">
      </div>
      <div class="form-group">
        <input type="file" name="file" id="file" required>
      </div>
      <button class="btn btn-lg btn-primary" id="upload-button" type="submit" disabled>Upload image</button>
    </form>

    <br>
    <div class="alert alert-info" id="loading" style="display: none;" role="alert">
      Uploading image...
      <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
        </div>
      </div>
    </div>
    <div id="message"></div>
  </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.12.2.min.js"></script>
<script src="js/bootstrap-imgupload.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="upload-image.js"></script>
</body>
</html>