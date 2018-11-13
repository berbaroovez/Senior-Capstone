<?php
include("config.php");
session_start();
$db = mysqli_connect("localhost", "lorasAdmin", "lorasATR2018", "atr");


if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['loginTextBox']);


      $sql = "SELECT id FROM admin WHERE username = '$myusername'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }



?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta hhtp-equiv="X-UA-Compatible" content="IE-Edge">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Login Page</title>
  </head>
  <body style="background:#D1B888 !important">
    <div style="background:transparent !important" class ="jumbotron text-center">
      <div class ="container">

        <h1>Atheletic Trainer Room Sign In</h1>

      </div>
    </div>

    <div class = "container-fluid">
      <div class="row">
        <div class ="col-md-4 offset-md-4">
          <form method ="post">
            <div class="input-group">
              <input type="text" name="loginTextBox"  maxlength="9" class="form-control input-sm" id="inputsm" placeholder="Enter Student ID">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">Log In</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class = "container-fluid">
      <div class="row">
        <div class ="col-md-4 offset-md-4">
          <p>To sign up for an account click here</p>
          <!--Add a link atribute for sign up page -->
        </div>
      </div>
    </div>



  </body>
</html>
<!-- Test carter is dumb-->
