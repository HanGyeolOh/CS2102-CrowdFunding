<!DOCTYPE html>
<html lang="en">
<title>Create a user</title>
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
      require('dbconn.php');
  ?>

  <?php
      require('NavigationBar.php');
  ?>

<script type="text/javascript">
function validate () {
  document.getElementById("SubmitButton").disabled = true;
  var check1 = validatePassword();
  var check2 = validateType();
  if (check1 && check2) {
    document.getElementById("SubmitButton").disabled = false;
  }
}
function validatePassword() {
  var password = document.forms["form"]["password"].value;
  var password_check = document.forms["form"]["password_check"].value;
  if(password == ""){
    document.getElementById("password_verification").innerHTML="";
    document.getElementById("SubmitButton").disabled = true;
    return false;
  }
  if(password.length<8) {
    document.getElementById("password_verification").innerHTML="Password is too short";
    document.getElementById("SubmitButton").disabled = true;
  }
  else if (password.length>=8) {
    if (password !== password_check) {
      document.getElementById("password_verification").innerHTML="Password does not match";
      document.getElementById("SubmitButton").disabled = true;
    } else if (password === password_check) {
      document.getElementById("password_verification").innerHTML="Password matched";
      return true;
    }
  }
  return false;
}
function validateType() {
  var file = document.getElementById("file").value;
  var filetype = getFileExtension(file);
  console.log(filetype);

  if (file == "") {
    return false;
  } else if(filetype != "jpeg" && filetype != "jpg" && filetype != "png" && filetype != "gif") {
    document.getElementById("file_verification").innerHTML = "Invalid File Type";
    return false;
  } else {
    document.getElementById("file_verification").innerHTML="";
    return true;
  }
  return false;
}

function getFileExtension(filename) {
  return filename.substr(filename.lastIndexOf('.')+1).toLowerCase();
}

</script>

<form action="UserCreationForm.php" method="post" enctype="multipart/form-data" name="form">
  <div class="container">
    <div class="container">
      <h2 style="padding-left:0px" color="black">User Creation</h2>
      <h4 style="padding-left:0px">Please input your information below!</h4>
    </div>
    <div class="jumbotron">
      <br>
      <div class="container">
        <div class="form-group row">
          <label for="example-text-input" class="col-2 col-form-label">Name</label>
          <div class="col-10">
            <input class="form-control" type="text" id="example-text-input" name="name" required/>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-email-input" class="col-2 col-form-label">Email</label>
          <div class="col-10">
            <input class="form-control" type="email" id="example-email-input" name="email" required/>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-text-input" class="col-2 col-form-label">Address</label>
          <div class="col-10">
            <input class="form-control" type="text" id="example-text-input" name="address" required/>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Date of Birth</label>
          <div class="col-10">
            <input class="form-control" type="date" value="2011-08-19" id="example-date-input" name="dob" required/>
          </div>
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
            <input class="form-control" type="password" id="confirmPassword" name="password_check" onkeyup="validate()" required/>
            <span id="password_verification"></span>
          </div>
        </div>


        <div class="container">
              <div class="container">
                <div style="max-width: 650px; margin: auto;">
                  <h2 class="page-header">Profile Image Upload</h2>
                  <p class="lead">Select a PNG or JPEG image, having maximum size 500KB.</p>
                </div>
                <div class="form-group" align="center">
                  <input type="file" name="file" id="file" onchange="validate()" required/>
                </div>
                <div style="text-align: center;">
                  <span id="file_verification" style="color:red;"></span>
                </div>
              </div>
          </div>
        </div>

        <input type="submit" name="submit" value="Submit" class="btn btn-default" id="SubmitButton" style="float: right;" disabled />

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
