<?php
	require_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["car_image_id"]))  
	{  
        $get_CarId=$_POST["car_image_id"];
        $sq="Select * from cars Inner Join dealer on dealer.dealer_ID=cars.DealerId Where cars.car_ID = '$get_CarId'";
        $m=mysqli_query($connect, $sq);
        $r=mysqli_fetch_assoc($m);
        $user_id=$r['dealer_ID'];
        $dealership=$r['dealer_Dealership'];
        $dealerLoc=$r['dealer_Location'];
        $carName=$r['car_Name'];

        $notifyTitle="Car Image Archived";
        $notifyDesc="An image for ".$carName." car has been archived by ".$dealership." , ".$dealerLoc. " himself";
        $notifications_status="Available";
        $notification_status="Unseen";

        $s_quer="Select * from admin";
        $re=mysqli_query($connect,$s_quer);
        $v=mysqli_fetch_assoc($re);
        $admin_Id=$v['admin_ID'];

        $c_id = $_POST['car_image_id'];
        $re_status="Archived";
		$sql="UPDATE car_gallery SET carGallery_Status='$re_status' WHERE carGallery_ID='$c_id'";  
		if(mysqli_query($connect,$sql)) 
        {
            $sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
			if(mysqli_query($connect, $sql_notify))
			{
				$notify_last_id=mysqli_insert_id($connect);
				$sql_notify_by_admin="INSERT INTO notify_bydealer (notifyByDealer_dealerId, notificationsId) VALUES ('$user_id', '$notify_last_id')";
				if(mysqli_query($connect,$sql_notify_by_admin))
				{
					header('location: CompleteImageGallery.php?url='.$c_id.'&Success');
				}
			}
			else
			{
				header('location: CompleteImageGallery.php?url='.$c_id.'&Error1');	
			}
            
        } 
        else 
        {
            header('location: CompleteImageGallery.php?url='.$c_id.'&Error');			
        } 
	}
?>

