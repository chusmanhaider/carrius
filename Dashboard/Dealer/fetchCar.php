<?php
	require_once '../../db_connect.php';
	error_reporting(0);
	if(isset($_POST["car_id"]))  
	{  
		$query = "SELECT * from cars WHERE car_ID = '".$_POST["car_id"]."'";
		$sql = "SELECT * from vehicle_overview WHERE carId = '".$_POST["car_id"]."'";
		$sql_key = "SELECT * from key_feature WHERE carId = '".$_POST["car_id"]."'";
		//$query = "SELECT * FROM cars INNER JOIN vehicle_overview ON cars.car_ID = vehicle_overview.carId WHERE cars.car_Status!='Terminated'";
		$result = mysqli_query($connect, $query);  
		$row = mysqli_fetch_array($result);
		  
		$re = mysqli_query($connect, $sql);  
		$r = mysqli_fetch_array($re);

		$res = mysqli_query($connect, $sql_key);  
		$rw = mysqli_fetch_array($res);

			//echo json_encode($r);
		 // echo json_encode($rw);
		echo json_encode(array($row,$r,$rw));  
	}
	if(isset($_POST["car_image_id"]))  
	{  
		$sql_t = "SELECT * FROM car_gallery 
		where carGallery_ID = '".$_POST["car_image_id"]."'";  
		$res = mysqli_query($connect, $sql_t);  
		$rw = mysqli_fetch_array($res);  
		echo json_encode($rw);  
	}
 ?>
