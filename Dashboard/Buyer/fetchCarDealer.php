<?php
	require_once '../db_connect.php';
	//error_reporting(0);
	if(isset($_POST["dealer_id"],$_POST['car_id']))
	{
		$car_id=$_POST["car_id"];
		$dealer_id=$_POST["dealer_id"];
		
        $query="SELECT * FROM dealer 
            INNER JOIN cars ON cars.DealerId=dealer.dealer_ID
            WHERE cars.car_ID='$car_id' AND dealer.dealer_ID='$dealer_id'";

		$result = mysqli_query($connect, $query);  
		$row = mysqli_fetch_array($result);

		echo json_encode($row);
	}

	if(isset($_POST["dealerId"]))
	{
		//$car_id=$_POST["car_id"];
		$dealer_id=$_POST["dealerId"];
		
        $que="SELECT * FROM dealer WHERE dealer_ID='$dealer_id'";

		$res = mysqli_query($connect, $que);  
		$rw = mysqli_fetch_array($res);

		echo json_encode($rw);
	}
?>