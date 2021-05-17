<?php
	require_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["car_id"],$_POST["buyer_id"]))  
	{
        $car_id=$_POST["car_id"];
        $buyer_id=$_POST["buyer_id"];

        $sql_getFav="Select * from fav_cars WHERE favCar_CarId='$car_id' AND favCar_BuyerId='$buyer_id'";
        $res=mysqli_query($connect, $sql_getFav); 
        //$line=mysqli_fetch_assoc($res);
        $numRows=mysqli_num_rows($res);
        if($numRows==0)
        {
            $markFav="Yes";
            $status="Marked";
            $sql_insert="INSERT INTO fav_cars (favCar_Status, favCar_CarId, favCar_BuyerId, favCar_MarkFav) 
            VALUES ('$status', '$car_id', '$buyer_id', '$markFav')";
            if(mysqli_query($connect, $sql_insert))
            {
                header('location: All-Cars.php?msg=SuccessAvailable');
            }
            else
            {
                header('location: All-Cars.php?msgError=Error');
            }
        }
        else if($numRows==1)
        {
            $markFav="Yes";
            $status="Marked";
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
        
	}
?>

