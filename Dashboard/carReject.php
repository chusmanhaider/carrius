<?php
	require_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["car_id"]))  
	{  
        $c_id = $_POST['car_id'];
        $re_status="Rejected";
		$sql="UPDATE cars SET car_Status='$re_status', car_AutoStatus='$re_status' WHERE car_ID='$c_id'";  
		if(mysqli_query($connect,$sql)) 
        {
            header('location: Cars.php?msgReject=Success');
        } 
        else 
        {
            header('location: Cars.php?msgRejectError=Error');			
        } 
	}
?>

