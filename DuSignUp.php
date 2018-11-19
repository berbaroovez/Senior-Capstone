<?php 





 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta hhtp-equiv="X-UA-Compatible" content="IE-Edge">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Sign Up Page</title>
  </head>
  <body style="background:#D1B888 !important">
    <div style="background:transparent !important" class ="jumbotron text-center">
      <div class ="container">

        <h1>Atheletic Trainer Room Sign Up</h1>

      </div>
    </div>
  <div class = "row">
  <div class = "col-md-4 offset-md-4">
    <div class = "container-fluid">
      <form  method="post">
        <div class="form-group">
          <label for="AthleteFirstName">First Name</label>
          <input type="text" class="form-control" id="AthleteFirstName" name='FirstName' aria-describedby="emailHelp" placeholder="Enter First Name">
        </div>
        <div class="form-group">
          <label for="AthleteLastName">Last Name</label>
          <input type="text" class="form-control" id="AthleteLastName" name='LastName'placeholder="Enter Last Name">
        </div>
        <div class="form-group">
          <label for="AthleteStudentID">Student ID</label>
          <input type="text" maxlength ="9"class="form-control" id="AthleteID" name="ID" placeholder="Enter Student ID Name (ex: AA123456)">
        </div>
        <div class="form-group">

          <select name="SportDropDown">
            <option value="Tennis">Tennis</option>
            <option value="Men's Soccer">Men's Soccer</option>
            <option value="Women's Soccer">Women's Soccer</option>
            <option value="Men's Basketball">Men's Basketball</option>
          </select>
          <label for="AthleteSport">Primary Sport</label>
        </div>
          <div class="form-group">
<!--make sure that first option is null-->
            <select name="Sport2DropDown">
              <option value="Racquet">Racquet</option>
              <option value="Men's Soccer">Men's Soccer</option>
              <option value="Women's Soccer">Women's Soccer</option>
              <option value="Men's Basketball">Men's Basketball</option>
            </select>
            <label for="AthleteSport2">Second Sport (Optional)</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
    </div>
<?php

include("config.php")
$link = mysqli_connect("localhost", "lorasAdmin", "lorasATR2018", "atr");
#This if statment allows the the mysql query to go through on the same page
#This eliminates the need for two pages reducing clutter.
#Also added a unique attribute to username column so it will return a error if the same username is added
if($_SERVER['REQUEST_METHOD']=='POST')
{


  if (!$link) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;


  }

  #This takes in the post variables from the form above
  #the last line with two ID's makes sures ID is lowercase before entering into database to also eliminate duplicates
  $FirstName = mysqli_real_escape_string($link, $_POST['FirstName']);
  $LastName = mysqli_real_escape_string($link, $_POST['LastName']);
  $ID = mysqli_real_escape_string($link, $_POST['ID']);
  $ID = strtolower($ID);

  $sql = "INSERT INTO students (FirstName, LastName, username, sportID) VALUES ('$FirstName', '$LastName','$ID',1)";
  echo "Hello";
  if(mysqli_query($link, $sql))
  {
    echo "Record Added";
  }
  else {
    echo "Error: " . $sql."".mysqli_error($link);
  }
}
mysqli_close($link);
 ?>

  </body>
</html>
