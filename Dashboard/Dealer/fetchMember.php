<?php
	require_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["ad_update_id"]))  
	{  
		$sql_t = "SELECT * FROM administration_dept 
		where adDept_ID = '".$_POST["ad_update_id"]."'";  
		$res = mysqli_query($connect, $sql_t);  
		$rw = mysqli_fetch_array($res);  
		echo json_encode($rw);  
	}
	else if(isset($_POST["finance_update_id"]))  
	{  
		$sql_f = "SELECT * FROM finance_dept 
		where finDept_ID = '".$_POST["finance_update_id"]."'";  
		$res_f = mysqli_query($connect, $sql_f);  
		$row = mysqli_fetch_array($res_f);  
		echo json_encode($row);  
	}
	else if(isset($_POST["sales_update_id"]))  
	{  
		$sql_s = "SELECT * FROM sales_dept 
		where sales_ID = '".$_POST["sales_update_id"]."'";  
		$res_s = mysqli_query($connect, $sql_s);  
		$rows = mysqli_fetch_array($res_s);  
		echo json_encode($rows);  
	}
 ?>
