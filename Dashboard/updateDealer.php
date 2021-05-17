<?php  
require_once '../db_connect.php';
//error_reporting(0);
if(!empty($_POST))  
{
	$dealer_Id=mysqli_real_escape_string($connect, $_POST['dealer_id']);

	$d_firstName = mysqli_real_escape_string($connect, $_POST['upfirstName']);
	$firstName = trim(preg_replace('/\s+/', ' ', $d_firstName));
	
    $d_lastName = mysqli_real_escape_string($connect, $_POST['uplastName']);
	$lastName = trim(preg_replace('/\s+/', ' ', $d_lastName));
	
	$phoneNumber = $_POST['upphoneNumber'];
	
	$status = mysqli_real_escape_string($connect, $_POST['upcarStatus']);
	
	$dGroup = mysqli_real_escape_string($connect, $_POST['updealershipGroup']);
	$dLoc = mysqli_real_escape_string($connect, $_POST['updealershipLoc']);
    $dShips = mysqli_real_escape_string($connect, $_POST['updealerships']);
	$sAgents = mysqli_real_escape_string($connect, $_POST['upsalespeopleAgent']);
    $cStock = mysqli_real_escape_string($connect, $_POST['upcarStock']);
	$dType = mysqli_real_escape_string($connect, $_POST['updealershipType']);
	
	
	$email = mysqli_real_escape_string($connect, $_POST['upemail']);

    $today=mysqli_real_escape_string($connect, $_POST['uptoDay']);
	$fromDay=mysqli_real_escape_string($connect, $_POST['upfromDay']);
	$today_time=mysqli_real_escape_string($connect, $_POST['uptoTime']);
	$fromDay_time=mysqli_real_escape_string($connect, $_POST['upfromTime']);

    $d_comment = mysqli_real_escape_string($connect, $_POST['upcomment']);
	$comment = trim(preg_replace('/\s+/', ' ', $d_comment));

    $notifyTitle="Profile Updated";
    $notifyDesc="Your Profile is updated by Admin";
    $notifications_status="Available";

    $user_id=$_POST['user_id'];

    $notification_status="Unseen";

	if($_POST["dealer_id"] != '')
	{		
            $sql = "  
			UPDATE dealer 
			SET dealer_FName='$firstName',
			dealer_LName='$lastName',
			dealer_Dealership='$dGroup',
			dealer_Location='$dLoc',
			dealer_CellNumber='$phoneNumber',
			dealer_DealerNum='$dShips',
			dealer_Email='$email',
			dealer_Status='$status',
			dealer_Type='$dType',
			dealer_NumCarStock='$cStock',
			dealer_WorkFromDay='$fromDay',
            dealer_WorkToDay='$today',
			dealer_WorkFromTime='$fromDay_time',
            dealer_WorkToTime='$today_time',
			dealer_NumAgent='$sAgents',
            dealer_Comments='$comment'
			
			WHERE dealer_ID='".$_POST["dealer_id"]."'";

			
			
			if(mysqli_query($connect, $sql))  
			{  
				
                $sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
				if(mysqli_query($connect, $sql_notify))
				{
					$notify_last_id=mysqli_insert_id($connect);
					$sql_notify_by_admin="INSERT INTO notify_byadmin (notifyByAdmin_adminId, notificationsId) VALUES ('$user_id', '$notify_last_id')";
					if(mysqli_query($connect,$sql_notify_by_admin))
					{
						$notifybyadmin_last_id = mysqli_insert_id($connect);
						$sql_notify_seen="INSERT INTO notifications_seen (notifySeen_Status, notifySeen_DealerId, notifySeen_NotificationId, notifyByAdminId) VALUES ('$notification_status', '$dealer_Id', '$notify_last_id', '$notifybyadmin_last_id')";
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