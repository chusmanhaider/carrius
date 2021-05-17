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

	
	//$admin_id=$_POST['admin_id'];

    $q="Select * from cars Inner Join cars_brand ON cars.CarBrandId=cars_brand.carBrand_ID Where cars.car_ID='$CarId' AND cars_brand.carBrand_Status='Available'";
    $tw=mysqli_query($connect, $q);
    $rr=mysqli_fetch_assoc($tw);
    $carBrand=$rr['carBrand_Name'];
    $carName=$rr['car_Name'];
    $carAutoStatus=$rr['car_AutoStatus'];


	$notifyTitle_curr="Image Detail Updated";
	$notifyDesc_curr="Image detail for car ".$carName." by brand '".$carBrand."' has been updated";
	$notifications_status_curr="Available";
	$notification_status_curr="Unseen";

	$query = "UPDATE car_gallery SET carGallery_Status='$newStatus', carGallery_Caption='$newCaption' WHERE carGallery_ID='$image_Id'";
    if(mysqli_query($connect, $query))
	{
	//$last_id = mysqli_insert_id($connect);
        $auto_status = "Pending";
        $sql_status_update="UPDATE cars SET car_AutoStatus = '$auto_status' WHERE car_ID = '$CarId'";
        if(mysqli_query($connect, $sql_status_update))
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
                        header('location: CompleteImageGallery.php?url='.$CarId.'&Success');
                    }
                    else
                        header('location: CompleteImageGallery.php?url='.$CarId.'&Error');
                                
                }
                else
                    header('location: CompleteImageGallery.php?url='.$CarId.'&Error');
            }
            else
                header('location: CompleteImageGallery.php?url='.$CarId.'&Error');
        }
        
    }
    echo $output;   
}


?>