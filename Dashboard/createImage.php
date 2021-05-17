<?php 	
require_once '../db_connect.php'; 
$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{	
	$get_CarId=$_POST['getCarId'];
    //$get_CarId=36;
    $filename = explode('.', $_FILES['file']['name']);
	$filename = $filename[count($filename)-1];
	$location = 'Uploads/'.uniqid(rand()).'.'.$filename;
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);
	$valid_extensions = array("jpg","jpeg","png");
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
		
		if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
			$url_one = $location;
		}
	}
	$capt = mysqli_real_escape_string($connect, $_POST['caption']);
	$caption = trim(preg_replace('/\s+/', ' ', $capt));
	$status	= "Available";
	
	$sql = "INSERT INTO car_gallery (carGallery_Status, carGallery_Image, carGallery_Caption, CarId) 
    VALUES ('$status', '$url_one', '$caption', '$get_CarId')";

	if(mysqli_query($connect,$sql)) 
	{
		header('location: CompleteGallery.php?url='.$get_CarId.'&Success');
	} 
	else 
	{
		header('location: CompleteGallery.php?url='.$get_CarId.'&Error');			
	}
}
?>

