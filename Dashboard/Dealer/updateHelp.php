<?php  
require_once '../db_connect.php';
$message="";
//error_reporting(0);
if(!empty($_POST))  
{
	$contact_Id=mysqli_real_escape_string($connect, $_POST['contactus_Id']);//88

	$title=mysqli_real_escape_string($connect, $_POST['updateRequestTitle']); //7
	$msg=mysqli_real_escape_string($connect, $_POST['updateRequestMsg']);
    $priority=mysqli_real_escape_string($connect, $_POST['updateRequestPriority']);

    $dealer_id=mysqli_real_escape_string($connect, $_POST['user_id']);

    $q="Select * from dealer Where dealer_ID='$dealer_id' AND dealer_Status='Active'";
    $tw=mysqli_query($connect, $q);
    $rr=mysqli_fetch_assoc($tw);
    $dName=$rr['dealer_FName']." ".$rr['dealer_LName'];

    $q_ad="Select * from admin";
    $tw_ad=mysqli_query($connect, $q_ad);
    $rr_ad=mysqli_fetch_assoc($tw_ad);
    $adId=$rr_ad['admin_ID'];

	$notifyTitle_curr="Help Request Updated";
	$notifyDesc_curr="Help Request has been updated by ".$dName;
	$notifications_status_curr="Available";
	$notification_status_curr="Unseen";

	$query = "UPDATE contactus SET 
    contact_topic='$title', 
    contact_message='$msg',
    contactus_priority='$priority' 
    WHERE contact_ID='$contact_Id'";
        if(mysqli_query($connect, $query))
	    {
		//$last_id = mysqli_insert_id($connect);
            if($contact_Id!="")
            {
                $sql_notify_curr= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle_curr','$notifyDesc_curr', '$notifications_status_curr')";
                if(mysqli_query($connect, $sql_notify_curr))
                {
                        $notify_last_id=mysqli_insert_id($connect);
                        $sql_notify_by_admin="INSERT INTO notify_byadmin (notifyByAdmin_adminId, notificationsId) VALUES ('$adId', '$notify_last_id')";
                        if(mysqli_query($connect,$sql_notify_by_admin))
                        {
                            $notifybyadmin_last_id = mysqli_insert_id($connect);
                            $sql_notify_seen_curr="INSERT INTO notifications_seen (notifySeen_Status, notifySeen_DealerId, notifySeen_NotificationId, notifyByAdminId) VALUES ('$notification_status_curr', '$dealer_id', '$notify_last_id', '$notifybyadmin_last_id')";
                            
                            if(mysqli_query($connect,$sql_notify_seen_curr))
                            {
                                header('location: Help.php?msg=Success');
                            }
                            else
                                header('location: Help.php?msgErr=ErrorOne');
                            
                        }
                        else
                        header('location: Help.php?msgErr=ErrorTwo');
                }
                else
                header('location: Help.php?msgErr=ErrorThree');
                
            }
			
	    }
        echo $output;
        
}


?>