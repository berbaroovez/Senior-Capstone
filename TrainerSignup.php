<?php

include("config.php");
$link = mysqli_connect("localhost", "lorasAdmin", "lorasATR2018", "atr");

  if (!$link) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;


  }



 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta hhtp-equiv="X-UA-Compatible" content="IE-Edge">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Athletic Trainer Sign Up Page</title>
  </head>
  <body style="background:#D1B888 !important">

    <div style="background:transparent !important" class ="jumbotron text-center">
      <div class ="container">

        <h1 class="display-3">Atheletic Trainer Sign Up</h1>

      </div>
    </div>
  <div class = "row">
  <div class = "col-md-4 offset-md-4">
    <div class = "container-fluid">
      <form  method="post">
        <div class="form-group">
          <label for="TrainerFirstName">First Name</label>
          <input type="text" class="form-control" id="TrainerFirstName" name='FirstName' aria-describedby="emailHelp" placeholder="Enter First Name" required>
        </div>
        <div class="form-group">
          <label for="TrainerLastName">Last Name</label>
          <input type="text" class="form-control" id="TrainerLastName" name='LastName'placeholder="Enter Last Name" required>
        </div>
        <div class="form-group">
          <label for="TrainerLorasID">Loras ID</label>
          <input type="text" maxlength ="9"class="form-control" id="TrainerID" name="ID" placeholder="Enter Loras ID (ex: AA123456)" required>
        </div>
        <div class="form-group">
          <label for="TrainerPassword">Password</label>
          <input type="text" class="form-control" id="TrainerPass" name="Password" placeholder="Enter Password" required>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
    </div>
<?php

#This if statment allows the the mysql query to go through on the same page
#This eliminates the need for two pages reducing clutter.
#Also added a unique attribute to username column so it will return a error if the same username is added
if($_SERVER['REQUEST_METHOD']=='POST')
{



  #This takes in the post variables from the form above
  #the last line with two ID's makes sures ID is lowercase before entering into database to also eliminate duplicates
  $FirstName = mysqli_real_escape_string($link, $_POST['FirstName']);
  $FirstName = strtolower($FirstName);

  $LastName = mysqli_real_escape_string($link, $_POST['LastName']);
  $LastName = strtolower($LastName);


  $ID = mysqli_real_escape_string($link, $_POST['ID']);
  $ID = strtolower($ID);

  $Password =  mysqli_real_escape_string($link, $_POST['Password']);
  $Password = strtolower($Password);

  $sql = "INSERT INTO trainers (FirstName, LastName, username, password) VALUES ('$FirstName', '$LastName','$ID',$Password)";

  if(mysqli_query($link, $sql))
  {
    echo "Record Added";
    header('location: index.php');
  }
  else {
    echo "Error: " . $sql."".mysqli_error($link);
    echo "THAT LORAS ID IS ALREADY IN USE";
  }
}

mysqli_close($link);
 ?>

  </body>
</html>
