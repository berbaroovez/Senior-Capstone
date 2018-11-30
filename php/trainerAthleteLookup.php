<?php

include("config.php");
session_start();
$link = mysqli_connect("localhost", "lorasAdmin", "lorasATR2018", "atr");


$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];




 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta hhtp-equiv="X-UA-Compatible" content="IE-Edge">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Sport Page</title>
  </head>
  <body style="background:#D1B888 !important">
    <div style="background:transparent !important" class ="jumbotron text-center">
      <div class ="container">

        <h1 class="display-3">Atheletic Trainer Room Sign In</h1>

      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">
          <table class="table">
            <thead>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Sport</th>
            </thead>
            <tbody>


              <?php

              $sql ="SELECT students.FirstName, students.LastName, sports.Name
              from injury_report join students on injury_report.studentID = students.ID
              join sports on injury_report.sportID = sports.sportsID
              join injuries on injury_report.InjuryID = injuries.injuriesID
              where students.FirstName = '$FirstName' and students.LastName ='$LastName'";

              $result = mysqli_query($link,$sql);
              while ($row=mysqli_fetch_array($result))
                {
                echo"<tr>
                    <td>".$row['FirstName']."</td>
                    <td>".$row['LastName']."</td>
                    <td>".$row['Name']."</td>
                    </tr>
                 ";
                }



               ?>
            <tbody>

          </table>
        </div>
      </div>
    </div>
    <!-- Put your stuff here -->
  </body>

  </html>
