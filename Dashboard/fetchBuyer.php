<?php
	include_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["buyer_id"]))  
	 {  $buyer_id=$_POST["buyer_id"];
		$sql="SELECT* FROM buyer WHERE buyer_Status!='Terminated' AND buyer_ID = {$buyer_id}"; 
		$result = mysqli_query($connect, $sql);  
		$row = mysqli_fetch_array($result);  
		echo json_encode($row);  
	 }
?>