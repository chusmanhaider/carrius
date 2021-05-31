<?php
	require_once '../../db_connect.php';
	error_reporting(0);
	if(isset($_POST["dealer_id"]))  
	{  
        $dealer_id = $_POST['dealer_id'];
		$sql = "SELECT * from business_schedule 
        INNER JOIN bschedule_check ON business_schedule.bsCheckId=bschedule_check.bSCheck_ID
        INNER JOIN business_fromtime ON business_schedule.fromTimeId=business_fromtime.bsFrom_ID
        INNER JOIN business_totime ON business_schedule.toTimeId=business_totime.bsTo_ID
        WHERE business_schedule.DealerId = '$dealer_id'";
		//$query = "SELECT * FROM cars INNER JOIN vehicle_overview ON cars.car_ID = vehicle_overview.carId WHERE cars.car_Status!='Terminated'";
		$result = mysqli_query($connect, $sql);  
		$row = mysqli_fetch_array($result);
		

			//echo json_encode($r);
		echo json_encode($row);
		//echo json_encode(array($row,$r,$rw));  
	}

?>