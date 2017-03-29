<?php
   ob_start();
   session_start();
?>

<?php
    require('dbconn.php');
?>

<html lang = "en">

   <head>
      <title>Login</title>
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
         }

         .title {
           text-align: center;
         }

         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
            text-align: center;
         }

         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }

         .form-signin .checkbox {
            font-weight: normal;
         }

         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }

         .form-signin .form-control:focus {
            z-index: 2;
         }

         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }

         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }

         .logout {
           text-align: center;
         }

         h2{
            text-align: center;
            color: #017572;
         }
      </style>

   </head>

   <body>
      <div class = "container title">
        <h1>User Login</h1>
      </div>

      <div class = "container form-signin">

         <?php
            $msg = '';

            if (isset($_POST['login']) && !empty($_POST['username'])
               && !empty($_POST['password'])) {
                 $username = $_POST['username'];
                 $password = $_POST['password'];
                 $query = "SELECT * FROM users WHERE email = '$username' AND password = md5('$password');";
                 $result = pg_query($dbconn, $query);

               if(pg_num_rows($result) == 1) {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $username;
                  $_SESSION['name'] = pg_fetch_result($result, 0 ,0);

                  echo 'You have entered valid use name and password';

                  header('Location: Homepage.php');
               }else {
                  $msg = 'Wrong username or password';
               }
               pg_free_result($user_found);
            }
         ?>
      </div> <!-- /container -->

      <div class = "container">

         <form class = "form-signin" role = "form"
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control"
               name = "username" placeholder = "email"
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required></br>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
               name = "login">Login</button>
         </form>

          <div class = "container logout">
            <a href = "logout.php" class = "Logout title">Clear Session
          </div>
      </div>

      <?php
        pg_close($dbconn);
      ?>
   </body>
</html>
