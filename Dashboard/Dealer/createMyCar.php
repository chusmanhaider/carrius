<?php 	
require_once '../../db_connect.php'; 
$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{	
    $user_id=$_POST['user_id'];
	$get_user_detail="SELECT * FROM dealer WHERE dealer_ID='$user_id'";
	$que=mysqli_query($connect,$get_user_detail);
	$arr=mysqli_fetch_assoc($que);
	$dealership=$arr['dealer_Dealership'];
	$dealer_location=$arr['dealer_Location'];

	// Basic Information
	$cate = $_POST['carName'];
	$carName = trim(preg_replace('/\s+/', ' ', $cate));
	$carStatus	= $_POST['carStatus'];
	$year	= $_POST['year'];
	$car_Cond=$_POST['carCondition'];
	$car_Mileage=$_POST['carMileage'];
	//$car_Dealer=$_POST['carDealer'];
	//$car_Location=$_POST['carLoc'];
	$car_Price=$_POST['carPrice'];
	$car_NewUsed=$car_Cond;
	$car_isElectric	=$_POST['isElectric'];
	$carBrand_Id	= $_POST['selectedCarBrand'];

	//First Image
	$filename = explode('.', $_FILES['fileOne']['name']);
	$filename = $filename[count($filename)-1];
	$location = '../Uploads/'.uniqid(rand()).'.'.$filename;
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);
	$valid_extensions = array("jpg","jpeg","png");
	//$url=0;
	//Check file extension 
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
		
		if(move_uploaded_file($_FILES['fileOne']['tmp_name'],$location)){
			$url_one = $location;
		}
	}

	//Second Image
	$filename_two = explode('.', $_FILES['fileTwo']['name']);
	$filename_two = $filename_two[count($filename_two)-1];
	$location_two = '../Uploads/'.uniqid(rand()).'.'.$filename_two;
	$imageFileType_two = pathinfo($location_two,PATHINFO_EXTENSION);
	$imageFileType_two = strtolower($imageFileType_two);
	$valid_extensions = array("jpg","jpeg","png");
	$url=0;
	//Check file extension 
	if(in_array(strtolower($imageFileType_two), $valid_extensions)) {
		
		if(move_uploaded_file($_FILES['fileTwo']['tmp_name'],$location_two)){
			$url_two = $location_two;
		}
	}

	//Third Image
	$filename_Three = explode('.', $_FILES['fileThree']['name']);
	$filename_Three = $filename_Three[count($filename_Three)-1];
	$location_Three = '../Uploads/'.uniqid(rand()).'.'.$filename_Three;
	$imageFileType_Three = pathinfo($location_Three,PATHINFO_EXTENSION);
	$imageFileType_Three = strtolower($imageFileType_Three);
	$valid_extensions = array("jpg","jpeg","png");
	$url=0;
	//Check file extension 
	if(in_array(strtolower($imageFileType_Three), $valid_extensions)) {
		
		if(move_uploaded_file($_FILES['fileThree']['tmp_name'],$location_Three)){
			$url_three = $location_Three;
		}
	}
	//$car_Image=$_POST['c'];

	//Vehicle Overview
	$bodyType = $_POST['bodyType'];
	$carColor = $_POST['carColor'];
	$numDoors	= $_POST['carDoors'];
	$numSeats	= $_POST['carSeats'];
	$numOwner	= $_POST['carOwner'];
	$dTrain	=	$_POST['carDrivetrain'];
	$eType	=	$_POST['carEngineType'];
	$fType	=	$_POST['carFuelType'];
	$emissions	=	$_POST['carCOEmission'];
	$tCapacity	=	$_POST['tankCapacity'];
	$hPower	=	$_POST['horsepower'];

	//Key Features
	$bTooth = $_POST['bluetooth'];
	$bCamera	= $_POST['backCamera'];
	$aRims	= $_POST['alloyRims'];
	$sunMoon=$_POST['sunMoonRoof'];
	$lSeats=$_POST['leatheretteSeats'];
	$hfSeats=$_POST['hFrontSeats'];
	$warning=$_POST['laneDepartureWarning'];
	$kEntry=$_POST['keylessEntry'];

	$carUploadedBy="Dealer";
	$sql_brand="Select * from cars_brand where carBrand_ID='$carBrand_Id' AND carBrand_Status='Available'";
	$tu=mysqli_query($connect,$sql_brand);
	$var=mysqli_fetch_assoc($tu);

	$today = date("F j, Y, g:i A"); 
	$notifyTitle="New Car Added";
	$notifyDesc=ucfirst($carName)." By ".$var['carBrand_Name']." has been added by ".$dealership." , ".$dealer_location." at ".$today."Kindly approve it";
	//$sql_car = "INSERT INTO cars (car_Name, car_Status, car_Year, car_Mileage, car_Dealer, car_Location, car_Price, car_NewUsed, car_isElectric, CarBrandId, car_Image) VALUES ('$carName', '$carStatus', '$year', '$car_Mileage', '$car_Dealer', '$car_Location', '$car_Price', '$car_NewUsed', '$car_isElectric', '$carBrand_Id', '$url')";
	$sql_car = "INSERT INTO cars (car_Name, car_Status, car_AutoStatus, car_Year, car_Mileage, car_Price, car_NewUsed, car_isElectric, car_UploadedBy, CarBrandId, DealerId) VALUES ('$carName', '$carStatus', 'Pending', '$year', '$car_Mileage', '$car_Price', '$car_NewUsed', '$car_isElectric', '$carUploadedBy','$carBrand_Id', '$user_id')";
	
	$notifications_status="Available";
	$notification_status="Unseen";

	$s_quer="Select * from admin";
	$re=mysqli_query($connect,$s_quer);
	$v=mysqli_fetch_assoc($re);
	$admin_Id=$v['admin_ID'];

	$cap_one=mysqli_real_escape_string($connect,$_POST['caption_PicOne']);
	$cap_two=mysqli_real_escape_string($connect,$_POST['caption_PicTwo']);
	$cap_three=mysqli_real_escape_string($connect,$_POST['caption_PicThree']);

	$imge_status="Available";


	if(mysqli_query($connect,$sql_car)) 
	{
		$last_id = mysqli_insert_id($connect);

		$sql_image_one = "INSERT INTO car_gallery (carGallery_Status, carGallery_Image, carGallery_Caption, CarId) VALUES ('$imge_status','$url_one', '$cap_one', '$last_id')";
		$sql_image_two = "INSERT INTO car_gallery (carGallery_Status, carGallery_Image, carGallery_Caption, CarId) VALUES ('$imge_status','$url_two','$cap_two', '$last_id')";
		$sql_image_three = "INSERT INTO car_gallery (carGallery_Status, carGallery_Image, carGallery_Caption, CarId) VALUES ('$imge_status','$url_three', '$cap_three', '$last_id')";

		if($last_id!="")
		{
			if(mysqli_query($connect, $sql_image_one) && mysqli_query($connect, $sql_image_two) && mysqli_query($connect, $sql_image_three))
			{
				$sql_overview = "INSERT INTO vehicle_overview (vehOver_BType, vehOver_Color, vehOver_NumDoor, vehOver_NumSeats, vehOver_NumOwner, vehOver_DTrain, vehOver_EType, vehOver_fuelType, vehOver_Emission, vehOver_TCapacity, vehOver_HPower, carId) VALUES ('$bodyType', '$carColor', '$numDoors', '$numSeats', '$numOwner', '$dTrain', '$eType', '$fType', '$emissions', '$tCapacity', '$hPower', '$last_id')";
				$sql_features = "INSERT INTO key_feature (kF_BTooth, kF_BCamera, kF_ARims, kF_SMroof, kF_LSeats, kF_HFSeats, kF_LDWarning, kF_KEntry, carId) VALUES ('$bTooth', '$bCamera', '$aRims', '$sunMoon', '$lSeats', '$hfSeats', '$warning', '$kEntry', '$last_id')";
				if(mysqli_query($connect,$sql_overview) && mysqli_query($connect,$sql_features))
				{
				$sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
				if(mysqli_query($connect, $sql_notify))
				{
					$notify_last_id=mysqli_insert_id($connect);
					$sql_notify_by_admin="INSERT INTO notify_bydealer (notifyByDealer_dealerId, notificationsId) VALUES ('$user_id', '$notify_last_id')";
					if(mysqli_query($connect,$sql_notify_by_admin))
					{
						$notifybydealer_last_id = mysqli_insert_id($connect);
						/*$sql_notify_seen_dealer="INSERT INTO notifications_seen_dealer (notifySeenDealer_Status, notifySeenDealer_AdminId, notifySeenDealer_NotificationId, notifyByDealerId) VALUES 
						('$notification_status', '$admin_Id', '$notify_last_id', '$notifybydealer_last_id')";*/

					
							header('location: My Car.php?msg=Success');
							
						

							
						
					}
					else
						header('location: My Car.php?msgOther=ErrorWhileAddingNotificationBy');
				}
				else
					header('location: My Car.php?msgOther=ErrorWhileAddingNotification');
			}
			else
				header('location: My Car.php?msgOther=ErrorWhileAdding');
			}
            //$sql_dealerCar = "INSERT INTO dealercars (CarId, DealerId) VALUES ('$last_id', '$user_id')"; 
			
		}
	} 
	else 
	{
		header('location: My Car.php?msgError=Error');			
	}
	
}

?>
