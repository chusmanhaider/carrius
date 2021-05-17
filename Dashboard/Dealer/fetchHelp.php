<?php
	require_once '../../db_connect.php';
	error_reporting(0);
    if(isset($_POST["help_id"]))  
	{  
		$help_Id=$_POST['help_id'];
		$sql_t = "SELECT * FROM contactus 
		INNER JOIN contactus_reply ON contactus.contact_ID = contactus_reply.contactusId
		WHERE contactus.contact_ID='$help_Id' AND contactus.contact_Status!='Deleted'";  
		$res = mysqli_query($connect, $sql_t);  
		$rw = mysqli_fetch_array($res);  
		echo json_encode($rw);  
	}

?>