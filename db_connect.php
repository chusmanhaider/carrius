<?php 	
$conn_host = "localhost";
$user = "root";
$pass = "";
$dbname = "carrius";

$connect = new mysqli($conn_host, $user, $pass, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>