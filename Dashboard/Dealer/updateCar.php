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
	
	//$select_dealer_id=$_POST['updateDealerId'];
	
	
	$dealer_Id=$_POST['dealer_Id'];
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
	$carUpdatedBy="Dealer";
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
	if($_POST["car_Id"] != '' && $_POST["car_overview_Id"] != '' && $_POST["car_feature_Id"] != '')
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
			car_UpdatedBy='$carUpdatedBy',
			DealerId='$dealer_Id'
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
			
			if(mysqli_query($connect, $sql) AND mysqli_query($connect, $query) AND mysqli_query($connect, $sql_key))  
			{  
				//$output .= '<label class="text-danger">True</label>';
				$auto_status = "Pending";
				$sql_status_update="UPDATE cars SET car_AutoStatus = '$auto_status' WHERE car_ID='$car_Id'";
				if(mysqli_query($connect, $sql_status_update))
				{
					$output .= '<label class="text-success">True</label>';
				}
				else
				{
					$output .= '<label class="text-danger">Error</label>';
				}
				    
			}
			else
			{
				$output .= '<label class="text-danger">Error</label>';
			}
	}
	
}
?>