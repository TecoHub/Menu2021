<?php 
$mdbhost = "localhost";
$mdbname = "MenuNagisa";
$mdbuser = "MenuNagisa";
$mdbpass = "MenuNagisa";

$conn=mysqli_connect($mdbhost, $mdbname,$mdbuser,$mdbpass);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: <br>" . $conn->connect_error);
}

//echo "Connected successfully to the database <b> MenuNagisa</b> <br>";

mysqli_query($conn, "SET NAMES 'UTF8'") or die("ERROR: ". mysqli_error($con));


?>