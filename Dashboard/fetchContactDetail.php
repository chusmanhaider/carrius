<?php
	require_once '../db_connect.php';
	//error_reporting(0);
	if(isset($_POST['contact_id']))
	{
		$c_id=$_POST["contact_id"];
		
        $qw="SELECT * FROM contactus INNER JOIN contactus_reply ON 
		contactus_reply.contactusId=contactus.contact_ID Where contactus.contact_reply_flag = '0'";
                                                    

		$result = mysqli_query($connect, $qw);  
		$row = mysqli_fetch_array($result);

		echo json_encode($row);
	}
?>