<?php
	require_once '../db_connect.php';
	error_reporting(0);
    $userProfile=$_SESSION['loggedInUser'];
    
    $query="Select * from admin where admin_username='$userProfile'";
    $data=mysqli_query($connect,$query);
    $result=mysqli_fetch_assoc($data);
    $Id=$result['admin_ID'];
    $Name=$result['admin_Name'];
    $adUser=$result['admin_username'];

	if(isset($_POST["car_id"]))  
	{  
        $c_id = $_POST['car_id'];
        $re_status="Active";
		$sql="UPDATE cars SET car_AutoStatus='$re_status' WHERE car_ID='$c_id'";  
		if(mysqli_query($connect,$sql)) 
        {
            if($c_id!="")
            {
                $q="Select * from cars car_ID='$c_id'";
                $qw=mysqli_query($connect, $q);
                $v=mysqli_fetch_assoc($qw);
                $car_Dealer_id=$v['DealerId'];
                //$user_id=mysqli_real_escape_string($connect, $_POST['user_id']);
                $today = date("F j, Y, g:i A"); 
                $notifyTitle="Car Approved";
                $notifyDesc="Your car ".$carName. " has been approved by Admin at ".$today;

                $notifications_status="Available";
                $notification_status="Unseen";
                $sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
                if(mysqli_query($connect, $sql_notify))
                {
                    $notify_last_id=mysqli_insert_id($connect);
                    $sql_notify_by_admin="INSERT INTO notify_byadmin (notifyByAdmin_adminId, notificationsId) VALUES ('$Id', '$notify_last_id')";
                    if(mysqli_query($connect,$sql_notify_by_admin))
                    {
                        $notifybyadmin_last_id = mysqli_insert_id($connect);
                        $sql_notify_seen="INSERT INTO notifications_seen (notifySeen_Status, notifySeen_DealerId, notifySeen_NotificationId, notifyByAdminId) VALUES ('$notification_status', '$car_Dealer_id', '$notify_last_id', '$notifybyadmin_last_id')";
                        if(mysqli_query($connect,$sql_notify_seen))
                        {
                            header('location: Cars.php?msgAvailable=Success');
                        }
                        else
                            header('location: Cars.php?msgError=UnableToAdd');
                            
                    }
                        else
                            header('location: Cars.php?msgOther=ErrorWhileAddingNotificationBy');
                }
                else
                    header('location: Cars.php?msgOther=ErrorWhileAddingNotification');
            }
            else
                header('location: Cars.php?msgOther=ErrorWhileAdding');
        }
            //header('location: Cars.php?msgAvailable=Success');
        
        else 
        {
            header('location: Cars.php?msgRejected=Error');			
        } 
	}
?>

