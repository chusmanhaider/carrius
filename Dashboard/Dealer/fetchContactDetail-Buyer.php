<?php
	require_once '../../db_connect.php';
	error_reporting(0);
    if(isset($_POST["buyer_id"]))  
	{  
		$buyer_id=$_POST['buyer_id'];
		$sql_t = "SELECT * FROM buyer WHERE buyer_ID='$buyer_id' AND buyer_Status='Active'"; 
		$res = mysqli_query($connect, $sql_t);  
		$rw = mysqli_fetch_array($res);  
		echo json_encode($rw);  
	}

?>