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

	if(isset($_POST["get_id"]))
	{
		$get_id=$_POST["get_id"];
		$query="Select * from dealer Where dealer_ID='$get_id'";
		$result = mysqli_query($connect, $query);  
		$row = mysqli_fetch_array($result);  
		echo json_encode($row);
	}

	if(isset($_POST["pass"],$_POST['get_admin_id']))
	{
		$admin_id=$_POST["get_admin_id"];
		$admin_pass=$_POST["pass"];

		$admin_pass = sha1(md5($admin_pass));

		$query="Select * from admin Where admin_ID = '$admin_id' AND admin_password = '$admin_pass'";
		$verifyDealer=mysqli_query($connect,$query);
		echo mysqli_num_rows($verifyDealer);
	}
?>
