<?php
	require_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["carBrand_ID"]))  
	 {  
		  $query = "SELECT * from cars_brand WHERE carBrand_ID = '".$_POST["carBrand_ID"]."'";  
		  $result = mysqli_query($connect, $query);  
		  $row = mysqli_fetch_array($result);  
		  echo json_encode($row);  
	 }

	 if(isset($_POST["dealer_id"]))  
	 {  
		  $que = "SELECT * from dealer WHERE dealer_ID = '".$_POST["dealer_id"]."'";  
		  $res = mysqli_query($connect, $que);  
		  $rw = mysqli_fetch_array($res);  
		  echo json_encode($rw);  
	 }
?>
