<?php
	require_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["car_u_id"],$_POST["buyer_u_id"]))  
	{
        $car_id=$_POST["car_u_id"];
        $buyer_id=$_POST["buyer_u_id"];

        $markFav="No";
        $status="Unmarked";

            $sql_update="UPDATE fav_cars SET
                favCar_Status='$status',
                favCar_MarkFav='$markFav'
                WHERE favCar_CarId='$car_id' AND favCar_BuyerId='$buyer_id'";
            
            
            if(mysqli_query($connect, $sql_update))
            {
                header('location: All-Cars.php?msg=SuccessAvailable');
            }
            else
            {
                header('location: All-Cars.php?msgError=Error');
            }
        
        
	}
?>

