<?php




mysqli_close($link);
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


    <?php

    #This if statment allows the the mysql query to go through on the same page
    #This eliminates the need for two pages reducing clutter.
    #Also added a unique attribute to username column so it will return a error if the same username is added
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $link = mysqli_connect("localhost", "lorasAdmin", "lorasATR2018", "atr");

      if (!$link) {
          echo "Error: Unable to connect to MySQL." . PHP_EOL;
          echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
          echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
          exit;


      }

      #This takes in the post variables from the form above
      #the last line with two ID's makes sures ID is lowercase before entering into database to also eliminate duplicates
      $ID = mysqli_real_escape_string($link, $_POST['loginTextBox']);
      $ID = strtolower($ID);

      $sql = "SELECT username FROM students WHERE username = '".$ID."'";
      echo "Hello";

      if (mysql_num_rows($link,$sql) != 0)
      {
          echo "Username already exists";
      }
      else
      {
          echo "Error: " . $sql."".mysqli_error($link);
        }
      // if(mysqli_query($link, $sql))
      // {
      //   echo "Record Added";
      // }
      // else {
      //   echo "Error: " . $sql."".mysqli_error($link);
      // }
    }

     ?>



  </body>
</html>
<!-- Test carter is dumb-->
