<?php  
require_once '../db_connect.php';
$message="";
//error_reporting(0);
if(!empty($_POST))  
{
	$image_Id=mysqli_real_escape_string($connect, $_POST['image_id']);//88
	$newCaption=mysqli_real_escape_string($connect, $_POST['updateCaption']); //7
	$newStatus=mysqli_real_escape_string($connect, $_POST['upCarStatus']);
    $CarId=mysqli_real_escape_string($connect, $_POST['car_id']);
    $admin_id=mysqli_real_escape_string($connect, $_POST['admin_id']);
    $dealer_id=mysqli_real_escape_string($connect, $_POST['dealer_id']);

	
	$admin_id=$_POST['admin_id'];

	$notifyTitle_curr="Image Detail Updated";
	$notifyDesc_curr="Your car image detail has been updated";
	$notifications_status_curr="Available";
	$notification_status_curr="Unseen";

	if($newStatus!='')
    {
        $query = "UPDATE car_gallery SET carGallery_Status='$newStatus', carGallery_Caption='$newCaption' WHERE carGallery_ID='$image_Id'";
        if(mysqli_query($connect, $query))
	    {
		//$last_id = mysqli_insert_id($connect);
            if($image_Id!="")
            {
                $sql_notify_curr= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle_curr','$notifyDesc_curr', '$notifications_status_curr')";
                if(mysqli_query($connect, $sql_notify_curr))
                {
                        $notify_last_id=mysqli_insert_id($connect);
                        $sql_notify_by_admin="INSERT INTO notify_byadmin (notifyByAdmin_adminId, notificationsId) VALUES ('$admin_id', '$notify_last_id')";
                        if(mysqli_query($connect,$sql_notify_by_admin))
                        {
                            $notifybyadmin_last_id = mysqli_insert_id($connect);
                            $sql_notify_seen_curr="INSERT INTO notifications_seen (notifySeen_Status, notifySeen_DealerId, notifySeen_NotificationId, notifyByAdminId) VALUES ('$notification_status_curr', '$dealer_Id', '$notify_last_id', '$notifybyadmin_last_id')";
                            
                            if(mysqli_query($connect,$sql_notify_seen_curr))
                            {
                                $output .= '<label class="text-success">' . $message . '</label>';
                            }
                            else
                                $output .= '<label class="text-danger">' . $message . '</label>';
                            
                        }
                        else
                            $output .= '<label class="text-danger">' . $message . '</label>';
                }
                else
                        $output .= '<label class="text-danger">' . $message . '</label>';
                
            }
			
	    }
    }
    else
    {
        $query = "UPDATE car_gallery SET carGallery_Caption='$newCaption' WHERE carGallery_ID='$image_Id'";
        if(mysqli_query($connect, $query))
	    {
		//$last_id = mysqli_insert_id($connect);
            if($image_Id!="")
            {
                $sql_notify_curr= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle_curr','$notifyDesc_curr', '$notifications_status_curr')";
                if(mysqli_query($connect, $sql_notify_curr))
                {
                        $notify_last_id=mysqli_insert_id($connect);
                        $sql_notify_by_admin="INSERT INTO notify_byadmin (notifyByAdmin_adminId, notificationsId) VALUES ('$admin_id', '$notify_last_id')";
                        if(mysqli_query($connect,$sql_notify_by_admin))
                        {
                            $notifybyadmin_last_id = mysqli_insert_id($connect);
                            $sql_notify_seen_curr="INSERT INTO notifications_seen (notifySeen_Status, notifySeen_DealerId, notifySeen_NotificationId, notifyByAdminId) VALUES ('$notification_status_curr', '$dealer_Id', '$notify_last_id', '$notifybyadmin_last_id')";
                            
                            if(mysqli_query($connect,$sql_notify_seen_curr))
                            {
                                $output .= '<label class="text-success">' . $message . '</label>';
                            }
                            else
                                $output .= '<label class="text-danger">' . $message . '</label>';
                            
                        }
                        else
                            $output .= '<label class="text-danger">' . $message . '</label>';
                }
                else
                        $output .= '<label class="text-danger">' . $message . '</label>';
                
            }
			
	    }
    }
	
	
	echo $output;	

}

?>