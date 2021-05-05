<?php
require_once '../db_connect.php';
if(!empty($_POST)) 
{
    $uname=mysqli_real_escape_string($connect, $_POST['yourname']);
    $umail=mysqli_real_escape_string($connect, $_POST['cu_email']);
    $uship=mysqli_real_escape_string($connect, $_POST['cu_dealership']);
    $utopic=mysqli_real_escape_string($connect, $_POST['cu_topic']);
    $umsg=mysqli_real_escape_string($connect, $_POST['cu_message']);	
    $uphone=mysqli_real_escape_string($connect, $_POST['cu_phone']);
    $replyBy='Other Dealers';
    $sql_query="Insert into contactus (contact_name,contact_email,contact_phone,contact_dealership,contact_topic,contact_message,contact_ContactFrom) 
    values ('$uname','$umail','$uphone','$uship','$utopic','$umsg','$replyBy')";

    $today = date("F j, Y, g:i A"); 
    $notifyTitle="Contact You";
    $notifyDesc=$uship." contacted you via contact page at ".$today;
    $notifications_status="Available";

    $q="Select * from admin";
    $r=mysqli_query($connect, $q);
    $j=mysqli_fetch_assoc($r);
    $user_id=$j['admin_ID'];

    if(mysqli_query($connect,$sql_query))
    {
		$contactus=mysqli_insert_id($connect);
		$sql_contactusreply="INSERT INTO contactus_reply (contactusId) VALUES ('$contactus')";
		if(mysqli_query($connect, $sql_contactusreply))
		{
			$sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
			if(mysqli_query($connect, $sql_notify))
			{
				$notify_last_id=mysqli_insert_id($connect);
				$sql_notify_by_admin="INSERT INTO notify_byadmin (notifyByAdmin_adminId, notificationsId) VALUES ('$user_id', '$notify_last_id')";
				if(mysqli_query($connect,$sql_notify_by_admin))
				{
					header('location: ../contact-us.php?msgContact=runA');
							
				}
				else
					header('location: ../contact-us.php?msgNotContactA=error');
			}
			else
				header('location: ../contact-us.php?msgNotContactB=error');
		}
        else{
			header('location: ../contact-us.php?msgNotContactC=error');
		}
        
    }
    else{
        header('location: ../contact-us.php?msgNotContactC=error');
    }
}

?>