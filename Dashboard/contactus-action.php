<?php
	require_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["contact_id"]))  
	{  
        $c_id = mysqli_real_escape_string($connect, $_POST['contact_id']);
        $sql="UPDATE contactus SET contact_reply_flag='-1' WHERE contact_ID='$c_id'";  
		if(mysqli_query($connect, $sql)) 
        {
            header('location: ContactReply.php?msgReject=Success');
        } 
        else 
        {
            header('location: ContactReply.php?msgRejectError=Error');			
        } 
	}
?>

