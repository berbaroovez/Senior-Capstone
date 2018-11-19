<?php
/*
// ----------------------------------------------------------------------------------------------------
// - Display Errors
// ----------------------------------------------------------------------------------------------------
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

// ----------------------------------------------------------------------------------------------------
// - Error Reporting
// ----------------------------------------------------------------------------------------------------
error_reporting(-1);

// ----------------------------------------------------------------------------------------------------
// - Shutdown Handler
// ----------------------------------------------------------------------------------------------------
function ShutdownHandler()
{
    if(@is_array($error = @error_get_last()))
    {
        return(@call_user_func_array('ErrorHandler', $error));
    };

    return(TRUE);
};

register_shutdown_function('ShutdownHandler');

// ----------------------------------------------------------------------------------------------------
// - Error Handler
// ----------------------------------------------------------------------------------------------------
function ErrorHandler($type, $message, $file, $line)
{
    $_ERRORS = Array(
        0x0001 => 'E_ERROR',
        0x0002 => 'E_WARNING',
        0x0004 => 'E_PARSE',
        0x0008 => 'E_NOTICE',
        0x0010 => 'E_CORE_ERROR',
        0x0020 => 'E_CORE_WARNING',
        0x0040 => 'E_COMPILE_ERROR',
        0x0080 => 'E_COMPILE_WARNING',
        0x0100 => 'E_USER_ERROR',
        0x0200 => 'E_USER_WARNING',
        0x0400 => 'E_USER_NOTICE',
        0x0800 => 'E_STRICT',
        0x1000 => 'E_RECOVERABLE_ERROR',
        0x2000 => 'E_DEPRECATED',
        0x4000 => 'E_USER_DEPRECATED'
    );

    if(!@is_string($name = @array_search($type, @array_flip($_ERRORS))))
    {
        $name = 'E_UNKNOWN';
    };

    return(print(@sprintf("%s Error in file \xBB%s\xAB at line %d: %s\n", $name, @basename($file), $line, $message)));
};

$old_error_handler = set_error_handler("ErrorHandler");
*/
// other php code

include("config.php");
session_start();
$db = mysqli_connect("localhost", "lorasAdmin", "lorasATR2018", "atr");


if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['loginTextBox']);


      $sql = "SELECT username,ID, sportID FROM students WHERE username = '$myusername'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result);


      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {

         $_SESSION['login_user'] = $myusername;
         $_SESSION['userID'] = $row[1];
         $_SESSION['userSport'] = $row[2];


        header("location: InjuryInfo.php");
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

        <h1 class="display3">Atheletic Trainer Room Sign In</h1>

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
