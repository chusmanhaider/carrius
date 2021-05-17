<?php  
require_once '../db_connect.php';
//error_reporting(0);
if(!empty($_POST))  
{
	$car_Id=$_POST['car_Id'];

	$output = '';  
    $message = '';
    $thispro = mysqli_real_escape_string($connect, $_POST['updateCarName']);
	$name = trim(preg_replace('/\s+/', ' ', $thispro));

	$year = mysqli_real_escape_string($connect, $_POST["updateYear"]);
	$cBrandId = mysqli_real_escape_string($connect, $_POST["updateCarBrand"]);
	$mileage = mysqli_real_escape_string($connect, $_POST["updateCarMileage"]);
	$cDealer = mysqli_real_escape_string($connect, $_POST["updateCarDLoc"]);
	
	$select_dealer_id=$_POST['updateDealerId'];
	
	$location=$v['dealer_Location'];
	$dealer_name=$v['dealer_FName'];
	$dealer_Id=$v['dealer_ID'];
	/*
	$r=mysqli_query($connect,$q);
	$v=mysqli_fetch_assoc($r);
	$loc=$v['dealer_Location'];
	*/
	//$loc = mysqli_real_escape_string($connect, $_POST["updateCarLoc"]);
	$price = mysqli_real_escape_string($connect, $_POST["updateCarPrice"]);
	$status = mysqli_real_escape_string($connect, $_POST["updateCarStatus"]);
	$carCond = mysqli_real_escape_string($connect, $_POST["update_carCondition"]);
	$isElect = mysqli_real_escape_string($connect, $_POST["update_isElectric"]);

	/* Vehicle Overview */
	$bType = mysqli_real_escape_string($connect, $_POST["upBodyType"]);
	$color = mysqli_real_escape_string($connect, $_POST["upCarColor"]);
	$doors = mysqli_real_escape_string($connect, $_POST["upCarDoors"]);
	$seats = mysqli_real_escape_string($connect, $_POST["upCarSeats"]);
	$owner = mysqli_real_escape_string($connect, $_POST["upCarOwner"]);
	$drivetrain = mysqli_real_escape_string($connect, $_POST["upCarDrivetrain"]);
	$enginetype = mysqli_real_escape_string($connect, $_POST["upCarEngineType"]);
	$fueltype = mysqli_real_escape_string($connect, $_POST["upCarFuelType"]);
	$emissions = mysqli_real_escape_string($connect, $_POST["upCarCOEmission"]);
	$tankcapacity = mysqli_real_escape_string($connect, $_POST["upTankCapacity"]);
	$horsepower = mysqli_real_escape_string($connect, $_POST["uphorsepower"]);

	/* Key Features */
	$bluetooth = mysqli_real_escape_string($connect, $_POST["upBluetooth"]);
	$bCamera = mysqli_real_escape_string($connect, $_POST["upBackCamera"]);
	$alloy = mysqli_real_escape_string($connect, $_POST["upAlloyRims"]);
	$sunmoon = mysqli_real_escape_string($connect, $_POST["upSunMoonRoof"]);
	$lSeats = mysqli_real_escape_string($connect, $_POST["upleatheretteSeats"]);
	$hfSeat = mysqli_real_escape_string($connect, $_POST["uphFrontSeats"]);
	$ldWarning = mysqli_real_escape_string($connect, $_POST["uplaneDepartureWarning"]);
	$keylessEntry = mysqli_real_escape_string($connect, $_POST["upKeylessEntry"]);
	
	$admin_id=$_POST['admin_id'];
	$carUpdatedBy="Admin";
	$q="Select * from cars INNER JOIN cars_brand ON cars_brand.carBrand_ID=cars.CarBrandId where cars.car_ID='$car_Id' AND cars.car_Status!='Terminated'";
	$r=mysqli_query($connect,$q);
	$var=mysqli_fetch_assoc($r);
	$today = date("F j, Y, g:i A"); 
	$carName=$var['car_Name'];

	$notifyTitle="Car Updated";
	$notifyDesc="Your car's deatil has been updated by ".$carUpdatedBy." at ".$today;
	$notifications_status="Available";
	$notification_status="Unseen";

	//$type = explode('.', $_FILES['updateNewProductImage']['name']);
	//$type = $type[count($type)-1];
	//$url = 'Images/'.uniqid(rand()).'.'.$type;
	if($_POST["car_Id"] != '' AND $_POST["car_overview_Id"] != '' AND $_POST["car_feature_Id"] != '')
	{		
		$query = "  
			UPDATE cars  
			SET car_Name='$name',
			car_Year='$year',
			CarBrandId='$cBrandId',
			car_Mileage='$mileage',
			
			car_Price='$price',
			car_NewUsed='$carCond',
			car_isElectric='$isElect',
			car_Status='$status',
			car_UpdatedBy='$carUpdatedBy'
			WHERE car_ID='".$_POST["car_Id"]."'";
		
			
			$sql = "  
			UPDATE vehicle_overview  
			SET vehOver_BType='$bType',
			vehOver_Color='$color',
			vehOver_NumDoor='$doors',
			vehOver_NumSeats='$seats',
			vehOver_NumOwner='$owner',
			vehOver_DTrain='$drivetrain',
			vehOver_EType='$enginetype',
			vehOver_fuelType='$fueltype',
			vehOver_Emission='$emissions',
			vehOver_TCapacity='$tankcapacity',
			vehOver_HPower='$horsepower',
			carId='".$_POST["car_Id"]."'
			WHERE vehOver_ID='".$_POST["car_overview_Id"]."'";

			$sql_t="
			Update dealercars
			SET CarId='$car_Id',
			DealerId='$cDealer'
			WHERE CarId='$car_Id' AND DealerId='$dealer_Id';
			";

			$sql_key = "  
			UPDATE key_feature  
			SET kF_BTooth='$bluetooth',
			kF_BCamera='$bCamera',
			kF_ARims='$alloy',
			kF_SMroof='$sunmoon',
			kF_LSeats='$lSeats',
			kF_HFSeats='$hfSeat',
			kF_LDWarning='$ldWarning',
			kF_KEntry='$keylessEntry',
			carId='".$_POST["car_Id"]."'
			WHERE kF_ID='".$_POST["car_feature_Id"]."'";
			
			if(mysqli_query($connect, $sql) AND 
				mysqli_query($connect, $query) AND 
				mysqli_query($connect, $sql_key) AND 
				mysqli_query($connect, $sql_t)
			)  
			{  
				$sql_notify= "INSERT INTO notifications (notify_Title, notify_Descp, notify_Status) VALUES ('$notifyTitle','$notifyDesc', '$notifications_status')";
				if(mysqli_query($connect, $sql_notify))
				{
					$notify_last_id=mysqli_insert_id($connect);
					$sql_notify_by_admin="INSERT INTO notify_byadmin (notifyByAdmin_adminId, notificationsId) VALUES ('$admin_id', '$notify_last_id')";
					if(mysqli_query($connect, $sql_notify_by_admin))
					{
							$notifybyadmin_last_id = mysqli_insert_id($connect);
							$sql_notify_seen="INSERT INTO notifications_seen (notifySeen_Status, notifySeen_DealerId, notifySeen_NotificationId, notifyByAdminId) VALUES ('$notification_status_new', '$$dealer_Id', '$notify_last_id', '$notifybyadmin_last_id')";
							
							if(mysqli_query($connect, $sql_notify_seen))
							{
								$output .= '<label class="text-success">' . $message . '</label>';
							}
							else
								$output .= '<label class="text-danger">' . $message . '</label>';
							
					}
					else
						$output .= '<label class="text-danger">' . $message . '</label>';
				}
				    
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