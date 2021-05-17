<?php
	include_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["dealer_id"]))  
	 {  $dealer_id=$_POST["dealer_id"];
		//$sql = "SELECT * from dealer WHERE dealer_ID = '".$_POST["dealer_id"]."'";
		$sql="SELECT* FROM dealer WHERE dealer_Status='Active' AND dealer_ID = {$dealer_id}"; 
		  $result = mysqli_query($connect, $sql);  
		  $row = mysqli_fetch_array($result);  
		  echo json_encode($row);  
	 }
?>