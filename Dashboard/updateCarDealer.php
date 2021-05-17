<?php  
require_once '../db_connect.php';
$message="";
//error_reporting(0);
if(!empty($_POST))  
{
	$car_Id=mysqli_real_escape_string($connect, $_POST['car_id']);//88
	$dealer_Id=mysqli_real_escape_string($connect, $_POST['currentDealerId']); //7
	$select_dealer_id=mysqli_real_escape_string($connect, $_POST['newDealerId']);

	$carUpdatedBy="Admin";

	$query = "UPDATE cars SET car_UpdatedBy='$carUpdatedBy', DealerId='$select_dealer_id' WHERE car_ID='$car_Id'";

	$admin_id=$_POST['admin_id'];

	$q="Select * from cars INNER JOIN cars_brand ON cars_brand.carBrand_ID=cars.CarBrandId where cars.car_ID='$car_Id' AND cars.car_Status!='Terminated'";
	$r=mysqli_query($connect,$q);
	$var=mysqli_fetch_assoc($r);
	$today = date("F j, Y, g:i A"); 
	$carName=$var['car_Name'];

	$notifyTitle_curr="Car Dealership Removed";
	$notifyDesc_curr=$carName." By ".$var['carBrand_Name']." has been removed for you by ".$carUpdatedBy." at ".$today;
	$notifications_status_curr="Available";
	$notification_status_curr="Unseen";

	$notifyTitle_new="Car Dealership Updated";
	$notifyDesc_new=$carName." By ".$var['carBrand_Name']." has been updated for you by ".$carUpdatedBy." at ".$today;
	$notifications_status_new="Available";
	$notification_status_new="Unseen";

	
	
	if(mysqli_query($connect, $query))
	{
		//$last_id = mysqli_insert_id($connect);
		if($car_Id!="")
		{
			$sql_notify_curr= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle_curr','$notifyDesc_curr', '$notifications_status_curr')";
			$sql_notify_new= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle_new','$notifyDesc_new', '$notifications_status_new')";
			if(mysqli_query($connect, $sql_notify_curr) && mysqli_query($connect, $sql_notify_new))
			{
					$notify_last_id=mysqli_insert_id($connect);
					$sql_notify_by_admin="INSERT INTO notify_byadmin (notifyByAdmin_adminId, notificationsId) VALUES ('$admin_id', '$notify_last_id')";
					if(mysqli_query($connect,$sql_notify_by_admin))
					{
						$notifybyadmin_last_id = mysqli_insert_id($connect);
						$sql_notify_seen_curr="INSERT INTO notifications_seen (notifySeen_Status, notifySeen_DealerId, notifySeen_NotificationId, notifyByAdminId) VALUES ('$notification_status_curr', '$dealer_Id', '$notify_last_id', '$notifybyadmin_last_id')";
						$sql_notify_seen_new="INSERT INTO notifications_seen (notifySeen_Status, notifySeen_DealerId, notifySeen_NotificationId, notifyByAdminId) VALUES ('$notification_status_new', '$select_dealer_id', '$notify_last_id', '$notifybyadmin_last_id')";
						
						if(mysqli_query($connect,$sql_notify_seen_curr) && mysqli_query($connect,$sql_notify_seen_new))
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
	
	echo $output;	

}

?>