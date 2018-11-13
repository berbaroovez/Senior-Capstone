<?php require_once('config.php');?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="http://stpaul.loras.edu/~co533040/Spankytunes/main.css" />
<head>
  <ul>
    <li><a href="http://stpaul.loras.edu/~co533040/Spankytunes/index.html">Home</a></li>
    <li><a href="http://stpaul.loras.edu/~co533040/Spankytunes/genrePage.php">Genre</a></li>
    <li><a href="http://stpaul.loras.edu/~co533040/Spankytunes/userSignUp.php">Signup</a></li>
    <li><a href="http://stpaul.loras.edu/~co533040/Spankytunes/login.php">Login</a></li>
    <li><a href="http://stpaul.loras.edu/~co533040/Spankytunes/home.php">UserPage</a></li>
  </ul>
</head>
<body>
<h1 class="mainh1">Hip-Hop Page</h1>
<table>
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
<?php

  $connect = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
          if ( mysqli_connect_errno() ) {
             die( mysqli_connect_error() );
           }
   $sql = "select * from SongTable where genreID = 1";
   $result = $connect->query($sql);

   if($result->num_rows>0)
   {

     while($row = $result->fetch_assoc()) {


          echo "<a href='".$row[songLink]."'>".$row[songName]."</tr>";
          echo "<br>";
        }
    } else {
        echo "You have no songs!";
    }
    mysqli_close($connect);
?>

</table>
</body>
</html>
