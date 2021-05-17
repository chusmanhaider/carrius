<?php
	require_once '../db_connect.php';
   
	error_reporting(0);
	if(isset($_POST["buyer_id"]))  
	{  
        $d_id = $_POST['buyer_id'];

        $re_status="Active";
		$sql="UPDATE buyer SET buyer_Status='$re_status' WHERE buyer_ID='$d_id'";

        $notifyTitle="Account Approved";
        $notifyDesc="Congratulations !!! Your account has been approved. Now, enjoy our services.";
        $notifications_status="Available";

		if(mysqli_query($connect, $sql)) 
        {
            header('location: Manage Buyers.php?msgActive=Success');
		
            
        } 
        else 
        {
            header('location: Manage Buyers.php?msgActiveError=Error');			
        } 
	}
?>

