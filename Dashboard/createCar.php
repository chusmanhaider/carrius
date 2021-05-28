<?php 	
require_once '../db_connect.php'; 
$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{	
	// Basic Information
	$cate = mysqli_real_escape_string($connect, $_POST['carName']);
	$carName = trim(preg_replace('/\s+/', ' ', $cate));
	$carStatus	= mysqli_real_escape_string($connect, $_POST['carStatus']);
	$year	= mysqli_real_escape_string($connect, $_POST['year']);
	$car_Cond=mysqli_real_escape_string($connect, $_POST['carCondition']);
	$car_Mileage=mysqli_real_escape_string($connect, $_POST['carMileage']);
	$car_Dealer_id=mysqli_real_escape_string($connect, $_POST['carDealer']);

	$q="Select * from dealer where dealer_ID='$car_Dealer_id'";
	$t=mysqli_query($connect,$q);
	$re=mysqli_fetch_assoc($t);
	$car_Dealer=$re['dealer_Dealership'];
	$dealer_Loc=$re['dealer_Location'];

	$car_Location=mysqli_real_escape_string($connect, $_POST['carLoc']);
	$car_Price=mysqli_real_escape_string($connect, $_POST['carPrice']);
	$car_NewUsed=$car_Cond;
	$car_isElectric	=mysqli_real_escape_string($connect, $_POST['isElectric']);
	$carBrand_Id	= mysqli_real_escape_string($connect, $_POST['selectedCarBrand']);
	$carType_Id	= mysqli_real_escape_string($connect, $_POST['selectedCarType']);

	//First Image
	$filename = explode('.', $_FILES['fileOne']['name']);
	$filename = $filename[count($filename)-1];
	$location = 'Uploads/'.uniqid(rand()).'.'.$filename;
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
	$location_two = 'Uploads/'.uniqid(rand()).'.'.$filename_two;
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
	$location_Three = 'Uploads/'.uniqid(rand()).'.'.$filename_Three;
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

	//Fourth Image
	$filename_Four = explode('.', $_FILES['fileFour']['name']);
	$filename_Four = $filename_Four[count($filename_Four)-1];
	$location_Four = 'Uploads/'.uniqid(rand()).'.'.$filename_Four;
	$imageFileType_Four = pathinfo($location_Four,PATHINFO_EXTENSION);
	$imageFileType_Four = strtolower($imageFileType_Four);
	$valid_extensions = array("jpg","jpeg","png");
	$url=0;
	//Check file extension 
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
		
		if(move_uploaded_file($_FILES['fileFour']['tmp_name'],$location_Four)){
			$url_four = $location_Four;
		}
	}

	//Fifth Image
	$filename_Fifth = explode('.', $_FILES['fileFive']['name']);
	$filename_Fifth = $filename_Fifth[count($filename_Fifth)-1];
	$location_Fifth = 'Uploads/'.uniqid(rand()).'.'.$filename_Fifth;
	$imageFileType_Fifth = pathinfo($location_Fifth,PATHINFO_EXTENSION);
	$imageFileType_Fifth = strtolower($imageFileType_Fifth);
	$valid_extensions = array("jpg","jpeg","png");
	$url=0;
	//Check file extension 
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
		
		if(move_uploaded_file($_FILES['fileFive']['tmp_name'],$location_Fifth)){
			$url_five = $location_Fifth;
		}
	}

	//Sixth Image
	$filename_Six = explode('.', $_FILES['fileSix']['name']);
	$filename_Six = $filename_Six[count($filename_Six)-1];
	$location_Six = 'Uploads/'.uniqid(rand()).'.'.$filename_Six;
	$imageFileType_Six = pathinfo($location_Six,PATHINFO_EXTENSION);
	$imageFileType_Six = strtolower($imageFileType_Six);
	$valid_extensions = array("jpg","jpeg","png");
	$url=0;
	//Check file extension 
	if(in_array(strtolower($imageFileType_Six), $valid_extensions)) {
		
		if(move_uploaded_file($_FILES['fileSix']['tmp_name'],$location_Six)){
			$url_six = $location_Six;
		}
	}

	//Seven Image
	$filename_Seven = explode('.', $_FILES['fileSeven']['name']);
	$filename_Seven = $filename_Seven[count($filename_Seven)-1];
	$location_Seven = 'Uploads/'.uniqid(rand()).'.'.$filename_Seven;
	$imageFileType_Seven = pathinfo($location_Seven,PATHINFO_EXTENSION);
	$imageFileType_Seven = strtolower($imageFileType_Seven);
	$valid_extensions = array("jpg","jpeg","png");
	$url=0;
	//Check file extension 
	if(in_array(strtolower($imageFileType_Seven), $valid_extensions)) {
		
		if(move_uploaded_file($_FILES['fileSeven']['tmp_name'],$location_Seven)){
			$url_seven = $location_Seven;
		}
	}

	//Eight Image
	$filename_Eight = explode('.', $_FILES['fileEight']['name']);
	$filename_Eight = $filename_Eight[count($filename_Eight)-1];
	$location_Eight = 'Uploads/'.uniqid(rand()).'.'.$filename_Eight;
	$imageFileType_Eight = pathinfo($location_Eight,PATHINFO_EXTENSION);
	$imageFileType_Eight = strtolower($imageFileType_Eight);
	$valid_extensions = array("jpg","jpeg","png");
	$url=0;
	//Check file extension 
	if(in_array(strtolower($imageFileType_Eight), $valid_extensions)) {
		
		if(move_uploaded_file($_FILES['fileEight']['tmp_name'],$location_Eight)){
			$url_eight = $location_Eight;
		}
	}

	$cap_one=mysqli_real_escape_string($connect,$_POST['caption_PicOne']);
	$cap_two=mysqli_real_escape_string($connect,$_POST['caption_PicTwo']);
	$cap_three=mysqli_real_escape_string($connect,$_POST['caption_PicThree']);
	/*$cap_four=mysqli_real_escape_string($connect,$_POST['caption_PicFour']);
	$cap_five=mysqli_real_escape_string($connect,$_POST['caption_PicFive']);
	$cap_six=mysqli_real_escape_string($connect,$_POST['caption_PicSix']);
	$cap_seven=mysqli_real_escape_string($connect,$_POST['caption_PicSeven']);
	$cap_eight=mysqli_real_escape_string($connect,$_POST['caption_PicEight']);*/


	$imge_status="Available";

	/*
	$filename = $_FILES['file']['name'];
	//$type = explode('.', $_FILES['mainImage']['name']);
	//$type = $type[count($type)-1];
	//$url = '../Uploads/'.uniqid(rand()).'.'.$type;
	$location = "Uploads/".$filename;
   	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   	$imageFileType = strtolower($imageFileType);
	$valid_extensions = array("jpg","jpeg","png");
	$url=0;
	/* Check file extension 
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
		  
		if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
			$url = $location;
		}
	}
	*/
	$carUploadedBy="Admin";
	//$car_Image=$_POST['c'];

	//Vehicle Overview
	$bodyType = mysqli_real_escape_string($connect, $_POST['bodyType']);
	$carColor = mysqli_real_escape_string($connect, $_POST['carColor']);
	$numDoors	= mysqli_real_escape_string($connect, $_POST['carDoors']);
	$numSeats	= mysqli_real_escape_string($connect, $_POST['carSeats']);
	$numOwner	= mysqli_real_escape_string($connect, $_POST['carOwner']);
	$dTrain	=	mysqli_real_escape_string($connect, $_POST['carDrivetrain']);
	$gears	=	mysqli_real_escape_string($connect, $_POST['carGear']);
	$eType	=	mysqli_real_escape_string($connect, $_POST['carEngineType']);
	$fType	=	mysqli_real_escape_string($connect, $_POST['carFuelType']);
	$emissions	=	mysqli_real_escape_string($connect, $_POST['carCOEmission']);
	$tCapacity	=	mysqli_real_escape_string($connect, $_POST['tankCapacity']);
	$hPower	=	mysqli_real_escape_string($connect, $_POST['horsepower']);

	//Key Features
	$bTooth = mysqli_real_escape_string($connect, $_POST['bluetooth']);
	$bCamera	= mysqli_real_escape_string($connect, $_POST['backCamera']);
	$aRims	= mysqli_real_escape_string($connect, $_POST['alloyRims']);
	$sunMoon = mysqli_real_escape_string($connect, $_POST['sunMoonRoof']);
	$lSeats = mysqli_real_escape_string($connect, $_POST['leatheretteSeats']);
	$hfSeats = mysqli_real_escape_string($connect, $_POST['hFrontSeats']);
	$warning = mysqli_real_escape_string($connect, $_POST['laneDepartureWarning']);
	$kEntry = mysqli_real_escape_string($connect, $_POST['keylessEntry']);

	$user_id=mysqli_real_escape_string($connect, $_POST['user_id']);
	$today = date("F j, Y, g:i A"); 
	$notifyTitle="New Car Added";
	
	$sql_brand="Select * from cars_brand where carBrand_ID='$carBrand_Id' AND carBrand_Status='Available'";
	$tu=mysqli_query($connect,$sql_brand);
	$var=mysqli_fetch_assoc($tu);

	$notifyDesc=$carName." By ".$var['carBrand_Name']." has been added for you by ".$carUploadedBy." at ".$today;

	$notifications_status="Available";
	$notification_status="Unseen";

	$sql_car = "INSERT INTO cars (car_Name, car_Status, car_AutoStatus, car_Year, car_Mileage, car_Price, car_NewUsed, car_isElectric, car_UploadedBy, CarBrandId, CarTypeId, DealerId) VALUES 
	('$carName', '$carStatus', 'Active', '$year', '$car_Mileage', '$car_Price', '$car_NewUsed', '$car_isElectric', '$carUploadedBy', '$carBrand_Id', '$carType_Id', '$car_Dealer_id')";
	
	if(mysqli_query($connect,$sql_car)) 
	{
		$last_id = mysqli_insert_id($connect);
		if($last_id!="")
		{
			$sql_image_one = "INSERT INTO car_gallery (carGallery_Status, carGallery_Image, carGallery_Caption, CarId) VALUES ('$imge_status','$url_one', '$cap_one', '$last_id')";
			$sql_image_two = "INSERT INTO car_gallery (carGallery_Status, carGallery_Image, carGallery_Caption, CarId) VALUES ('$imge_status','$url_two','$cap_two', '$last_id')";
			$sql_image_three = "INSERT INTO car_gallery (carGallery_Status, carGallery_Image, carGallery_Caption, CarId) VALUES ('$imge_status','$url_three', '$cap_three', '$last_id')";

			$sql_overview = "INSERT INTO vehicle_overview (vehOver_BType, vehOver_Color, vehOver_NumDoor, vehOver_NumSeats, vehOver_NumOwner, vehOver_DTrain, vehOver_EType, vehOver_fuelType, vehOver_NumGear, vehOver_Emission, vehOver_TCapacity, vehOver_HPower, carId) VALUES ('$bodyType', '$carColor', '$numDoors', '$numSeats', '$numOwner', '$dTrain', '$eType', '$fType', '$gears', '$emissions', '$tCapacity', '$hPower', '$last_id')";
			$sql_features = "INSERT INTO key_feature (kF_BTooth, kF_BCamera, kF_ARims, kF_SMroof, kF_LSeats, kF_HFSeats, kF_LDWarning, kF_KEntry, carId) VALUES ('$bTooth', '$bCamera', '$aRims', '$sunMoon', '$lSeats', '$hfSeats', '$warning', '$kEntry', '$last_id')";
			//$sql_dealercars= "INSERT INTO dealercars (CarId,DealerId) VALUES ('$last_id', '$car_Dealer_id')";
			if(mysqli_query($connect, $sql_image_one) && mysqli_query($connect, $sql_image_two) && 
			mysqli_query($connect, $sql_image_three) && mysqli_query($connect, $sql_overview) && mysqli_query($connect, $sql_features))
			{
				$sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
				if(mysqli_query($connect, $sql_notify))
				{
					$notify_last_id=mysqli_insert_id($connect);
					$sql_notify_by_admin="INSERT INTO notify_byadmin (notifyByAdmin_adminId, notificationsId) VALUES ('$user_id', '$notify_last_id')";
					if(mysqli_query($connect,$sql_notify_by_admin))
					{
						//$notifybyadmin_last_id = mysqli_insert_id($connect);
						//$sql_notify_seen="INSERT INTO notifications_seen (notifySeen_Status, notifySeen_DealerId, notifySeen_NotificationId, notifyByAdminId) VALUES ('$notification_status', '$car_Dealer_id', '$notify_last_id', '$notifybyadmin_last_id')";
						/*if(mysqli_query($connect,$sql_notify_seen))
						{
							*/
							header('location: Cars.php?msg=Success');
						//}
						/*
						else
							header('location: Cars.php?msgError=UnableToAdd');
							*/
						
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
	} 
	else 
	{
		header('location: Cars.php?msgError=Error');			
	}
}
?>

