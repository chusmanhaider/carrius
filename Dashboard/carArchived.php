<?php
	require_once '../db_connect.php';
	error_reporting(0);
	if(isset($_POST["car_image_id"]))  
	{  
        $c_id = $_POST['car_image_id'];
        $re_status="Archived";
		$sql="UPDATE car_gallery SET carGallery_Status='$re_status' WHERE carGallery_ID='$c_id'";  
		if(mysqli_query($connect,$sql)) 
        {
            header('location: CompleteGallery.php?url='.$c_id.'&Success');
        } 
        else 
        {
            header('location: CompleteGallery.php?url='.$c_id.'&Error');			
        } 
	}
?>

