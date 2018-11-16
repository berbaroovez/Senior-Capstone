<?php
include("config.php");
session_start();
$db = mysqli_connect("localhost", "lorasAdmin", "lorasATR2018", "atr");


if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $injury = mysqli_real_escape_string($db,$_POST['Injury_Select']);
      $description = mysqli_real_escape_string($db,$_POST['Description']);
      $ATS = mysqli_real_escape_string($db,$_POST['AT_SAW']);


    //  $sql = "SELECT username FROM students WHERE username = '$myusername'";
      //$result = mysqli_query($db,$sql);
    //  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //  $active = $row['active'];

    //  $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      //if($count == 1) {
      //   $_SESSION['login_user'] = $myusername;

      if(1==1)
      {
        header("location: DuLogin.php");
}
    //  }else {
      //   $error = "Your Login Name or Password is invalid";
    //  }
//   }

}

?>
 <!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="js/jquery.repeatable.js"></script>
    <title>Injury Information2</title>




  </head>
  <body style="background:#D1B888 !important">

    <div style="background:transparent !important" class ="jumbotron text-center">



<!--NEW BOOTSTRAP LAYOUT -->
<!---->
<!---->

  <section id="cover">
      <div id="cover-caption">
          <div id="container" class="container">
              <div class="row text-black">
                  <div class="col-sm-10 offset-sm-1 text-center">
                      <h1 class="display-3">Injury Info</h1>
                      <div class="info-form">
                          <form action="" method="post"  class="form-inline justify-content-center">
                              <div class="form-group">
                                  <select class="form-control form-control-sm" id="Injury_Select" name="Injury_Select">
                                  <option value="" disabled selected>Select a Injury</option>
                                  <option>Ankle</option>
                                  <option>Back</option>
                                  <option>Wrist</option>
                                </select>
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control form-control-sm" name = "Description" placeholder="Description">
                              </div>
                              <div class="form-group">
                                  <select class="form-control form-control-sm" id="AT_SAW" name ="AT_SAW">
                                  <option value="" disabled selected>Athletic Trainer Saw</option>
                                  <option>Amanda</option>
                                  <option>Chris</option>
                                  <option>Katie</option>
                                </select>
                              </div>
                              <button type="submit" class="btn btn-sm  ">Submit</button>
                          </form>
                      </div>
                      <br>


                  </div>
              </div>
          </div>
      </div>

        </div>
  </section>
  </body>
</html>
