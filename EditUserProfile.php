<!DOCTYPE html>
<html lang="en">
<title>Edit your profile</title>
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
      if($_SESSION['username'] === 'admin@example.com') {
        $email = $_GET['email'];
      }
      else {
        $email = $_SESSION['username'];
      }
      $query = "SELECT * FROM users WHERE email = '$email'";
      $result = pg_query($dbconn, $query);
      $row = pg_fetch_row($result);
      if(pg_num_rows($result) == 1) {
        $name = $row[0];
        $email = $row[1];
        $dob = $row[2];
        $address = $row[3];
        $password = $row[4];
        $image_url = $row[5];
      }
      else {
        die('Error fetching the user profile data. username: '.$_SESSION['username']);
      }

  ?>

<script type="text/javascript">
function validatePassword() {
    var currentpassword_check = document.forms["passwordform"]["currentpassword"].value;
    var password = document.forms["passwordform"]["password"].value;
    var password_check = document.forms["passwordform"]["password_check"].value;
    var currentpassword = <?php echo json_encode($password);?>;
    if (currentpassword_check === currentpassword) {
      document.getElementById("current_password_check").innerHTML="Password checked";
      document.getElementById("SubmitButton").disabled = true;
    }
    if(password == ""){
        document.getElementById("password_verification").innerHTML="";
        document.getElementById("SubmitButton").disabled = true;
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
          document.getElementById("SubmitButton").disabled = false;
      }
    }
}
</script>

<?php
  if(isset($_GET['email'])) {
    echo "<form action='EditUserForm.php?email=$email' method='post' enctype='multipart/form-data' name='form'>";
  }
  else {
    echo "<form action='EditUserForm.php' method='post' enctype='multipart/form-data' name='form'>";
  }
?>
  <div class="container">
    <div class="container">
      <h2 style="padding-left:0px" color="black">Edit your profile details</h2>
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

        <input type="submit" name="usersubmit" value="Submit" class="btn btn-default" id="UserSubmitButton" align="right"/>
      </div>
    </div>
  </div>
</form>

<form action="EditPassword.php" method="post" enctype="multipart/form-data" name="passwordform">
  <div class="container">
    <div class="container">
      <h2 style="padding-left:0px" color="black">Change your password</h2>
    </div>
    <div class="jumbotron">
      <div class="form-group row">
        <label for="example-password-input" class="col-2 col-form-label">Current Password</label>
        <div class="col-10">
          <input class="form-control" type="password" id="current_password_check" name="currentpassword" required/>
        </div>
      </div>

      <div class="form-group row">
        <label for="example-password-input" class="col-2 col-form-label" required="true">New Password</label>
        <div class="col-10">
          <input class="form-control" type="password" id="password" name="password" required/>
          <small id="passwordHelpInline" class="text-muted">
            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
          </small>
        </div>
      </div>

      <div class="form-group row">
        <label for="example-password-input" class="col-2 col-form-label">Retype New Password</label>
        <div class="col-10">
          <input class="form-control" type="password" id="confirmPassword" name="password_check" onkeyup="validatePassword()" required/>
          <span id="password_verification"></span>
        </div>
      </div>

      <input type="submit" name="passwordsubmit" value="Submit" class="btn btn-default" id="SubmitButton" align="right"/ disabled>
    </div>
  </div>
</form><br>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.12.2.min.js"></script>
  <script src="js/bootstrap-imgupload.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>
