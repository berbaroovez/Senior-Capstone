<?php

$connect = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
        if ( mysqli_connect_errno() ) {
           die( mysqli_connect_error() );
         }

 ?>


<html>

<body>
  <?php
$getNames = "select * from TestTable";

$result = $connect->query($getNames);

while($row = $result->fetch_assoc())
{
  echo"".$row[name]."";
}

   ?>

</body>
</html>
