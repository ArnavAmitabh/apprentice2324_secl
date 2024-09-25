<?php
// Assuming you have a database connection established
$hostName = "localhost";
$userName = "root";
$password = "";
//$password = "2024Appren@tice";
$databaseName = "apprentice";
$conn = mysqli_connect($hostName, $userName, $password,$databaseName);
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}

?>