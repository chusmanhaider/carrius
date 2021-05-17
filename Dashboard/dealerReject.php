<?php
	require_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["dealer_id"]))  
	{  
        $d_id = $_POST['dealer_id'];
        $re_status="Rejected";
		$sql="UPDATE dealer SET dealer_Status='$re_status' WHERE dealer_ID='$d_id'";  
		if(mysqli_query($connect,$sql)) 
        {
            header('location: Manage Dealers.php?msgActive=Success');
        } 
        else 
        {
            header('location: Manage Dealers.php?msgActiveError=Error');			
        } 
	}
?>

