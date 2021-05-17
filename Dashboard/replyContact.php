<?php  
require_once '../db_connect.php';
//error_reporting(0);
if(!empty($_POST))  
{
	$contact_Id=mysqli_real_escape_string($connect, $_POST['contact_id']);
    $admin_Id=mysqli_real_escape_string($connect, $_POST['admin_id']);

	$d_reply = mysqli_real_escape_string($connect, $_POST['replyTo']);
	$reply = trim(preg_replace('/\s+/', ' ', $d_reply));
	
   
	$updatedBy = "Admin";

    $notifyTitle="Query Replied";
    $notifyDesc="Your query has been replied by Admin";
    $notifications_status="Available";

    //$user_id=$_POST['user_id'];

    $notification_status="Unseen";

	if($_POST["contact_id"] != '')
	{		
        $sql = "UPDATE contactus_reply SET contactreply_detail='$reply' WHERE contactusId='".$_POST["contact_id"]."'";

		if(mysqli_query($connect, $sql))  
		{  
				
            $sq="Update contactus SET contact_reply_flag='1' WHERE contact_ID='$contact_Id'";
            if(mysqli_query($connect, $sq))
            {
                $sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
				if(mysqli_query($connect, $sql_notify))
				{
					$notify_last_id=mysqli_insert_id($connect);
					$sql_notify_by_admin="INSERT INTO notify_byadmin (notifyByAdmin_adminId, notificationsId) VALUES ('$admin_Id', '$notify_last_id')";
					if(mysqli_query($connect,$sql_notify_by_admin))
					{
						$output .= '<label class="text-success">' . $message . '</label>';
						
					}
					else
                    $output .= '<label class="text-danger">Error</label>';
				}
				else
                    $output .= '<label class="text-danger">Error</label>';
            }  
		}
		else
		{
			$output .= '<label class="text-danger">Error</label>';
		}
	}
	else
    {
		$output .= '<label class="text-danger">Error</label>';  
	}
	;
	echo $output;
}
?>