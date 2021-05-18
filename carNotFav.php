<?php
	require_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["car_u_id"],$_POST["buyer_u_id"]))  
	{
        $car_id=$_POST["car_u_id"];
        $buyer_id=$_POST["buyer_u_id"];
        $open_car=$_GET['id'];
        $markFav="No";
        $status="Unmarked";

            $sql_update="DELETE from fav_cars
                WHERE favCar_CarId='$car_id' AND favCar_tmpUser='$buyer_id'";
            
            
            if(mysqli_query($connect, $sql_update))
            {
                header('location: view-car.php?id='.$open_car.'msg=SuccessAvailable');
            }
            else
            {
                header('location: view-car.php?id='.$open_car.'msgError=Error');
            }
        
        
	}
?>

