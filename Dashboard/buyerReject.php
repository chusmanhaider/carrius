<?php
	require_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["buyer_id"]))  
	{  
        $c_id = $_POST['buyer_id'];
        $re_status="Rejected";
		$sql="UPDATE buyer SET buyer_Status='$re_status' WHERE buyer_ID='$c_id'";  
		if(mysqli_query($connect,$sql)) 
        {
            header('location: Manage Buyers.php?msgReject=Success');
        } 
        else 
        {
            header('location: Manage Buyers.php?msgRejectError=Error');			
        } 
	}
?>

