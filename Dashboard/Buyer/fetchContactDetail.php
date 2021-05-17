<?php
	require_once '../../db_connect.php';
	error_reporting(0);
    if(isset($_POST["dealer_id"]))  
	{  
		$dealer_id=$_POST['dealer_id'];
		$sql_t = "SELECT * FROM dealer WHERE dealer_ID='$dealer_id' AND dealer_Status='Active'"; 
		$res = mysqli_query($connect, $sql_t);  
		$rw = mysqli_fetch_array($res);  
		echo json_encode($rw);  
	}

?>