<!DOCTYPE html>
<html lang="en">
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
      session_start();
      require('dbconn.php');
      $email = $_GET['email'];
      $query = "SELECT * FROM users WHERE email = '$email'";
      $result = pg_query($dbconn, $query);
      $row = pg_fetch_row($result);
      $name = $row[0];
      $email = $row[1];
      $dob = $row[2];
      $address = $row[3];
      $password = $row[4];
      $image_url = $row[5];
  ?>

<script type="text/javascript">
function validatePassword() {
    var password = document.forms["form"]["password"].value;
    var password_check = document.forms["form"]["password_check"].value;
    if(password == ""){
        document.getElementById("password_verification").innerHTML="";
        document.getElementById("SubmitButton").disabled = true;
    } else if (password !== password_check) {
        document.getElementById("password_verification").innerHTML="Password does not match";
        document.getElementById("SubmitButton").disabled = true;
    } else {
        document.getElementById("password_verification").innerHTML="Password matched";
        document.getElementById("SubmitButton").disabled = false;
    }
}
</script>

<form action="UserCreationForm.php" method="post" enctype="multipart/form-data" name="form">
  <div class="container">
    <div class="container">
      <h2 style="padding-left:0px" color="black">Edit your profile details</h2>
      <h4 style="padding-left:0px">Please input your information below!</h4>
    </div>
    <div class="jumbotron">
      <br>
      <div class="container">
        <div class="form-group row">
          <label for="example-text-input" class="col-2 col-form-label">Name</label>
          <div class="col-10">
            <input class="form-control" type="text" id="example-text-input" name="name" required value="<?php echo $name; ?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-email-input" class="col-2 col-form-label">Email</label>
          <div class="col-10">
            <input class="form-control" type="email" id="example-email-input" name="email" required value="<?php echo $email; ?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-text-input" class="col-2 col-form-label">Address</label>
          <div class="col-10">
            <input class="form-control" type="text" id="example-text-input" name="address" required value="<?php echo $address; ?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Date of Birth</label>
          <div class="col-10">
            <input class="form-control" type="date" id="example-date-input" name="dob" required value="<?php echo $dob; ?>"/>
          </div>
        </div>

        <div class="panel-group" id="accordion">

          <!-- Default investment option -->
          <div class="panel panel-info">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a href="#defaultinvestmentoption" data-toggle="collapse" data-parent="accordion">Change your password</a>
              </h4>
            </div>
            <div id="defaultinvestmentoption" class="panel-collapse collapse">
              <div class="panel-default">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="input-group has-default">
                      <span class="input-group-addon">Password</span>
                      <input type="text" class="form-control" placeholder="Type Current Password Here">
                    </div>
                  </div>
                  <?php
                  require('EditPassword.php');
                  ?>
                </div>
              </div>
            </div>
          </div><br>
        </div>

        <div class="form-group row">
          <label for="example-password-input" class="col-2 col-form-label" required="true">Password</label>
          <div class="col-10">
            <input class="form-control" type="password" id="passoword" name="password" required/>
            <small id="passwordHelpInline" class="text-muted">
              Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </small>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-password-input" class="col-2 col-form-label">Retype Password</label>
          <div class="col-10">
            <input class="form-control" type="password" id="confirmPassword" name="password_check" onkeyup="validatePassword()" required/>
            <span id="password_verification"></span>
          </div>
        </div>

        <input type="submit" name="submit" value="Submit" class="btn btn-default" id="SubmitButton" align="right"/ disabled>

        <div class="container">
              <div class="container">
                <div style="max-width: 650px; margin: auto;">
                  <h2 class="page-header">Profile Image Upload</h2>
                  <p class="lead">Select a PNG or JPEG image, having maximum size <span id="max-size"></span> KB.</p>
                </div>
                <div class="form-group" align="center">
                  <input type="file" name="file" id="file" required/>
                </div>
              </div>
          </div>
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
