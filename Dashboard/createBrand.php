<?php 	
require_once '../db_connect.php'; 
$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) 
{	
	/*
	$cate 		= strtolower($_POST['categoryName']);
	$cateName	= strtolower(trim(preg_replace('/\s+/', ' ', $cate)));
	
	$today = new DateTime();
	$currDate=date_format($today,'d-M-Y');
	/*
	$date=new DateTime();
	$currDate=date_format($date,"d-M-Y");
    

	$time=date("h:i:s A");
	*/

	$cate = $_POST['categoryName'];
	$cateName = trim(preg_replace('/\s+/', ' ', $cate));
	$cateStatus	= $_POST['categoryStatus'];
	
	$sql = "INSERT INTO cars_brand (carBrand_Name, carBrand_Status) VALUES ('$cateName', '$cateStatus')";

	if(mysqli_query($connect,$sql)) 
	{
		header('location: Car Brands.php?msg=Success');
	} 
	else 
	{
		header('location: Car Brands.php?msgError=Error');			
	}
}
?>

