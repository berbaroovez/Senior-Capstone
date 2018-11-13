<?php
$link = mysqli_connect("localhost", "lorasAdmin", "lorasATR2018", "atr");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


$FirstName = mysqli_real_escape_string($link, $_POST['FirstName']);
$LastName = mysqli_real_escape_string($link, $_POST['LastName']);
$ID = mysqli_real_escape_string($link, $_POST['ID']);

$sql = "INSERT INTO students (FirstName, LastName, username, sportID) VALUES ('$FirstName', '$LastName','$ID',1)";

if(mysqli_query($link, $sql))
{
  echo "Record Added";
}
else {
  echo "Error: " . $sql."".mysqli_error($link);
}

mysqli_close($link);
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$ID = isset($_POST['ID']) ? $_POST['ID'] : false;

$connect = mysql_connect('fdb13.biz.nf:3306', '1858208_inhabit', '12345demien12345');
mysql_select_db ('1858208_inhabit');
$sql = "SELECT `Name`, `Surname`, `DOB`, `RPS`, `Address` FROM `citizens` WHERE ID = $ID";
$res = mysql_query($sql);
if ($ID > 0) {
    echo "<p><b>Citizen Identification number is</b>  </p>";

    while($row = mysql_fetch_array($res))
    echo "<br><p><b>Surname:  </b></b></b>", $row['Surname'], "</p>";
    echo "<br><p><b>First Name:  </b></b>", $row['Name'], "</p>";
    echo "<br><p><b>Date of birth:  </b></b></b></b>", $row['DOB'], "</p>";
    echo "<br><p><b>Address:  </b></b></b></b></b>", $row['Address'], "</p>";
    echo "<br><p><b>Background information:  </b><br>", $row['RPS'], "</p>";

mysql_close ($connect);
}
    else {
      echo "<p>Enter a citizen ID above</p>";
    }
}
?>
