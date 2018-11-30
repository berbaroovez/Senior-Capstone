<?php

include("config.php");
session_start();
$link = mysqli_connect("localhost", "lorasAdmin", "lorasATR2018", "atr");


$sport = $_POST['injury_by_sport'];




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
              <th scope="col">Injury</th>
              <th scope="col">Description</th>
              <th scope="col">Date</th>
            </thead>
            <tbody>


              <?php

              $sql = "SELECT students.FirstName, students.LastName,injuries.Name, injury_report.Description, injury_report.Date from injury_report
              join students on students.ID = injury_report.studentID
              join injuries on injuries.injuriesID = injury_report.InjuryID
              where injury_report.sportID = $sport";

              $result = mysqli_query($link,$sql);
              while ($row=mysqli_fetch_array($result))
                {
                echo"<tr>
                    <td>".$row['FirstName']."</td>
                    <td>".$row['LastName']."</td>
                    <td>".$row['Name']."</td>
                    <td>".$row['Description']."</td>
                    <td>".$row['Date']."</td>
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
