<?php 	
require_once '../db_connect.php'; 
$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{	
	$get_CarId=$_POST['getCarId'];
    //$get_CarId=36;
    $filename = explode('.', $_FILES['file']['name']);
	$filename = $filename[count($filename)-1];
	$location = '../Uploads/'.uniqid(rand()).'.'.$filename;
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);
	$valid_extensions = array("jpg","jpeg","png");
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
		
		if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
			$url_one = $location;
		}
	}
	$capt = mysqli_real_escape_string($connect, $_POST['caption']);
	$caption = trim(preg_replace('/\s+/', ' ', $capt));
	$status	= "Available";

	$sq="Select * from cars Inner Join dealer on dealer.dealer_ID=cars.DealerId Where cars.car_ID = '$get_CarId'";
	$m=mysqli_query($connect, $sq);
	$r=mysqli_fetch_assoc($m);
	$user_id=$r['dealer_ID'];
	$dealership=$r['dealer_Dealership'];
	$dealerLoc=$r['dealer_Location'];
	$carName=$r['car_Name'];

	$notifyTitle="Car Image Gallery";
	$notifyDesc="A new image for ".$carName." car has been updated by ".$dealership." , ".$dealerLoc. " himself";
	$notifications_status="Available";
	$notification_status="Unseen";

	$s_quer="Select * from admin";
	$re=mysqli_query($connect,$s_quer);
	$v=mysqli_fetch_assoc($re);
	$admin_Id=$v['admin_ID'];
	
	$sql = "INSERT INTO car_gallery (carGallery_Status, carGallery_Image, carGallery_Caption, CarId) 
    VALUES ('$status', '$url_one', '$caption', '$get_CarId')";

	if(mysqli_query($connect,$sql)) 
	{
        $sql_update="UPDATE cars SET car_AutoStatus='Pending' Where car_ID='$get_CarId'";
		if(mysqli_query($connect, $sql_update))
		{
			$sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
			if(mysqli_query($connect, $sql_notify))
			{
				$notify_last_id=mysqli_insert_id($connect);
				$sql_notify_by_admin="INSERT INTO notify_bydealer (notifyByDealer_dealerId, notificationsId) VALUES ('$user_id', '$notify_last_id')";
				if(mysqli_query($connect,$sql_notify_by_admin))
				{
					header('location: CompleteImageGallery.php?url='.$get_CarId.'&Success');
				}
			}
			else
			{
				header('location: CompleteImageGallery.php?url='.$get_CarId.'&Error1');	
			}
		}
		else
		{
			header('location: CompleteImageGallery.php?url='.$get_CarId.'&Error2');
		}
		
	} 
	else 
	{
		header('location: CompleteImageGallery.php?url='.$get_CarId.'&Error3');			
	}
}
?>

