<?php

include("config.php");
session_start();
$link = mysqli_connect("localhost", "lorasAdmin", "lorasATR2018", "atr");

$sport = $_POST['injury_by_sport'];
$startDate = $_POST['StartDate'];
$endDate= $_POST['EndDate'];
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta hhtp-equiv="X-UA-Compatible" content="IE-Edge">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Injury by date</title>
  </head>
  <body style="background:#D1B888 !important">
    <div style="background:transparent !important" class ="jumbotron text-center">
      <div class ="container">
        <h1 class="display-3">injuries between certain date</h1>
      </div>
    </div>
  <!-- Put your stuff here -->

  <div class="container">
    <div class="row">
      <div class ="col">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Injury</th>
              <th>Description</th>
              <th>Date</th>
              <th>Sport</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $sql = "SELECT students.FirstName, students.LastName, injuries.Name, injury_report.Description,injury_report.Date, sports.Name
            from injury_report join students on injury_report.studentID = students.ID
            join sports on injury_report.sportID = sports.sportsID
            join injuries on injury_report.InjuryID = injuries.injuriesID
            where injury_report.Date between '$startDate' and '$endDate'
            and  injury_report.sportID = $sport";

            $result = mysqli_query($link,$sql);
            while ($row=mysqli_fetch_array($result))
              {
                echo"<tr>
                      <td>".$row['FirstName']."</td>
                      <td>".$row['LastName']."</td>
                      <td>".$row[2]."</td>
                      <td>".$row['Description']."</td>
                      <td>".$row['Date']."</td>
                      <td>".$row['Name']."</td>
                      </tr>
                   ";
              }

             ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>


  </body>

  </html>
