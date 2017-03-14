<!-- User Creation Page -->
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


  <h2 style="padding-left:100px">User Creation</h2>
  <h4 style="padding-left:100px">Please input your information below!</h4>
  <div class="jumbotron">
    <div class="container">
     <div class="row">
      <!--Name-->
      <div class="col-lg-6">
        <div class="input-group">
         <span class="input-group-addon">Name</span>
         <input type="text" class="form-control" placeholder="Input Name Here">
       </div>
     </div>
     <!--Email-->
     <div class="col-lg-6">
      <div class="input-group">
        <span class="input-group-addon">Email</span>
        <input type="text" class="form-control" placeholder="Input Email Address Here">
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <!--DOB picker-->
    <div class="col-lg-6">
      <div class="input-group">
        <span class="input-group-addon">Date of Birth</span>
        <input type="text" class="form-control" placeholder="Input DOB">
      </div>
    </div>
  </div>
  <br>


  <div class="row">
    <!--Description-->
    <div class="col-lg-12">
      <div class="input-group">
        <span class="input-group-addon">Address</span>
        <input type="text" class="form-control" placeholder="Input Address Here">
      </div>
    </div>
  </div>
  <br>

  <div class="row">
    <!--Password input-->
    <div class="col-lg-6">
      <div class="input-group">
        <span class="input-group-addon">Password</span>
        <input type="text" class="form-control" placeholder="Input Password Here">
      </div>
    </div>
    <!--Password input again-->
    <div class="col-lg-6">
      <div class="input-group">
        <span class="input-group-addon">Retype Password</span>
        <input type="text" class="form-control" placeholder="Input Password Here">
      </div>
    </div>
  </div>
  <br>

  <!--Submit button-->
  <a href="#" class="btn btn-default btn-md pull-right" role="button">Submit</a>


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

<div class="jumbotron">
  <div class="container">
    <div class="form-group row">
      <label for="example-text-input" class="col-2 col-form-label">Text</label>
      <div class="col-10">
        <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
      </div>
    </div>
    <div class="form-group row">
      <label for="example-search-input" class="col-2 col-form-label">Search</label>
      <div class="col-10">
        <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
      </div>
    </div>
    <div class="form-group row">
      <label for="example-email-input" class="col-2 col-form-label">Email</label>
      <div class="col-10">
        <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
      </div>
    </div>
    <div class="form-group row">
      <label for="example-url-input" class="col-2 col-form-label">URL</label>
      <div class="col-10">
        <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
      </div>
    </div>
    <div class="form-group row">
      <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
      <div class="col-10">
        <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
      </div>
    </div>
    <div class="form-group row">
      <label for="example-password-input" class="col-2 col-form-label">Password</label>
      <div class="col-10">
        <input class="form-control" type="password" value="hunter2" id="example-password-input">
      </div>
    </div>
    <div class="form-group row">
      <label for="example-number-input" class="col-2 col-form-label">Number</label>
      <div class="col-10">
        <input class="form-control" type="number" value="42" id="example-number-input">
      </div>
    </div>
    <div class="form-group row">
      <label for="example-datetime-local-input" class="col-2 col-form-label">Date and time</label>
      <div class="col-10">
        <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
      </div>
    </div>
    <div class="form-group row">
      <label for="example-date-input" class="col-2 col-form-label">Date</label>
      <div class="col-10">
        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
      </div>
    </div>
    <div class="form-group row">
      <label for="example-month-input" class="col-2 col-form-label">Month</label>
      <div class="col-10">
        <input class="form-control" type="month" value="2011-08" id="example-month-input">
      </div>
    </div>
    <div class="form-group row">
      <label for="example-week-input" class="col-2 col-form-label">Week</label>
      <div class="col-10">
        <input class="form-control" type="week" value="2011-W33" id="example-week-input">
      </div>
    </div>
    <div class="form-group row">
      <label for="example-time-input" class="col-2 col-form-label">Time</label>
      <div class="col-10">
        <input class="form-control" type="time" value="13:45:00" id="example-time-input">
      </div>
    </div>
    <div class="form-group row">
      <label for="example-color-input" class="col-2 col-form-label">Color</label>
      <div class="col-10">
        <input class="form-control" type="color" value="#563d7c" id="example-color-input">
      </div>
    </div>
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