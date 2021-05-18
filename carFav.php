<?php
	require_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["car_id"],$_POST["tmpuser_id"]))  
	{
        $car_id=$_POST["car_id"];
        $tmpuser=$_POST["tmpuser_id"];
        $open_car=$_GET['id'];
        $sql_getFav="Select * from fav_cars WHERE favCar_CarId='$car_id' 
        AND favCar_MarkedBy='NonRegisteredUser' AND favCar_tmpUser='$tmpuser'";
        $res=mysqli_query($connect, $sql_getFav); 
        //$line=mysqli_fetch_assoc($res);
        $numRows=mysqli_num_rows($res);
        if($numRows==0)
        {
            $markFav="Yes";
            $status="Marked";
			$markedBy="NonRegisteredUser";
            $sql_insert="INSERT INTO fav_cars (favCar_Status, favCar_CarId, favCar_MarkedBy, favCar_tmpUser, favCar_MarkFav) 
            VALUES ('$status', '$car_id', '$markedBy', '$tmpuser', '$markFav')";
            if(mysqli_query($connect, $sql_insert))
            {
                header('location: view-car.php?id='.$open_car.'msg=SuccessAvailable');
            }
            else
            {
                header('location: view-car.php?id='.$open_car.'msgError=Error');
            }
        }
        else if($numRows==1)
        {
            $markFav="Yes";
            $status="Marked";
			$markedBy="NonRegisteredUser";
            $sql_update="UPDATE fav_cars SET
                favCar_Status='$status',
				favCar_MarkedBy='$markedBy',
                favCar_MarkFav='$markFav'
                WHERE favCar_CarId='$car_id' AND favCar_BuyerId='$buyer_id'";
            if(mysqli_query($connect, $sql_update))
            {
                header('location: view-car.php?id='.$open_car.'msg=SuccessAvailable');
            }
            else
            {
                header('location: view-car.php?id='.$open_car.'msgError=Error');
            }
        }
        
	}
?>

