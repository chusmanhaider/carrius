<?php  
require_once '../db_connect.php';
//error_reporting(0);
if(!empty($_POST))  
{
	$buyer_Id=mysqli_real_escape_string($connect, $_POST['buyer_id']);
    $admin_Id=mysqli_real_escape_string($connect, $_POST['admin_id']);

	$d_firstName = mysqli_real_escape_string($connect, $_POST['upfirstName']);
	$firstName = trim(preg_replace('/\s+/', ' ', $d_firstName));
	
    $d_lastName = mysqli_real_escape_string($connect, $_POST['uplastName']);
	$lastName = trim(preg_replace('/\s+/', ' ', $d_lastName));
	
	$phoneNumber = $_POST['upphoneNumber'];
	$updatedBy = "Admin";

	$status = mysqli_real_escape_string($connect, $_POST['upbuyerStatus']);
    $email = mysqli_real_escape_string($connect, $_POST['upemail']);
	
	$address = mysqli_real_escape_string($connect, $_POST['upaddress']);
	$city = mysqli_real_escape_string($connect, $_POST['upcity']);
    $country = mysqli_real_escape_string($connect, $_POST['upcountry']);
    $d_comment = mysqli_real_escape_string($connect, $_POST['upcomment']);
	$comment = trim(preg_replace('/\s+/', ' ', $d_comment));


    $notifyTitle="Profile Updated";
    $notifyDesc="Your Profile is updated by Admin";
    $notifications_status="Available";

    //$user_id=$_POST['user_id'];

    $notification_status="Unseen";

	if($_POST["buyer_id"] != '')
	{		
            $sql = "  
			UPDATE buyer 
			SET buyer_FName='$firstName',
			buyer_LName='$lastName',
			buyer_Address='$address',
			buyer_City='$city',
            buyer_Country='$country',
			buyer_Email='$email',
            buyer_CellNumber='$phoneNumber',
			buyer_Status='$status',
			buyer_UpdatedBy='$updatedBy',
            buyer_Image='$url',
			buyer_Comments='$comment'
			
			
			WHERE buyer_ID='".$_POST["buyer_id"]."'";

			
			
			if(mysqli_query($connect, $sql))  
			{  
				
                $sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
				if(mysqli_query($connect, $sql_notify))
				{
					$notify_last_id=mysqli_insert_id($connect);
					$sql_notify_by_admin="INSERT INTO notify_byadmin (notifyByAdmin_adminId, notificationsId) VALUES ('$admin_Id', '$notify_last_id')";
					if(mysqli_query($connect,$sql_notify_by_admin))
					{
						$notifybyadmin_last_id = mysqli_insert_id($connect);
						$sql_notify_seen="INSERT INTO notifications_seen (notifySeen_Status, notifySeen_DealerId, notifySeen_NotificationId, notifyByAdminId) VALUES ('$notification_status', '$buyer_Id', '$notify_last_id', '$notifybyadmin_last_id')";
						if(mysqli_query($connect,$sql_notify_seen))
						{
							$output .= '<label class="text-success">' . $message . '</label>';
						}
						else
                        $output .= '<label class="text-danger">Error</label>';
						
					}
					else
                    $output .= '<label class="text-danger">Error</label>';
				}
				else
                    $output .= '<label class="text-danger">Error</label>';  
			}
			else
			{
				$output .= '<label class="text-danger">Error</label>';
			}
	}
	else{
		$output .= '<label class="text-danger">Error</label>';  
	}
	;
	echo $output;
}
?>